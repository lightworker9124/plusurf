<?php

/*
|---------------------------------------------------------------
| WS FRAMEWORK
|---------------------------------------------------------------
|
| -> PACKAGE / WS FRAMEWORK
| -> AUTHOR / wesparkle solutions
| -> DATE / 2015-04-01
| -> WEBSITE / http://wesparklesolutions.com
| -> VERSION / 1.0.0
|
|---------------------------------------------------------------
| Copyright (c) 2015 , All rights reserved.
|---------------------------------------------------------------
*/

class BaseController
{
    public $onlyone = false;

	function __construct()
	{
		if(Check::is_table("settings"))
		{
			Settings::load();
		}
	}

	public function notfound($match="")
	{
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		set("title2", l("404", "Error 404"));
        Template::view("404");
    }

	public function put_whois_online()
	{
        if($this->onlyone == false)
        {
            if(Auth::check("users"))
            {
                Usersonline::add("user");
                $this->onlyone = true;
            }
            else if(Auth::check("admins"))
            {
                Usersonline::add("admin");
                $this->onlyone = true;
            }
            else
            {
                Usersonline::add("guest");
                $this->onlyone = true;
            }
        }
	}

	public function change_language($match="")
	{
        $new_langue = strip_tags(Request::get("to"));
        Languages::changeto($new_langue);
		if(Auth::check("users"))
		{
			$id = u("id");
			if(!empty($id))
			{
				Db::bind("newlng", $new_langue);
				Db::bind("uid", strip_tags($id));
				Db::query("UPDATE users SET `language` = :newlng WHERE id = :uid");
			}
		}
		Request::redir_to_referer();
    }

    public function makejson()
    {
		header('Content-Type: application/json');
        if(defined("alert_error"))
        {
            echo json_encode(array("type" => "error", "error" => 1, "message" => alert_error));
            exit();
        }
        else if(defined("alert_success"))
        {
            echo json_encode(array("type" => "success", "error" => 0, "message" => alert_success));
            exit();
        }
		else if(defined("alert_info"))
        {
            echo json_encode(array("type" => "info", "error" => 0, "message" => alert_info));
            exit();
        }
		else if(defined("alert_warning"))
        {
            echo json_encode(array("type" => "warning", "error" => 0, "message" => alert_warning));
            exit();
        }
        else
        {
            echo json_encode(array("type" => "error", "error" => 1, "message" => "Error - Empty Response"));
            exit();
        }
    }

	public function jsconfig($match="")
	{
		$ipcheck = s("exchange/ipcheck");
		if($ipcheck == "all") { $browsing_mode = "yes"; }
		else { $browsing_mode = "no"; }
		header('Content-Type: application/javascript');
		echo "
            var app_url                = '".Sys::url()."';
            var app_base               = '".Sys::url("dir")."';
			var app_theme              = '".Template::url()."';
            var app_notify_error       = '".l("error")."';
            var app_notify_success     = '".l("success")."';
            var app_network_error      = '".l("error_connect")."';
			var app_ipcheck            = '".$browsing_mode."';
			var app_browser_extension;
		";
	}

	public function browser_extension($match="")
	{
		header('Content-Type: application/javascript');
		echo "
            var app_browser_extension  = true;";
	}

    public function admin_jsconfig($match="")
	{
		header('Content-Type: application/javascript');
		Template::set_as_admin();
		echo "
            var app_url                = '".Sys::url()."';
			var app_admin_url          = '".router("admin")."';
            var app_base               = '".Sys::url("dir")."';
			var app_theme              = '".Template::url()."';
			var app_delurl             = '".router("admin_ajax_del")."';
			var app_status_change      = '".router("admin_ajax_status")."';
            var app_upgrade_account    = '".router("admin_upgrade_user")."';
			var app_confirm_url        = '".router("admin_ajax_confirm")."';
            var app_notify_error       = 'Error';
            var app_notify_success     = 'Success';
            var app_network_error      = 'error Connect please check your internet connection !';
		";
	}

}
?>
