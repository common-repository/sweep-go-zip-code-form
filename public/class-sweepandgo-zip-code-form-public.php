<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.sweepandgo.com/
 * @since      1.0.0
 *
 * @package    Sweepandgo_Zip_Code_Form
 * @subpackage Sweepandgo_Zip_Code_Form/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sweepandgo_Zip_Code_Form
 * @subpackage Sweepandgo_Zip_Code_Form/public
 * @author     Sweep & Go Team <hello@sweepandgo.com>
 */
class Sweepandgo_Zip_Code_Form_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sweepandgo_Zip_Code_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sweepandgo_Zip_Code_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sweepandgo-zip-code-form-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sweepandgo_Zip_Code_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sweepandgo_Zip_Code_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sweepandgo-zip-code-form-public.js', array( 'jquery' ), $this->version, false );

	}

    function zip_code_shortcode($atts = [])
    {
		$referral = $_SERVER["HTTP_REFERER"];
        $atts = shortcode_atts(
            array(
                'form_class' => ''
			), $atts, 'sng-zip-code-form' );
			
		$sng_form = maybe_unserialize(get_option('sng_form_slugs'));
		if (is_array($sng_form) && !empty($sng_form)) {
			$sng_form_stylings = maybe_unserialize(get_option('sng_form_styling'));
			$form_html =  "<div class=\"wrap\">
						<form class=\"" . esc_html($atts['form_class']) . "\" method=\"post\" action=\"" . admin_url( 'admin-post.php' ); 
			$form_html .= "\" id=\"zip_code_form\">
				<div class=\"sng-zip-code\">
					<div class=\"sng-input-group\">
						<input type=\"text\" class=\"sng-input sng-zip-code-input\" name=\"zip-code\" id=\"zip-code\" placeholder=\"" . esc_html($sng_form_stylings['text_placeholder']) . "\" maxlength=\"5\" autocomplete=\"off\">
						<span id=\"sng-error-message\"></span>
					</div>
					<div class=\"sng-submit-group\">
						<input type=\"submit\" class=\"sng-button sng-button-submit\" name=\"sng-submit\" id=\"sng-submit-disabled\" value=\"" . esc_html($sng_form_stylings['button_text']) . "\" disabled data-toggle=\"tooltip\" title=\" Please enter Zip Code to get a free quote\" style=\"color: ". esc_html($sng_form_stylings["button_text_color"]) . "; background: " . esc_html($sng_form_stylings["button_color"]) . "\" >
					</div>
					<input type=\"hidden\" name=\"action\" value=\"zip_code_shortcode\">
				</div>
			</form>
		</div>";

			return $form_html;
		}
    }

    /**
     * Register all shortcodes for use in post/pages
     */
    public function register_shortcodes()
    {
        add_shortcode('sng-zip-code-form', [$this, 'zip_code_shortcode']);
    }

    public function signUpForm()
    {
		$sng_form_slugs = get_option('sng_form_slugs');
		$zip_code = sanitize_text_field($_POST['zip-code']);
		$url = "https://api.sweepandgo.com/api/check_zip_code_multi_organizations?zip_code=$zip_code";
		foreach ( $sng_form_slugs as $slug ) {
			$url .= "&slugs[]=$slug";
		}
		$request = wp_remote_get($url);
		$redirect_url = json_decode($request['body'])->url;
		if (is_array($_GET) && count($_GET) > 0) {
			foreach ($_GET as $key => $value) {
				$redirect_url .= "&$key=$value";
			}
		}
        wp_redirect($redirect_url);
    }

}
