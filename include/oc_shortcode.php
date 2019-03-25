<?php 
// Get option values from Database. Option Value name is : ovulationcalculator-group
$options = get_option('ovulationcalculator-group');


	if (!function_exists('check_available_date')):
	
	function check_available_date($firstday, $next_period, $selected_period_date){
	
	$keep_all_dates = array();
	$keep_period_dates = array();
	for($month_count = 1; $month_count<=6; $month_count++){ // 6 months result
		
		$start = strtotime($firstday);
		
		$selected_period_d = strtotime($selected_period_date);
		
		$dates=array();

		$dates_period = array();
		
		if($_POST['days'] == 20):
			$count = 3;
		elseif($_POST['days'] == 21):
			$count = 4;
		else:
			$count = 5;
		endif;
		
		// Calculate Fertitle days 6
		for($i = 0; $i<=$count; $i++){
			array_push($dates,date('F d, Y', strtotime("+$i day", $start)));
			$new_format_date = date("d/m/Y", strtotime($dates[$i]));
		}
		
		$add_days = $_POST['days']-$count; // minus 5 from selected cycle 
		$last_fertile_day = $dates[$count];
		$next_fertile_day = date('F d, Y',strtotime($last_fertile_day) + (24*3600*$add_days));
		
		array_push($keep_all_dates,$dates);
		
		$firstday = $next_fertile_day;
		
		
		
		// Calculate period 5 days
		for($x = 0; $x<=4; $x++){
			array_push($dates_period,date('F d, Y', strtotime("+$x day", $selected_period_d)));
			$new_format_period_date = date("d/m/Y", strtotime($dates_period[$x]));
		
		}
		$add_period_days = $_POST['days']-4; // minus 4 from selected cycle
		$last_period_day = $dates_period[4];
		$next_period_day = date('F d, Y',strtotime($last_period_day) + (24*3600*$add_period_days));
		
		array_push($keep_period_dates,$dates_period);
		
		$selected_period_date = $next_period_day;
	}
	
	
	//var_dump(array_reduce($keep_all_dates, 'array_merge', array()));
	
	//$result = array_reduce($keep_all_dates, 'array_merge', array()); // fertile
	
	//$period_result = array_reduce($keep_period_dates, 'array_merge', array()); // periods
	
	
	
	update_option('oc_period_result', $keep_period_dates, '', 'no');
	update_option('oc_fertile_result', $keep_all_dates, '', 'no');
		
	// Fertile
	$fertile_from_db = get_option('oc_fertile_result');
	$result = array_reduce($fertile_from_db, 'array_merge', array());
	
	
	// Period
	$period_from_db = get_option('oc_period_result');
	
	$period_result = array_reduce($period_from_db, 'array_merge', array());
			
	$options = get_option('ovulationcalculator-group');
	
	?>
		
		
		<script>
			$ = jQuery.noConflict();
			$(function ($) {
			$(document).ready(function() {	  
				
				var fertileDays = <?php echo '["' . implode('", "', $result) . '"]' ?>;
				var periodDays = <?php echo '["' . implode('", "', $period_result) . '"]' ?>;
				
				var monthOne = "<?php echo $options['oc-january'] ?>";
				var monthTwo = "<?php echo $options['oc-feb'] ?>";
				var monthThree = "<?php echo $options['oc-mar'] ?>";
				var monthFour = "<?php echo $options['oc-apr'] ?>";
				var monthFive = "<?php echo $options['oc-may'] ?>";
				var monthSix = "<?php echo $options['oc-jun'] ?>";
				var monthSeven = "<?php echo $options['oc-jul'] ?>";
				var monthEight = "<?php echo $options['oc-aug'] ?>";
				var monthNine = "<?php echo $options['oc-sep'] ?>";
				var monthTen = "<?php echo $options['oc-oct'] ?>";
				var monthEleven = "<?php echo $options['oc-nov'] ?>";
				var monthTweleve = "<?php echo $options['oc-dec'] ?>";
				
				var dayOne = "<?php echo $options['oc-mon'] ?>";
				var dayTwo = "<?php echo $options['oc-tue'] ?>";
				var dayThree = "<?php echo $options['oc-wed'] ?>";
				var dayFour = "<?php echo $options['oc-thu'] ?>";
				var dayFive = "<?php echo $options['oc-fri'] ?>";
				var daySix = "<?php echo $options['oc-sat'] ?>";
				var daySeven = "<?php echo $options['oc-sun'] ?>";
								
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
<?php } endif;// Function ends here

if(!empty($_POST['calculator_ok'])):

	$fulldate = $_POST['something'];
	
	$dateparts = explode("/",$fulldate);
	
	$day= $dateparts[0];
	$month= $dateparts[1];
	$year= $dateparts[2];
	
	//echo $day;
	//echo $month;
	//echo $year;
	
	
	//convert to time
	$lasttime=mktime(0,0,0,$month,$day,$year);
	
	$selected_period_date = date("F d, Y",$lasttime);
	
	
	// next period start
    $next_period=$lasttime + $_POST['days']*24*3600;
    $next_period=date("F d, Y",$next_period);
    
	
    
	//first fertile day
	if($_POST['days'] == 20):
		$firstdaytime = $lasttime + $_POST['days']*24*3600 - 15*24*3600;
	elseif($_POST['days'] == 21):
		$firstdaytime = $lasttime + $_POST['days']*24*3600 - 16*24*3600;
	else:
		$firstdaytime = $lasttime + $_POST['days']*24*3600 - 17*24*3600;
	endif;
	
	$firstday = date("F d, Y",$firstdaytime);
	
	//last fertile day
	$lastdaytime=$lasttime + $_POST['days']*24*3600 - 12*24*3600;
	$lastday=date("F d, Y",$lastdaytime);
		
	?>
	<div class="calculator_table">
		<div class="calendar-area">
			<?php if(!empty($options['oc-dates'])):
				printf(__('<h2>%s</h2>', 'ovulation-calculator'), $options['oc-dates']);
			endif;
			if(!empty($options['oc-next-month-results'])):
				printf(__('<p>%s</p>', 'ovulation-calculator'), $options['oc-next-month-results']);
			endif;?>
			
			<?php check_available_date($firstday, $next_period, $selected_period_date);?>
			
			<?php if($_POST['days'] == 20):?>
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
			<?php elseif($_POST['days'] == 21):?>
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
			<?php endif;?>
			
			
			<div id="datepicker" class="ll-skin-melon"></div>
			<div class="fertile" style="padding-top: 1rem;">
				<img class="expected-ovulation" src="<?php echo plugins_url('/img/circle2.svg' , __FILE__ )?>" alt="Days of expected pvulation">&nbsp;&nbsp;&nbsp;<?php printf(__('%s', 'ovulation-calculator'), $options['oc-expected-ovulation']);?>
			</div>
			<div class="calculateagain">
				<div class="fertile">
					<img class="fertileTick" src="<?php echo plugins_url('/img/checkmark.svg' , __FILE__ )?>" alt="ovulation fertile">&nbsp;&nbsp;&nbsp;<?php printf(__('%s', 'ovulation-calculator'), $options['oc-fertile']);?>
				</div>
				<div class="calculateagainbtn" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'];?><?php echo $_SERVER['REQUEST_URI']?>'">
					<span class="icon-calendar3"></span>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-change-date']);?>" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'];?><?php echo $_SERVER['REQUEST_URI']?>'">
				</div>
			</div>
			<div class="fertile">
				<div class="period-indicator"></div>&nbsp;&nbsp;&nbsp;<?php printf(__('%s', 'ovulation-calculator'), $options['oc-start-ovulation']);?>
			</div>
		</div>
	</div>
<?php else: //the calculator comes here ?>
	<script>
			
		$ = jQuery.noConflict();
		$(function ($) {
			$(document).ready(function() {
				
				var monthOne = "<?php echo $options['oc-january'] ?>";
				var monthTwo = "<?php echo $options['oc-feb'] ?>";
				var monthThree = "<?php echo $options['oc-mar'] ?>";
				var monthFour = "<?php echo $options['oc-apr'] ?>";
				var monthFive = "<?php echo $options['oc-may'] ?>";
				var monthSix = "<?php echo $options['oc-jun'] ?>";
				var monthSeven = "<?php echo $options['oc-jul'] ?>";
				var monthEight = "<?php echo $options['oc-aug'] ?>";
				var monthNine = "<?php echo $options['oc-sep'] ?>";
				var monthTen = "<?php echo $options['oc-oct'] ?>";
				var monthEleven = "<?php echo $options['oc-nov'] ?>";
				var monthTweleve = "<?php echo $options['oc-dec'] ?>";
				
				var dayOne = "<?php echo $options['oc-mon'] ?>";
				var dayTwo = "<?php echo $options['oc-tue'] ?>";
				var dayThree = "<?php echo $options['oc-wed'] ?>";
				var dayFour = "<?php echo $options['oc-thu'] ?>";
				var dayFive = "<?php echo $options['oc-fri'] ?>";
				var daySix = "<?php echo $options['oc-sat'] ?>";
				var daySeven = "<?php echo $options['oc-sun'] ?>";				
				
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
			<?php if(!empty($options['calculate-ovulation'])):
				printf(__('<h2>%s</h2>', 'ovulation-calculator'), $options['calculate-ovulation']);
			endif;
			if(!empty($options['first-day-last-period'])):
				printf(__('<p>%s</p>', 'ovulation-calculator'), $options['first-day-last-period']);
			endif?>
			<span class="icon-calendar2"></span>
			<?php if(!empty($options['select-date'])):?>
			<input type="text" name="something" placeholder="<?php printf(__('%s', 'ovulation-calculator'), $options['select-date']);?>..." id="calendarInput" readonly/>
			<?php endif?>
			<div id="calendar" class="ll-skin-melon"></div>
			
			<?php if(!empty($options['length-cycle'])):
				printf(__('<p>%s</p>', 'ovulation-calculator'), $options['length-cycle']);
			endif?>
			<select name="days">
				<?php
				for($i=20;$i<=45;$i++)
				{
					if($i==28) $selected='selected="true"';
					else $selected='';
					echo "<option $selected value='$i'>$i</option>";
				}
				?>
			</select>
			<span class="icon-angle-right"></span>
			<div class="submit-btn">
				<?php if(!empty($options['oc-submit'])):?>
					<input type="submit" name="calculator_ok" id="calculatorOk" value="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-submit'])?>">
				<?php endif?>
			</div>
		</form>
	</div>
<?php endif;?>