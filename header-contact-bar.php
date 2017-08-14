<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/GarySwift
 * @since             1.0.0
 * @package           Header_Contact_Bar
 *
 * @wordpress-plugin
 * Plugin Name:       WP Swift: Header Contact Bar
 * Plugin URI:        https://github.com/GarySwift/header-contact-bar
 * Description:       Adds a bar with contact details and google map.
 * Version:           1.0.0
 * Author:            Gary Swift
 * Author URI:        https://github.com/GarySwift
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       header-contact-bar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-header-contact-bar-activator.php
 */
function activate_header_contact_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-header-contact-bar-activator.php';
	Header_Contact_Bar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-header-contact-bar-deactivator.php
 */
function deactivate_header_contact_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-header-contact-bar-deactivator.php';
	Header_Contact_Bar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_header_contact_bar' );
register_deactivation_hook( __FILE__, 'deactivate_header_contact_bar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-header-contact-bar.php';

/**
 * The Admin menu settings.
 *
 * @author 	 Gary Swift 
 * @since    1.0.0
 */
function wp_swift_header_contact_bar_admin_menu() {
	if( current_user_can('editor') || current_user_can('administrator') ) {
		require plugin_dir_path( __FILE__ ) . '_admin-menu.php';
	}
}
add_action( 'init', 'wp_swift_header_contact_bar_admin_menu' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_header_contact_bar() {

	$plugin = new Header_Contact_Bar();
	$plugin->run();

}
run_header_contact_bar();
