<?php
/**
* @author    NinoTheme.com http://www.ninotheme.com
* @copyright Copyright (C) 2013 - 2014 NinoTheme.com. All rights reserved.
* @license   NinoTheme.com Proprietary License
*/
?>
<div id="master" class="clearafter">
	<h1 class="nino-pluginName">Nino Contact Form</h1>
	<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" class="clearafter">
		<input type="hidden" name="NINO_CONTACT_FORM_SUBMIT" value="1">
		<?php if (isset($error)) {?>
		<div class="nino-alert-error"><?php echo $error ?></div>
		<?php } ?>		
		<?php if (isset($success)) {?>
		<div class="nino-alert-success"><?php echo $success ?></div>
		<?php } ?>		
		<div id="nino-formConfig">
			<div class="clearafter nino-submitForm">
				<a href="#" class="nino-showFormSettings"><span>Show</span><span>Hide</span> Settings</a>
				<button type="submit" class="right nino-button-orange">Save Config</button>
			</div>
			<div class="nino-formSettings radioHidden">
				<div class="<?php echo $nino_contact_form_show_label['class'] ?>">
					<label>
						<span><?php echo $nino_contact_form_show_label['label'] ?></span> 
						<input type="<?php echo $nino_contact_form_show_label['type'] ?>" name="<?php echo $nino_contact_form_show_label['name'] ?>"
							<?php echo $form_value['nino_contact_form_show_label'] == 'yes' ? 'checked="checked"' : '' ?>/>
					</label>
				</div>
				<ul class="clearafter">
					<?php 
					foreach ($nino_contact_field_setting as $input_name => $input_setting) {
					?>
					<li class="<?php echo $input_name?>">
						<input type="radio" value="<?php echo $input_setting['value'] ?>" id="<?php echo $input_setting['id'] ?>" <?php echo ($input_setting['checked'] == 'checked') ? 'checked="checked"' : '' ?> name="nino-form-settings">
						<label for="<?php echo $input_setting['id'] ?>"><span class="<?php echo $input_setting['iconClass'] ?>"></span></label>
						<div class="nino-input-setting nino-input-style">
							<ul>
								<?php 
								foreach ($input_setting['settings'] as $option_name => $option_setting) {
								?>
								<li>
									<label>
										<span><?php echo $option_setting['label']?></span>
										<?php
										if ($option_setting['type'] == 'text')  {
										?>
										<input type="<?php echo $option_setting['type'] ?>" name="<?php echo $option_name ?>" value="<?php echo $nino_contact_field_value[$input_name][$option_name] ?>"
											<?php echo $option_setting['disabled'] == "disabled" ? "disabled=\"disabled\"" : "" ?>/>
										<?php
										} else if ($option_setting['type'] == 'checkbox') {
										?>
										<input type="<?php echo $option_setting['type'] ?>" name="<?php echo $option_name ?>" 
											<?php echo $nino_contact_field_value[$input_name][$option_name] == 'yes' ? 'checked="checked"' : '' ?>
											<?php echo $option_setting['disabled'] == "disabled" ? "disabled=\"disabled\"" : "" ?> />
										<?php 
										} else if ($option_setting['type'] == 'select') {
										?>
										<select name="<?php echo $option_name ?>"
											<?php echo $option_setting['disabled'] == "disabled" ? "disabled=\"disabled\"" : "" ?> >
											<?php
											foreach ($option_setting['values'] as $val => $name) { 
											?>
											<option value="<?php echo $val?>" <?php echo $val == $nino_contact_field_value[$input_name][$option_name] ? "selected=\"selected\"" : ""?>><?php echo $name ?></option>
											<?php } ?>
										</select>
										<?php } ?>
									</label>
								</li>
								<?php } ?>
							</ul>
						</div>
					</li>
					<?php } ?>
				</ul>
				<div class="nino-other-settings nino-input-style">
					<h3 class="title">Email Config</h3>
					<ul>
						<li class="nino-alert-success">Sent successfully, please check your inbox</li>
						<li class="nino-alert-error">Message couldn't be sent. <a href="#" style="text-decoration: underline;" data-toggle="modal" data-target="#emailErrorModal">Click here</a> for more detail.</li>
						<li>
							<label>
								<span><?php echo $nino_contact_form_email_to['label'] ?></span>
								<input type="text" name="<?php echo $nino_contact_form_email_to['name'] ?>" value="<?php echo $form_value['nino_contact_form_email_to'] ?>"/>
								<button class="nino-button-orange nino-button-email-test" type="button">
									<i class="fa fa-send"></i>
									<i class="fa fa-circle-o-notch fa-spin"></i>
									<span>Send a test email</span>
								</button>
							</label>
						</li>
					</ul>				
				</div>
				<div class="nino-other-settings radioHidden <?php echo $nino_contact_form_message_success['name']?>">
					<h3 class="title"><?php echo $nino_contact_form_message_success['label']?></h3>
					<textarea placeholder="<?php echo $nino_contact_form_message_success['placeholder']?>" 
						name="<?php echo $nino_contact_form_message_success['name']?>"><?php echo $form_value['nino_contact_form_message_success'] ?></textarea>				
				</div>
				
				<!-- Email Error Modal -->
				<div class="modal fade" id="emailErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title nino-alert-error nino-content-center">Message couldn't be sent. Please see the details bellow</h4>
							</div>
							<div class="modal-body">
								 
							</div>
							<div class="modal-footer">
								<button type="button" class="" data-dismiss="modal">Close</button>								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="nino-formLayout radioHidden">
				<h2 class="title">Form Layout</h2>
				<ul class="clearafter">
					<?php 
					foreach ($layout_list as $k => $layout) {
					?>
					<li>
						<input type="radio" value="<?php echo $layout['value'] ?>" id="<?php echo $layout['id'] ?>" name="<?php echo $layout['name'] ?>" 
							<?php echo $layout['value'] == $form_value[$layout['name']] ? 'checked="checked"' : ''?>>
						<label for="<?php echo $layout['id'] ?>"><img src="<?php echo NINO_CONTACT_URL . 'includes/assets/images/' . $layout['image'] ?>" /></label>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="nino-formStyle radioHidden">
				<h2 class="title">Form Style</h2>
				<ul class="clearafter">
					<?php 
					foreach ($style_list as $k => $style) {
					?>
					<li>
						<input type="radio" value="<?php echo $style['value'] ?>" id="<?php echo $style['id'] ?>" name="<?php echo $style['name'] ?>"
							<?php echo $style['value'] == $form_value[$style['name']] ? 'checked="checked"' : ''?>>
						<label for="<?php echo $style['id'] ?>">
							<img src="<?php echo NINO_CONTACT_URL . 'includes/assets/images/' . $style['image'] ?>" />
						</label>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="nino-formCaptcha radioHidden">
				<h2 class="title">Captcha</h2>
				<ul class="clearafter">
					<?php
					foreach ($captcha_list as $k => $captcha) { 
					?>
					<li>
						<input type="radio" value="<?php echo $captcha['value'] ?>" id="<?php echo $captcha['id'] ?>" name="<?php echo $captcha['name'] ?>"
							<?php echo $captcha['value'] == $form_value[$captcha['name']] ? 'checked="checked"' : ''?>>
						<label for="<?php echo $captcha['id'] ?>">
							<img alt="<?php echo $captcha['title'] ?>" src="<?php echo NINO_CONTACT_URL . 'includes/assets/images/' . $captcha['image'] ?>" />
							<span><?php echo $captcha['title'] ?></span>
						</label>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div id="nino-formPreview">
			<h2 class="title">Form Preview <span class="right">Shortcode : [nino_contact_form]</span></h2>
			<div id="nino-contactForm" class="<?php echo $form_value['nino_form_captcha'] ?> clearafter <?php echo $form_value['nino_form_layout'] ?> <?php echo $form_value['nino_form_style'] ?> <?php echo $form_value['nino_contact_form_show_label'] == "no" ? "nino-contact-label-hidden" : "" ?>">
				<div class="nino-alert-success"><?php echo $form_value['nino_contact_form_message_success'] ?></div>
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
						<div class="nino-input">
							<span class="nino-input-icon <?php echo $input_setting['iconClass']?>"></span>
							<?php
							if ($input_setting['type'] == "text") { 
							?>
							<input type="<?php echo $input_setting['type']?>" id="<?php echo $input_setting['id']?>" name="<?php echo $input_name ?>"  
								placeholder="<?php echo $nino_contact_field_value[$input_name][$input_name."_placeholder"] ?>" 
								style="<?php echo $nino_contact_field_value[$input_name][$input_name."_height"] != "" ? "height: ".$nino_contact_field_value[$input_name][$input_name."_height"]."px" : ""?>" />
							<?php 
							} else if ($input_setting['type'] == 'textarea') { 
							?>
							<textarea id="<?php echo $input_setting['id']?>" name="<?php echo $input_name ?>"  placeholder="<?php echo $nino_contact_field_value[$input_name][$input_name."_placeholder"] ?>"
								style="<?php echo $nino_contact_field_value[$input_name][$input_name."_height"] != "" ? "height: ".$nino_contact_field_value[$input_name][$input_name."_height"]."px" : ""?>"></textarea>
							<?php } ?>
							<p class="nino-error-message"><?php echo $nino_contact_field_value[$input_name][$input_name."_error_message"]?></p>
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
							<div class="nino-input">
								<span class="nino-input-icon <?php echo $input_setting['iconClass']?>"></span>
								<?php
								if ($input_setting['type'] == "text") { 
								?>
								<input type="<?php echo $input_setting['type']?>" id="<?php echo $input_setting['id']?>" name="<?php echo $input_name ?>"  
									placeholder="<?php echo $nino_contact_field_value[$input_name][$input_name."_placeholder"] ?>" 
									style="<?php echo $nino_contact_field_value[$input_name][$input_name."_height"] != "" ? "height: ".$nino_contact_field_value[$input_name][$input_name."_height"]."px" : ""?>" />
								<?php 
								} else if ($input_setting['type'] == 'textarea') { 
								?>
								<textarea id="<?php echo $input_setting['id']?>" name="<?php echo $input_name ?>" placeholder="<?php echo $nino_contact_field_value[$input_name][$input_name."_placeholder"] ?>"
									style="<?php echo $nino_contact_field_value[$input_name][$input_name."_height"] != "" ? "height: ".$nino_contact_field_value[$input_name][$input_name."_height"]."px" : ""?>"></textarea>
								<?php } ?>
								<p class="nino-error-message"><?php echo $nino_contact_field_value[$input_name][$input_name."_error_message"]?></p>
							</div>
						</div>
						<?php } 
						} ?>
						<div class="nino-captcha clearafter <?php echo $nino_contact_field_value['nino_contact_captcha']["nino_contact_captcha_horizontal"]== "yes" ? "nino-horizontal" : ""?> nino_contact_captcha">
							<div class="nino-captcha-image"></div>
							<div class="nino-captcha-result">
								<label for="<?php echo $form_provider['nino_contact_captcha']['id']?>" class="nino-label nino-required"><?php echo $nino_contact_field_value['nino_contact_captcha']["nino_contact_captcha_label"]?><span>*</span></label>
								<div class="nino-input">
									<input type="text" id="<?php echo $form_provider['nino_contact_captcha']['id']?>" name="nino_contact_captcha" placeholder="<?php echo $nino_contact_field_value['nino_contact_captcha']["nino_contact_captcha_placeholder"] ?>"/>
									<span class="<?php echo $form_provider['nino_contact_captcha']['iconClass']?>"></span>
									<p class="nino-error-message"><?php echo $nino_contact_field_value['nino_contact_captcha']["nino_contact_captcha_error_message"]?></p>
								</div>
							</div>
						</div>
						<div class="<?php echo $nino_contact_field_value['nino_contact_submit']['nino_contact_submit_align'] ?> nino_contact_submit">
							<button type="button" class="nino-button-submit <?php echo $nino_contact_field_value['nino_contact_submit']['nino_contact_submit_show_icon'] == "yes" ? "" : "nino-contact-icon-hidden"?>"
								style="width: <?php echo $nino_contact_field_value['nino_contact_submit']['nino_contact_submit_width'] ?>%">
								<span class="<?php echo $form_provider['nino_contact_submit']['iconClass']?>"></span> &nbsp;<?php echo $nino_contact_field_value['nino_contact_submit']['nino_contact_submit_text'] ?>
							</button>
						</div>
					</div>
				</div>
				<a target="_blank" href="http://ninotheme.com/" style="display:none;">Powered by Ninotheme.com</a>
			</div>
		</div>
	</form>
	
	<hr />
	<div class="nino-powered">
		<a target="_blank" href="http://ninotheme.com/">Powered by Ninotheme.com</a>			
	</div>
</div>