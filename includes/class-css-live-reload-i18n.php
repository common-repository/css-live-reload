<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.webstorm.co.il
 * @since      1.0.0
 *
 * @package    Css_Live_Reload
 * @subpackage Css_Live_Reload/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Css_Live_Reload
 * @subpackage Css_Live_Reload/includes
 * @author     Moshe Harush <moshe@webstorm.co.il>
 */
class Css_Live_Reload_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'css-live-reload',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
