/**
* @author    NinoTheme.com http://www.ninotheme.com
* @copyright Copyright (C) 2013 - 2014 NinoTheme.com. All rights reserved.
* @license   NinoTheme.com Proprietary License
*/
jQuery(function () {
	jQuery(".nino-formLayout li label").click(function () {
		var layout = jQuery(this).parents("li").find("input").val();
		jQuery("#nino-contactForm").alterClass("nino-contact-form-layout-*", layout);
	});
	
	jQuery(".nino-formStyle li label").click(function () {
		var style = jQuery(this).parents("li").find("input").val();
		jQuery("#nino-contactForm").alterClass("nino-contact-form-style-*", style);
	});
	
	jQuery(".nino-formCaptcha li label").click(function () {
		var style = jQuery(this).parents("li").find("input").val();
		jQuery("#nino-contactForm").alterClass("nino-contact-form-captcha-*", style);
	});
	
	hideInputSettings();
	applyInputSettings();
	
	jQuery(".nino-showFormSettings").click(function () {
		if (jQuery(this).hasClass("active")) {
			hideInputSettings();
		} else {
			showInputSettings();
		}
		return false;
	});
	
	//Hiden other setting
	jQuery("#nino-contactForm .nino-alert-success, .nino-other-settings ul li.nino-alert-success, " +
			".nino-other-settings ul li.nino-alert-error, .nino-other-settings ul li button.nino-button-email-test .fa-circle-o-notch").hide();
	
	jQuery("#nino-formConfig .nino-other-settings textarea[name$='_message_success']").keyup(function () {
		var value = jQuery(this).val();
		jQuery("#nino-contactForm .nino-alert-success").html(value);
	}).focusin(function () {
		jQuery("#nino-contactForm .nino-alert-success").show();
	})
	.focusout(function () {
		jQuery("#nino-contactForm .nino-alert-success").hide();
	});
	
	jQuery(".nino-button-email-test").click(function () {
		var btnObj = jQuery(this); 
		btnObj.find("i.fa-send").hide();
		btnObj.find("i.fa-circle-o-notch").show();
		btnObj.attr("disabled", "disabled");
		
		var emailTo = btnObj.parent().find("input[type=text]").val();
		
		var data = {
			action: 'nino_test_send_mail',
			email: emailTo,
		};
		
		jQuery.ajax({
			url: nino_contact_ajax_object.ajax_url,
			data: data,
			type: "POST",
			success: function (data) {
				btnObj.find("i.fa-send").show();
				btnObj.find("i.fa-circle-o-notch").hide();
				btnObj.removeAttr("disabled");
				
				if (data == "1") {
					jQuery(".nino-other-settings ul li.nino-alert-success").show();
				} else {
					jQuery(".nino-other-settings ul li.nino-alert-error").show();
					jQuery(".modal-body").html(data);
				}
			}
		});
		
		/*jQuery.post(nino_contact_ajax_object.ajax_url, function(response) {
			alert(response);
		});*/
		
		return false;
	});
/**
 * ==================== Create Function jQuery ==================== */
	jQuery.fn.alterClass = function ( removals, additions ) {
		var self = this;
		
		if ( removals.indexOf( '*' ) === -1 ) {
			// Use native jQuery methods if there is no wildcard matching
			self.removeClass( removals );
			return !additions ? self : self.addClass( additions );
		}
	 
		var patt = new RegExp( '\\s' + 
				removals.
					replace( /\*/g, '[A-Za-z0-9-_]+' ).
					split( ' ' ).
					join( '\\s|\\s' ) + 
				'\\s', 'g' );
	 
		self.each( function ( i, it ) {
			var cn = ' ' + it.className + ' ';
			while ( patt.test( cn ) ) {
				cn = cn.replace( patt, ' ' );
			}
			it.className = jQuery.trim( cn );
		});
	 
		return !additions ? self : self.addClass( additions );
	};
    
	jQuery.fn.justtext = function() {
		   
	    return jQuery(this)  .clone()
	            .children()
	            .remove()
	            .end()
	            .text();
	 
	};
/** END (Create Function jQuery)
 * ============================================================== */

});

hideInputSettings = function() {
	jQuery('.nino-showFormSettings').removeClass("active");
	jQuery('.nino-formSettings').slideUp("slow");
	jQuery('.nino-formLayout').slideDown( "slow");
	jQuery('.nino-formStyle').slideDown( "slow");
	jQuery('.nino-formCaptcha').slideDown( "slow");
};

showInputSettings = function() {
	jQuery('.nino-showFormSettings').addClass("active");
	jQuery('.nino-formSettings').slideDown( "slow");
	jQuery('.nino-formLayout').slideUp( "slow");
	jQuery('.nino-formStyle').slideUp( "slow");
	jQuery('.nino-formCaptcha').slideUp( "slow");
};

applyInputSettings = function () {
	//Check showInputLabel
	applyChangeShowInputLabel();
	
	//Check require
	applyChangeSettingRequire();
	
	//Check show icon
	applyChangeSettingShowIcon();
	
	//Change value label
	applyChangeSettingLabel();
	
	//Change placeholder
	applyChangeSettingPlaceholder();
	
	//Change error message
	applyChangeSettingErrorMessage();
	
	//Change Horizontal
	applyChangeSettingHorizontal();
	
	//Change align
	applyChangeSettingAlign();
	
	//Change Height
	applyChangeSettingHeight();
	
	//Change Width
	applyChangeSettingWidth();
	
};

applyChangeShowInputLabel = function () {
	jQuery("input[name=nino_contact_form_show_label]").change(function () {
		if (jQuery(this).is(":checked")) {
			jQuery("#nino-contactForm").removeClass("nino-contact-label-hidden");
		} else {
			jQuery("#nino-contactForm").addClass("nino-contact-label-hidden");
		}
	});
};

applyChangeSettingRequire = function () {
	jQuery("#nino-formConfig .nino-input-setting input[name$='_require']").change(function () {
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		if (jQuery(this).is(":checked")) {
			jQuery("#nino-contactForm ." + name + " label").addClass("nino-required");
		} else {
			jQuery("#nino-contactForm ." + name + " label").removeClass("nino-required");
		}
		
	});
};

applyChangeSettingShowIcon = function () {
	jQuery("#nino-formConfig .nino-input-setting input[name$='_show_icon']").change(function () {
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		if (jQuery(this).is(":checked")) {
			jQuery("#nino-contactForm .nino-miscGroup button").removeClass("nino-contact-icon-hidden");
		} else {
			jQuery("#nino-contactForm .nino-miscGroup button").addClass("nino-contact-icon-hidden");
		}
	});
};

applyChangeSettingLabel = function () {
	jQuery("#nino-formConfig .nino-input-setting input[name$='_label']").keyup(function () {
		var value = jQuery(this).val();
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		var labelObj = jQuery("#nino-contactForm ." + name + " label");
		var oldValue = jQuery.trim(labelObj.justtext());
		labelObj.html(labelObj.html().replace(oldValue, value));
	});
};


applyChangeSettingPlaceholder = function () {
	jQuery("#nino-formConfig .nino-input-setting input[name$='_placeholder']").keyup(function () {
		var value = jQuery(this).val();
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		jQuery("#nino-contactForm input[name=" + name + "], #nino-contactForm textarea[name=" + name + "]").attr("placeholder", value);
	});
};

applyChangeSettingErrorMessage = function () {
	jQuery("#nino-formConfig .nino-input-setting input[name$='_error_message']").keyup(function () {
		var value = jQuery(this).val();
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		jQuery("#nino-contactForm ." + name + " .nino-input .nino-error-message").html(value);
	})
	.focusin(function () {
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		jQuery("#nino-contactForm ." + name + " .nino-input").addClass("nino-error");
	})
	.focusout(function () {
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		jQuery("#nino-contactForm ." + name + " .nino-input").removeClass("nino-error");
	});
};

applyChangeSettingHorizontal = function () {
	jQuery("#nino-formConfig .nino-input-setting input[name$='_horizontal']").change(function () {
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		if (jQuery(this).is(":checked")) {
			jQuery("#nino-contactForm ." + name).addClass("nino-horizontal");
		} else {
			jQuery("#nino-contactForm ." + name).removeClass("nino-horizontal");
		}		
	});
};

applyChangeSettingAlign = function () {
	jQuery("#nino-formConfig .nino-input-setting select[name$='_align']").change(function () {
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		var value = jQuery(this).val();
		jQuery("#nino-contactForm ." + name).alterClass('nino-content-*', value);
	});
};

applyChangeSettingHeight = function () {
	jQuery("#nino-formConfig .nino-input-setting input[name$='_height']").keyup(function () {
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		var value = jQuery(this).val();
		jQuery("#nino-contactForm textarea[name=" + name + "]").css('height', value);
	});
};

applyChangeSettingWidth = function () {
	jQuery("#nino-formConfig .nino-input-setting input[name$='_width']").keyup(function () {
		var name = jQuery(this).parents("li[class^='nino_contact']").attr("class");
		var value = jQuery(this).val();
		jQuery("#nino-contactForm ." + name + " button").css('width', value + "%");
	});
};