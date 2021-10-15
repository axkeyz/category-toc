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
 * @author     axkeyz <aileen.huang@outlook.co.nz>
 */
class Ak_Category_Toc_Templator {
	/**
	 * The file path to this plugin's category template generated based on the
	 * currently activated theme
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $ak_template    File path to plugin category template
	 */
	public $ak_template;
	/**
	 * Directory to the currently activated theme
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $theme_directory    Directory to the current theme
	 */
	public $theme_directory;

	/**
	 * This function generates a new plugin copy of the currently activated
	 * theme's category template for the uses of this plugin. A template is
	 * generated whenever this class is initialised.
	 * 
	 * @since	1.0.0
	 * @author	axkeyz
	 */
    public function __construct(){
		// Get the directory of the current activated theme
		$this->theme_directory = get_stylesheet_directory();

		// Create the file path of the plugin's copy of the category template
		$this->ak_template = AK_PLUGIN_DIR . "public/partials/ak-category-toc-public-display.php";

		// Generate the edited template
        $this->ak_copy_template();
		$this->ak_extend_template();
    }

	/**
	 * This function makes as-is copy of the current theme's category template and
	 * saves the copy under public/partials/ak-category-toc-public-display.php
	 * 
	 * @since	1.0.0
	 * @author	axkeyz
	 */
	public function ak_copy_template() {
		$theme_directory = $this->theme_directory;

        // Iterate through folders and files of the current activated theme
		if ($theme_handle = opendir($theme_directory)) {
			while (false !== ($theme_file = readdir($theme_handle))) {
                // Ignore if the current resource is a folder
				if ( '.' === $theme_file || '..' === $theme_file ){
					continue;
				}

                // If theme category file matches WP templating lookup order
				if(strpos(strtolower($theme_file),'archive') !== false || strpos(strtolower($theme_file),'category') !== false){
                    // Copy theme category file to generate custom category template
					copy($theme_directory.'/'.$theme_file, $this->ak_template);
					break;  
				}
			}
            // close resource
			closedir($theme_handle);
		}
	}

	/**
	 * This function iterates through the plugin copy template and adds extra
	 * actions and comments.
	 * 
	 * @since	1.0.0
	 * @author	axkeyz
	 * 
	 */
	public function ak_extend_template(){
		// Open plugin template copy for editing
		$ak_template = $this->ak_template;
		$ak_reading = fopen($ak_template, 'r');
		$ak_writing = fopen($ak_template.'.tmp', 'w');
		$get_template_line = false;

		// Iterate through each line of plugin template copy
		while (!feof($ak_reading)) {
			// Get line contents
			$line = fgets($ak_reading);

			if( strpos($line, "if") !== false && strpos($line, "have_posts") !== false ){
				// Create custom query to sort by alphabetical order
				$line = $this->php_wrap_string($line, "\$args = array( 'meta_key' => 'order', 'orderby' => 'meta_value', 'order' => 'ASC');")
				. $this->php_wrap_string($line, "\$custom_query = new WP_Query();")
				. $this->php_wrap_string($line, "\$custom_query->query(\$args);")
				. $line;
				// . str_replace("have_posts", "\$custom_query->have_posts", $line);
			}elseif( strpos($line, "the_post();") !== false ){
				$get_template_line = true;
			}elseif( $get_template_line && strpos($line, "template_part") !== false ){
				// Change get template part with a custom actions
				$line = $this->php_wrap_string($line, "do_action('ak_pre_display_single_category_template');")
				. $this->php_wrap_string($line, "include(AK_PLUGIN_DIR . 'public/partials/ak-category-toc-public-display-single.php');")
				. $this->php_wrap_string($line, "do_action('ak_post_display_single_category_template');");

				// Find the get_template_part function directly after "the_post" function
				$get_template_line = false;
			}

			// Save modified/non-modified lines
			fputs($ak_writing, $line);
		}

		// Close files
		fclose($ak_reading); fclose($ak_writing);

		// Rename & remove temporary file
		rename($ak_template.'.tmp', $ak_template);
	}

	/**
	 * Utility function that checks if an original string is wrapped in <?php ?> or not. If the function is 
	 * originally wrapped, then returns an output string wrapped with <?php ?> tags. If the functuion was
	 * not originally wrapped, then output string is left as-is.
	 * 
	 * @since	1.0.0
	 * @author	axkeyz
	 * 
	 * @param string $test_string	
	 */
	public function php_wrap_string($original_string, $output_string){

		// Check if contains opening php string
		if( strpos($original_string, "<?php ") !== false ){
			$output_string = "<?php ".$output_string;
		}

		// Check if contains ending php string
		if( strpos($original_string, "?>") !== false ){
			$output_string = $output_string." ?>";
		}

		// Return output string
		return str_repeat("\t", substr_count($original_string, "\t")).$output_string."\n";
	}
}