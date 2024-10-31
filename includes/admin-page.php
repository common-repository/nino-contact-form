<?php
/**
 * @author    NinoTheme.com http://www.ninotheme.com
 * @copyright Copyright (C) 2013 - 2014 NinoTheme.com. All rights reserved.
 * @license   NinoTheme.com Proprietary License
 */

function nino_contact_form_admin() {
	
	include('admin/form-processing.php');
	include('admin/contact-form.php');

	echo ob_get_clean();
}

function nino_contact_form_admin_actions() {
	//if ( empty ( $GLOBALS['admin_page_hooks']['nino_contact_form_admin'] ) ) {
		$page = add_menu_page('Nino Contact', 'Nino Contact', 'manage_options', 'nino_contact_form_admin', 'nino_contact_form_admin');
	//}

	add_action('admin_print_scripts-'.$page, 'nino_contact_form_load_scripts');
}

function nino_contact_form_load_scripts() {
	wp_enqueue_style('nino-contact-style', NINO_CONTACT_URL . 'includes/assets/css/style.css');
	wp_enqueue_style('nino-contact-form-style', NINO_CONTACT_URL . 'includes/assets/css/nino-contact-form.css');
	wp_enqueue_script(array("jquery-ui-core", "interface", "jquery-ui-widget", "jquery-ui-mouse", "wp-lists", "jquery-ui-sortable"));
	wp_enqueue_script('nino-contact-form-script', NINO_CONTACT_URL . 'includes/assets/js/nino-contact-form.js', array('jquery','jquery-ui-core','jquery-ui-sortable', 'jquery-ui-accordion'));
	wp_enqueue_script('bootstrap-script', NINO_CONTACT_URL . 'includes/assets/js/bootstrap.min.js');
}

add_action('admin_menu', 'nino_contact_form_admin_actions');

add_action('init', 'nino_contact_form_do_output_buffer');
function nino_contact_form_do_output_buffer() {
	ob_start();
}


add_action( 'phpmailer_init', 'nino_contact_phpmailer_init' );
function nino_contact_phpmailer_init( $phpmailer ) {
    $phpmailer->IsSMTP();     
    $phpmailer->Host = 'localhost';
    $phpmailer->Port = 25;
    $phpmailer->Username = '';
    $phpmailer->Password = '';
}