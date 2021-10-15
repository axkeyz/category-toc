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
 * @package    Axkeyz_category_toc
 * @subpackage Axkeyz_category_toc/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Axkeyz_category_toc
 * @subpackage Axkeyz_category_toc/includes
 * @author     Aileen Huang <aileen.huang@outlook.co.nz>
 */
class Axkeyz_category_toc_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'axkeyz_category_toc',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
