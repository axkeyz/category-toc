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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ak_Category_Toc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ak_Category_Toc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ak-category-toc-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ak_Category_Toc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ak_Category_Toc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ak-category-toc-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * This function generates a new  generates a new custom category template 
	 * based on the current theme when a new theme is activated.
	 *
	 * @since	1.0.0
	 * @author	Aileen Huang
	 */
	public function ak_activate_new_theme(){
		// This class generates a new custom category template based on the new theme
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ak-category-toc-templator.php';
		new AK_Category_Toc_Templator;
	}

}
