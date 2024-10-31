<?php
foreach ($nino_contact_input_group as $input_name => $input_setting) {
	$value_input_name = trim($_POST[$input_name]);
	//Set value submit
	$value_input[$input_name] = $value_input_name;
	
	//Check required field
	if (!isset($error_input[$input_name]) && $nino_contact_field_value[$input_name][$input_name.'_require'] == "yes") {
		if ($value_input_name == null || empty($value_input_name)) {
			$error_input[$input_name] = $nino_contact_field_value[$input_name][$input_name."_error_message"];
		}
	}
	
	//Check email type
	if (!isset($error_input[$input_name]) && preg_match('/_email/',$input_name)) {
		if (!is_email($value_input_name)) {
			$error_input[$input_name] = $nino_contact_field_value[$input_name][$input_name."_error_message"];
		}
	}
	
	//Check count word length
	if (!isset($error_input[$input_name]) && $nino_contact_field_value[$input_name][$input_name.'_min_length'] != "") {
		if (!nino_contact_check_num_of_words($value_input_name, $nino_contact_field_value[$input_name][$input_name.'_min_length'])) {
			$error_input[$input_name] = $nino_contact_field_value[$input_name][$input_name."_error_message"];
		}
	}
}

//Check captcha
if (!preg_match('/captcha-0/', $form_value['nino_form_captcha'])) {
	$input_name = "nino_contact_captcha";
	$image = new securimage();
	if ($image->check($_POST[$input_name]) != true) {
		$error_input[$input_name] = $nino_contact_field_value[$input_name][$input_name."_error_message"];
	}
	 
}

//Check not valid, send contact to mail
if (count($error_input) == 0) {
	
	global $phpmailer;
	
	// Make sure the PHPMailer class has been instantiated 
	// (copied verbatim from wp-includes/pluggable.php)
	// (Re)create it, if it's gone missing
	if ( !is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' ) ) {
		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
		$phpmailer = new PHPMailer( true );
	}
	
	$to = $form_value['nino_contact_form_email_to'];

	$subject = $value_input['nino_contact_title'];
	$message = $value_input['nino_contact_message'];
	if ($value_input['nino_contact_name'] != "") {
		$headers[] = 'From: '.$value_input['nino_contact_name'].' <'.$value_input['nino_contact_email'].'>';
	} else {
		$headers = $value_input['nino_contact_email'];
	}
	
	// Send the test mail
	$result = wp_mail($to, $subject, $message, $headers);
	
	if ($result) {
		$success = $form_value['nino_contact_form_message_success'];
	}
}