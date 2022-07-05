<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'subscribe_shortcodes' ) ) {
	function subscribe_shortcodes( $atts = [], $content = null ) {
		$body = '<div class="subscribe-shortcode">';
		if ( $content ) {
			$body .= '<h4>' . $content . '</h4>';
		}
		if ( isset( $_POST['subscribe_newsletter_submit_shortcode'] ) ) {
			$body .= '<p class="success">' . __( 'Subscribe success!', 'sendcloud-newsletter' ) . '</p>';
		} else {
			$body .= '<form class="subscribe-form" method="post">
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
		$body .= '</div>';

		return $body;
	}
}

add_shortcode( 'subscribe', 'subscribe_shortcodes' );


