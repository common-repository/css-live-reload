<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.webstorm.co.il
 * @since             1.0.0
 * @package           Css_Live_Reload
 *
 * @wordpress-plugin
 * Plugin Name:       Css Live Reload
 * Plugin URI:        https://www.webstorm.co.il/css-live-reload/
 * Description:       Reload all CSS files resources on page with one click without refreshing the page.
 * Version:           1.0.1
 * Author:            Moshe Harush
 * Author URI:        https://www.webstorm.co.il
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       css-live-reload
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-css-live-reload-activator.php
 */
function activate_css_live_reload() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-css-live-reload-activator.php';
	Css_Live_Reload_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-css-live-reload-deactivator.php
 */
function deactivate_css_live_reload() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-css-live-reload-deactivator.php';
	Css_Live_Reload_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_css_live_reload' );
register_deactivation_hook( __FILE__, 'deactivate_css_live_reload' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-css-live-reload.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_css_live_reload() {

	$plugin = new Css_Live_Reload();
	$plugin->run();

}
run_css_live_reload();
