<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and allows admin to control aspects
 * of this plugin's output.
 *
 * @link       https://aileenhuang.dev
 * @since      1.0.0
 * 
 * @package    Ak_Category_Toc
 * @subpackage Ak_Category_Toc/includes
 * @author     axkeyz <aileen.huang@outlook.co.nz>
 */
class Ak_Category_Toc_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * This function generates a new custom category template based on the current theme 
	 * when a new theme is activated.
	 *
	 * @since	1.0.0
	 * @author	Aileen Huang
	 */
	public function ak_activate_new_theme(){
		global $pagenow;

		// Check if first activation
		if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php"){
			// This class generates a new custom category template based on the new theme
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ak-category-toc-templator.php';
			new AK_Category_Toc_Templator;
        }
	}

}
