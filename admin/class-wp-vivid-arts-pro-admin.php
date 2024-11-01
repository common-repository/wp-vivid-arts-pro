<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://egeelabs.com
 * @since      1.0.0
 *
 * @package    Wp_Vivid_Arts_Pro
 * @subpackage Wp_Vivid_Arts_Pro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Vivid_Arts_Pro
 * @subpackage Wp_Vivid_Arts_Pro/admin
 * @author     Edgar Garcia <eddy@vividartsapp.com>
 */
class Wp_Vivid_Arts_Pro_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Vivid_Arts_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Vivid_Arts_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-vivid-arts-pro-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Vivid_Arts_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Vivid_Arts_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-vivid-arts-pro-admin.js', array( 'jquery' ), $this->version, false );

	}


	public function display_admin_page () {
		add_menu_page(
			'Vivid Arts Pro',
			'Vivid Arts Pro',
			'manage_options',
			'vivid-arts-pro',
			array($this, 'showPage'),
			'dashicons-art',
			'50.0'
		);
	}

	public function showPage () {
		require_once 'partials/wp-vivid-arts-pro-admin-display.php';
	}


	public function display_admin_form () {

		// register_setting( 'vivid-arts-pro', 'vap_api_key' );
		register_setting( 'vivid-arts-pro', 'vap_eid' );
		register_setting( 'vivid-arts-pro', 'vap_custom_css' );

		add_settings_section(
			'vivid_arts_general_settings',
			'Vivid Arts Pro General Settings',
			array( $this, 'showGeneralForm'),
			'vivid-arts-pro'
		);

		// add_settings_field(
		// 	'vap_api_key',
		// 	'API Key',
		// 	array( $this, 'showAPIKeyField'),
		// 	'vivid-arts-pro',
		// 	'vivid_arts_general_settings'
		// );

		add_settings_field(
			'vap_eid',
			'Team Id',
			array( $this, 'showUserIdField'),
			'vivid-arts-pro',
			'vivid_arts_general_settings'
		);

		add_settings_field(
			'vap_custom_css',
			'Custom CSS',
			array( $this, 'showCustomCSSTextarea'),
			'vivid-arts-pro',
			'vivid_arts_general_settings'
		);
	}

	public function showGeneralForm () {
		// var_dump('display general settings');
	}

	public function showAPIKeyField () {
		echo '<input type="text" class="widefat" name="vap_api_key" value="'.esc_attr( get_option('vap_api_key') ).'" />>';
	}

	public function showUserIdField () {
		echo '<input type="text" class="widefat" id="vap_eid" name="vap_eid" value="'.esc_attr( get_option('vap_eid') ).'" /><br/><p class="vap_business_signup_msg">Dont have an account? Create a free account at <a href="https://vividartsapp.com/business/signup">https://vividartsapp.com/business/signup</a></p';
	}

	public function showCustomCSSTextarea () {
		echo '<textarea rows="8" cols="50" class="widefat" id="vap_custom_css" name="vap_custom_css">'.esc_attr( get_option('vap_custom_css') ).'</textarea>';
	}

}
