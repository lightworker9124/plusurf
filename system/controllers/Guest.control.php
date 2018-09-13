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

class Guest extends BaseController
{

    private $exptime      = 1000;
    private $max_username = 15;
    private $min_username = 5;
    private $max_email    = 60;
    private $min_email    = 4;
    private $max_password = 100;
    private $min_password = 4;

	function __construct()
	{
		Request::requiressl();
		$this->put_whois_online();
		if(Check::is_table("settings"))
		{
			Settings::load();
		}
        Auth::table("users");
        if(!Auth::check("users") && Check::is_routed("login") or Check::is_routed("signup") && !Auth::check("users"))
        {
            $exptime = time()+$this->exptime;
            Cookie::set("signup_exptime", $exptime);
        }
	}

    public function get_hits($match="")
    {
        if(Check::this_referer())
        {
            echo Getdata::howmany("hits");
        }
        else
        {
            echo "0";
        }
    }

    public function start_page($match="")
    {
        set("title2", l("start_browsing"));
        Template::view("startpage");
    }

	public function index()
	{
		Request::requiressl();
		if(Auth::check("users"))
		{
			to_router("dashboard");
		}
		else
		{
			set("title2", l("home"));
			Template::view("home");
		}
	}

	public function signup()
	{
		if(!Auth::check("users"))
		{
			if(Request::is_post())
			{
				if(Request::is_ajax())
				{
					$this->post_signup();
					$this->makejson();
				}
				else if(!Request::is_ajax())
				{
					$this->post_signup();
				}
			}
			set("title2", l("signup"));
			Template::view("signup");
		}
		else
		{
			to_router("home");
		}
	}

	public function login()
	{
		if(!Auth::check("users"))
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
			set("title2", l("login"));
			Template::view("login");
		}
		else
		{
			to_router("home");
		}
	}

	public function redir_ref($match="")
	{
		if(!Auth::check("users"))
		{
			$id = $match["params"]["id"];
			if(!empty($id))
			{
				Referrals::remember($id);
			}
			to_router("home");
		}
		else
		{
			to_router("home");
		}
	}

	public function rest()
	{
		if(!Auth::check("users"))
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
			set("title2", l("rest"));
			Template::view("rest");
		}
		else
		{
			to_router("home");
		}
	}

	public function resend()
	{
		if(!Auth::check("users"))
		{
			if(Request::is_post())
			{
				if(Request::is_ajax())
				{
					$this->resend_confirmation();
					$this->makejson();
				}
				else if(!Request::is_ajax())
				{
					$this->resend_confirmation();
				}
			}
			set("title2", l("resend"));
			Template::view("resend_confirmation");
		}
		else
		{
			to_router("home");
		}
	}

	public function contact()
	{
		if(Request::is_post())
		{
			if(Request::is_ajax())
			{
				$this->post_contact();
				$this->makejson();
			}
			else if(!Request::is_ajax())
			{
				$this->post_contact();
			}
		}
		set("title2", l("contact"));
		Template::view("contact");
	}

	public function howitwork()
	{
		set("title2", l("howitwork"));
		Template::view("howitwork");
	}

	public function page($match="")
	{
		$name = strip_tags($match["params"]["name"]);
		$page = s("pages");
		$pages = array_keys($page);
		if(in_array($name, $pages))
		{
			if($name=="privacy"){ set("title2", l("privacy")); set("name", l("privacy")); }
			if($name=="tos"){ set("title2", l("tos")); set("name", l("tos")); }
			if($name=="about-us"){ set("title2", l("about_us")); set("name", l("about_us")); }
			set("content", $page[$name]);
			Template::view("page");
		}
		else
		{
			to_router("home");
		}
	}

    public function post_login($match="")
    {
        $time = time()+86400*366;
        Auth::remember($time);
		Session::lifetime($time);
        $username = strip_tags(Request::post("login_username"));
        $password = Request::post("login_password");
		$provider = strip_tags(Request::get("provider"));
        if(!empty($username))
        {
            if(Auth::login($username, $password))
            {
				$deflangue = u("language");
				if(!empty($deflangue))
				{
					Languages::changeto($deflangue);
				}
				if(!Request::is_ajax())
				{
					Request::redir_to_referer();
				}
                define("alert_success", l("success_login"));
            }
            else
            {
                define("alert_error", l("error_login", "The username or password is not correct please Try again!"));
            }
        }
        else if(!empty($provider))
        {
            if(Auth::social_login($username, $password))
            {
				if(!Request::is_ajax())
				{
					Request::redir_to_referer();
				}
                define("alert_success", l("success_login"));
            }
            else
            {
                define("alert_error", l("error_social_login", "something went wrong please try again !"));
            }
        }
    }

	private function post_signup($match="")
	{
        $exptime = time()+$this->exptime;
        if(!Auth::check("users") && Request::is_post())
        {
            $exptime = Cookie::get("signup_exptime");
            $timenow = time();
            if(!empty($exptime) && $exptime > $timenow)
            {
                $username  = strtolower(Request::post("signup_username"));
                $email     = strtolower(Request::post("signup_email"));
                $password  = Request::post("signup_password");
                $password2 = Request::post("signup_password2");
                $agree     = Request::post("signup_agree");
                if(!empty($username) && !empty($email) && !empty($password) && !empty($password2) && !empty($agree))
                {
                    if(Check::is_safe($username, "iaA") && Check::is_email($email))
                    {
                        if($password == $password2)
                        {
                            $check_lenght = $this->check_length(Request::post("signup_username"), Request::post("signup_email"), Request::post("signup_password"));
                            if($check_lenght[0])
                            {
                                if(!Auth::check_username($username))
                                {
                                    if(!Auth::check_email($email))
                                    {
                                        $activation = s("mail/activation");
                                        if($activation == "1")
                                        {
                                            $status = "0";
                                            $activator = Encryption::generate();
                                        }
                                        else
                                        {
                                            $status = "1";
                                            $activator = "";//Encryption::generate()
                                        }
                                        $info = array(
                                        "username" => $username,
                                        "email" => $email,
                                        "password" => $password,
                                        "status" => $status,
                                        "activator" => $activator
                                        );

										Db::bind("username", $info["username"]);
										Db::bind("email", strtolower($info["email"]));
        								Db::bind("password", Encryption::encode($info["password"]));
        								Db::bind("activation", $info["activator"]);
										Db::bind("websites", s("defaults/website_slots"));
										Db::bind("sessions", s("defaults/session_slots"));
										Db::bind("tratio", s("defaults/traffic_ratio"));
										Db::bind("points", s("defaults/points"));
        								Db::bind("createdat", time());
        								Db::bind("updatedat", time());
        								Db::bind("status", $info["status"]);
        								$query = "INSERT into `users` (`username`, `email`, `password`, `website_slots`, `session_slots`, `traffic_ratio`, `points`, `status`, `activation_key`, `created_at`, `updated_at`) VALUES (:username, :email, :password, :websites, :sessions, :tratio, :points, :status, :activation, :createdat, :updatedat);";
        								$ex = Db::query($query);
                                        if($ex)
                                        {
											$newid = Db::insert_id("users");
											$ref = Cookie::get("ref");
											if(!empty($ref) && !empty($newid))
											{
												Referrals::add($ref, $newid);
											}

				                            if($activation == "1")
			                            	{
				                                $checkmail = $this->send_activation(array(
					                                         "email" => $email,
						                                     "activation" => $activator
					                                         ));
					                            if($checkmail)
					                            {
					                            	define("alert_success", l("success_signup_mailed"));
					                            }
			                                    else
					                            {
					                            	define("alert_error", l("error_mail"));
				                            	}
				                            }
				                            else
				                            {
					                            $time = time()+86000*2;
					                            Auth::remember($time);
					                            Auth::login($email, $password);

												if(Request::is_ajax())
												{
													define("alert_success", l("success_signup"));
												}
			                                    else
												{
													to_router("home");
												}
				                            }
                                        }
                                        else
                                            define("alert_error", l("error_server", "Sorry please try Later !"));
                                    }
                                    else
                                    {
                                        Request::remove("signup_email");
                                        define("alert_error", l("error_email_exists", "This email is already exists please change it!"));
                                    }
                                }
                                else
                                {
                                    Request::remove("signup_username");
                                    define("alert_error", l("error_username_exists", "This username is already exists please change it!"));
                                }
                            }
                            else
                            {
                                Request::remove("signup_password");
                                Request::remove("signup_password2");
                                define("alert_error", $check_lenght[1]);
                            }
                        }
                        else
                        {
                            define("alert_error", l("error_match_password", "Passwords are incorrect please try again!"));
                        }
                    }
                    else
                    {
                        Request::remove("signup_username");
                        define("alert_error", l("error_username_char", "characters allowed on username is (a-z A-Z 0-9)"));
                    }
                }
                else if(!empty($username) && !empty($email) && !empty($password) && !empty($password2) && empty($agree))
                {
                    define("alert_error", l("error_agree", "You must accept the terms of this agreement."));
                }
                else
                {
                    define("alert_error", l("error_empty", "Please fill out all field !"));
                }
            }
            else
            {
                Cookie::set("signup_exptime", $exptime);
                define("alert_error", l("error_exptime", "Session expired - please try again!"));
            }

        }
    }

    private function check_length($username, $email, $password)
    {
        if(!Check::is_max($username, $this->max_username, true))
            return array(false, l("error_max_username", "Sorry ! username is longer than necessary, the Maximum is")." ".$this->max_username." ".l("char", "characters") );
        else if(!Check::is_min($username, $this->min_username, true))
            return array(false, l("error_min_username", "Sorry ! username is very small, the minimum is")." ".$this->min_username." ".l("char", "characters") );
        else if(!Check::is_max($email, $this->max_email, true))
            return array(false, l("error_max_email", "Sorry ! email is longer than necessary, the Maximum is")." ".$this->max_email." ".l("char", "characters") );
        else if(!Check::is_min($email, $this->min_email, true))
            return array(false, l("error_min_email", "Sorry ! email is very small, the minimum is")." ".$this->min_email." ".l("char", "characters") );
        else if(!Check::is_max($password, $this->max_password))
            return array(false, l("error_max_password", "Sorry ! password is longer than necessary, the Maximum is")." ".$this->max_password." ".l("char", "characters") );
        else if(!Check::is_min($password, $this->min_password))
            return array(false, l("error_min_password", "Sorry ! password is very small, the minimum is")." ".$this->min_password." ".l("char", "characters") );
        else
            return array(true, "");
    }

	private function send_activation($info)
	{
		$url = router("confirm_account", array("key" => $info["activation"], "email" => Encryption::encode($info["email"])));
        $message = MailTemplate::make(
		"sample1",
		array(
		    "bg_header" => "#333",
		    "bg_footer" => "#333",
			"logo_url"  => s("generale/logo"),
			"logo_alt"  => s("generale/name")." - Activation Link",
			"title"     => "One more step - Activation",
			"message"   => "
			Hi Dear,<br>
			We are glad to joining us, there is one more step to complete registration<br>
			E-mail:	".$info["email"]."<br>
			Confirm: <a href='".$url."' > >>Confirm your account<< </a><br>
		    Thanks<br>",
			"footer_content" => "".s("generale/name")." - Copyright © ".date("Y")
		));

		$send["to"] = $info["email"];
		$send["message"] = $message;
		$send["subject"] = s("name")." - complete registration";
		$res = Mail::send($send);
		if($res[0])
		{
			return true;
		}
		else
		{
			return false;
		}
    }

	public function get_activation($match="")
	{
		$email  = Encryption::decode(strip_tags($match["params"]["email"]));
		$key    = strip_tags($match["params"]["key"]);
		if(!empty($email) && !empty($key))
		{
            Db::bind("emailone", $email);
		    $check_key = Db::query("SELECT activation_key FROM `users` WHERE email = :emailone");
            Db::bind("emailtwo", $email);
			$id = Db::query("SELECT id FROM `users` WHERE email = :emailtwo");
			$id = $id[0]["id"];
		}
		else
		{
			to_router("404");
		}

		if($check_key[0]["activation_key"]==$key && !empty($id))
		{
            Db::bind("id", $id);
			Db::query("UPDATE `users` SET `activation_key` = '', `status` = '1' WHERE id = :id");
			to_router("login");
		}
		else
		{
			to_router("404");
		}
	}

	public function post_contact($match="")
	{
		$name = strip_tags(Request::post("contact_name"));
		$email = strip_tags(Request::post("contact_email"));
		$message = strip_tags(Request::post("contact_message"));

		$code = Request::post("g-recaptcha-response");
        $privatekey = s("recaptcha/privatekey");
		$publickey = s("recaptcha/publickey");
		$reCAPTCHA = new reCAPTCHA\reCAPTCHA($publickey, $privatekey);
		if(empty($code) or !$reCAPTCHA->isValid($code))
		{
			define("alert_error", l("error_recaptcha"));

		}
		else if(empty($email) or empty($name) or empty($message))
		{
			define("alert_error", l("error_empty"));
		}
		else if(!Check::is_email($email))
		{
			define("alert_error", l("error_email"));

		}
		else if(Check::is_email($email))
		{
            $message = MailTemplate::make(
		    "sample1",
		    array(
		        "bg_header" => "#333",
		        "bg_footer" => "#333",
			    "logo_url"  => s("generale/logo"),
		    	"logo_alt"  => "A new message from your website - ".s("generale/name"),
		    	"title"     => "A new message from your website - ".s("generale/name"),
		    	"message"   => "
		    	Hi Admin,<br>
		    	You've a new Message from your website - ".s("generale/name")."<br>
				Date: ".date("Y.m.d h:i:s")."<br>
		    	E-mail:	".$email."<br>
		    	Ip:	".Sys::ip()."<br>
		    	Message: ".str_replace("\n", "<br>", $message)."<br>",
		    	"footer_content" => "".s("generale/name")." - Copyright © ".date("Y")
		    ));
			$to = s("mail/from");
			if(!empty($to))
			{
		        $send["to"] = s("mail/from");
				$send["from"] = s("mail/from");
		        $send["message"] = $message;
		        $send["subject"] = "A new message from your website - ".s("generale/name");
		        $res = Mail::send($send);
		        if($res[0])
		        {
		        	define("alert_success", l("success"));

		        }
		        else
		        {
		        	define("alert_error", l("error_mail"));

		        }
			}
			else
			{
				define("alert_error", l("error_server"));

			}
		}
		else
		{
			define("alert_error", l("error_email_noexists"));

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
			define("alert_error", l("error_recaptcha"));

		}
		else if(empty($email))
		{
			define("alert_error", l("error_empty"));

		}
		else if(!Check::is_email($email))
		{
			define("alert_error", l("error_email"));

		}
		else if(Auth::check_email($email))
		{
            Db::bind("email", $email);
            $user = Db::query("SELECT * FROM users WHERE email = :email");
            $keep = false;
            if(!empty($user[0]))
            {
                if(empty($user[0]["provider_name"]))
                {
                    $keep = true;
                }
                else
                {
                    $keep = false;
                    define("alert_error", l("error_email_noexists"));
                }
            }
            else
            {
                $keep = false;
                define("alert_error", l("error_email_noexists"));
            }
            if($keep)
            {
                $new_password = Encryption::randomstring(10);
                $new_hash     = Encryption::encode($new_password);
                $exp_time     = time()+86400*2;
                Db::bind("emailone", $email);
                $getid = Db::query("SELECT id from `users` WHERE email = :emailone");
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
                    Upon your request from ".date("Y.m.d h:i:s").", we have generated a new password for you.<br>
                    E-mail:	".$email."<br>
                    New Password:	".$new_password."<br>
                    Confirm <a href='".router("confirm_rest", array("id" => $id, "key" => $new_hash))."' >Confirm The new password</a><br>
                    <i>Note: This link is valid until ".date("Y.m.d h:i:s", $exp_time)."</i><br>",
                    "footer_content" => "".s("generale/name")." - Copyright © ".date("Y")
                ));
                Db::bind("exptime", $exp_time);
                Db::bind("newkey", $new_hash);
                Db::bind("uid", $id);
                $query = "UPDATE `users` SET `rest_date` = :exptime, `rest_key` = :newkey WHERE id = :uid";
                $update = Db::query($query);
                if($update)
                {
                    $send["to"] = $email;
                    $send["message"] = $message;
                    $send["subject"] = s("generale/name")." - Resetting Your Password";
                    $res = Mail::send($send);
                    if($res[0])
                    {
                        define("alert_success", l("success_mail"));

                    }
                    else
                    {
                        define("alert_error", l("error_mail"));

                    }
                }
                else
                {
                    define("alert_error", l("error_server"));

                }
            }
		}
		else
		{
			define("alert_error", l("error_email_noexists"));

		}
    }

	public function resend_confirmation($match="")
	{
		$email = strip_tags(Request::post("resend_email"));
		$code = Request::post("g-recaptcha-response");
        $privatekey = s("recaptcha/privatekey");
		$publickey = s("recaptcha/publickey");
		$reCAPTCHA = new reCAPTCHA\reCAPTCHA($publickey, $privatekey);
		if(empty($code) or !$reCAPTCHA->isValid($code))
		{
			define("alert_error", l("error_recaptcha"));

		}
		else if(empty($email))
		{
			define("alert_error", l("error_empty"));

		}
		else if(!Check::is_email($email))
		{
			define("alert_error", l("error_email"));

		}
		else if(!Auth::check_email($email))
		{
			define("alert_error", l("error_email_noexists"));
		}
		else if(Auth::check_email($email))
		{
			Db::bind("email", strip_tags($email));
			$info = Db::query("SELECT * from users WHERE email = :email");
			$info = $info[0];
			if(!empty($info) && !empty($info["activation_key"]))
			{
				$email = strip_tags(Request::post("resend_email"));
				$url = router("confirm_account", array("key" => $info["activation_key"], "email" => Encryption::encode($info["email"])));
				$message = MailTemplate::make(
				"sample1",
				array(
					"bg_header" => "#333",
					"bg_footer" => "#333",
					"logo_url"  => s("generale/logo"),
					"logo_alt"  => s("generale/name")." - New Activation Link",
					"title"     => "One more step - Activation",
					"message"   => "
					Hi Dear,<br>
					We are glad to joining us, there is one more step to complete registration<br>
					E-mail:	".$info["email"]."<br>
					Confirm: <a href='".$url."' > >>Confirm your account<< </a><br>
					Thanks<br>",
					"footer_content" => "".s("generale/name")." - Copyright © ".date("Y")
				));

				$send["to"] = $info["email"];
				$send["message"] = $message;
				$send["subject"] = s("name")." - complete registration (New) ";
				$res = Mail::send($send);
				if($res[0])
				{
					define("alert_success", l("success_mail"));
				}
				else
				{
					define("alert_error", l("error_mail"));
				}
			}
			else
			{
				define("alert_error", l("error_already_activated"));
			}
		}
    }

	public function confirm_rest($match="")
	{
		$id  = strip_tags($match["params"]["id"]);
		$key = strip_tags($match["params"]["key"]);
		if(!empty($id) && !empty($key))
		{
            Db::bind("id", $id);
		    $check_key = Db::query("SELECT rest_key FROM `users` WHERE id = :id");
			$check_key = $check_key[0]["rest_key"];
		}
		else
		{
			to_router("404");
		}

		if($check_key===$key && !empty($check_key))
		{
            Db::bind("newpass", $check_key);
            Db::bind("id", $id);
			Db::query("UPDATE `users` SET `rest_key` = '', `rest_date` = '', `password` = :newpass WHERE id = :id");
			to_router("login");
		}
		else
		{
			to_router("404");
		}
    }

    public function ping_newsletteres($match="")
    {
        $key = Encryption::decode($match["params"]["key"]);
        if($key == "newsletteres")
        {
            $errors = Request::get("errors", "a");
            $ex = Newsletteres::send();
            if($errors == "show")
            {
                echo "<pre>";
                print("Results: ".$ex."<br>");

                print_r(Newsletteres::errors());
                echo "</pre>";
            }
        }
    }
}

?>
