<?php
/*
Plugin Name: SBCG Events Manager Customizations
Plugin URI: https://github.com/michaeldfoley/sbcg-em-customize
Description: Adds customizations to the WP Events Manager Plugin
Version: 0.1
Author: Michael Foley
Author URI: http://michaeldfoley.com
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: _sbcg_em
Domain Path: /languages/
*/

/**
 * Adds Login Redirect Link
 */
require plugin_dir_path( __FILE__ ) . 'login.php';

/**
 * Adds Shortened Time Option
 */
require plugin_dir_path( __FILE__ ) . 'time.php';
?>