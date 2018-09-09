$(document).ready(function(){
	
	$('.tip').tooltip();	
	$('.tip-left').tooltip({ placement: 'left' });	
	$('.tip-right').tooltip({ placement: 'right' });	
	$('.tip-top').tooltip({ placement: 'top' });	
	$('.tip-bottom').tooltip({ placement: 'bottom' });	
	$(".nano").nanoScroller();
	$("#login_form").submit(function(e){
		e.preventDefault();
		ajax_post('login_form', 'login_alert', 1, app_url);
	});
	$("#signup_form").submit(function(e){
		e.preventDefault();
		ajax_post('signup_form', 'signup_alert', 1, app_url);
	});
	$("#rest_form").submit(function(e){
		e.preventDefault();
		ajax_post('rest_form', 'rest_alert', 0, app_url);
	});
	$("#resend_form").submit(function(e){
		e.preventDefault();
		ajax_post('resend_form', 'resend_alert', 0, app_url);
	});
	$("#contact_form").submit(function(e){
		e.preventDefault();
		ajax_post('contact_form', 'contact_alert', 0, app_url);
	});
	$("#upusername_form").submit(function(e){
		e.preventDefault();
		ajax_post('upusername_form', 'upusername_alert', 0, app_url);
	});
	$("#upemail_form").submit(function(e){
		e.preventDefault();
		ajax_post('upemail_form', 'upemail_alert', 0, app_url);
	});
	$("#uppassword_form").submit(function(e){
		e.preventDefault();
		ajax_post('uppassword_form', 'uppassword_alert', 0, app_url);
	});
	$("#update_affiliate_form").submit(function(e){
		e.preventDefault();
		ajax_post('update_affiliate_form', 'update_affiliate_alert', 0, app_url);
	});
	$("#update_withdrawalmethod_form").submit(function(e){
		e.preventDefault();
		ajax_post('update_withdrawalmethod_form', 'update_withdrawalmethod_alert', 0, app_url);
	});
});