<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.sweepandgo.com/
 * @since      1.0.0
 *
 * @package    Sweepandgo_Zip_Code_Form
 * @subpackage Sweepandgo_Zip_Code_Form/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sweepandgo_Zip_Code_Form
 * @subpackage Sweepandgo_Zip_Code_Form/admin
 * @author     Sweep & Go Team <hello@sweepandgo.com>
 */
class Sweepandgo_Zip_Code_Form_Admin {

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
		// add_filter('pre_site_transient_update_core','remove_core_updates');
		// add_filter('pre_site_transient_update_plugins','remove_core_updates');
		// add_filter('pre_site_transient_update_themes','remove_core_updates');

		

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
		 * defined in Sweepandgo_Zip_Code_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sweepandgo_Zip_Code_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sweepandgo-zip-code-form-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'spectrum', plugin_dir_url( __FILE__ ) . 'js/spectrum-2.0.5/dist/spectrum.min.css', array(), $this->version, 'all' );
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
		 * defined in Sweepandgo_Zip_Code_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sweepandgo_Zip_Code_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sweepandgo-zip-code-form-admin.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-ui-core' ), $this->version, false );
		wp_enqueue_script( 'spectrum', plugin_dir_url( __FILE__ ) . 'js/spectrum-2.0.5/dist/spectrum.min.js', array( 'jquery' ), $this->version, false );

	}

    public function addMenu() {
        add_menu_page('S&G Service Area Checker', 'S&G Service Area Checker', 'manage_options', 'sweepandgo-zip-code-component', [$this, 'admin_index'], 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMS4wLjIsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAxNS40IDkuNSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTUuNCA5LjU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiNGRkZGRkY7fQ0KPC9zdHlsZT4NCjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xMC44LDBjLTAuMSwzLjItMC41LDYuNS0xLjIsOS41SDYuNGMwLjctMywxLjEtNi4yLDEuMi05LjVoMS45SDEwLjh6Ii8+DQo8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNi4zLDBDNi4xLDMuNCw1LjIsNi43LDMuNiw5LjVIMGMxLjctMi44LDIuOC02LDMtOS41SDYuM3oiLz4NCjxwb2x5Z29uIGNsYXNzPSJzdDAiIHBvaW50cz0iMTUuNCwwIDE1LjQsOS41IDEyLjEsOS41IDEyLjEsMCAiLz4NCjwvc3ZnPg0K', 110);
    }

    public function admin_index() {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }
        require_once plugin_dir_path(__FILE__) . 'partials/sweepandgo-zip-code-admin-menu.php';
    }

    public function saveZipCodeSettings() {

        /**
         * Prepare settings for saving to database
         * Exclude action and save button from request
         */

		$request = sanitize_text_field($_POST['sng_form_slug']);

		if ($request == '') {
			wp_safe_redirect('admin.php?page=sweepandgo-zip-code-component&msg=2');
			return false;
		}
		
		$form_slugs = maybe_unserialize(get_option("sng_form_slugs"));

		if (filter_var($request, FILTER_VALIDATE_URL)) {
			$url = explode("/", $request);
			$request = $url[3];
		}

		if (is_array($form_slugs)) {
			array_push($form_slugs, $request);
			update_option("sng_form_slugs", $form_slugs);
		} else {
			update_option("sng_form_slugs", [$request]);
		}		

		wp_safe_redirect('admin.php?page=sweepandgo-zip-code-component&msg=1');

	}

	public function deleteSngForm() {
		$form_slugs = maybe_unserialize(get_option("sng_form_slugs"));
		if(is_array($_GET['sng_form_slug'])) {
			$request = array_map('sanitize_text_field', $_GET['sng_form_slug']);
			$form_slugs = array_diff($form_slugs, $request);
		}

		update_option("sng_form_slugs", $form_slugs);

		wp_safe_redirect('admin.php?page=sweepandgo-zip-code-component&msg=1');
	}

	public function saveZipCodeStyling() {
		$data = array(
			'button_color' => sanitize_hex_color($_POST['button_color']),
			'button_text_color' => sanitize_hex_color($_POST['button_text_color']),
			'button_text' => sanitize_text_field($_POST['button_text']),
			'text_placeholder' => sanitize_text_field($_POST['text_placeholder']),
		);
		update_option('sng_form_styling', $data);
		wp_safe_redirect('admin.php?page=sweepandgo-zip-code-component&msg=1');
	}

}
