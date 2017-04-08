<?php

/**
 *
 * Plugin Name:       Wordsmith
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       A simple Wordpress front-end editor
 * Version:           1.0.0
 * Author:            Folosophy
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wordsmith
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define constants
define('WORDSMITH_DIR',plugin_dir_path(__FILE__));

// Require the main plugin class
require(plugin_dir_path(__FILE__) . 'inc/wordsmith.php');

// Run the plugin
function run_wordsmith() {
  $plugin = new Wordsmith();
  $plugin->Run();
} run_wordsmith();
