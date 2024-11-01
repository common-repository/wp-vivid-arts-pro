<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://vividartsapp.com
 * @since             1.0.0
 * @package           Wp_Vivid_Arts_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       Vivid Arts Pro
 * Plugin URI:        http://vividartsapp.com/wp-vivid-arts-pro
 * Description:       Arts & Culture Management and Engagement
 * Version:           1.1.3
 * Author:            Vivid Arts
 * Author URI:        http://vividartsapp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-vivid-arts-pro
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'WP_VIVID_ARTS_PRO_VERSION', '1.1.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-vivid-arts-pro-activator.php
 */
function activate_wp_vivid_arts_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-vivid-arts-pro-activator.php';
	Wp_Vivid_Arts_Pro_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-vivid-arts-pro-deactivator.php
 */
function deactivate_wp_vivid_arts_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-vivid-arts-pro-deactivator.php';
	Wp_Vivid_Arts_Pro_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_vivid_arts_pro' );
register_deactivation_hook( __FILE__, 'deactivate_wp_vivid_arts_pro' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-vivid-arts-pro.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_vivid_arts_pro() {

	$plugin = new Wp_Vivid_Arts_Pro();
	$plugin->run();

}
run_wp_vivid_arts_pro();
