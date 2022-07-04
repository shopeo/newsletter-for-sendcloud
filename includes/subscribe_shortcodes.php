<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'subscribe_shortcodes' ) ) {
	function subscribe_shortcodes( $atts = [], $content = null ) {
		if ( isset( $_POST['subscribe_newsletter_submit_shortcode'] ) ) {
			return '<p class="subscribe-shortcode-success">' . __( 'Subscribe success!', 'sendcloud-newsletter' ) . '</p>';
		} else {
			return '<form class="subscribe-shortcode" method="post">
			<p>
				<label>' . __( 'Name', 'sendcloud - newsletter' ) . '</label>
				<input type="text" name="subscribe_newsletter_name">
			</p>
			<p>
				<label>' . __( 'Email Address', 'sendcloud - newsletter' ) . '</label>
				<input type="email" name="subscribe_newsletter_email">
			</p>
			<button type="submit"
					name="subscribe_newsletter_submit_shortcode">' . __( 'Subscribe', 'sendcloud - newsletter' ) . '</button>
		</form>';
		}
	}
}

add_shortcode( 'subscribe', 'subscribe_shortcodes' );


