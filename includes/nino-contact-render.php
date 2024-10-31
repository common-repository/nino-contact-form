<?php
/**
 * @author    NinoTheme.com http://www.ninotheme.com
 * @copyright Copyright (C) 2013 - 2014 NinoTheme.com. All rights reserved.
 * @license   NinoTheme.com Proprietary License
 */

function nino_contact_enqueue_front_scripts() {
	wp_enqueue_style('nino-contact-form-style', NINO_CONTACT_URL . 'includes/assets/css/nino-contact-form.css');
}


function nino_contact_render_form() {
	nino_contact_enqueue_front_scripts();
	wp_enqueue_script('nino-contact-render-form', NINO_CONTACT_URL . 'includes/assets/js/contact-form-render-form.js');
	
	global $form_count;
	
	$form_count = $form_count + 1;
	$form_name = "nino-contact-" . $form_count;
	$captcha_name = "nino-captcha-" . $form_count;
	$action_form = str_replace( '%7E', '~', $_SERVER['REQUEST_URI']);
	$cname = "constant";
	$indentify = uniqid();
	
	//Check Submit value
	if (isset($_POST[$form_name])) {
		$current_processing_form = $form_name;
	}
	
	//Get Listing
	$form_setting = nino_contact_form_setting();
	$form_provider = nino_contact_form_provider();
	$form_value = nino_contact_default_setting();
	
	//Get input settings
	$nino_contact_form_show_label = $form_setting['nino_contact_form_show_label'];
	$nino_contact_field_setting = $form_setting['nino_contact_field_setting'];
	$nino_contact_input_group = $form_provider['nino_contact_input_group'];
	
	if (get_option("nino_contact_form_value")) {
		$form_value = maybe_unserialize(get_option("nino_contact_form_value"));
	}
	
	$nino_contact_field_value = $form_value['nino_contact_field_setting'];
	
	//Processing contact current form
	$value_input = array();
	$error_input = array();
	$success = "";
	$error = "";
	if ($form_name == $current_processing_form) {
		include('contact-form-processing.php');
	}
	
	?>
	<form method="post" action="<?php echo $action_form ?>" class="clearafter">
		<input type="hidden" name="<?php echo $form_name?>" value="<?php echo $indentify?>">
		<div id="nino-contactForm" class="<?php echo $form_value['nino_form_captcha'] ?> clearafter <?php echo $form_value['nino_form_layout'] ?> <?php echo $form_value['nino_form_style'] ?> <?php echo $form_value['nino_contact_form_show_label'] == "no" ? "nino-contact-label-hidden" : "" ?>">
			<?php if ($success != "") { ?>
			<div class="nino-alert-success"><?php echo $success ?></div>
			<?php } ?>
			<?php if ($error != "") { ?>
			<div class="nino-alert-error"><?php echo $error ?></div>
			<?php } ?>
			<div class="nino-inputGroup">
				<?php 
				foreach ($nino_contact_input_group as $input_name => $input_setting) {
					if ($input_name != 'nino_contact_message') {
				?>
				<div class="<?php echo $input_name ?>">
					<label class="nino-label <?php echo $nino_contact_field_value[$input_name][$input_name."_require"] == "no" ? "" : "nino-required"?>" for="<?php echo $input_setting['id']?>">
						<?php echo $nino_contact_field_value[$input_name][$input_name."_label"]?>
						<span>*</span>
					</label>
					<div class="nino-input <?php echo isset($error_input[$input_name]) ? "nino-error" : ""?>">
						<span class="nino-input-icon <?php echo $input_setting['iconClass']?>"></span>
						<?php
						if ($input_setting['type'] == "text") { 
						?>
						<input type="<?php echo $input_setting['type']?>" id="<?php echo $input_setting['id']?>" name="<?php echo $input_name ?>"  
							placeholder="<?php echo $nino_contact_field_value[$input_name][$input_name."_placeholder"] ?>"
							value="<?php echo isset($value_input[$input_name]) ? $value_input[$input_name] : "" ?>" 
							style="<?php echo $nino_contact_field_value[$input_name][$input_name."_height"] != "" ? "height: ".$nino_contact_field_value[$input_name][$input_name."_height"]."px" : ""?>" />
						<?php 
						} else if ($input_setting['type'] == 'textarea') { 
						?>
						<textarea id="<?php echo $input_setting['id']?>" name="<?php echo $input_name ?>"  placeholder="<?php echo $nino_contact_field_value[$input_name][$input_name."_placeholder"] ?>"
							style="<?php echo $nino_contact_field_value[$input_name][$input_name."_height"] != "" ? "height: ".$nino_contact_field_value[$input_name][$input_name."_height"]."px" : ""?>"><?php echo isset($value_input[$input_name]) ? $value_input[$input_name] : "" ?></textarea>
						<?php } ?>
						<?php if (isset($error_input[$input_name])) {?>
						<p class="nino-error-message"><?php echo $error_input[$input_name] ?></p>
						<?php } ?>
					</div>
				</div>
				<?php } 
				} ?>
			</div>
			<div class="nino-miscGroup">
				<div>
					<?php 
					foreach ($nino_contact_input_group as $input_name => $input_setting) {
						if ($input_name == 'nino_contact_message') {
					?>
					<div class="<?php echo $input_name ?>">
						<label class="nino-label <?php echo $nino_contact_field_value[$input_name][$input_name."_require"] == "no" ? "" : "nino-required"?>" for="<?php echo $input_setting['id']?>">
							<?php echo $nino_contact_field_value[$input_name][$input_name."_label"]?>
							<span>*</span>
						</label>
						<div class="nino-input <?php echo isset($error_input[$input_name]) ? "nino-error" : ""?>">
							<span class="nino-input-icon <?php echo $input_setting['iconClass']?>"></span>
							<?php
							if ($input_setting['type'] == "text") { 
							?>
							<input type="<?php echo $input_setting['type']?>" id="<?php echo $input_setting['id']?>" name="<?php echo $input_name ?>"  
								placeholder="<?php echo $nino_contact_field_value[$input_name][$input_name."_placeholder"] ?>" 
								value="<?php echo isset($value_input[$input_name]) ? $value_input[$input_name] : "" ?>" 
								style="<?php echo $nino_contact_field_value[$input_name][$input_name."_height"] != "" ? "height: ".$nino_contact_field_value[$input_name][$input_name."_height"]."px" : ""?>"/>
							<?php 
							} else if ($input_setting['type'] == 'textarea') { 
							?>
							<textarea id="<?php echo $input_setting['id']?>" name="<?php echo $input_name ?>" placeholder="<?php echo $nino_contact_field_value[$input_name][$input_name."_placeholder"] ?>"
								style="<?php echo $nino_contact_field_value[$input_name][$input_name."_height"] != "" ? "height: ".$nino_contact_field_value[$input_name][$input_name."_height"]."px" : ""?>"><?php echo isset($value_input[$input_name]) ? $value_input[$input_name] : "" ?></textarea>
							<?php } ?>
							<?php if (isset($error_input[$input_name])) {?>
							<p class="nino-error-message"><?php echo $error_input[$input_name] ?></p>
							<?php } ?>
						</div>
					</div>
					<?php } 
					} ?>
					<?php
					if (!preg_match('/captcha-0/', $form_value['nino_form_captcha'])) {
						if (preg_match('/captcha-2/', $form_value['nino_form_captcha'])) {
							$securimage_display = 'securimage_math';
						} else if (preg_match('/captcha-3/', $form_value['nino_form_captcha'])) {
							$securimage_display = 'securimage_multiple_words';
						} else {
							$securimage_display = 'securimage_show';
						}
					?>
					<div class="nino-captcha clearafter <?php echo $nino_contact_field_value['nino_contact_captcha']["nino_contact_captcha_horizontal"]== "yes" ? "nino-horizontal" : ""?> nino_contact_captcha">
						<div class="nino-captcha-image">
							<img src="<?php echo NINO_CONTACT_URL . 'includes/libraries/captcha/'.$securimage_display.'.php' ?>" name="nino-contact-captcha-image" >
						</div>
						<div class="nino-captcha-result">
							<label for="<?php echo $form_provider['nino_contact_captcha']['id']?>" class="nino-label nino-required"><?php echo $nino_contact_field_value['nino_contact_captcha']["nino_contact_captcha_label"]?><span>*</span></label>
							<div class="nino-input <?php echo isset($error_input['nino_contact_captcha']) ? "nino-error" : ""?>">
								<input type="text" id="<?php echo $form_provider['nino_contact_captcha']['id']?>" name="nino_contact_captcha" placeholder="<?php echo $nino_contact_field_value['nino_contact_captcha']["nino_contact_captcha_placeholder"] ?>"/>
								<span class="<?php echo $form_provider['nino_contact_captcha']['iconClass']?>" 
								onclick="changeSecurity('nino-contact-captcha-image', '<?php echo NINO_CONTACT_URL . 'includes/libraries/captcha/'.$securimage_display.'.php' ?>'); return false;"></span>
								<?php if (isset($error_input['nino_contact_captcha'])) {?>
								<p class="nino-error-message"><?php echo $error_input['nino_contact_captcha'] ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php 
					}
					?>
					<div class="<?php echo $nino_contact_field_value['nino_contact_submit']['nino_contact_submit_align'] ?> nino_contact_submit">
						<button type="submit" class="nino-button-submit <?php echo $nino_contact_field_value['nino_contact_submit']['nino_contact_submit_show_icon'] == "yes" ? "" : "nino-contact-icon-hidden"?>"
							style="width: <?php echo $nino_contact_field_value['nino_contact_submit']['nino_contact_submit_width'] ?>%">
							<span class="<?php echo $form_provider['nino_contact_submit']['iconClass']?>"></span> &nbsp;<?php echo $nino_contact_field_value['nino_contact_submit']['nino_contact_submit_text'] ?>
						</button>
					</div>
				</div>
			</div>
		</div>
		<a target="_blank" href="http://ninotheme.com/" style="display:none;">Powered by Ninotheme.com</a>
	</form>
	<?php
}


add_shortcode( 'nino_contact_form', 'nino_contact_render_form' );
add_filter('widget_text', 'do_shortcode');