<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://cedcoss.com/
 * @since             1.0.0
 * @package           Woo_products_erudition
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce_Products_erudition
 * Plugin URI:        cedcoss
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Cedcoss
 * Author URI:        https://cedcoss.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo_products_erudition
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('WOO_PRODUCT_ERU', plugin_dir_path( __FILE__ ) );

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOO_PRODUCTS_ERUDITION_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo_products_erudition-activator.php
 */
function activate_woo_products_erudition() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo_products_erudition-activator.php';
	Woo_products_erudition_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo_products_erudition-deactivator.php
 */
function deactivate_woo_products_erudition() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo_products_erudition-deactivator.php';
	Woo_products_erudition_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woo_products_erudition' );
register_deactivation_hook( __FILE__, 'deactivate_woo_products_erudition' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo_products_erudition.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woo_products_erudition() {

	$plugin = new Woo_products_erudition();
	$plugin->run();

}
run_woo_products_erudition();
