<?php
 /**
 * This class is fired during the activation of this plugin.
 *
 * This class contains the code necessary to activate this plugin. It is
 * primarily used to generate a new custom category template based on the 
 * currently activated theme.
 *
 * @link       https://aileenhuang.dev
 * @since      1.0.0
 * 
 * @package    Ak_Category_Toc
 * @subpackage Ak_Category_Toc/includes
 * @author     axkeyz <aileen.huang@outlook.co.nz>
 */
class AK_Category_Toc_Activator {
	/**
	 * This function is run upon plugin activation.
	 *
	 * This function is run when the plugin is first activated and it generates
	 * a new custom category template based on the current theme.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// This class generates a new custom category template based on the current theme
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ak-category-toc-templator.php';
		new AK_Category_Toc_Templator;
	}

}
