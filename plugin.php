<?php
/**
 * Plugin Name:       Sample i18n Plugin
 * Description:       Sample plugin to demonstrate i18n in WordPress
 * Version:           1.0.0-alpha.1
 * Requires at least: 1.5.0
 * Requires PHP:      8.2
 * Author:            Big Bite
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        false
 * Text Domain:       mydomain
 */

namespace Big_Bite\Sample_I18n_Plugin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SI18N_PLUGIN_FILE', __FILE__ );

require_once __DIR__ . '/vendor/autoload.php';

add_action( 'plugins_loaded', __NAMESPACE__ . '\\setup', 0 );
add_action( 'plugins_loaded', __NAMESPACE__ . '\\textdomain', 0 );
add_action( 'init', fn () => new Post_Types\Sample() );
