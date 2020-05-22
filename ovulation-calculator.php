<?php
/*
 * Plugin Name: Ovulation Calculator
 * Plugin URI: https://wordpress.org/plugins/ovulation-calculator/
 * Description: This ovulation calculator will calculate your period, fertility and shows the next 6 months ovulation dates.
 * Version: 1.0.0
 * Author: Zakir Sajib
 * Text Domain: ovulation-calculator
 * License: GPLv2 or later
 * Copyright: © 2019 Zakir Sajib.
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'OC_VERSION', '1.0.0' );


add_action( 'plugins_loaded', 'ovulation_calculator_init' );

function ovulation_calculator_init() {

if ( ! class_exists( 'OvulationCalculator' ) ) {
		class OvulationCalculator {
			public function __construct() {
				add_action( 'admin_init', array( $this, 'register_settings' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'admin_ovulation_calculator_enqueue' ) );
				add_action( 'admin_menu', array( $this, 'ovulation_calculator' ) );

				add_action( 'wp_enqueue_scripts', array( $this, 'ovulation_calculator_enqueue' ) );

				add_action( 'init', array( $this, 'ovulation_calculator_shortcodes_init' ) );

				add_action( 'wp_head', array( $this, 'ovulation_calculator_color' ) );
			}
			public static function activate() {
				flush_rewrite_rules();
			} // END public static function activate

			public static function deactivate() {
				$option_name = 'ovulationcalculator-group';
				delete_option( $option_name );
				delete_site_option( $option_name );
				flush_rewrite_rules();
			} // END public static function deactivate

			public function ovulation_calculator_color() {
				$options = get_option( 'ovulationcalculator-group' ); ?>
			<style>
				.oc_title, 
				.oc_subtitle,
				.calculator_table h2, 
				.single .calculator_table h2,
				.calculator_table p,
				.icon-calendar3:before{
					color: <?php echo esc_attr( $options['oc-base-color'] ); ?>;
				}
				
				
				/*Period Dates + Selected day*/

				.ui-state-default.ui-state-highlight.ui-state-active, 
				.ui-datepicker-current-day .ui-state-default.ui-state-active,
				.ll-skin-melon td .ui-state-hover,

				td.periodDay a.ui-state-default, 
				td.periodDay span.ui-state-default,
/* 				.ll-skin-melon td .ui-state-default.ui-state-hover, */
				.period-indicator{
					background-color: <?php echo esc_attr( $options['oc-period-color'] ); ?>;
					color: <?php echo esc_attr( $options['oc-cal-active-color'] ); ?>;
				}
				
				/*Fertile Dates*/
				td.fertileDay a.ui-state-default, 
				td.fertileDay span.ui-state-default{
					background-color: <?php echo esc_attr( $options['oc-fertile-dates'] ); ?>;
				}
				
				/*Submit/Send background color*/
				.calculator_table .submit-btn input[type=submit]{
					background-color: <?php echo esc_attr( $options['oc-send-bg'] ); ?>;
				}
				
				/*Submit/Send background hover+focus color*/
				.calculator_table .submit-btn input[type=submit]:focus, 
				.calculator_table .submit-btn input[type=submit]:hover{
					background-color: <?php echo esc_attr( $options['oc-send-bg'] ); ?>;
				}
				
				/*Submit/Send color*/
				.calculator_table .icon-angle-right,
				.calculator_table .submit-btn input[type=submit]{
					color: <?php echo esc_attr( $options['oc-send-text'] ); ?>;
				}
				
				/* Calendar Year color*/
				.ll-skin-melon .ui-datepicker .ui-datepicker-title{
					color: <?php echo esc_attr( $options['oc-year-color'] ); ?>;
				}
				/* Calendar Days/Week color*/
				.ll-skin-melon .ui-datepicker th{
					color: <?php echo esc_attr( $options['oc-days-color'] ); ?>;
				}
				/* Calendar Background color*/
				#ovulationCalculatorForm,
				.calendar-area{
					background-color: <?php echo esc_attr( $options['oc-bg-color'] ); ?>;
				}
				/* Calendar Cell Background color*/
				.ll-skin-melon td .ui-state-default{
					background: <?php echo esc_attr( $options['oc-cal-bgcolor'] ); ?>;
				}
				/* Calendar disabled Cell text color*/
				.ll-skin-melon .ui-state-disabled .ui-state-default{
					color: <?php echo esc_attr( $options['oc-cal-color'] ); ?>;
				}
				/* Calendar selected day text color*/
				.ll-skin-melon td .ui-state-default.ui-state-active{
					color: <?php echo esc_attr( $options['oc-cal-active-color'] ); ?>;
				}
				/* Calendar default day text color*/
				.ll-skin-melon td .ui-state-default{
					color: <?php echo esc_attr( $options['oc-cal-default-color'] ); ?>;
				}
								
				/* Fertile tick color*/
				td.fertileDay a.ui-state-default::after{
					color: <?php echo esc_attr( $options['oc-fertile-tick'] ); ?>;
				}
				.fertileTick{
					fill: <?php echo esc_attr( $options['oc-fertile-tick'] ); ?>;
				}
				/* Expected Ovulation color*/
				
				td.fertileDay-4 a.ui-state-default::after,
				td.fertileDay-10 a.ui-state-default::after{
					color: <?php echo esc_attr( $options['oc-ovulation-dates'] ); ?>!important;
				}
				.expected-ovulation{
					fill: <?php echo esc_attr( $options['oc-ovulation-dates'] ); ?>;
				}
			</style>
				<?php
			if ( ! empty( $_POST['days'] ) ) :
					if ( ! empty( $_POST['days'] == 20 ) ) : 
					?>
						<style>
							td.fertileDay-2 span::after,
							td.fertileDay-2 a.ui-state-default::after,
							td.fertileDay-6 span::after,
							td.fertileDay-6 a.ui-state-default::after{
								color: <?php echo esc_attr( $options['oc-ovulation-dates'] ); ?>;
							}
							td.fertileDay-4 span::after,
							td.fertileDay-4::after,
							td.fertileDay-4 a.ui-state-default::after{
								color: <?php echo esc_attr( $options['oc-fertile-tick'] ); ?>!important;
							}
						</style>
								<?php elseif ( ! empty( $_POST['days'] == 21 ) ) : ?>
						<style>
							td.fertileDay-3 span::after,
							td.fertileDay-3 a.ui-state-default::after,
							td.fertileDay-8 span::after,
							td.fertileDay-8 a.ui-state-default::after{
								color: <?php echo esc_attr( $options['oc-ovulation-dates'] ); ?>;
							}
							td.fertileDay-4 span::after,
							td.fertileDay-4::after,
							td.fertileDay-4 a.ui-state-default::after{
								color: <?php echo esc_attr( $options['oc-fertile-tick'] ); ?>!important;
							}
						</style>
									<?php 
									endif;
			endif;
		}

			# Wordpress internal registration
			public function register_settings() {
				# set defaults
				$options = array(
					'calculate-ovulation'   => 'Calculate ovulation',
					'first-day-last-period' => 'First day of your last period',
					'select-date'           => 'Select date',
					'length-cycle'          => 'Length of your cycle',
					'oc-submit'             => 'Submit',
					'oc-dates'              => 'Your ovulation dates',
					'oc-next-month-results' => 'Press the arrow to see next month(s) result',
					'oc-expected-ovulation' => 'Days of expected ovulation',
					'oc-fertile'            => 'Fertile',
					'oc-start-ovulation'    => 'Start of new cycle',
					'oc-change-date'        => 'Change date',
					'oc-january'            => 'January',
					'oc-feb'                => 'February',
					'oc-mar'                => 'March',
					'oc-apr'                => 'April',
					'oc-may'                => 'May',
					'oc-jun'                => 'June',
					'oc-jul'                => 'July',
					'oc-aug'                => 'August',
					'oc-sep'                => 'September',
					'oc-oct'                => 'October',
					'oc-nov'                => 'November',
					'oc-dec'                => 'December',
					'oc-mon'                => 'Mon',
					'oc-tue'                => 'Tue',
					'oc-wed'                => 'Wed',
					'oc-thu'                => 'Thu',
					'oc-fri'                => 'Fri',
					'oc-sat'                => 'Sat',
					'oc-sun'                => 'Sun',
					'oc-fertile-tick'       => '#1A9F1F',
					'oc-ovulation-dates'    => '#1A9F1F',
				);
				add_option( 'ovulationcalculator-group', $options, '', 'yes' );
				register_setting( 'ovulationcalculator-group', 'ovulationcalculator-group', $options );
			}

			// Admin Style and JS
			public function admin_ovulation_calculator_enqueue() {
				$screen = get_current_screen();
				if ( $screen->id === 'toplevel_page_ovulation-calculator-menu' ) {

					wp_register_style(
						'oc-admin-custom',
						plugins_url( '/include/admin/css/ovulation-calculator-admin.css', __FILE__ ),
						array(),
						filemtime( plugins_url( '/include/admin/css/ovulation-calculator-admin.css', __FILE__ ) )
					);
					wp_enqueue_style( 'oc-admin-custom' );

					// Tabs
					wp_register_style( 
						'oc-admin-tab',
						plugins_url( '/include/admin/css/tabs.css', __FILE__ ),
						array(),
						filemtime( plugins_url( '/include/admin/css/tabs.css', __FILE__ ) )
					);
					wp_enqueue_style( 'oc-admin-tab' );

					wp_register_style( 
						'oc-admin-tabstyle', 
						plugins_url( '/include/admin/css/tabstyles.css', __FILE__ ), 
						array(), 
						filemtime( plugins_url( '/include/admin/css/tabstyles.css', __FILE__ ) )
					);
					wp_enqueue_style( 'oc-admin-tabstyle' );

					wp_register_script( 
						'oc-modernizr.custom', 
						plugins_url( '/include/admin/js/modernizr.custom.js', __FILE__ ), 
						array( 'jquery' ), 
						OC_VERSION, 
						false 
					);
					wp_enqueue_script( 'oc-modernizr.custom' );

					wp_register_script( 
						'oc-cbpFWTabs', 
						plugins_url( '/include/admin/js/cbpFWTabs.js', __FILE__ ), 
						array( 'jquery' ), 
						OC_VERSION, 
						true 
					);
					wp_enqueue_script( 'oc-cbpFWTabs' );

					wp_register_script( 
						'oc-custom', 
						plugins_url( '/js/ovulation_calculator.js', __FILE__ ), 
						array( 'jquery' ), 
						OC_VERSION, 
						true 
					);
					wp_enqueue_script( 'oc-custom' );

					wp_enqueue_style( 'wp-color-picker' );
					wp_enqueue_script( 
						'wp-color-picker-script', 
						plugins_url( '/include/admin/js/wp-color-picker-script.js', __FILE__ ), 
						array( 'wp-color-picker' ), 
						OC_VERSION, 
						true 
					);
				 }
			}

			// Front-end Style and JS
			public function ovulation_calculator_enqueue() {
				wp_enqueue_style( 'oc_jquery_ui', plugins_url( '/css/jquery-ui.css', __FILE__ ), array(), filemtime( plugins_url( '/css/jquery-ui.css', __FILE__ ) ), false );
				wp_enqueue_style( 'oc_custom_datepicker', plugins_url( '/css/melon.datepicker.css', __FILE__ ), array(), filemtime( plugins_url( '/css/melon.datepicker.css', __FILE__ ) ), false );
				wp_enqueue_style( 'oc-main', plugins_url( '/css/ovulation-calculator.css', __FILE__ ), array(), filemtime( plugins_url( '/css/ovulation-calculator.css', __FILE__ ) ), false );
				wp_enqueue_script( 'jquery-ui-datepicker' );
				wp_register_script( 'oc-front', plugins_url( '/js/ovulation_calculator_front.js', __FILE__ ), array( 'jquery' ), OC_VERSION, true );
				wp_enqueue_script( 'oc-front' );
			}

			public function ovulation_calculator() {
				$page_title = 'Ovulation Calculator';
				$menu_title = 'Ovulation Calculator';
				$capability = 'manage_options';
				$menu_slug  = 'ovulation-calculator-menu';
				$function   = array( $this, 'ovulation_calculator_menu' );
				$icon_url   = plugins_url( '/include/img/ovulationmini.svg', __FILE__ );
				$position   = 59;

				add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

			}
			public function ovulation_calculator_menu() {
		?>
			<div class="wrap" id="OvulationCalculator">
				<h1 class="oc_admin_heading"><img class="ovulation-icon" src="<?php echo esc_attr( plugins_url( '/include/img/ovulation.svg', __FILE__ ) ); ?>" alt="Ovulation"><?php _esc_attr_e( 'Ovulation Calculator', 'ovulation-calculator' ); ?></h1>
					<?php $this->show_navigation(); ?>
			</div>
				<?php
		}

			public function show_navigation() {
				$tabs = array(
					'first'   => __( 'General', 'ovulation-calculator' ),
					'second'  => __( 'Calendar Translation', 'ovulation-calculator' ),
					'third'  => __( 'Calendar Month Translation', 'ovulation-calculator' ),
					'fourth'  => __( 'Calendar Days Translation', 'ovulation-calculator' ),
					'fifth'  => __( 'Color Scheme', 'ovulation-calculator' ),
				);
				echo '<div class="tabs tabs-style-topline" id="tabs">';
					$html = '<nav>';
					$html .= '<ul>';
					foreach ( $tabs as $tab => $name ) {
					$html .= '<li><a href="#' . $tab . '" class="icon icon-' . $tab . '"><span>' . $name . '</span></li></a>';
					}
					$html .= '</ul>';
					$html .= '</nav>';
					echo esc_attr( $html );
					$this->show_navigation_contents();
				echo '</div>';
			}
			public function show_navigation_contents() {
		?>
			<form method="post" id="ovulationcalculator" action="options.php">
					<?php settings_fields( 'ovulationcalculator-group' ); ?>
					<?php do_settings_sections( 'ovulationcalculator-group' ); ?>
					<?php settings_errors(); ?>
					<?php $options = get_option( 'ovulationcalculator-group' ); ?>
				
				   <div class="content-wrap">
					   <div class="loader"></div>
					   <section id="first"> 
						   <?php include( plugin_dir_path( __FILE__ ) . 'include/admin/mailchimp.php' ); ?>
					</section>
					<section id="second">
							<?php include( plugin_dir_path( __FILE__ ) . 'include/admin/translation.php' ); ?>
					</section>
					<section id="third">
							<?php include( plugin_dir_path( __FILE__ ) . 'include/admin/calendarmonth.php' ); ?>
					</section>
					<section id="fourth">
							<?php include( plugin_dir_path( __FILE__ ) . 'include/admin/calendardays.php' ); ?>
					</section>
					<section id="fifth">
							<?php include( plugin_dir_path( __FILE__ ) . 'include/admin/color.php' ); ?>
					</section>
				   </div>
				
				   <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'ovulation-calculator' ); ?>" /></p>
			</form>
		
			
				<?php
		} // Ovulation Calculator Shortcode
			public function ovulation_calculator_shortcodes_init() {
				function ovulation_calculator_shortcode( $atts = array(), $content = null ) {
					// do something to $content
					ob_start();
					include( plugin_dir_path( __FILE__ ) . 'include/oc-shortcode.php' );
					$output = ob_get_clean();
					// always return
					return $output;
				}
				add_shortcode( 'ovulationcalculator', 'ovulation_calculator_shortcode' );
			}

			}// end class
}// end if

	# Object Creation here: Important
	if ( class_exists( 'OvulationCalculator' ) ) {
		// Installation and uninstallation hooks
		register_activation_hook( __FILE__, array( 'WP_Plugin_Template', 'activate' ) );
		register_deactivation_hook( __FILE__, array( 'WP_Plugin_Template', 'deactivate' ) );
		$ovulation_calculator = new OvulationCalculator();
	}
}
