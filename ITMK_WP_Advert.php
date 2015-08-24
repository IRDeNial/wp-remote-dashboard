<?php
	/*
	* Plugin Name: InTouch Marketing Controller
	* Version: 1.0
	* Plugin URI: http://www.intouch-marketing.com
	* Description: This plugin helps InTouch Marketing maintain your website.
	* Author: Michael Orozco / InTouch Marketing
	* Author URI: http://www.intouch-marketing.com
	*
	* Text Domain: intouch-marketing-controler
	* Domain Path: /
	*
	* @package WordPressWidgetController
	* @author Michael Orozco / InTouch Marketing
	* @since 1.0.0
	*/
	
	// Hook the dashboard generation function
	add_action('wp_dashboard_setup', array('ITMK_DASHBOARD_WIDGET','init') );

	class ITMK_DASHBOARD_WIDGET {
		// Widget slug for internal use
    	const wid = 'itmk_widget';
		
		// Remote URL for widget content
		const remote = 'http://intouch-marketing.com/ITMK_WP_ADVERT_CONTENT.php';

	    public static function init() {
			// Create the widget...
			wp_add_dashboard_widget(self::wid,__( 'InTouch Marketing News', 'nouveau' ),array('ITMK_DASHBOARD_WIDGET','widget'));
		}
		
		public static function widget() {
			// Attempt to get the widget content from the remote URL.
			// If fails, return the error below.
			try {
				echo(file_get_contents(self::remote));
			} catch(Exception $ex) {
				echo("There was an error connecting to the remote server.  This will not affect the rest of your WordPress installation.");
				echo("Debug: ".$ex);
			}
		}
	}
?>