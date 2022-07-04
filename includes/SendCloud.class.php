<?php

class SendCloud {
	private $baseUrl = 'https://api.sendcloud.net/apiv2/';
	private $api_user;
	private $api_key;
	private $from;
	private $fromName;
	private $reply_to;

	public function __construct( string $api_user, string $api_key, string $from, string $fromName, string $reply_to ) {
		$this->api_user = $api_user;
		$this->api_key  = $api_key;
		$this->from     = $from;
		$this->fromName = $fromName;
		$this->reply_to = $reply_to;
	}

	public function sendMail( $to, $subject, $html, $headers = '', $attachments = array(), $reply_to = null ) {
		$url   = 'mail/send';
		$host  = $this->baseUrl . $url;
		$param = array(
			'apiUser'  => $this->api_user,
			'apiKey'   => $this->api_key,
			'from'     => $this->from,
			'fromName' => $this->fromName,
			'to'       => $to,
			'subject'  => $subject,
			'html'     => $html,
			'replyTo'  => $reply_to ?: $this->reply_to,
			'headers'  => $headers
		);
		if ( ! empty( $attachments ) ) {
			foreach ( $attachments as $attachment ) {

			}
		}
	}

	public function addAddressMember( $address, $members, $names ) {
		$url  = 'addressmember/add';
		$host = $this->baseUrl . $url;
	}
}
