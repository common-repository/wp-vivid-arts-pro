<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://egeelabs.com
 * @since      1.0.0
 *
 * @package    Wp_Vivid_Arts_Pro
 * @subpackage Wp_Vivid_Arts_Pro/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Vivid_Arts_Pro
 * @subpackage Wp_Vivid_Arts_Pro/includes
 * @author     Edgar Garcia <eddy@vividartsapp.com>
 */
class Wp_Vivid_Arts_Pro_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-vivid-arts-pro',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
