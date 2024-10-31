<?php
/**
 * @author    NinoTheme.com http://www.ninotheme.com
 * @copyright Copyright (C) 2013 - 2014 NinoTheme.com. All rights reserved.
 * @license   NinoTheme.com Proprietary License
 */

//Get listing config
$layout_list = nino_contact_layout_list();
$style_list = nino_contact_style_list();
$captcha_list = nino_contact_captcha_list();
$form_setting = nino_contact_form_setting();
$form_provider = nino_contact_form_provider();

$form_value = nino_contact_default_setting();

//Get input settings
$nino_contact_form_show_label = $form_setting['nino_contact_form_show_label'];
$nino_contact_field_setting = $form_setting['nino_contact_field_setting'];
$nino_contact_input_group = $form_provider['nino_contact_input_group'];
$nino_contact_form_email_to = $form_setting['nino_contact_form_email_to'];
$nino_contact_form_message_success = $form_setting['nino_contact_form_message_success'];

//Set default
if (get_option("nino_contact_form_value")) {
	$form_value = maybe_unserialize(get_option("nino_contact_form_value"));
} else {
	add_option("nino_contact_form_value", maybe_serialize($form_value));
}


if ($_POST['NINO_CONTACT_FORM_SUBMIT']) {
	
	if (isset($_POST['nino_contact_form_show_label'])) {
		$form_value['nino_contact_form_show_label'] = 'yes'; 
	} else {
		$form_value['nino_contact_form_show_label'] = 'no'; 
	}
	
	foreach ($nino_contact_field_setting as $input_name => $input_setting) {
		foreach ($input_setting['settings'] as $option_name => $option_setting) {
			if (isset($_POST[$option_name])) {
				if (in_array($option_setting['type'], array('text', 'textarea', 'password', 'radio', 'select'))) {
					$form_value['nino_contact_field_setting'][$input_name][$option_name] = $_POST[$option_name];
				} else if ($option_setting['type'] == 'checkbox') {
					$form_value['nino_contact_field_setting'][$input_name][$option_name] = 'yes';
				}
			} else if ($option_setting['type'] == 'checkbox' && $option_setting['disabled'] != "disabled") {
				$form_value['nino_contact_field_setting'][$input_name][$option_name] = 'no';
			}
		}
	}
	
	if (isset($_POST['nino_form_layout'])) {
		$form_value['nino_form_layout'] = $_POST['nino_form_layout'];
	}
	
	if (isset($_POST['nino_form_style'])) {
		$form_value['nino_form_style'] = $_POST['nino_form_style'];
	}
	
	if (isset($_POST['nino_form_captcha'])) {
		$form_value['nino_form_captcha'] = $_POST['nino_form_captcha'];
	}
	
	if (isset($_POST['nino_contact_form_email_to'])) {
		$form_value['nino_contact_form_email_to'] = $_POST['nino_contact_form_email_to'];
	}
	
	if (isset($_POST['nino_contact_form_message_success'])) {
		$form_value['nino_contact_form_message_success'] = $_POST['nino_contact_form_message_success'];
	}
	
	update_option("nino_contact_form_value", maybe_serialize($form_value));
	
	$success = "Save successfully";
}


$nino_contact_field_value = $form_value['nino_contact_field_setting'];