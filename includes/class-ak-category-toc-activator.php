<?php

/**
 * Fired during plugin activation
 *
 * @link       https://aileenhuang.dev
 * @since      1.0.0
 *
 * @package    Ak_Category_Toc
 * @subpackage Ak_Category_Toc/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ak_Category_Toc
 * @subpackage Ak_Category_Toc/includes
 * @author     Aileen Huang <aileen.huang@outlook.co.nz>
 */
class Ak_Category_Toc_Activator {

	/**
	 * Attempt
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Get the directory of the theme
		$theme_directory = get_stylesheet_directory();
		$ak_public_display = AK_PLUGIN_DIR . "public/partials/ak-category-toc-public-display.php";

		if ($handle = opendir($theme_directory)) {
			while (false !== ($file = readdir($handle))) {
				if ('.' === $file || '..' === $file){
					continue;
				}

				if(strpos(strtolower($file),'archive') !== false || strpos(strtolower($file),'category') !== false){

					$theme_category_template = copy($theme_directory.'/'.$file, $ak_public_display);

					break;
				}
			}
			closedir($handle);
		}
	}

}
