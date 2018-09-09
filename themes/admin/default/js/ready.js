$(document).ready(function(){

	$('.tip').tooltip();	
	$('.tip-left').tooltip({ placement: 'left' });	
	$('.tip-right').tooltip({ placement: 'right' });	
	$('.tip-top').tooltip({ placement: 'top' });	
	$('.tip-bottom').tooltip({ placement: 'bottom' });	
	$(".nano").nanoScroller();
	
	$("#admin_login_form").submit(function(e){
		e.preventDefault();
		ajax_post('admin_login_form', 'admin_login_alert', 1, app_admin_url, true);
	});
	
	$("#admin_rest_form").submit(function(e){
		e.preventDefault();
		ajax_post('admin_rest_form', 'admin_rest_alert', 0, "", true);
	});
	
	$("#update_pages_form").submit(function(e){
		e.preventDefault();
		ajax_post('update_pages_form', 'update_pages_alert', 0, "", false);
	});
	
	$("#settings_form_generale").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_generale', 'settings_alert_generale', 0, "", false);
	});
    
    $("#settings_form_analyse").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_analyse', 'settings_alert_analyse', 0, "", false);
	});
    
    $("#settings_form_socialauth").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_socialauth', 'settings_alert_socialauth', 0, "", false);
	});
    
    $("#settings_form_seo").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_seo', 'settings_alert_seo', 0, "", false);
	});
    
    $("#settings_form_ads").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_ads', 'settings_alert_ads', 0, "", false);
	});
	
	$("#settings_form_lists").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_lists', 'settings_alert_lists', 1, app_admin_url+"/settings#lists", false);
	});
	
    $("#settings_form_geo").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_geo', 'settings_alert_geo', 0, app_admin_url, false);
	});
    
	$("#settings_form_exchange").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_exchange', 'settings_alert_exchange', 0, "", false);
	});
	
	$("#settings_form_payment").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_payment', 'settings_alert_payment', 0, "", false);
	});
	
	$("#settings_form_mail").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_mail', 'settings_alert_mail', 0, "", false);
	});
	
	$("#settings_form_recaptcha").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_recaptcha', 'settings_alert_recaptcha', 0, "", false);
	});
	
	$("#settings_form_dvalues").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_dvalues', 'settings_alert_dvalue', 0, "", false);
	});
	
	$("#settings_form_social").submit(function(e){
		e.preventDefault();
		ajax_post('settings_form_social', 'settings_alert_social', 0, "", false);
	});
	
	
});