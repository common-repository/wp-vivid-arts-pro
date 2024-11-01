<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://vividartsapp.com
 * @since      1.0.0
 *
 * @package    Wp_Vivid_Arts_Pro
 * @subpackage Wp_Vivid_Arts_Pro/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Vivid_Arts_Pro
 * @subpackage Wp_Vivid_Arts_Pro/public
 * @author     Edgar Garcia <eddy@vividartsapp.com>
 */
class Wp_Vivid_Arts_Pro_Public {

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
		 * defined in Wp_Vivid_Arts_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Vivid_Arts_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

 		if ( is_page_template('wp-vivid-arts-pro-artist-directory-template.php') ) {

		 wp_enqueue_style( $this->plugin_name . '-main', plugin_dir_url( __FILE__ ) . 'css/wp-vivid-arts-pro-public.css', false, $this->version, 'all' );

 			wp_enqueue_style( $this->plugin_name . '-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons', array(), $this->version, 'all' );

 			wp_enqueue_style( $this->plugin_name . '-google-fonts-abril', 'https://fonts.googleapis.com/css?family=Abril+Fatface', array(), $this->version, 'all' );

 			wp_enqueue_style( $this->plugin_name . '-app', plugin_dir_url( __FILE__ ) . 'static/css/app.5da8f405b8260ebd25c3cf7a6bf484ca.css', false, $this->version, 'all' );

 			// $logo = get_option( 'options_be_site_logo' );
 			// if( $logo ) {
 			// 	$logo = wp_get_attachment_image_src( $logo, 'full' );
 			// 	$css .= '
 			// 		.site-title { background-image: url(' . $logo[0] . ');}
 			// 	';
 			// }

 			$css = esc_attr( get_option('vap_custom_css') );
 			if( !empty( $css ) ){
 				wp_add_inline_style( $this->plugin_name . '-main', $css );
 			}
 		}

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
		 * defined in Wp_Vivid_Arts_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Vivid_Arts_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


 		if ( is_page_template('wp-vivid-arts-pro-artist-directory-template.php') ) {

			wp_enqueue_script( $this->plugin_name . '-main-js', plugin_dir_url( __FILE__ ) . 'js/wp-vivid-arts-pro-public.js', array( 'jquery' ), $this->version, false );

			// wp_add_inline_script( $this->plugin_name . '-main-js', 'window.VividArts.eId=' . get_option('vap_eid') .';' );

			wp_enqueue_script( $this->plugin_name . '-fontawesome', 'https://use.fontawesome.com/4000f0a8af.js', array(), $this->version, false );

			// wp_enqueue_script( $this->plugin_name . '-env', plugin_dir_url( __FILE__ ) . 'static/js/env.js', array(), $this->version, true );

			wp_enqueue_script( $this->plugin_name . '-manifest', plugin_dir_url( __FILE__ ) . 'static/js/manifest.c7c99b3f5213e9e82300.js', array(), $this->version, true );

			wp_enqueue_script( $this->plugin_name . '-vendor', plugin_dir_url( __FILE__ ) . 'static/js/vendor.642e1e279147fa571972.js', array(), $this->version, true );

			wp_enqueue_script( $this->plugin_name . '-app', plugin_dir_url( __FILE__ ) . 'static/js/app.89266e0ce14b14ee4841.js', array(), $this->version, true );
 		}

	}

	/**
	 * Register inline JavaScript environment variables for the public-facing side of the site.
	 *
	 * @since    1.0.1
	 */
	public function add_inline_script() {
		echo '<script id="' . $this->plugin_name . '-inline'.'">' .
		'window.VividArts={' .
			'eId:"' . get_option('vap_eid') . '"' .
		'};' .
		'</script>';
	}

}
