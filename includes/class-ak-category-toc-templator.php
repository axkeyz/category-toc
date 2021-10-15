<?php
/**
 * This class creates a custom category template.
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
class Ak_Category_Toc_Templator {
	/**
	 * This function generates a new template. It is the main template.
	 */
    public function __construct(){
        $this->ak_copy_template();
    }

	public static function ak_copy_template() {
		// Get the directory of the current activated theme
		$theme_directory = get_stylesheet_directory();
        // Directory of the generated custom category template
		$ak_public_display = AK_PLUGIN_DIR . "public/partials/ak-category-toc-public-display.php";

        // Iterate through folders and files of the current activated theme
		if ($handle = opendir($theme_directory)) {
			while (false !== ($file = readdir($handle))) {
                // Ignore if the current resource is a folder
				if ( '.' === $file || '..' === $file ){
					continue;
				}

                // If theme category file matches WP templating lookup order
				if(strpos(strtolower($file),'archive') !== false || strpos(strtolower($file),'category') !== false){
                    // Copy theme category file to generate custom category template
					copy($theme_directory.'/'.$file, $ak_public_display);
					break;  
				}
			}
            // close resource
			closedir($handle);
		}
	}
}

// Generate the template
new AK_Category_Toc_Templator;