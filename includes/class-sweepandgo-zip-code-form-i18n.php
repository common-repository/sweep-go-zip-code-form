<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.sweepandgo.com/
 * @since      1.0.0
 *
 * @package    Sweepandgo_Zip_Code_Form
 * @subpackage Sweepandgo_Zip_Code_Form/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sweepandgo_Zip_Code_Form
 * @subpackage Sweepandgo_Zip_Code_Form/includes
 * @author     Sweep & Go Team <hello@sweepandgo.com>
 */
class Sweepandgo_Zip_Code_Form_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sweepandgo-zip-code-form',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
