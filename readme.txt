=== Sweep&Go Service Area Checker ===
Contributors: ogosense
Tags: poopscoop, sweepandgo
Requires at least: 4
Tested up to: 6.0
Requires PHP: 7.2
Stable tag: 1.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Sweep&Go Service Area Checker plugin

== Description ==
Sweep&Go Service Area Checker is a WordPress plugin for pooper scooper businesses registered with Sweep&Go. The plugin can be used by business owners or their website designer to embed the service area checker within their WordPress website.

Business owners use the zip code checker to qualify their website visitors based on location and redirect to their client onboarding form. If a multi-location business, a prospect will be redirected to a location associated with the zip code entered. 

Businesses must already be registered and have an active account with Sweep&Go Pooper Scooper App in order to use the service area checker. 
After a WordPress website visitor enters a zip code to request a free quote, the plugin relies on the 3rd party service also owned by the plugin developer. 

More specifically the plugin talks with sweepandgo.com API and sends the zip code, organization unique identifier (several if multi-location business) based on plugin settings and receives a link to the client onboarding form. 

The Sweep&Go created and operates by the following terms of use (https://www.sweepandgo.com/terms-of-use/)  and privacy policy (https://www.sweepandgo.com/privacy-policy/) 


== Installation ==
1. Upload and unzip `sweepandgo-zip-code-form.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the \'Plugins\' menu in WordPress

== Screenshots ==
1. Organization Onboarding Settings
2. Zip code form comment styling

== Changelog ==
= 1.0 =
* Initial release of Sweep&Go Service Area Checker.

= 1.0.2 =
* Fixed bug for form styling after initial setup

= 1.0.3 =
* Plugin tested on WordPress 6.0 and updated description

= 1.0.4 =
* Fixed PHP 8+ bug
