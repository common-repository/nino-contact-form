<?php
/**
 * @author    NinoTheme.com http://www.ninotheme.com
 * @copyright Copyright (C) 2013 - 2014 NinoTheme.com. All rights reserved.
 * @license   NinoTheme.com Proprietary License
 */

global $wpscf_token;

class nino_contact_widget extends WP_Widget {
	
	// Constructor //
	function nino_contact_widget() {
		
		$widget_ops = array(
				'classname' => 'nino_contact_widget',
				'description' => 'Add Nino Contact widget.'
		); // Widget Settings
		$control_ops = array('id_base' => 'nino_contact_widget'); // Widget Control Settings
		$this->WP_Widget('nino_contact_widget', 'Nino Contact Form', $widget_ops, $control_ops); // Create the widget
	}
	
	// Extract Args
	function widget($args, $instance) {
		
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
	
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		
		// Run the code and display the output
//		nino_contact_enqueue_front_scripts();
		echo $nino_contact_render_form = nino_contact_render_form();
		
		echo $args['after_widget'];
		
		
	}
	
	// Update Settings //
	function update($new_instance, $old_instance) {
		$instance['title'] = $new_instance['title'];
		return $instance;
	}
	
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'nino_contact_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 
	}
}


add_action('widgets_init', create_function('', 'return register_widget("nino_contact_widget");'));