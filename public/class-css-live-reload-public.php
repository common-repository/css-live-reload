<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.webstorm.co.il
 * @since      1.0.0
 *
 * @package    Css_Live_Reload
 * @subpackage Css_Live_Reload/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Css_Live_Reload
 * @subpackage Css_Live_Reload/public
 * @author     Moshe Harush <moshe@webstorm.co.il>
 */
class Css_Live_Reload_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Css_Live_Reload_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Css_Live_Reload_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/css-live-reload-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Css_Live_Reload_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Css_Live_Reload_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name . '-shake', plugin_dir_url( __FILE__ ) . 'js/shake.js', array( 'jquery' ), $this->version, false );

    // Register the script
    wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/css-live-reload-public.js', array( 'jquery' ), $this->version, true );

    // Localize the script with new data
    $translation_array = array(
        'after_reload_msg'      => __( 'All css files was reloaded!', 'css-live-reload' ),
        'shake_sensitive'       => 15,
        'trigger_key'           => 'F9',
        'after_reload_msg_time' => 2 * 1000
    );
    wp_localize_script( $this->plugin_name, '_clrVars', $translation_array );

    // Enqueued script with localized data.
    wp_enqueue_script( $this->plugin_name );
	}

}
