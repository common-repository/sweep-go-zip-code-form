<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.sweepandgo.com/
 * @since             1.0.0
 * @package           Sweepandgo_Zip_Code_Form
 *
 * @wordpress-plugin
 * Plugin Name:       Sweep & Go Zip Code Form
 * Plugin URI:        https://www.sweepandgo.com/
 * Description:       The Sweep&Go Client Onboarding Form Integration Plugin.
 * Version:           1.0.4
 * Author:            Sweep&Go
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sweepandgo-zip-code-form
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SWEEPANDGO_ZIP_CODE_FORM_VERSION', '1.0.4' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sweepandgo-zip-code-form-activator.php
 */
function activate_sweepandgo_zip_code_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sweepandgo-zip-code-form-activator.php';
	Sweepandgo_Zip_Code_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sweepandgo-zip-code-form-deactivator.php
 */
function deactivate_sweepandgo_zip_code_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sweepandgo-zip-code-form-deactivator.php';
	Sweepandgo_Zip_Code_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sweepandgo_zip_code_form' );
register_deactivation_hook( __FILE__, 'deactivate_sweepandgo_zip_code_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sweepandgo-zip-code-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sweepandgo_zip_code_form() {

	$plugin = new Sweepandgo_Zip_Code_Form();
	$plugin->run();

}
run_sweepandgo_zip_code_form();
