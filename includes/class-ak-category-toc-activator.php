<?php
 /**
 * This class is fired during the activation of this plugin.
 *
 * This class attempts to generate a custom category template based
 * on the current activated theme. It will be used upon activating
 * the plugin and upon activating a new theme.
 *
 * @link       https://aileenhuang.dev
 * @since      1.0.0
 * 
 * @package    Ak_Category_Toc
 * @subpackage Ak_Category_Toc/includes
 * @author     Aileen Huang <aileen.huang@outlook.co.nz>
 */

class AK_Category_Toc_Activator {
	/**
	 * Run upon plugin activation
	 *
	 * This function is run when the plugin is first activated.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		/**
		 * This class generates a new custom category template based on
		 * the current theme
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ak-category-toc-templator.php';
	}

}
