<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://aileenhuang.dev
 * @since      1.0.0
 *
 * @package    Ak_Category_Toc
 * @subpackage Ak_Category_Toc/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ak_Category_Toc
 * @subpackage Ak_Category_Toc/includes
 * @author     Aileen Huang <aileen.huang@outlook.co.nz>
 */
class Ak_Category_Toc_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ak-category-toc',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
