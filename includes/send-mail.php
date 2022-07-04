<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'wp_mail' ) ) {
	function wp_mail( $to, $subject, $message, $headers = '', $attachments = array() ) {
		$sendCloud = new SendCloud(
			get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_api_user'],
			get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_api_key'],
			get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_from'],
			get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_from_name'],
			get_option( 'sendcloud_newsletter_option_name' )['sendcloud_newsletter_reply_to']
		);

	}
}
