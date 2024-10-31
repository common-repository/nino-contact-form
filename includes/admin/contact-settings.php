<?php
/**
 * @author    NinoTheme.com http://www.ninotheme.com
 * @copyright Copyright (C) 2013 - 2014 NinoTheme.com. All rights reserved.
 * @license   NinoTheme.com Proprietary License
 */

function nino_contact_layout_list() {
	$layout_list = array(
		'nino_form_layout_1' => array(
			'id'  			=> 'nino-radio-input-layout-1',
			'name'  		=> 'nino_form_layout',
			'value' 		=> 'nino-contact-form-layout-1',
			'image'			=> 'layout-1.png',
		),
		'nino_form_layout_2' => array(
			'id'  			=> 'nino-radio-input-layout-2',
			'name'  		=> 'nino_form_layout',
			'value' 		=> 'nino-contact-form-layout-2',
			'image'			=> 'layout-2.png',
		),
		'nino_form_layout_3' => array(
			'id'  			=> 'nino-radio-input-layout-3',
			'name'  		=> 'nino_form_layout',
			'value' 		=> 'nino-contact-form-layout-3',
			'image'			=> 'layout-3.png',
		),
		'nino_form_layout_4' => array(
			'id'  			=> 'nino-radio-input-layout-4',
			'name'  		=> 'nino_form_layout',
			'value' 		=> 'nino-contact-form-layout-4',
			'image'			=> 'layout-4.png',
		),
		'nino_form_layout_5' => array(
			'id'  			=> 'nino-radio-input-layout-5',
			'name'  		=> 'nino_form_layout',
			'value' 		=> 'nino-contact-form-layout-5',
			'image'			=> 'layout-5.png',
		),
		'nino_form_layout_6' => array(
			'id'  			=> 'nino-radio-input-layout-6',
			'name'  		=> 'nino_form_layout',
			'value' 		=> 'nino-contact-form-layout-6',
			'image'			=> 'layout-6.png',
		)
	);
	
	return $layout_list;
}

function nino_contact_style_list() {
	$style_list = array(
		'nino_form_style_0' => array(
			'id'  			=> 'nino-radio-input-style-0',
			'title'			=> 'None',
			'name'  		=> 'nino_form_style',
			'value' 		=> 'nino-contact-form-style-0',
			'image'			=> 'form-style-0.png',
		),
		'nino_form_style_1' => array(
			'id'  			=> 'nino-radio-input-style-1',
			'title'			=> '1',
			'name'  		=> 'nino_form_style',
			'value' 		=> 'nino-contact-form-style-1',
			'image'			=> 'form-style-1.png',
		),
		'nino_form_style_2' => array(
			'id'  			=> 'nino-radio-input-style-2',
			'title'			=> '2',
			'name'  		=> 'nino_form_style',
			'value' 		=> 'nino-contact-form-style-2',
			'image'			=> 'form-style-2.png',
		)
	);
	
	return $style_list;
}

function nino_contact_captcha_list() {
	$captcha_list = array(
		'nino_form_captcha_0' => array(
			'id'  			=> 'nino-radio-input-captcha-0',
			'title'			=> 'None',
			'name'  		=> 'nino_form_captcha',
			'value' 		=> 'nino-contact-form-captcha-0',
			'image'			=> 'captcha-0.png',
		),
		'nino_form_captcha_1' => array(
			'id'  			=> 'nino-radio-input-captcha-1',
			'title'			=> 'Secur',
			'name'  		=> 'nino_form_captcha',
			'value' 		=> 'nino-contact-form-captcha-1',
			'image'			=> 'captcha-1.png',
		),
		'nino_form_captcha_2' => array(
			'id'  			=> 'nino-radio-input-captcha-2',
			'title'			=> 'Math',
			'name'  		=> 'nino_form_captcha',
			'value' 		=> 'nino-contact-form-captcha-2',
			'image'			=> 'captcha-2.png',
		),
		'nino_form_captcha_3' => array(
			'id'  			=> 'nino-radio-input-captcha-3',
			'title'			=> '2-word',
			'name'  		=> 'nino_form_captcha',
			'value' 		=> 'nino-contact-form-captcha-3',
			'image'			=> 'captcha-3.png',
		)
	);
	
	return $captcha_list;
}

function nino_contact_form_setting() {
	$form_setting = array(
		'nino_contact_form_show_label' => array (
			'name' 			=> 'nino_contact_form_show_label',
			'type'			=> 'checkbox',
			'label'			=> 'Show Input Label',
			'class'			=> 'nino-formShowLabel',
		),
		'nino_contact_field_setting' => array(
			'nino_contact_name' => array(
				'id' 		=> 'nino-radio-input-setting-1',
				'value' 	=> 'nino-form-setting-1',
				'checked'	=> 'checked',
				'iconClass'	=> 'fa fa-user',
				'settings'	=> array(
					'nino_contact_name_require' => array (
						'label' => 'Required',
						'type'	=> 'checkbox',
					),
					'nino_contact_name_label' => array (
						'label'	=> 'Label',
						'type'	=> 'text',
					),
					'nino_contact_name_placeholder' => array (
						'label'	=> 'Placeholder',
						'type'	=> 'text',
					),
					'nino_contact_name_error_message' => array (
						'label'	=> 'Error Message',
						'type'	=> 'text',
					),
				),
			),
			'nino_contact_email' => array(
				'id' 		=> 'nino-radio-input-setting-2',
				'value' 	=> 'nino-form-setting-2',
				'iconClass'	=> 'fa fa-envelope',
				'settings'	=> array(
					'nino_contact_email_require' => array (
						'label' => 'Required',
						'type'	=> 'checkbox',
						'disabled' => 'disabled',
					),
					'nino_contact_email_label' => array (
						'label'	=> 'Label',
						'type'	=> 'text',
					),
					'nino_contact_email_placeholder' => array (
						'label'	=> 'Placeholder',
						'type'	=> 'text',
					),
					'nino_contact_email_error_message' => array (
						'label'	=> 'Error Message',
						'type'	=> 'text',
					),
				),
			),
			'nino_contact_title' => array(
				'id' 		=> 'nino-radio-input-setting-3',
				'value' 	=> 'nino-form-setting-3',
				'iconClass'	=> 'fa fa-pencil',
				'settings'	=> array(
					'nino_contact_title_require' => array (
						'label' => 'Required',
						'type'	=> 'checkbox',
						'disabled' => 'disabled',
					),
					'nino_contact_title_label' => array (
						'label'	=> 'Label',
						'type'	=> 'text',
					),
					'nino_contact_title_placeholder' => array (
						'label'	=> 'Placeholder',
						'type'	=> 'text',
					),
					'nino_contact_title_error_message' => array (
						'label'	=> 'Error Message',
						'type'	=> 'text',
					),
				),
			),
			'nino_contact_message' => array(
				'id' 		=> 'nino-radio-input-setting-4',
				'value' 	=> 'nino-form-setting-4',
				'iconClass'	=> 'fa fa-comment',
				'settings'	=> array(
					'nino_contact_message_require' => array (
						'label' => 'Required',
						'type'	=> 'checkbox',
						'disabled' => 'disabled',
					),
					'nino_contact_message_label' => array (
						'label'	=> 'Label',
						'type'	=> 'text',
					),
					'nino_contact_message_placeholder' => array (
						'label'	=> 'Placeholder',
						'type'	=> 'text',
					),
					'nino_contact_message_min_length' => array (
						'label'	=> 'Min Word',
						'type'	=> 'text',
					),
					'nino_contact_message_height' => array (
							'label'	=> 'Height (px)',
							'type'	=> 'text',
					),
					'nino_contact_message_error_message' => array (
						'label'	=> 'Error Message',
						'type'	=> 'text',
					),
				),
			),
			'nino_contact_captcha' => array(
				'id' 		=> 'nino-radio-input-setting-5',
				'value' 	=> 'nino-form-setting-5',
				'iconClass'	=> 'fa fa-refresh',
				'settings'	=> array(
					'nino_contact_captcha_horizontal' => array (
							'label' => 'Horizontal',
							'type'	=> 'checkbox',
					),
					'nino_contact_captcha_label' => array (
							'label'	=> 'Label',
							'type'	=> 'text',
					),
					'nino_contact_captcha_placeholder' => array (
						'label'	=> 'Placeholder',
						'type'	=> 'text',
					),
					'nino_contact_captcha_error_message' => array (
						'label'	=> 'Error Message',
						'type'	=> 'text',
					),
				),
			),
			'nino_contact_submit' => array(
				'id' 		=> 'nino-radio-input-setting-6',
				'value' 	=> 'nino-form-setting-6',
				'iconClass'	=> 'fa fa-send',
				'settings'	=> array(
					'nino_contact_submit_show_icon' => array (
						'label' => 'Show icon',
						'type'	=> 'checkbox',
					),
					'nino_contact_submit_text' => array (
						'label'	=> 'Text',
						'type'	=> 'text',
					),
					'nino_contact_submit_width' => array (
						'label'	=> 'Width (%)',
						'type'	=> 'text',
					),
					'nino_contact_submit_align' => array (
							'label'	=> 'Position',
							'type'	=> 'select',
							'values' => array(
								'nino-content-left' => 'Left',
								'nino-content-center' => 'Center',
								'nino-content-right' => 'Right',
							),
					),
				),
			),
		),
		'nino_contact_form_email_to' => array(
			'name' 			=> 'nino_contact_form_email_to',
			'type'			=> 'text',
			'label'			=> 'Email To',
		),
		'nino_contact_form_message_success' => array(
			'name'			=> 'nino_contact_form_message_success',
			'type'			=> 'textarea',
			'placeholder'	=> 'Your message alert',
			'label'			=> 'Message after email sent',
		),
	);
	
	return $form_setting;
}

function nino_contact_default_setting() {
	$default_setting = array(
		'nino_contact_form_show_label' => 'yes',
		'nino_contact_form_email_to' => get_option('admin_email'),
		'nino_contact_form_message_success' => 'Message Alert After Email Sent',
		'nino_contact_field_setting' => array(
			'nino_contact_name' => array(
				'nino_contact_name_require' 		=> 'yes',
				'nino_contact_name_label'			=> 'Name',
				'nino_contact_name_placeholder' 	=> 'Enter Name',
				'nino_contact_name_error_message' 	=> 'This is a required field.',
			),
			'nino_contact_email' => array(
				'nino_contact_email_require' 		=> 'yes',
				'nino_contact_email_label' 			=> 'E-mail',
				'nino_contact_email_placeholder'	=> 'Enter Email Address',
				'nino_contact_email_error_message'	=> 'This is a required field.',
			),
			'nino_contact_title' => array(
				'nino_contact_title_require' 		=> 'yes',
				'nino_contact_title_label'			=> 'Title',
				'nino_contact_title_placeholder'	=> 'Enter Title',
				'nino_contact_title_error_message'	=> 'This is a required field.',
			),
			'nino_contact_message' => array(
				'nino_contact_message_require' 		 => 'yes',
				'nino_contact_message_label' 		 => 'Message',
				'nino_contact_message_placeholder' 	 => 'Enter contact Message',
				'nino_contact_message_min_length' 	 => '',
				'nino_contact_message_height' 	 	 => '150',
				'nino_contact_message_error_message' => 'This is a required field.',
			),
			'nino_contact_captcha' => array(
				'nino_contact_captcha_horizontal' 	 => 'no',
				'nino_contact_captcha_label'		 => 'Enter Code',
				'nino_contact_captcha_placeholder' 	 => 'Enter Captcha',
				'nino_contact_captcha_error_message' => 'Sorry, the code entered was incorrect.',
			),
			'nino_contact_submit' => array(
				'nino_contact_submit_show_icon' 	=> 'yes',
				'nino_contact_submit_text' 			=> 'Send Message',
				'nino_contact_submit_width'			=> '',
				'nino_contact_submit_align' 		=> 'nino-content-left',
			),
		),
		'nino_form_layout' 	=> 'nino-contact-form-layout-1',
		'nino_form_style'  	=> 'nino-contact-form-style-0',
		'nino_form_captcha'	=> 'nino-contact-form-captcha-0',
	);
	
	return $default_setting;
}

function nino_contact_form_provider() {
	$form_provider = array(
		'nino_contact_input_group' => array(
			'nino_contact_name' => array(
				'id' 		=> 'nino_contact_input_name',
				'type'		=> 'text',
				'iconClass' => 'fa fa-user',
			),
			'nino_contact_email' => array(
				'id' 		=> 'nino_contact_input_email',
				'type'		=> 'text',
				'iconClass' => 'fa fa-envelope',
			),
			'nino_contact_title' => array(
				'id' 		=> 'nino_contact_input_title',
				'type'		=> 'text',
				'iconClass' => 'fa fa-pencil',
			),
			'nino_contact_message' => array(
				'id' 		=> 'nino_contact_input_message',
				'type'		=> 'textarea',
				'iconClass' => 'fa fa-comment',
			),
		),
		'nino_contact_captcha' => array(
			'id'		=> 'nino_contact_captcha_input',
			'type'		=> 'captcha',
			'iconClass'	=> 'fa fa-refresh',
		),
		'nino_contact_submit' => array(
			'type'		=> 'button',
			'iconClass' => 'fa fa-send',
		),	
	);
	
	return $form_provider;
}

function nino_contact_debug($data) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}