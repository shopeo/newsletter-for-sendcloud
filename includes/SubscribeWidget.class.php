<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class SubscribeWidget extends WP_Widget {
	public $args = array(
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
			'before_widget' => '<div class="widget-wrap">',
			'after_widget'  => '</div>'
	);

	function __construct() {
		parent::__construct( 'subscribe_widget', __( 'Subscribe Widget', 'sendcloud-newsletter' ) );
		add_action( 'widgets_init', function () {
			register_widget( 'SubscribeWidget' );
		} );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo '<div class="textwidget subscribe-widget">';
		if ( isset( $_POST['subscribe_newsletter_submit_widget'] ) ) {
			?>
			<p class="success"><?php _e( 'Subscribe success!', 'sendcloud-newsletter' ); ?></p>
			<?php
		} else {
			?>
			<form method="post">
				<p>
					<label><?php _e( 'Name', 'sendcloud-newsletter' ); ?></label>
					<input type="text" name="subscribe_newsletter_name">
				</p>
				<p>
					<label><?php _e( 'Email Address', 'sendcloud-newsletter' ); ?></label>
					<input type="email" name="subscribe_newsletter_email">
				</p>
				<button type="submit"
						name="subscribe_newsletter_submit_widget"><?php _e( 'Subscribe', 'sendcloud-newsletter' ); ?></button>
			</form>
		<?php }
		echo '</div>';
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'sendcloud_newsletter' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'sendcloud-newsletter' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
				   value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text']  = ( ! empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';

		return $instance;
	}
}

$subscribeWidget = new SubscribeWidget();
