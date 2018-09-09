<?php

/* ---------------- *
|
|  ROUTER SETTINGS
|
** ---------------- */

//* EX: Router::map('METHODS', 'PATH[PARAMS]', 'CLASS@FUNCTION', 'NAME'); *//

//set Base Path
Router::setBasePath(Sys::url("dir"));

//Router Map

/* System - Default */
Router::map('GET|POST', 'js-config-[*:rand].js', 'BaseController@jsconfig', 'jsconfig');
Router::map('GET|POST', 'js-admin-config-[*:rand].js', 'BaseController@admin_jsconfig', 'admin_jsconfig');
Router::map('GET', 'language', 'BaseController@change_language', 'change_languge');
Router::map('GET', '404', 'BaseController@notfound', '404');
Router::map('GET|POST', 'extension/check.js', 'BaseController@browser_extension', 'browser_extension');

/* Newsletteres */
Router::map('GET|POST', 'cron/[*:key]', 'Guest@ping_newsletteres', 'cronjob_newsletteres');

/* Guest */
Router::map('GET|POST', '', 'Guest@index', 'home');
Router::map('GET|POST', 'index.php', 'Guest@index', 'home_2');
Router::map('GET|POST', 'login', 'Guest@login', 'login');
Router::map('GET|POST', 'login/', 'Guest@login', 'login_2');
Router::map('GET|POST', 'signup', 'Guest@signup', 'signup');
Router::map('GET|POST', 'signup/', 'Guest@signup', 'signup_2');
Router::map('GET|POST', 'resend-confirmation', 'Guest@resend', 'resend');
Router::map('GET|POST', 'resend-confirmation/', 'Guest@resend', 'resend_2');
Router::map('GET|POST', 'confirm/[*:email]/[*:key]', 'Guest@get_activation', 'confirm_account');
Router::map('GET|POST', 'confirm/[*:email]/[*:key]/', 'Guest@get_activation', 'confirm_account_2');
Router::map('GET|POST', 'confirmpass/[i:id]/[*:key]', 'Guest@confirm_rest', 'confirm_rest');
Router::map('GET|POST', 'confirmpass/[i:id]/[*:key]/', 'Guest@confirm_rest', 'confirm_rest_2');
Router::map('GET|POST', 'rest', 'Guest@rest', 'rest');
Router::map('GET|POST', 'rest/', 'Guest@rest', 'rest_2');
Router::map('GET|POST', 'page/[*:name]', 'Guest@page', 'page');
Router::map('GET|POST', 'page/[*:name]/', 'Guest@page', 'page_2');
Router::map('GET|POST', 'contact-us', 'Guest@contact', 'contact');
Router::map('GET|POST', 'contact-us/', 'Guest@contact', 'contact_2');
Router::map('GET|POST', 'how-it-work', 'Guest@howitwork', 'howitwork');
Router::map('GET|POST', 'how-it-work/', 'Guest@howitwork', 'howitwork_2');
Router::map('GET|POST', 'ref/[*:id]', 'Guest@redir_ref', 'redir_ref');
Router::map('GET|POST', 'ref/[*:id]/', 'Guest@redir_ref', 'redir_ref_2');
Router::map('GET|POST', 'ajax/hits', 'Guest@get_hits', 'get_hits');
Router::map('GET|POST', 'social/connect', 'Social_Auth@login', 'social_connect');

/* User */
Router::map('GET|POST', 'dashboard', 'User@index', 'dashboard');
Router::map('GET|POST', 'settings', 'User@settings', 'settings');
Router::map('GET|POST', 'affiliate', 'User@affiliate', 'affiliate');
Router::map('GET|POST', 'withdrawal', 'User@withdrawal_all', 'withdrawal');
Router::map('GET|POST', 'websites', 'User@websites', 'websites');
Router::map('GET|POST', 'payments', 'User@payments', 'payments');
Router::map('GET|POST', 'referrals', 'User@referrals', 'referrals');
Router::map('GET|POST', 'browsing', 'User@browsing', 'browsing');
Router::map('GET|POST', 'browsing/[*:uid]/[*:sid]', 'User@browsing_process', 'browsing_process');
Router::map('GET|POST', 'logout', 'User@logout', 'logout');
Router::map('GET|POST', 'checkout/[*:id]', 'User@checkout', 'checkout');
Router::map('GET|POST', 'payment/paypal/process', 'User@paypal_payment_process', 'paypal_payment_process');
Router::map('GET|POST', 'payment/paypal-redirect/[*:id]', 'User@paypal_redirect', 'paypal_redirect');
Router::map('GET|POST', 'payment/payza/process', 'User@payza_payment_process', 'payza_payment_process');
Router::map('GET|POST', 'payment/stripe/process', 'User@stripe_payment_process', 'stripe_payment_process');
Router::map('GET|POST', 'payment/affiliate/process', 'User@affiliate_payment_process', 'affiliate_payment_process');
Router::map('GET|POST', 'payment/credit-card/process', 'User@twocheckout_payment_process', 'twocheckout_payment_process');
Router::map('GET|POST', 'browse/[*:sid]/[*:uid]', 'User@ajax_browsing', 'exchange_process');
Router::map('GET|POST', 'noref/[*:id]/[*:sid]', 'User@noref', 'noref');
Router::map('POST', 'movetosold', 'User@convert_points_to_sold', 'move_to_sold');

/*--*/
Router::map('GET|POST', 'dashboard/', 'User@index', 'dashboard_2');
Router::map('GET|POST', 'settings/', 'User@settings', 'settings_2');
Router::map('GET|POST', 'affiliate/', 'User@affiliate', 'affiliate_2');
Router::map('GET|POST', 'withdrawal/', 'User@withdrawal_all', 'withdrawal_2');
Router::map('GET|POST', 'websites/', 'User@websites', 'websites_2');
Router::map('GET|POST', 'payments/', 'User@payments', 'payments_2');
Router::map('GET|POST', 'referrals/', 'User@referrals', 'referrals_2');
Router::map('GET|POST', 'browsing/', 'User@browsing', 'browsing_2');
Router::map('GET|POST', 'logout/', 'User@logout', 'logout_2');
Router::map('GET|POST', 'checkout/[*:id]/', 'User@checkout', 'checkout_2');
Router::map('GET|POST', 'browse/[*:sid]/[*:uid]/', 'User@ajax_browsing', 'exchange_process_2');
Router::map('GET|POST', 'noref/[*:id]/[*:sid]/', 'User@noref', 'noref_2');

/* Admin path */
 $adminpath = "admin777";

/* Admin (Guest) */
Router::map('GET|POST', $adminpath.'/login', 'Admin_guest@login', 'admin_login');
Router::map('GET|POST', $adminpath.'/rest', 'Admin_guest@rest', 'admin_rest');
Router::map('GET|POST', $adminpath.'confirmpass/[i:id]/[*:key]', 'Admin_guest@confirm_rest', 'admin_confirm_rest');
/*--*/
Router::map('GET|POST', $adminpath.'/login/', 'Admin_guest@login', 'admin_login_2');
Router::map('GET|POST', $adminpath.'/rest/', 'Admin_guest@rest', 'admin_rest_2');
Router::map('GET|POST', $adminpath.'confirmpass/[i:id]/[*:key]/', 'Admin_guest@confirm_rest', 'admin_confirm_rest_2');

/* Admin (Admin) */
Router::map('GET|POST', $adminpath.'', 'Admin@home', 'admin');
Router::map('GET|POST', $adminpath.'/', 'Admin@home', 'admin_2');
Router::map('GET|POST', $adminpath.'/home', 'Admin@home', 'admin_home');
Router::map('GET|POST', $adminpath.'/settings', 'Admin@settings', 'admin_settings');
Router::map('GET|POST', $adminpath.'/pages', 'Admin@pages', 'admin_pages');
Router::map('GET|POST', $adminpath.'/users', 'Admin@users', 'admin_users');
Router::map('GET|POST', $adminpath.'/plans', 'Admin@plans', 'admin_plans');
Router::map('GET|POST', $adminpath.'/admins', 'Admin@admins', 'admin_admins');
Router::map('GET|POST', $adminpath.'/account', 'Admin@account', 'admin_account');
Router::map('GET|POST', $adminpath.'/websites/[i:id]', 'Admin@websites', 'admin_websites');
Router::map('GET|POST', $adminpath.'/last-websites', 'Admin@last_websites', 'admin_last_websites');
Router::map('GET|POST', $adminpath.'/reported-websites', 'Admin@reported_websites', 'admin_reported_websites');
Router::map('GET|POST', $adminpath.'/payments', 'Admin@payments', 'admin_payments');
Router::map('GET|POST', $adminpath.'/withdrawals', 'Admin@withdrawals', 'admin_withdrawals');
Router::map('GET|POST', $adminpath.'/payments/currencies', 'Admin@currencies', 'admin_currencies');
Router::map('GET|POST', $adminpath.'/referrals', 'Admin@referrals', 'admin_referrals');
Router::map('GET|POST', $adminpath.'/logout', 'Admin@logout', 'admin_logout');
Router::map('GET|POST', $adminpath.'/support', 'Admin@support', 'admin_support');
Router::map('GET|POST', $adminpath.'/extensions', 'Admin@extensions', 'admin_extensions');
Router::map('GET|POST', $adminpath.'/newsletteres', 'Admin@newsletteres', 'admin_newsletteres');
Router::map('GET|POST', $adminpath.'/search', 'Admin@search', 'admin_search');

/* ajax */
Router::map('GET|POST', $adminpath.'/ajax/del', 'Admin@ajax_delete', 'admin_ajax_del');
Router::map('GET|POST', $adminpath.'/ajax/status', 'Admin@ajax_status', 'admin_ajax_status');
Router::map('GET|POST', $adminpath.'/ajax/confirm', 'Admin@ajax_confirm', 'admin_ajax_confirm');
Router::map('GET|POST', $adminpath.'/ajax/add', 'Admin@ajax_add', 'admin_ajax_add');
Router::map('GET|POST', $adminpath.'/ajax/update/[i:id]', 'Admin@ajax_update', 'admin_ajax_update');
Router::map('GET|POST', $adminpath.'/ajax/user_type', 'Admin@upgrade_user', 'admin_upgrade_user');

/*--*/
Router::map('GET|POST', $adminpath.'/home/', 'Admin@home', 'admin_home_2');
Router::map('GET|POST', $adminpath.'/settings/', 'Admin@settings', 'admin_settings_2');
Router::map('GET|POST', $adminpath.'/pages/', 'Admin@pages', 'admin_pages_2');
Router::map('GET|POST', $adminpath.'/users/', 'Admin@users', 'admin_users_2');
Router::map('GET|POST', $adminpath.'/plans/', 'Admin@plans', 'admin_plans_2');
Router::map('GET|POST', $adminpath.'/admins/', 'Admin@admins', 'admin_admins_2');
Router::map('GET|POST', $adminpath.'/account/', 'Admin@account', 'admin_account_2');
Router::map('GET|POST', $adminpath.'/websites/[i:id]/', 'Admin@websites', 'admin_websites_2');
Router::map('GET|POST', $adminpath.'/last-websites/', 'Admin@last_websites', 'admin_last_websites_2');
Router::map('GET|POST', $adminpath.'/reported-websites/', 'Admin@reported_websites', 'admin_reported_websites_2');
Router::map('GET|POST', $adminpath.'/payments/', 'Admin@payments', 'admin_payments_2');
Router::map('GET|POST', $adminpath.'/withdrawals/', 'Admin@withdrawals', 'admin_withdrawals_2');
Router::map('GET|POST', $adminpath.'/payments/currencies/', 'Admin@currencies', 'admin_currencies_2');
Router::map('GET|POST', $adminpath.'/referrals/', 'Admin@referrals', 'admin_referrals_2');
Router::map('GET|POST', $adminpath.'/logout/', 'Admin@logout', 'admin_logout_2');
Router::map('GET|POST', $adminpath.'/support/', 'Admin@support', 'admin_support_2');
Router::map('GET|POST', $adminpath.'/extensions/', 'Admin@extensions', 'admin_extensions_2');
Router::map('GET|POST', $adminpath.'/newsletteres/', 'Admin@newsletteres', 'admin_newsletteres_2');
Router::map('GET|POST', $adminpath.'/search/', 'Admin@search', 'admin_search_2');

/* INSTALLATION - UPDATE */
Router::map('GET|POST', $adminpath.'/installation', 'Admin_guest@install', 'install');
Router::map('GET|POST', $adminpath.'/installation/', 'Admin_guest@install', 'install_2');
Router::map('GET|POST', $adminpath.'/update', 'Admin_guest@system_update', 'system_update');
Router::map('GET|POST', $adminpath.'/update/', 'Admin_guest@system_update', 'system_update_2');
/* TEST */
//Router::map('GET|POST', 'test', 'test@index', 'test');
//Router::map('GET|POST', 'test/', 'test@index', 'test_2');

/* Run */
Sys::auto_controller(Router::match());

?>
