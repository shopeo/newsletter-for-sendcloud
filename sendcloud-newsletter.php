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

if ( ! function_exists( 'sendcloud_newsletter_sanitize' ) ) {
	function sendcloud_newsletter_sanitize( $input ) {
		$sanitary_values = array();
		if ( isset( $input['sendcloud_newsletter_api_key'] ) ) {
			$sanitary_values['sendcloud_newsletter_api_key'] = sanitize_text_field( $input['sendcloud_newsletter_api_key'] );
		}

		return $sanitary_values;
	}
}

if ( ! function_exists( 'sendcloud_newsletter_section_info' ) ) {
	function sendcloud_newsletter_section_info() {
		echo 'Hello';
	}
}

if ( ! function_exists( 'sendcloud_newsletter_api_user_callback' ) ) {
	function sendcloud_newsletter_api_user_callback() {
		printf( '<input class="regular-text" type="text" name="sendcloud_newsletter_option_name[sendcloud_newsletter_api_user]" id="sendcloud_newsletter_api_user" value="%s">', isset( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_api_user'] ) ? esc_attr( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_api_user'] ) : '' );
	}
}

if ( ! function_exists( 'sendcloud_newsletter_api_key_callback' ) ) {
	function sendcloud_newsletter_api_key_callback() {
		printf( '<input class="regular-text" type="password" name="sendcloud_newsletter_option_name[sendcloud_newsletter_api_key]" id="sendcloud_newsletter_api_key" value="%s">', isset( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_api_key'] ) ? esc_attr( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_api_key'] ) : '' );
	}
}

if ( ! function_exists( 'sendcloud_newsletter_from_callback' ) ) {
	function sendcloud_newsletter_from_callback() {
		printf( '<input class="regular-text" type="email" name="sendcloud_newsletter_option_name[sendcloud_newsletter_from]" id="sendcloud_newsletter_from" value="%s">', isset( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_from'] ) ? esc_attr( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_from'] ) : '' );
	}
}

if ( ! function_exists( 'sendcloud_newsletter_from_name_callback' ) ) {
	function sendcloud_newsletter_from_name_callback() {
		printf( '<input class="regular-text" type="text" name="sendcloud_newsletter_option_name[sendcloud_newsletter_from_name]" id="sendcloud_newsletter_from_name" value="%s">', isset( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_from_name'] ) ? esc_attr( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_from_name'] ) : '' );
	}
}

if ( ! function_exists( 'sendcloud_newsletter_reply_to_callback' ) ) {
	function sendcloud_newsletter_reply_to_callback() {
		printf( '<input class="regular-text" type="email" name="sendcloud_newsletter_option_name[sendcloud_newsletter_reply_to]" id="sendcloud_newsletter_reply_to" value="%s">', isset( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_reply_to'] ) ? esc_attr( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_reply_to'] ) : '' );
	}
}

if ( ! function_exists( 'sendcloud_newsletter_mail_list_callback' ) ) {
	function sendcloud_newsletter_mail_list_callback() {
		printf( '<input class="regular-text" type="email" name="sendcloud_newsletter_option_name[sendcloud_newsletter_mail_list]" id="sendcloud_newsletter_mail_list" value="%s">', isset( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_mail_list'] ) ? esc_attr( get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_mail_list'] ) : '' );
	}
}

if ( ! function_exists( 'sendcloud_newsletter_page_init' ) ) {
	function sendcloud_newsletter_page_init() {
		register_setting( 'sendcloud_newsletter_option_group', 'sendcloud_newsletter_option_name', 'sendcloud_newsletter_sanitize' );

		add_settings_section( 'sendcloud_newsletter_setting_section', __( 'Settings', 'sendcloud-newsletter' ), 'sendcloud_newsletter_section_info', 'sendcloud_newsletter' );

		add_settings_field( 'sendcloud_newsletter_api_user', __( 'API User', 'sendcloud-newsletter' ), 'sendcloud_newsletter_api_user_callback', 'sendcloud_newsletter', 'sendcloud_newsletter_setting_section' );
		add_settings_field( 'sendcloud_newsletter_api_key', __( 'API Key', 'sendcloud-newsletter' ), 'sendcloud_newsletter_api_key_callback', 'sendcloud_newsletter', 'sendcloud_newsletter_setting_section' );
		add_settings_field( 'sendcloud_newsletter_from', __( 'From', 'sendcloud-newsletter' ), 'sendcloud_newsletter_from_callback', 'sendcloud_newsletter', 'sendcloud_newsletter_setting_section' );
		add_settings_field( 'sendcloud_newsletter_from_name', __( 'From Name', 'sendcloud-newsletter' ), 'sendcloud_newsletter_from_name_callback', 'sendcloud_newsletter', 'sendcloud_newsletter_setting_section' );
		add_settings_field( 'sendcloud_newsletter_reply_to', __( 'ReplyTo', 'sendcloud-newsletter' ), 'sendcloud_newsletter_reply_to_callback', 'sendcloud_newsletter', 'sendcloud_newsletter_setting_section' );
		add_settings_field( 'sendcloud_newsletter_mail_list', __( 'Mail List', 'sendcloud-newsletter' ), 'sendcloud_newsletter_mail_list_callback', 'sendcloud_newsletter', 'sendcloud_newsletter_setting_section' );
	}
}

add_action( 'admin_init', 'sendcloud_newsletter_page_init' );

if ( ! function_exists( 'sendcloud_newsletter_activate' ) ) {
	function sendcloud_newsletter_activate() {

	}
}

register_activation_hook( __FILE__, 'sendcloud_newsletter_activate' );

if ( ! function_exists( 'sendcloud_newsletter_deactivate' ) ) {
	function sendcloud_newsletter_deactivate() {
		delete_option( 'sendcloud_newsletter_option_name' );
	}
}

register_deactivation_hook( __FILE__, 'sendcloud_newsletter_deactivate' );

if ( ! function_exists( 'sendcloud_newsletter_load_textdomain' ) ) {
	function sendcloud_newsletter_load_textdomain() {
		load_plugin_textdomain( 'sendcloud-newsletter', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}

add_action( 'init', 'sendcloud_newsletter_load_textdomain' );

if ( ! function_exists( 'sendcloud_newsletter_manage_options' ) ) {
	function sendcloud_newsletter_manage_options() {
		?>
		<div class="wrap">
			<h1><?php _e( 'Sendcloud Newsletter', 'sendcloud-newsletter' ); ?></h1>
			<?php settings_errors(); ?>
			<form action="options.php" method="post">
				<?php
				settings_fields( 'sendcloud_newsletter_option_group' );
				do_settings_sections( 'sendcloud_newsletter' );
				submit_button( __( 'Save Settings', 'sendcloud-newsletter' ) );
				?>
			</form>
		</div>
		<?php
	}
}

if ( ! function_exists( 'sendcloud_newsletter_options_page' ) ) {
	function sendcloud_newsletter_options_page() {
		add_options_page( __( 'Sendcloud newsletter', 'sendcloud-newsletter' ), __( 'Sendcloud', 'sendcloud-newsletter' ), 'manage_options', 'options_page_sendcloud_newsletter', 'sendcloud_newsletter_manage_options', 10 );
	}
}

add_action( 'admin_menu', 'sendcloud_newsletter_options_page' );
