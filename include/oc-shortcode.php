<?php
/**
 * @package Option Value
 * Get option values from Database.
 * Option Value name is : ovulationcalculator-group
 */

$options = get_option( 'ovulationcalculator-group' );

if ( ! function_exists( 'Ovulation_Calculator_Check_Available_date' ) ) :
	function Ovulation_Calculator_Check_Available_date( $firstday, $next_period, $selected_period_date ) {
		$keep_all_dates = array();
		$keep_period_dates = array();
		for ( $month_count = 1; $month_count <= 6; $month_count ++ ) {
			$start = strtotime( $firstday );
			$selected_period_d = strtotime( $selected_period_date );
			$dates = array();
			$dates_period = array();
			if ( ! empty( $_POST['days'] == 20 ) ) :
				$count = 3;
			elseif ( ! empty( $_POST['days'] == 21 ) ) :
				$count = 4;
			else :
				$count = 5;
			endif;

			// Calculate Fertitle days 6
			for ( $i = 0; $i <= $count; $i++ ) {
				array_push( $dates, date( 'F d, Y', strtotime( "+$i day", $start ) ) ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
				$new_format_date = date( 'd/m/Y', strtotime( $dates[ $i ] ) ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
			}

			$add_days = intval( $_POST['days'] ) - $count; // minus 5 from selected cycle
			$last_fertile_day = $dates[ $count ];
			$next_fertile_day = date( 'F d, Y', strtotime( $last_fertile_day ) + ( 24 * 3600 * $add_days ) ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date

			array_push( $keep_all_dates, $dates );
			$firstday = $next_fertile_day;

			// Calculate period 5 days
			for ( $x = 0; $x <= 4; $x++ ) {
				array_push( $dates_period, date( 'F d, Y', strtotime( "+$x day", $selected_period_d ) ) ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
				$new_format_period_date = date( 'd/m/Y', strtotime( $dates_period[ $x ] ) ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
			}
			$add_period_days = intval( $_POST['days'] ) - 4; // minus 4 from selected cycle
			$last_period_day = $dates_period[4];
			$next_period_day = date( 'F d, Y', strtotime( $last_period_day ) + ( 24 * 3600 * $add_period_days ) ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date

			array_push( $keep_period_dates, $dates_period );

			$selected_period_date = $next_period_day;
			}

			update_option( 'oc_period_result', $keep_period_dates, '', 'no' );
			update_option( 'oc_fertile_result', $keep_all_dates, '', 'no' );

			// Fertile
			$fertile_from_db = get_option( 'oc_fertile_result' );
			$result = array_reduce( $fertile_from_db, 'array_merge', array() );

			// Period
			$period_from_db = get_option( 'oc_period_result' );

			$period_result = array_reduce( $period_from_db, 'array_merge', array() );

			$options = get_option( 'ovulationcalculator-group' );

			?>
		
		
		<script>
			$ = jQuery.noConflict();
			$(function ($) {
			$(document).ready(function() {	  
				
				var fertileDays = <?php echo '["' . implode( '", "', esc_attr( $result ) ) . '"]'; ?>;
				var periodDays = <?php echo '["' . implode( '", "', esc_attr( $period_result ) ) . '"]'; ?>;
				
				var monthOne = "<?php echo esc_attr( $options['oc-january'] ); ?>";
				var monthTwo = "<?php echo esc_attr( $options['oc-feb'] ); ?>";
				var monthThree = "<?php echo esc_attr( $options['oc-mar'] ); ?>";
				var monthFour = "<?php echo esc_attr( $options['oc-apr'] ); ?>";
				var monthFive = "<?php echo esc_attr( $options['oc-may'] ); ?>";
				var monthSix = "<?php echo esc_attr( $options['oc-jun'] ); ?>";
				var monthSeven = "<?php echo esc_attr( $options['oc-jul'] ); ?>";
				var monthEight = "<?php echo esc_attr( $options['oc-aug'] ); ?>";
				var monthNine = "<?php echo esc_attr( $options['oc-sep'] ); ?>";
				var monthTen = "<?php echo esc_attr( $options['oc-oct'] ); ?>";
				var monthEleven = "<?php echo esc_attr( $options['oc-nov'] ); ?>";
				var monthTweleve = "<?php echo esc_attr( $options['oc-dec'] ); ?>";
				
				var dayOne = "<?php echo esc_attr( $options['oc-mon'] ); ?>";
				var dayTwo = "<?php echo esc_attr( $options['oc-tue'] ); ?>";
				var dayThree = "<?php echo esc_attr( $options['oc-wed'] ); ?>";
				var dayFour = "<?php echo esc_attr( $options['oc-thu'] ); ?>";
				var dayFive = "<?php echo esc_attr( $options['oc-fri'] ); ?>";
				var daySix = "<?php echo esc_attr( $options['oc-sat'] ); ?>";
				var daySeven = "<?php echo esc_attr( $options['oc-sun'] ); ?>";
								
				$('#datepicker').datepicker({
					
					monthNames: [ monthOne,monthTwo,monthThree,monthFour,monthFive,monthSix, monthSeven,monthEight,monthNine,monthTen,monthEleven,monthTweleve ],
					dayNamesMin: [ daySeven,dayOne,dayTwo,dayThree,dayFour,dayFive,daySix ],
					
					firstDay: 1, // Monday
					showOtherMonths: true,
					selectOtherMonths: true,
					beforeShowDay: function (date) {
						//convert the date to a string format same as the one used in the array
						var string = $.datepicker.formatDate('MM dd, yy', date)
						if ($.inArray(string, fertileDays) > -1) {
						   return [true, 'fertileDay', ''];
					   }else if($.inArray(string, periodDays) > -1){	
							   return [false, 'periodDay', ''];
					   }else {
						 return [false, '', ''];
					   }	
					}
				});	
				
			});
		});
		</script>	
		<?php
} endif;// Function ends here

if ( ! empty( $_POST['calculator_ok'] ) ) :

	$fulldate = sanitize_text_field( isset( $_POST['something'] ) );

	$dateparts = explode( '/', $fulldate );

	$day = $dateparts[0];
	$month = $dateparts[1];
	$year = $dateparts[2];

	//convert to time
	$lasttime = mktime( 0, 0, 0, $month, $day, $year );

	$selected_period_date = date( 'F d, Y', $lasttime ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date

	// next period start
	$next_period = $lasttime + intval( $_POST['days'] ) * 24 * 3600;
	$next_period = date( 'F d, Y', $next_period ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date

	//first fertile day
	if ( ! empty( $_POST['days'] == 20 ) ) :
		$firstdaytime = $lasttime + intval( $_POST['days'] ) * 24 * 3600 - 15 * 24 * 3600;
	elseif ( ! empty( $_POST['days'] == 21 ) ) :
		$firstdaytime = $lasttime + intval( $_POST['days'] ) * 24 * 3600 - 16 * 24 * 3600;
	else :
		$firstdaytime = $lasttime + intval( $_POST['days'] ) * 24 * 3600 - 17 * 24 * 3600;
	endif;

	$firstday = date( 'F d, Y', $firstdaytime ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date

	//last fertile day
	$lastdaytime = $lasttime + intval( $_POST['days'] ) * 24 * 3600 - 12 * 24 * 3600;
	$lastday = date( 'F d, Y', $lastdaytime ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date

	?>
	<div class="calculator_table">
		<div class="calendar-area">
			<?php
			if ( ! empty( $options['oc-dates'] ) ) :
				printf( __( '<h2>%s</h2>', 'ovulation-calculator' ), esc_attr( $options['oc-dates'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			endif;
			if ( ! empty( $options['oc-next-month-results'] ) ) :
				printf( __( '<p>%s</p>', 'ovulation-calculator' ), esc_attr( $options['oc-next-month-results'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			endif;

			Ovulation_Calculator_Check_Available_date( $firstday, $next_period, $selected_period_date );

			if ( ! empty( $_POST['days'] == 20 ) ) :
			?>
				<style>
					td.fertileDay-2 span::after,
					td.fertileDay-2 a.ui-state-default::after,
					td.fertileDay-6 span::after,
					td.fertileDay-6 a.ui-state-default::after{
						content: '\e902';	/*Circle icon*/
					}
					td.fertileDay-4 span::after,
					td.fertileDay-4 a.ui-state-default::after{
						content: "\e900";	/*Tick icon*/
					}
				</style>	
			<?php elseif ( ! empty( $_POST['days'] == 21 ) ) : ?>
				<style>
					td.fertileDay-3 span::after,
					td.fertileDay-3 a.ui-state-default::after,
					td.fertileDay-8 span::after,
					td.fertileDay-8 a.ui-state-default::after{
						content: '\e902';	/*Circle icon*/
					}
					td.fertileDay-4 span::after,
					td.fertileDay-4 a.ui-state-default::after{
						content: "\e900";	/*Tick icon*/
					}
				</style>
			<?php endif; ?>
	
			<div id="datepicker" class="ll-skin-melon"></div>
			<div class="fertile" style="padding-top: 1rem;">
				<img class="expected-ovulation" src="<?php echo plugins_url( '/img/circle2.svg', __FILE__ ); ?>" alt="Days of expected ovulation">&nbsp;&nbsp;&nbsp;<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( $options['oc-expected-ovulation'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
			<div class="calculateagain">
				<div class="fertile">
					<img class="fertileTick" src="<?php echo plugins_url( '/img/checkmark.svg', __FILE__ ); ?>" alt="ovulation fertile">&nbsp;&nbsp;&nbsp;<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( $options['oc-fertile'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
				<div class="calculateagainbtn" onclick="window.location='http://<?php echo isset( $_SERVER['HTTP_HOST'] ); ?><?php echo isset( $_SERVER['REQUEST_URI'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>'">
					<span class="icon-calendar3"></span>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( $options['oc-change-date'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" onclick="window.location='http://<?php echo isset( $_SERVER['HTTP_HOST'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo isset( $_SERVER['REQUEST_URI'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>'">
				</div>
			</div>
			<div class="fertile">
				<div class="period-indicator"></div>&nbsp;&nbsp;&nbsp;<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( $options['oc-start-ovulation'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		</div>
	</div>
<?php else : //the calculator comes here ?>
	<script>
			
		$ = jQuery.noConflict();
		$(function ($) {
			$(document).ready(function() {
				
				var monthOne = "<?php echo esc_attr( $options['oc-january'] ); ?>";
				var monthTwo = "<?php echo esc_attr( $options['oc-feb'] ); ?>";
				var monthThree = "<?php echo esc_attr( $options['oc-mar'] ); ?>";
				var monthFour = "<?php echo esc_attr( $options['oc-apr'] ); ?>";
				var monthFive = "<?php echo esc_attr( $options['oc-may'] ); ?>";
				var monthSix = "<?php echo esc_attr( $options['oc-jun'] ); ?>";
				var monthSeven = "<?php echo esc_attr( $options['oc-jul'] ); ?>";
				var monthEight = "<?php echo esc_attr( $options['oc-aug'] ); ?>";
				var monthNine = "<?php echo esc_attr( $options['oc-sep'] ); ?>";
				var monthTen = "<?php echo esc_attr( $options['oc-oct'] ); ?>";
				var monthEleven = "<?php echo esc_attr( $options['oc-nov'] ); ?>";
				var monthTweleve = "<?php echo esc_attr( $options['oc-dec'] ); ?>";
				
				var dayOne = "<?php echo esc_attr( $options['oc-mon'] ); ?>";
				var dayTwo = "<?php echo esc_attr( $options['oc-tue'] ); ?>";
				var dayThree = "<?php echo esc_attr( $options['oc-wed'] ); ?>";
				var dayFour = "<?php echo esc_attr( $options['oc-thu'] ); ?>";
				var dayFive = "<?php echo esc_attr( $options['oc-fri'] ); ?>";
				var daySix = "<?php echo esc_attr( $options['oc-sat'] ); ?>";
				var daySeven = "<?php echo esc_attr( $options['oc-sun'] ); ?>";				
				
				$('#calendar').datepicker({	  				  			  	
					  monthNames: [ monthOne,monthTwo,monthThree,monthFour,monthFive,monthSix, monthSeven,monthEight,monthNine,monthTen,monthEleven,monthTweleve ],
					dayNamesMin: [ daySeven,dayOne,dayTwo,dayThree,dayFour,dayFive,daySix ],
					
					  firstDay: 1, // Monday
					  inline: true,
					  showOtherMonths: true,
					dateFormat: "dd/mm/yy",
					maxDate: 0,
					
					onSelect: function(dateText, inst) {
						$("input[name='something']").val(dateText);
						$(this).hide();
						$('#calculatorOk').prop('disabled',false);
						$('.calculator_table i.fa.fa-calendar').css('color', '#c1c1c1');
					}
				});
			});
		});
	</script>
	
	
	
	<div class="calculator_table">
		<form method="post" id="ovulationCalculatorForm" autocomplete="off">
			<?php
			if ( ! empty( $options['calculate-ovulation'] ) ) :
				printf( __( ' <h2> %s </h2> ', 'ovulation-calculator' ), esc_attr( $options['calculate-ovulation'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			endif;
			if ( ! empty( $options['first-day-last-period'] ) ) :
				printf( __( ' <p> %s </p> ', 'ovulation-calculator' ), esc_attr( $options['first-day-last-period'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			endif;
			?>
			<span class="icon-calendar2"></span>
			<?php if ( ! empty( $options['select-date'] ) ) : ?>
			<input type="text" name="something" placeholder="<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( $options['select-date'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>..." id="calendarInput" readonly/>
			<?php endif; ?>
			<div id="calendar" class="ll-skin-melon"></div>
			
			<?php
			if ( ! empty( $options['length-cycle'] ) ) :
				printf( __( ' <p> %s </p> ', 'ovulation-calculator' ), esc_attr( $options['length-cycle'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			endif
			?>
			<select name="days">
				<?php
				for ( $i = 20; $i <= 45; $i++ ) {
					if ( $i == 28 ) {
						$selected = 'selected="true"';
					} else {
						$selected = '';
					}
					echo "<option $selected value ='$i'>$i</option>"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				?>
			</select>
			<span class="icon-angle-right"></span>
			<div class="submit-btn">
				<?php if ( ! empty( $options['oc-submit'] ) ) : ?>
					<input type="submit" name="calculator_ok" id="calculatorOk" value="<?php printf( __( '%s', 'ovulation-calculator' ), esc_attr( $options['oc-submit'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">
				<?php endif; ?>
			</div>
		</form>
	</div>
<?php endif; ?>
