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

class Admin_guest extends BaseController
{

	function __construct()
	{
		$this->put_whois_online();
		if(Check::is_table("settings"))
		{
			Settings::load();
		}
        Auth::table("admins");
		Template::set_as_admin();
	}

	public function index()
	{
		//
	}


	public function login()
	{
		if(!Auth::check("admins"))
		{
			if(Request::is_post())
			{
				if(Request::is_ajax())
				{
					$this->post_login();
					$this->makejson();
				}
				else if(!Request::is_ajax())
				{
					$this->post_login();
				}
			}
			set("title2", "Login");
			Template::view("login");
		}
		else
		{
			to_router("admin_home");
		}
	}

	public function rest()
	{
		if(!Auth::check("admins"))
		{
			if(Request::is_post())
			{
				if(Request::is_ajax())
				{
					$this->send_rest();
					$this->makejson();
				}
				else if(!Request::is_ajax())
				{
					$this->send_rest();
				}
			}
			set("title2", "Resetting Your Password");
			Template::view("rest");
		}
		else
		{
			to_router("admin_home");
		}
	}

    public function post_login($match="")
    {
        $time = time()+86000*2;
        Auth::remember($time);
        $username = strip_tags(Request::post("login_username"));
        $password = Request::post("login_password");
        if(!empty($username))
        {
            if(Auth::login($username, $password))
            {
				if(!Request::is_ajax())
				{
					Request::redir_to_referer();
				}
                define("alert_success", "Well done - You'll redirected now...");
            }
            else
            {
                define("alert_error", "The username or password is not correct please Try again!");
            }
        }
    }

	public function send_rest($match="")
	{

		$email = strip_tags(Request::post("rest_email"));

		$code = Request::post("g-recaptcha-response");
        $privatekey = s("recaptcha/privatekey");
		$publickey = s("recaptcha/publickey");
		$reCAPTCHA = new reCAPTCHA\reCAPTCHA($publickey, $privatekey);
		if(empty($code) or !$reCAPTCHA->isValid($code))
		{
			define("alert_error", "The reCAPTCHA was not entered correctly!");

		}
		else if(empty($email))
		{
			define("alert_error", "Please fill out all field !");

		}
		else if(!Check::is_email($email))
		{
			define("alert_error", "Please insert a Valid email");

		}
		else if(Auth::check_email($email))
		{
			$new_password = Encryption::randomstring(10);
			$new_hash     = Encryption::encode($new_password);
			$exp_time     = time()+86400*2;
            Db::bind("emailone", $email);
			$getid = Db::query("SELECT id from `admins` WHERE email = :emailone");
			$id = $getid[0]["id"];
            $message = MailTemplate::make(
		    "sample1",
		    array(
				"bg_header" => "#333",
				"bg_footer" => "#333",
				"logo_url"  => s("generale/logo"),
				"logo_alt"  => s("generale/name")." - Resetting Your Password",
		    	"title"     => "Resetting Your Password !",
		    	"message"   => "
		    	Hi Dear,<br>
		    	Upon your request (from ".date("Y.m.d h:i:s").", IP: ".Sys::ip().") we have generated a new password for you.<br>
		    	E-mail:	".$email."<br>
		    	New Password:	".$new_password."<br>
		    	Confirm <a href='".router("admin_confirm_rest", array("id" => $id, "key" => $new_hash))."' >Confirm The new password</a><br>
		    	<i>Note: This link is valid until ".date("Y.m.d h:i:s", $exp_time)."</i><br>",
		    	"footer_content" => "".s("generale/name")." - Copyright � ".date("Y")
		    ));
            Db::bind("exptime", $exp_time);
            Db::bind("newkey", $new_hash);
            Db::bind("uid", $id);
            $query = "UPDATE `admins` SET `rest_date` = :exptime, `rest_key` = :newkey WHERE id = :uid";
            $update = Db::query($query);
			if($update)
			{
		        $send["to"] = $email;
		        $send["message"] = $message;
		        $send["subject"] = s("generale/name")." - Resetting Your Password";
		        $res = Mail::send($send);
		        if($res[0])
		        {
		        	define("alert_success", "Well Done - a Message was sent Please check your email !");

		        }
		        else
		        {
		        	define("alert_error", "we have a problem to Mailing you, so Please check your server settings !");

		        }
			}
			else
			{
				define("alert_error", "Sorry please try Later !");

			}
		}
		else
		{
			define("alert_error", "This email is not exists please change it!");
		}
    }

	public function confirm_rest($match="")
	{
		$id  = strip_tags($match["params"]["id"]);
		$key = strip_tags($match["params"]["key"]);
		if(!empty($id) && !empty($key))
		{
            Db::bind("id", $id);
		    $check_key = Db::query("SELECT rest_key FROM `admins` WHERE id = :id");
			$check_key = $check_key[0]["rest_key"];
		}
		else
		{
			to_router("404");
		}

		if($check_key==$key && !empty($check_key))
		{
            Db::bind("newpass", $check_key);
            Db::bind("id", $id);
			Db::query("UPDATE `admins` SET `rest_key` = '', `rest_date` = '', `password` = :newpass WHERE id = :id");
			to_router("admin_login");
		}
		else
		{
			to_router("404");
		}
    }

    public function system_update()
	{
		if(is_file("uploads/update.txt"))
		{
            $version = strip_tags(Request::get("v"));
            Settings::set("version", array("plusurf" => $version));
			Error_Reporting(E_All);
            @chmod("uploads/update.txt", 0777);
			@chmod("uploads/install.txt", 0777);
            @chmod("install.php", 0777);
            @chmod("update.php", 0777);
			@unlink("uploads/update.txt");
			@unlink("uploads/install.txt");
            @unlink("install.php");
            @unlink("update.php");
			Template::view("system_update");
		}
		else
		{
			to_router("admin");
		}
	}

	public function install($match="")
	{
        if(is_file("uploads/install.txt"))
		{
            to_router("home")."/install.php?error=".urlencode("installation doesn't complete");
            exit();
        }
		$admins = "";
		$admins = Db::query("SELECT username FROM admins");
		if(Check::this_referer() &&  !empty($_POST) && empty($admins))
		{
			$username  = strtolower(Request::post("admin_username"));
            $email     = Request::post("admin_email");
            $password  = Request::post("admin_password");
            $password2 = Request::post("admin_password2");
            if(!empty($username) && !empty($email) && !empty($password) && Check::is_safe($username, "iaA") && Check::is_email($email))
            {
            	if(!Auth::check_username($username) && !Auth::check_email($email))
                    {
            		if($password==$password2)
            		{
            			$query = "INSERT INTO `admins` (`username`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES (:username, :email, :password, :status, :created_at, :updated_at)";
            			Db::bind("username", $username);
            			Db::bind("email", $email);
            			Db::bind("password", Encryption::encode($password));
            			Db::bind("status", "1");
            			Db::bind("created_at", time());
            			Db::bind("updated_at", time());
            			$ex = Db::query($query);
            			if($ex)
            			{
                            @chmod("install.php", 0777);
                            @chmod("update.php", 0777);
                            @unlink("install.php");
                            @unlink("update.php");
							define("alert_success", "Congrat, <br>Username is ".$username."<br> and <br>Password is ".$password."");
            			}
            			else
            			{
							define("alert_error", "Error - something went wrong, Please try again");
            			}
            		}
            		else
            		{
            			define("alert_error", "Passwords are incorrect please try again!");
            		}
            	}
            	else
            	{
            		define("alert_error", "username or email is already exists please change it!");
            	}
            }
            else
            {
            	define("alert_error", "characters allowed on username/email is (a-z A-Z 0-9)");
            }
			if(Request::is_ajax()) { $this->makejson(); }
			set("title2", "Install plusurf");
			Template::view("install");
		}
		else if(empty($_POST) && empty($admins))
		{
			set("title2", "Install plusurf");
			Template::view("install");
		}
		else
		{
			to_router("admin_login");
		}
	}

}

?>
