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