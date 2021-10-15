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
 * @package           Ak_Category_Toc
 *
 * @wordpress-plugin
 * Plugin Name:       Category-Based TOC
 * Plugin URI:        https://github.com/axkeyz/category-toc
 * Description:       This plugin adds a bit more customisation to category pages, most notably generating a table of contents.
 * Version:           1.0.0
 * Author:            Aileen Huang
 * Author URI:        https://aileenhuang.dev
 * License:           GPL-2.0+
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       ak-category-toc
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version
 */
define( 'AK_CATEGORY_TOC_VERSION', '1.0.0' );

/**
 * Current plugin directory
 */
define( 'AK_PLUGIN_DIR', WP_PLUGIN_DIR . '/ak-category-toc/');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ak-category-toc-activator.php
 */
function activate_ak_category_toc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ak-category-toc-activator.php';
	Ak_Category_Toc_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ak-category-toc-deactivator.php
 */
function deactivate_ak_category_toc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ak-category-toc-deactivator.php';
	Ak_Category_Toc_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ak_category_toc' );
register_deactivation_hook( __FILE__, 'deactivate_ak_category_toc' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ak-category-toc.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ak_category_toc() {

	$plugin = new Ak_Category_Toc();
	$plugin->run();

}
run_ak_category_toc();
