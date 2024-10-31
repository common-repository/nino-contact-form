<?php
/*
Plugin Name: Nino Contact Form
Plugin URI: http://www.ninotheme.com
Description: Nino Contact Form - The easiest way to get contact form to your site
Author: ninotheme.com
Version: 1.0.2
Author URI: http://www.ninotheme.com
*/

session_start();
global $nino_contact_db_version;
$nino_contact_plugin_version = '1.0.2';
$nino_contact_db_version = '0.1.0';

/********************
 * Global constants
 ********************/
define( 'NINO_CONTACT_URL', plugin_dir_url( __FILE__ ) );

include('includes/admin-page.php');
include('includes/admin/contact-settings.php');
include('includes/nino-contact-render.php'); // display content functions
include('includes/contact-form-ajax.php');
include('includes/nino-contact-widget.php');
include('includes/libraries/nino-contact-library.php');
include('includes/libraries/captcha/securimage.php');
