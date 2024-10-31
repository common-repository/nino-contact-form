/**
* @author    NinoTheme.com http://www.ninotheme.com
* @copyright Copyright (C) 2013 - 2014 NinoTheme.com. All rights reserved.
* @license   NinoTheme.com Proprietary License
*/

function changeSecurity(name, image) {
	var sid = Math.random();
	var images = document.getElementsByName(name);
	for (var i = 0; i < images.length; i++) {
		images[i].src = image + '?sid=' + sid;
	}
	
	this.blur();
	
	return false;
}
