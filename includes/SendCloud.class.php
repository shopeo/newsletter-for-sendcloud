<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class SendCloud {
	private $baseUrl = 'https://api.sendcloud.net/apiv2/';
	private $api_user;
	private $api_key;
	private $from;
	private $fromName;
	private $reply_to;

	public function __construct( string $api_user = null, string $api_key = null, string $from = null, string $fromName = null, string $reply_to = null ) {
		$this->api_user = $api_user ?: get_option( 'sendcloud_newsletter_options' )['sendcloud_newsletter_api_user'];
		$this->api_key  = $api_key ?: get_option( 'sendcloud_newsletter_options' )['sendcloud_newsletter_api_key'];
		$this->from     = $from ?: get_option( 'sendcloud_newsletter_options' )['sendcloud_newsletter_from'];
		$this->fromName = $fromName ?: get_option( 'sendcloud_newsletter_options' )['sendcloud_newsletter_from_name'];
		$this->reply_to = $reply_to ?: get_option( 'sendcloud_newsletter_options' )['sendcloud_newsletter_reply_to'];
	}

	public function sendMail( $to, $subject, $html, $headers = '', $attachments = array(), $reply_to = null ) {
		$url    = 'mail/send';
		$host   = $this->baseUrl . $url;
		$params = array(
			'apiUser'  => $this->api_user,
			'apiKey'   => $this->api_key,
			'from'     => $this->from,
			'fromName' => $this->fromName,
			'to'       => $to,
			'subject'  => $subject,
			'html'     => $html,
			'replyTo'  => $reply_to ?: $this->reply_to
		);

		if ( ! empty( $attachments ) ) {
			foreach ( $attachments as $attachment ) {
				$params['attachments'][] = curl_file_create( $attachment );
			}
		}

		return $this->request( $host, $params );
	}

	public function addAddressMember( $members = array(), $names = array(), $address = null ) {
		$address = $address ?: get_option( 'sendcloud_newsletter_options' )['sendcloud_newsletter_mail_list'];
		$url     = 'addressmember/add';
		$host    = $this->baseUrl . $url;
		$params  = array(
			'apiUser' => $this->api_user,
			'apiKey'  => $this->api_key,
			'address' => $address,
			'members' => implode( ';', $members )
		);

		if ( ! empty( $names ) ) {
			$params['names'] = implode( ';', $names );
		}

		return $this->request( $host, $params );
	}

	private function request( $host, $params ) {
		$curl = curl_init();
		curl_setopt( $curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, 'POST' );
		curl_setopt( $curl, CURLOPT_URL, $host );
		curl_setopt( $curl, CURLOPT_POSTFIELDS, $params );
		$result = curl_exec( $curl );
		if ( $result === false ) {
			echo curl_error( $curl );
			return false;
		}
		curl_close( $curl );

		return true;
	}
}
