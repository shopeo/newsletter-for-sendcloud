<?php
/**
 * Plugin Name: Sendcloud Newsletter
 * Plugin URI: https://www.shopeo.cn
 * Description: The integrated <code>sendcloud.net</code> newsletter management system provides the latest news and mailing channels.
 * Author: Shopeo
 * Version: 0.0.1
 * Author URI: https://www.shopeo.cn
 * License: GPL2+
 * Text Domain: sendcloud-newsletter
 * Domain Path: /languages
 * Requires at least: 5.9
 * Requires PHP: 5.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define SENDCLOUD_NEWSLETTER_PLUGIN_FILE.
if ( ! defined( 'SENDCLOUD_NEWSLETTER_PLUGIN_FILE' ) ) {
	define( 'SENDCLOUD_NEWSLETTER_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'SENDCLOUD_NEWSLETTER_PLUGIN_BASE' ) ) {
	define( 'SENDCLOUD_NEWSLETTER_PLUGIN_BASE', plugin_basename( SENDCLOUD_NEWSLETTER_PLUGIN_FILE ) );
}

if ( ! defined( 'SENDCLOUD_NEWSLETTER_PATH' ) ) {
	define( 'SENDCLOUD_NEWSLETTER_PATH', plugin_dir_path( SENDCLOUD_NEWSLETTER_PLUGIN_FILE ) );
}

if ( ! function_exists( 'sendcloud_newsletter_activate' ) ) {
	function sendcloud_newsletter_activate() {

	}
}

register_activation_hook( __FILE__, 'sendcloud_newsletter_activate' );

if ( ! function_exists( 'sendcloud_newsletter_deactivate' ) ) {
	function sendcloud_newsletter_deactivate() {

	}
}

register_deactivation_hook( __FILE__, 'sendcloud_newsletter_deactivate' );

if ( ! function_exists( 'sendcloud_newsletter_load_textdomain' ) ) {
	function sendcloud_newsletter_load_textdomain() {
		load_plugin_textdomain( 'sendcloud-newsletter', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}

add_action( 'init', 'sendcloud_newsletter_load_textdomain' );
