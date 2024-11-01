<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.sweepandgo.com/
 * @since      1.0.0
 *
 * @package    Sweepandgo_Zip_Code_Form
 * @subpackage Sweepandgo_Zip_Code_Form/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Sweepandgo_Zip_Code_Form
 * @subpackage Sweepandgo_Zip_Code_Form/includes
 * @author     Sweep & Go Team <hello@sweepandgo.com>
 */
class Sweepandgo_Zip_Code_Form_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$data = array(
			'button_color' => sanitize_hex_color("#00acc1"),
			'button_text_color' => sanitize_hex_color("#FFFFFF"),
			'button_text' => sanitize_text_field("Free quote"),
			'text_placeholder' => sanitize_text_field("Enter Zip Code"),
		);
		add_option('sng_form_styling', $data);
	}

}
