=== Jetpack Widget Visibility - Query Args ===
Contributors: drrobotnik
Donate link: http://github.com/drrobotnik/
Tags: widget, extend, jetpack, visibility
Requires at least: 3.5.1
Tested up to: 4.0.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin adds query args to the Jetpack Widget Visibility module.

== Description ==

The Jetpack visibility module is appended to the bottom of all widgets (including 3rd parties). This plugin adds a "Query Args" option so that you can add a key value pair. For example, show a promotional text widget when someone enters a specific search.

== Installation ==

= Using The WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for 'Jetpack Widget Visibility Extended'
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `bugherd-dashboard.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `bugherd-dashboard.zip`
2. Extract the `bugherd-dashboard` directory to your computer
3. Upload the `bugherd-dashboard` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard

== Frequently Asked Questions ==

= This plugin doesn't appear to do anything =

This plugin itself does not add any user facing features. It adds the capability for theme/plugin developers to add additional options/fields to the Jetpack Widget Visibility Module.

= What do I need to do to add options or fields within my theme/plugin =

This feature is not part of the official Jetpack plugin (yet). In order for this to work you must first install the "Jetpack Widget Visibility Extended" plugin.

== Screenshots ==

1. Display Widget only when search result equals this keyword
![Search Example](./assets/search.png)

2. set a custom query_var in your theme/plugin and it can be referenced within this key value pair.
![Any query var available works](./assets/query-var.png)

== Changelog ==

= 1.0 =
* Initial Release

== Upgrade Notice ==

= 1.0 =
Good to go!