<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://aileenhuang.dev
 * @since             1.0.0
 * @package           Axkeyz_category_toc
 *
 * @wordpress-plugin
 * Plugin Name:       Category-Based TOC
 * Plugin URI:        https://github.com/axkeyz/category-toc
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Aileen Huang
 * Author URI:        https://aileenhuang.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       axkeyz_category_toc
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AXKEYZ_CATEGORY_TOC_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-axkeyz_category_toc-activator.php
 */
function activate_axkeyz_category_toc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-axkeyz_category_toc-activator.php';
	Axkeyz_category_toc_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-axkeyz_category_toc-deactivator.php
 */
function deactivate_axkeyz_category_toc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-axkeyz_category_toc-deactivator.php';
	Axkeyz_category_toc_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_axkeyz_category_toc' );
register_deactivation_hook( __FILE__, 'deactivate_axkeyz_category_toc' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-axkeyz_category_toc.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_axkeyz_category_toc() {

	$plugin = new Axkeyz_category_toc();
	$plugin->run();

}
run_axkeyz_category_toc();
