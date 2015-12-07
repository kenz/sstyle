/**
 * Custom toolbar for iOS "toolbar.js".
 * @author Kenz http://firespeed.org/
 * @license Licensed under the Apache License, Version 2.0
 * @version 1.0
 * 2015/09/05
 *
 * Usage in CSS
 * .toolbarHover :simulated #Toolbar:hover
*/
$(function(){
	if(isIos()){
		$("body").addClass("iOS");
	}
	$("#DebugMode").click(function(){
		alert($("#DebugMode").attr("title"));
	});
});
function isIos(){
	var userAgent = window.navigator.userAgent.toLowerCase();
	return (userAgent.indexOf('iphone')>=0 || userAgent.indexOf('ipod')>=0 || userAgent.indexOf('ipad')>=0 || userAgent.indexOf('iphone')>=0);
}
