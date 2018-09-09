<?php

/*
|---------------------------------------------------------------
| PHP FRAMEWORK
|---------------------------------------------------------------
|
| -> PACKAGE / PHP FRAMEWORK
| -> AUTHOR / wesparkle solutions
| -> DATE / 2015-04-01
| -> CODECANYON / http://wesparklesolutions.com
| -> VERSION / 1.0.0
|
|---------------------------------------------------------------
| Copyright (c) 2015 , All rights reserved.
|---------------------------------------------------------------
*/

class Admin extends BaseController
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

	public function home()
	{
		if(Auth::check("admins"))
		{
			//online
			set("all_online", Usersonline::calcul("all"));
			set("guests_online", Usersonline::calcul("guests"));
			set("users_online", Usersonline::calcul("users"));
			set("admins_online", Usersonline::calcul("admins"));

			//count
			set("users_count", Getdata::howmany("users"));
			set("admins_count", Getdata::howmany("admins"));
			set("websites_count", Getdata::howmany("websites"));
			set("referrals_count", Getdata::howmany("referrals"));

			//hits
			set("hits_count", floor(Hits::all_hits()));
			set("points_count", floor(Hits::all_points()));

			$browser = array();
			$os = array();
			$browser["UNKNOWN_BROWSER"] = array(floor(Hits::all_hits_by_browser("unknown")), "unknown");
			$browser["OPERA"] = array(floor(Hits::all_hits_by_browser("Opera")), "Opera");
			$browser["OPERA_MINI"] = array(floor(Hits::all_hits_by_browser("Opera Mini")), "Opera Mini");
			$browser["WEBTV"] = array(floor(Hits::all_hits_by_browser("WebTV")), "WebTV");
			$browser["IE"] = array(floor(Hits::all_hits_by_browser("Internet Explorer")), "Internet Explorer");
			$browser["EDGE"] = array(floor(Hits::all_hits_by_browser("Microsoft Edge")), "Microsoft Edge");
			$browser["POCKET_IE"] = array(floor(Hits::all_hits_by_browser("Pocket Internet Explorer")), "Pocket Internet Explorer");
			$browser["KONQUEROR"] = array(floor(Hits::all_hits_by_browser("Konqueror")), "Konqueror");
			$browser["ICAB"] = array(floor(Hits::all_hits_by_browser("iCab")), "iCab");
			$browser["OMNIWEB"] = array(floor(Hits::all_hits_by_browser("OmniWeb")), "OmniWeb");
			$browser["FIREBIRD"] = array(floor(Hits::all_hits_by_browser("Firebird")), "Firebird");
			$browser["FIREFOX"] = array(floor(Hits::all_hits_by_browser("Firefox")), "Firefox");
			$browser["SEAMONKEY"] = array(floor(Hits::all_hits_by_browser("SeaMonkey")), "SeaMonkey");
			$browser["ICEWEASEL"] = array(floor(Hits::all_hits_by_browser("Iceweasel")), "Iceweasel");
			$browser["SHIRETOKO"] = array(floor(Hits::all_hits_by_browser("Shiretoko")), "Shiretoko");
			$browser["MOZILLA"] = array(floor(Hits::all_hits_by_browser("Mozilla")), "Mozilla");
			$browser["AMAYA"] = array(floor(Hits::all_hits_by_browser("Amaya")), "Amaya");
			$browser["LYNX"] = array(floor(Hits::all_hits_by_browser("Lynx")), "Lynx");
			$browser["SAFARI"] = array(floor(Hits::all_hits_by_browser("Safari")), "Safari");
			$browser["CHROME"] = array(floor(Hits::all_hits_by_browser("Chrome")), "Chrome");
			$browser["NAVIGATOR"] = array(floor(Hits::all_hits_by_browser("Navigator")), "Navigator");
			$browser["GOOGLEBOT"] = array(floor(Hits::all_hits_by_browser("GoogleBot")), "GoogleBot");
			$browser["SLURP"] = array(floor(Hits::all_hits_by_browser("Yahoo! Slurp")), "Yahoo! Slurp");
			$browser["W3CVALIDATOR"] = array(floor(Hits::all_hits_by_browser("W3C Validator")), "W3C Validator");
			$browser["BLACKBERRY"] = array(floor(Hits::all_hits_by_browser("BlackBerry")), "BlackBerry");
			$browser["ICECAT"] = array(floor(Hits::all_hits_by_browser("IceCat")), "IceCat");
			$browser["NOKIA_S60"] = array(floor(Hits::all_hits_by_browser("Nokia S60 OSS Browser")), "Nokia S60 OSS Browser");
			$browser["NOKIA"] = array(floor(Hits::all_hits_by_browser("Nokia Browser")), "Nokia Browser");
			$browser["MSN"] = array(floor(Hits::all_hits_by_browser("MSN Browser")), "MSN Browser");
			$browser["MSNBOT"] = array(floor(Hits::all_hits_by_browser("MSN Bot")), "MSN Bot");
			$browser["NETSCAPE_NAVIGATOR"] = array(floor(Hits::all_hits_by_browser("Netscape Navigator")), "Netscape Navigator");
			$browser["GALEON"] = array(floor(Hits::all_hits_by_browser("Galeon")), "Galeon");
			$browser["NETPOSITIVE"] = array(floor(Hits::all_hits_by_browser("NetPositive")), "NetPositive");
			$browser["PHOENIX"] = array(floor(Hits::all_hits_by_browser("Phoenix")), "Phoenix");
			$browser["GSA"] = array(floor(Hits::all_hits_by_browser("Google Search Appliance")), "Google Search Appliance");

			$os["UNKNOWN_OS"] = array(floor(Hits::all_hits_by_os("unknown")), "unknown");
			$os["OSX"] = array(floor(Hits::all_hits_by_os("OS X")), "OS X");
			$os["IOS"] = array(floor(Hits::all_hits_by_os("iOS")), "iOS");
			$os["SYMBOS"] = array(floor(Hits::all_hits_by_os("SymbOS")), "SymbOS");
			$os["WINDOWS"] = array(floor(Hits::all_hits_by_os("Windows")), "Windows");
			$os["ANDROID"] = array(floor(Hits::all_hits_by_os("Android")), "Android");
			$os["LINUX"] = array(floor(Hits::all_hits_by_os("Linux")), "Linux");
			$os["NOKIA"] = array(floor(Hits::all_hits_by_os("Nokia")), "Nokia");
			$os["BLACKBERRY"] = array(floor(Hits::all_hits_by_os("BlackBerry")), "BlackBerry");
			$os["FREEBSD"] = array(floor(Hits::all_hits_by_os("FreeBSD")), "FreeBSD");
			$os["OPENBSD"] = array(floor(Hits::all_hits_by_os("OpenBSD")), "OpenBSD");
			$os["NETBSD"] = array(floor(Hits::all_hits_by_os("NetBSD")), "NetBSD");
			$os["OPENSOLARIS"] = array(floor(Hits::all_hits_by_os("OpenSolaris")), "OpenSolaris");
			$os["SUNOS"] = array(floor(Hits::all_hits_by_os("SunOS")), "SunOS");
			$os["OS2"] = array(floor(Hits::all_hits_by_os("OS2")), "OS2");
			$os["BEOS"] = array(floor(Hits::all_hits_by_os("BeOS")), "BeOS");

			set("browser", $browser);
			set("os", $os);
			set("title2", "Dashboard");
			Template::view("home");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function settings()
	{
		if(Auth::check("admins"))
		{
			$name              = Request::post("update_name");
			$logo              = Request::post("update_logo");
			$language          = Request::post("update_language");
			$template          = Request::post("update_template");
			$admin_template    = Request::post("update_admin_template");
			$currency          = Request::post("update_currency");
			$confirm_referrals = Request::post("update_auto_confirm_referrals");
			$confirm_websites  = Request::post("update_auto_confirm_websites");
			if($confirm_referrals=="yes"){ $refval = "1"; } else { $refval = "0"; }
			if($confirm_websites=="yes"){ $webval = "1"; } else { $webval = "0"; }
			if(!empty($name) || !empty($language))
			{
				Settings::set("generale", array(
				"name" => $name,
				"logo" => $logo,
				"language" => $language,
				"template" => $template,
				"admin_template" => $admin_template,
				"currency" => $currency,
				"auto_confirm_referrals" => $refval,
				"auto_confirm_websites" => $webval
				));
				define("alert_success", "Well done, Generale settings updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}

            $analyse_code  = Request::post("update_google_code");
			if(!empty($analyse_code))
			{
				Settings::set("analyse", array(
				"code" => $analyse_code
                ));
				define("alert_success", "Well done, Analyse code updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}

            $facebook_1  = Request::post("facebook_id");
            $facebook_2  = Request::post("facebook_secret");
            $twitter_1   = Request::post("twitter_key");
            $twitter_2   = Request::post("twitter_secret");
            $google_1    = Request::post("google_id");
            $google_2    = Request::post("google_secret");
			if(!empty($facebook_1) or !empty($facebook_2) or !empty($twitter_1) or !empty($twitter_2) or !empty($google_1) or !empty($google_2))
			{
				Settings::set("socialauth", array(
                    "facebook" => array(
                        "id" => $facebook_1,
                        "secret" => $facebook_2
                    ),
                    "twitter" => array(
                        "key" => $twitter_1,
                        "secret" => $twitter_2
                    ),
                    "google" => array(
                        "id" => $google_1,
                        "secret" => $google_2
                    )
                ));
				define("alert_success", "Well done, Social Authentication updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}

            $seo_title       = Request::post("seo_title");
            $seo_description = Request::post("seo_description");
            $seo_keywords    = Request::post("seo_keywords");
            $seo_ogimage     = Request::post("seo_ogimage");
            $seo_favicon     = Request::post("seo_favicon");
			if(!empty($seo_title) or !empty($seo_description) or !empty($seo_keywords) or !empty($seo_ogimage) or !empty($seo_favicon))
			{
				Settings::set("seo", array(
                    "title" => $seo_title,
                    "description" => $seo_description,
                    "keywords" => $seo_keywords,
                    "ogimage" => $seo_ogimage,
                    "favicon" => $seo_favicon
                ));
				define("alert_success", "Well done, SEO settings updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}

            $ads_header = Request::post("ads_header");
            $ads_footer = Request::post("ads_footer");
			if(!empty($ads_footer) or !empty($ads_header))
			{
				Settings::set("ads", array(
                    "header" => $ads_header,
                    "footer" => $ads_footer
                ));
				define("alert_success", "Well done, Ads settings updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}

			$blacklist = Request::post("update_backlist");
			$whitelist = Request::post("update_whitelist");
			if(!empty($blacklist) || !empty($whitelist))
			{
				$new_blacklist = array();
				$new_whitelist = array();
				if($blacklist)
				{
					$black = explode("\n", $blacklist);
					if(!empty($black) && is_array($black))
					{
						foreach($black as $bl)
						{
							$bl = trim($bl);
							$newbl = str_replace(array("www.", "http://", "https://"), "", $bl);
							$host = explode("/", $newbl);
							$new_blacklist[] = $host[0];
						}
					}
				}
				if($whitelist)
				{
					$white = explode("\n", $whitelist);
					if(!empty($white) && is_array($white))
					{
						foreach($white as $wh)
						{
							$wh = trim($wh);
							$newwh = str_replace(array("www.", "http://", "https://", " "), "", $wh);
							$host = explode("/", $newwh);
							$new_whitelist[] = $host[0];
						}
					}
				}
				Settings::set("blacklist", array("lists" => $new_blacklist));
				Settings::set("whitelist", array("lists" => $new_whitelist));
				define("alert_success", "Well done, the lists are Updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}

            $exchange_openmode    = Request::post("update_exchange_openmode");
			$exchange_minduration = Request::post("update_exchange_minduration");
			$exchange_focus       = Request::post("update_exchange_focus");
			$exchange_maxduration = Request::post("update_exchange_maxduration");
			$exchange_source      = Request::post("update_exchange_source");
			$exchange_ipcheck     = Request::post("update_exchange_ipcheck");
			$exchange_pointcost   = Request::post("update_exchange_pointcost");

			if(!empty($exchange_minduration) || !empty($exchange_maxduration))
			{
				Settings::set("exchange", array(
                "openmode" => $exchange_openmode,
				"focus" => $exchange_focus,
				"minduration" => $exchange_minduration,
				"maxduration" => $exchange_maxduration,
				"source" => $exchange_source,
				"ipcheck" => $exchange_ipcheck,
				"pointcost" => $exchange_pointcost
				));
				define("alert_success", "Well done, Exchange settings updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}

            $allowed_countries = Request::post("allowed_countries");
			$access_geo        = Request::post("access_geo");
			if(!empty($allowed_countries))
			{
                if(is_array($allowed_countries))
                {
                    $countries = array();
                    $getting_countries = json_decode(BaseModel::$country_list, true);
                    foreach($allowed_countries as $country)
                    {
                        $countries[$country] = $getting_countries[$country];
                    }
                    Settings::set("geotarget", array("list" => $countries, "access" => $access_geo));
                    define("alert_success", "Well done, Geo Targetting settings updated");
                    if(Request::is_ajax())
                    {
                        $this->makejson();
                    }
                }
			}

			$stripe_mode      = Request::post("update_stripe_mode");
			$stripe_pubkey    = Request::post("update_stripe_publickey");
			$stripe_seckey    = Request::post("update_stripe_secretkey");

			$paypal_mode      = Request::post("update_paypal_mode");
			$paypal_username  = Request::post("update_paypal_username");
			$paypal_password  = Request::post("update_paypal_password");
			$paypal_signature = Request::post("update_paypal_signature");

			$payza_mode       = Request::post("update_payza_mode");
			$payza_email      = Request::post("update_payza_email");

			$twocheckout_seller_id   = Request::post("update_twocheckout_seller_id");
			$twocheckout_public_key  = Request::post("update_twocheckout_public_key");
			$twocheckout_private_key = Request::post("update_twocheckout_private_key");
			$twocheckout_mode        = Request::post("update_twocheckout_mode");

			if(!empty($twocheckout_mode) ||  !empty($paypal_mode) || !empty($payza_mode))
			{
				Settings::set("payments", array(
				"twocheckout" => array(
					"mode" => $twocheckout_mode,
					"seller_id" => $twocheckout_seller_id,
					"public_key" => $twocheckout_public_key,
					"private_key" => $twocheckout_private_key
					),
				"paypal" => array(
					"mode" => $paypal_mode,
					"username" => $paypal_username,
					"password" => $paypal_password,
					"signature" => $paypal_signature
					),
				"payza" => array(
					"mode" => $payza_mode,
					"email" => $payza_email
					),
				"stripe" => array(
					"mode" => $stripe_mode,
					"public_key" => $stripe_pubkey,
					"secret_key" => $stripe_seckey
					)
				));
				define("alert_success", "Well done, Payment settings updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}
			$email          = Request::post("update_email");
			$email_confirm  = Request::post("update_email_confirmation");
			$mail_type      = Request::post("update_mail_type");
			$smtp_host      = Request::post("update_smtp_host");
			$smtp_port      = Request::post("update_smtp_port");
			$smtp_auth      = Request::post("update_smtp_auth");
			$smtp_username  = Request::post("update_smtp_username");
			$smtp_password  = Request::post("update_smtp_password");
			if($email_confirm == "yes") { $confr = "1"; } else { $confr = "0"; }
			if($smtp_auth=="yes"){ $smtp_auth = "1"; } else { $smtp_auth = "0"; }
			if(!empty($mail_type) || !empty($email))
			{
				Settings::set("mail", array(
				"type"  => $mail_type,
				"from"  => $email,
				"activation" => $confr,
				"smtp"  => array(
					"host" => $smtp_host,
					"port" => $smtp_port,
					"secure" => "tls",
					"auth" => $smtp_auth,
					"username" => $smtp_username,
					"password" => $smtp_password
					)
				));
				define("alert_success", "Well done, Mail settings updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}
			$website_slots    = Request::post("update_website_slots", "i");
			$session_slots    = Request::post("update_session_slots", "i");
			$traffic_ratio    = Request::post("update_traffic_ratio", "i");
			$points           = Request::post("update_points", "i");
			$referrals_points = Request::post("update_referrals_points");
			$default_url      = Request::post("update_default_url");
			$default_withdrawal_status = Request::post("update_referrals_withdrawal_status");
			$default_min_withdrawal    = Request::post("update_referrals_minwithdrawal");
			if(!empty($website_slots) || !empty($session_slots))
			{
				Settings::set("defaults", array(
				"withdrawal_status"  => $default_withdrawal_status,
				"min_for_withdrawal" => $default_min_withdrawal,
				"website_slots" => $website_slots,
				"session_slots" => $session_slots,
				"traffic_ratio" => $traffic_ratio,
				"points"        => $points,
				"referrals_points" => $referrals_points,
				"website"          => $default_url
				));
				define("alert_success", "Well done, Default values updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}
			$recaptcha_publickey  = Request::post("update_recaptcha_publickey");
			$recaptcha_privatekey = Request::post("update_recaptcha_privatekey");
			if(!empty($recaptcha_publickey) || !empty($recaptcha_privatekey))
			{
				Settings::set("recaptcha", array(
				"publickey" => $recaptcha_publickey,
				"privatekey" => $recaptcha_privatekey
				));
				define("alert_success", "Well done, Recaptcha settings updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}
			$facebook    = Request::post("update_facebook");
			$twitter     = Request::post("update_twitter");
			$google_plus = Request::post("update_google_plus");
			$pinterest   = Request::post("update_pinterest");
			$instagram   = Request::post("update_instagram");
			$dribbble    = Request::post("update_dribbble");
			if(!empty($facebook) || !empty($twitter) || !empty($google_plus) || !empty($pinterest) || !empty($instagram) || !empty($dribbble))
			{
				Settings::set("social", array(
				"facebook" => $facebook,
				"twitter" => $twitter,
				"google_plus" => $google_plus,
				"pinterest" => $pinterest,
				"instagram" => $instagram,
				"dribbble" => $dribbble
				));
				define("alert_success", "Well done, Social settings updated");
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}
			$get_templates = glob("themes/user/*", GLOB_ONLYDIR);
			$get_admin_templates = glob("themes/admin/*", GLOB_ONLYDIR);
			$get_languages = Languages::info();
			$currency = s("currency");
			if(!empty($get_languages))
			{
				foreach($get_languages as $language)
				{
					$languages[$language["code"]] = $language["name"];
				}
			}
			if(!empty($get_templates))
			{
				foreach($get_templates as $template)
				{
					$tmpl = str_replace("themes/user/", "", $template);
					$templates[$tmpl] = $tmpl;
				}
			}
			if(!empty($get_admin_templates))
			{
				foreach($get_admin_templates as $admin_template)
				{
					$tmpl = str_replace("themes/admin/", "", $admin_template);
					$admin_templates[$tmpl] = $tmpl;
				}
			}
			set("templates", $templates);
			set("admin_templates", $admin_templates);
			set("languages", $languages);
			set("currency", $currency);
			set("title2", "Settings");
			Template::view("edit_settings");
		}
		else
		{
			to_router("admin_login");
		}
	}


	public function users()
	{
		if(Auth::check("admins"))
		{
			$edit = strip_tags(Request::get("edit", "i"));
			if(!empty($edit))
			{
				$getone = Getdata::one_user($edit);
				if(!empty($getone))
				{
					set("info", $getone);
					set("title2", "Edit");
				}
				else
				{
					to_router("admin_users");
				}
			}
			else
			{
				$pag     = Pagination::build(router("admin_users"), "users", 30);
				$getdata = Getdata::users($pag[0], $pag[1]);
				set("users", $getdata);
				set("pagination", $pag[2]);
				set("title2", "Users");
			}
			Template::view("users");
		}
		else
		{
			to_router("admin_login");
		}
	}

    public function search()
	{
		if(Auth::check("admins"))
		{
			$search = strip_tags(Request::get("q"));
            $kind = strtolower(strip_tags(Request::get("kind", "a")));
			if(!empty($search) && !empty($kind))
			{
                $tables = array(
                "users",
                "websites",
                "payments",
                "plans",
                "newsletteres"
                );
				if(in_array($kind, $tables))
                {
                    $query_url = "?q=".$search."&kind=".$kind;
                    switch($kind)
                    {
                        case 'users':
                            $pag = Pagination::build(router("admin_search").$query_url, array(
                            "query" => "users WHERE id LIKE :id or username LIKE :username or email LIKE :email  or type LIKE :type",
                            "binds" => array(
                                "id" => "%".$search."%",
                                "username" => "%".$search."%",
                                "email" => "%".$search."%",
                                "type" => "%".$search."%"
                            )
                            ), 30, 2, "&p=");
                        break;
                        case 'websites':
                            $pag = Pagination::build(router("admin_search").$query_url, array(
                            "query" => "websites WHERE id LIKE :id or user_id LIKE :userid or url LIKE :url  or geolocation LIKE :geolocation",
                            "binds" => array(
                                "id" => "%".$search."%",
                                "userid" => "%".$search."%",
                                "url" => "%".$search."%",
                                "geolocation" => "%".$search."%"
                            )
                            ), 30, 2, "&p=");
                        break;
                        case 'payments':
                            $pag = Pagination::build(router("admin_search").$query_url, array(
                            "query" => "payments WHERE id LIKE :id or payment_id LIKE :paymentid or amount LIKE :amount  or payment_service LIKE :paymentservice or currency LIKE :currency",
                            "binds" => array(
                                "id" => "%".$search."%",
                                "paymentid" => "%".$search."%",
                                "amount" => "%".$search."%",
                                "paymentservice" => "%".$search."%",
                                "currency" => "%".$search."%"
                            )
                            ), 30, 2, "&p=");
                        break;
                        case 'plans':
                            $pag = Pagination::build(router("admin_search").$query_url, array(
                            "query" => "plans WHERE id LIKE :id or name LIKE :name or price LIKE :price  or type LIKE :type or currency LIKE :currency",
                            "binds" => array(
                                "id" => "%".$search."%",
                                "name" => "%".$search."%",
                                "price" => "%".$search."%",
                                "currency" => "%".$search."%",
                                "type" => "%".$search."%"
                            )
                            ), 30, 2, "&p=");
                        break;
                        case 'newsletteres':
                            $pag = Pagination::build(router("admin_search").$query_url, array(
                            "query" => "newsletteres WHERE id LIKE :id or name LIKE :name or subject LIKE :subject or to_group LIKE :togroup",
                            "binds" => array(
                                "id" => "%".$search."%",
                                "name" => "%".$search."%",
                                "subject" => "%".$search."%",
                                "togroup" => "%".$search."%"
                            )
                            ), 30, 2, "&p=");
                        break;
                    }
                    $getdata = Getdata::admin_search($search, $kind, $pag[0], $pag[1]);
                    set($kind, $getdata);
                    set("pagination", $pag[2]);
                }
			}
            set("title2", "Search");
			Template::view("search");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function payments()
	{
		if(Auth::check("admins"))
		{
			$edit = strip_tags(Request::get("edit", "i"));
			if(!empty($edit))
			{
				$getone = Getdata::one_payment($edit);
				if(!empty($getone))
				{
					set("info", $getone);
					set("title2", "Edit");
				}
				else
				{
					to_router("admin_payments");
				}
			}
			else
			{
				$pag     = Pagination::build(router("admin_payments"), "payments", 30);
				$getdata = Getdata::payments($pag[0], $pag[1]);
				set("payments", $getdata);
				set("pagination", $pag[2]);
				set("title2", "Payments");
			}
			Template::view("payments");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function withdrawals()
	{
		if(Auth::check("admins"))
		{
			$edit = strip_tags(Request::get("show", "i"));
			$delete = strip_tags(Request::get("done", "i"));
			if(!empty($edit))
			{
				Db::bind("uid", strip_tags($edit));
				$getone = Db::query("SELECT * FROM affiliate WHERE user_id = :uid");
				if(!empty($getone[0]))
				{
					set("info", $getone[0]);
					set("title2", "Edit");
				}
				else
				{
					to_router("admin_withdrawals");
				}
			}
			else if(!empty($delete))
			{
				Db::bind("uid", strip_tags($delete));
				$getone = Db::query("SELECT * FROM wallet WHERE user_id = :uid");
				if(!empty($getone[0]))
				{
					Wallet::empty_sold("withdrawal", $getone[0]["user_id"]);
				}
				to_router("admin_withdrawals");
			}
			else
			{
				$pag     = Pagination::build(router("admin_withdrawals"), "wallet WHERE withdrawal_sold > 0", 30);
				$getdata = Getdata::withdrawals($pag[0], $pag[1]);
				set("withdrawals", $getdata);
				set("pagination", $pag[2]);
				set("title2", "Withdrawals");
			}
			Template::view("withdrawals");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function currencies()
	{
		if(Auth::check("admins"))
		{
			$kind = Request::get("kind");
			if($kind=="add")
			{
				$code  = Request::post("currency_code");
				$name  = Request::post("currency_name");
				$value = Request::post("currency_value");
				if(!empty($code) && !empty($name) && !empty($value))
				{
					USD_Convert::add($code, $name, $value);
					define("alert_success", "Added");
					if(Request::is_ajax())
					{
						$this->makejson();
					}
					else
					{
						to_router("admin_currencies");
					}
				}
			}
			else if($kind=="update")
			{
				$code  = Request::post("currency_code");
				$name  = Request::post("currency_name");
				$value = Request::post("currency_value");
				if(!empty($code) && !empty($name) && !empty($value))
				{
					USD_Convert::update($code, $name, $value);
					define("alert_success", "Updated");
					if(Request::is_ajax())
					{
						$this->makejson();
					}
					else
					{
						to_router("admin_currencies");
					}
				}
			}
			else if($kind=="remove")
			{
				$code  = Request::post("currency_code");
				if(!empty($code))
				{
					USD_Convert::remove($code);
					define("alert_success", "Removed");
					if(Request::is_ajax())
					{
						$this->makejson();
					}
					else
					{
						to_router("admin_currencies");
					}
				}
			}
			set("currencies", s("currency"));
			set("usd_convert", s("usd_convert"));
			set("title2", "Currency control");
			Template::view("currencies");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function plans()
	{
		if(Auth::check("admins"))
		{
			$edit = strip_tags(Request::get("edit", "i"));
			if(!empty($edit))
			{
				$getone = Getdata::one_plan($edit);
				if(!empty($getone))
				{
					set("info", $getone);
					set("title2", "Edit");
				}
				else
				{
					to_router("admin_plans");
				}
			}
			else
			{
				$pag     = Pagination::build(router("admin_plans"), "plans", 30);
				$getdata = Getdata::plans($pag[0], $pag[1]);
				set("plans", $getdata);
				set("pagination", $pag[2]);
				set("title2", "Plans");
			}
			Template::view("plans");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function referrals()
	{
		if(Auth::check("admins"))
		{
			$edit = strip_tags(Request::get("edit", "i"));
			if(!empty($edit))
			{
				$getone = Getdata::one_referral($edit);
				if(!empty($getone))
				{
					set("info", $getone);
					set("title2", "Edit");
				}
				else
				{
					to_router("admin_referrals");
				}
			}
			else
			{
				$pag     = Pagination::build(router("admin_referrals"), "referrals", 30);
				$getdata = Getdata::referrals($pag[0], $pag[1]);
				set("referrals", $getdata);
				set("pagination", $pag[2]);
				set("title2", "Referrals");
			}
			Template::view("referrals");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function admins()
	{
		if(Auth::check("admins"))
		{
			$edit = strip_tags(Request::get("edit", "i"));
			if(!empty($edit))
			{
				$getone = Getdata::one_admin($edit);
				if(!empty($getone))
				{
					set("info", $getone);
					set("title2", "Edit");
				}
				else
				{
					to_router("admin_admins");
				}
			}
			else
			{
				$pag     = Pagination::build(router("admin_admins"), "admins", 30);
				$getdata = Getdata::admins($pag[0], $pag[1]);
				set("admins", $getdata);
				set("pagination", $pag[2]);
				set("title2", "Admins");
			}
			Template::view("admins");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function account()
	{
		if(Auth::check("admins"))
		{
			header("location: ".router("admin_admins")."?edit=".u("id"));
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function pages()
	{
		if(Auth::check("admins"))
		{
			$privacy  = Request::post("update_privacy");
			$about_us = Request::post("update_about_us");
			$tos      = Request::post("update_tos");
			if(isset($privacy) or isset($about_us) or isset($tos))
			{
				$new_pages = array(
				"privacy" => htmlentities($privacy),
				"about-us" => htmlentities($about_us),
				"tos" => htmlentities($tos)
				);
				Db::bind("id", 10);
				Db::bind("newpages", serialize($new_pages));
				$query = "UPDATE settings SET `option_value` = :newpages WHERE id = :id";
				if(Db::query($query))
				{
					define("alert_success", "Well done - all pages updated.");
				}
				else
				{
					define("alert_warning", "There is no Changes");
				}
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}
			set("title2", "Pages");
			Template::view("pages");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function last_websites()
	{
		if(Auth::check("admins"))
		{
			$pag     = Pagination::build(router("admin_last_websites"), "websites WHERE activated = '0'", 30);
			$getdata = Getdata::unconfirmed_websites($id, $pag[0], $pag[1]);
			set("websites", $getdata);
			set("pagination", $pag[2]);
			set("title2", "Last Websites need confirmation");
			Template::view("last_websites");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function reported_websites()
	{
		if(Auth::check("admins"))
		{
			$reportid = strip_tags(Request::post("removeid"));
			if(is_numeric($reportid) && !empty($reportid) && Request::is_ajax())
			{
				$repexchange = Getdata::one_website($reportid);
				if(!empty($repexchange) && is_array($repexchange) && $repexchange["reported"] == "1")
				{
                    Db::bind("id", $repexchange["id"]);
					Db::bind("reported", "0");
					Db::query("UPDATE websites SET `reported` = :reported WHERE id = :id");
					define("alert_success", "Report Removed");
				}
				else if(!empty($repexchange) && is_array($repexchange) && $repexchange["reported"] != "1"){
					define("alert_success", "Report Removed");
				}
				$this->makejson();
				exit();
			}

			$pag     = Pagination::build(router("admin_reported_websites"), "websites WHERE reported = '1'", 30);
			$getdata = Getdata::reported_websites($id, $pag[0], $pag[1]);
			set("websites", $getdata);
			set("pagination", $pag[2]);
			set("title2", "Reported websites");
			Template::view("reported_websites");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function websites($match="")
	{
		if(Auth::check("admins"))
		{
			$id = strip_tags($match["params"]["id"]);
			if(!empty($id))
			{
				set("user_id", $id);
				$edit = strip_tags(Request::get("edit", "i"));
				if(!empty($edit))
				{
					$getone = Getdata::one_website($edit);
					if(!empty($getone))
					{
						set("info", $getone);
						set("title2", "Edit");
					}
					else
					{
						to_router("admin_websites", array("id" => get("user_id")));
					}
				}
				else
				{
					$pag     = Pagination::build(router("admin_websites", array("id" => get("user_id"))), "websites WHERE user_id = '".$id."'", 30);
					$getdata = Getdata::user_websites($id, $pag[0], $pag[1]);
					set("websites", $getdata);
					set("pagination", $pag[2]);
					set("title2", "Websites");
				}
				Template::view("websites");
			}
			else
			{
				to_router("admin_home");
			}
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function extensions()
	{
		if(Auth::check("admins"))
		{
			if(Request::is_post("chromewebstore"))
			{
				$storelink = Request::post("chromewebstore");
				if(isset($storelink))
				{
					Settings::set("extension", array(
					"chrome"  => $storelink,
					"firefox" => s("extension/firefox")
					));

					to_router("admin_extensions");
				}
			}

			if(Request::is_post("addonurl"))
			{
				$addonurl = Request::post("addonurl");
				if(isset($addonurl))
				{
					Settings::set("extension", array(
					"chrome"  => s("extension/chrome"),
					"firefox" => $addonurl
					));

					to_router("admin_extensions");
				}
			}

			if(Request::is_file("firefox"))
			{
				Upload::get("firefox");
				Upload::save_to("extensions/");
				Upload::just(array("xpi"));
				Upload::save_as("TE-extension.xpi");
				$check = Upload::run();
				if($check[0])
				{
					define("alert_success", "Success, ".$check[1]);
				}
				else
				{
					define("alert_error", "Error, ".$check[1]);
				}
			}
			if(Request::is_file("chrome"))
			{
				Upload::get("chrome");
				Upload::save_to("extensions/");
				Upload::just(array("crx"));
				Upload::save_as("TE-extension.crx");
				$check = Upload::run();
				if($check[0])
				{
					define("alert_success", "Success, ".$check[1]);
				}
				else
				{
					define("alert_error", "Error, ".$check[1]);
				}
			}
			set("title2", "Browser Extensions");
			Template::view("extensions");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function support()
	{
		if(Auth::check("admins"))
		{
			set("title2", "Support");
			Template::view("support");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function generate_time($time)
	{
		$extime    = explode(",", $time);
		$newextime = explode(":", $extime[0]);
		$hour      = $newextime[0]; if(empty($hour) or !is_numeric($hour) or $hour > 24){ $hour = date("h"); }
		$min       = $newextime[1]; if(empty($min) or !is_numeric($min) or $min > 60){ $min = date("i"); }
		$day       = $extime[1]; if(empty($day) or !is_numeric($day) or $day > 31){ $day = date("d"); }
		$month     = $extime[2]; if(empty($month) or !is_numeric($month) or $month > 12){ $month = date("m"); }
		$year      = $extime[3]; if(empty($year) or !is_numeric($year) or $year < date("Y")){ $year = date("Y"); }
		return mktime($hour, $min, 0, $month, $day, $year);
	}

	public function newsletteres($match="")
	{
		if(Auth::check("admins"))
		{
			$edit = strip_tags(Request::get("edit", "i"));
			$type     = strip_tags(Request::post("kindofpost"));
			$name     = strip_tags(Request::post("name"));
			$to_group = strip_tags(Request::post("to_group"));
			$subject  = strip_tags(Request::post("subject"));
			$content  = Request::post("content");
			$starton  = strip_tags(Request::post("starton"));
			if(Request::is_post())
			{
				if($type == "server_settings")
				{
					$email          = Request::post("email");
					$email_replyto  = Request::post("email_replyto");
					$mail_type      = Request::post("mail_type");
					$smtp_host      = Request::post("smtp_host");
					$smtp_port      = Request::post("smtp_port");
					$smtp_secure    = Request::post("smtp_secure");
					$smtp_auth      = Request::post("smtp_auth");
					$smtp_username  = Request::post("smtp_username");
					$smtp_password  = Request::post("smtp_password");
                    $max_per_cron   = Request::post("max_per_cron");
					if($smtp_auth=="yes"){ $smtp_auth = "1"; } else { $smtp_auth = "0"; }
                    if(!is_numeric($max_per_cron)) { $max_per_cron = 20; }
					if(!empty($mail_type) || !empty($email))
					{
						Settings::set("newsletteres", array(
						"type"  => $mail_type,
						"from"  => $email,
						"replyto" => $email_replyto,
                        "max" => $max_per_cron,
						"smtp"  => array(
							"host" => $smtp_host,
							"port" => $smtp_port,
							"secure" => $smtp_secure,//tls -- ssl
							"auth" => $smtp_auth,
							"username" => $smtp_username,
							"password" => $smtp_password
							)
						));
						define("alert_success", "Well done, Server settings updated");
					}
					else
					{
						define("alert_error", "Please complete the form");
					}
					$this->makejson();
				}
			}
			if(Request::is_post())
			{
				if($type == "add_newsletter")
				{
					$time     = $this->generate_time($starton);
					if(!empty($name) && !empty($to_group) && !empty($subject) && !empty($content) && !empty($starton))
					{
						Db::bind("name", $name);
						Db::bind("group", $to_group);
						Db::bind("subject", $subject);
						Db::bind("content", $content);
						Db::bind("time", $time);
						Db::bind("progress", "0");
						Db::bind("cat", time());
						Db::bind("uat", time());
						$ex = Db::query("INSERT INTO `newsletteres` (`status`, `name`, `to_group`, `subject`, `content`, `starton`, `progress`, `offset`, `created_at`, `updated_at`) VALUES ('1', :name, :group, :subject, :content, :time, :progress, '0', :cat, :uat);");
						if($ex)
						{
							define("alert_success", "Success, Mail added !!");
						}
						else
						{
							define("alert_error", "something went wrong, Please try again");
						}
					}
					else
					{
						define("alert_error", "Please complete the form");
					}
					$this->makejson();
				}
			}

			if(!empty($edit))
			{
				$getone = Getdata::one_newsletter($edit);
				if(!empty($getone))
				{
					if($type == "update_newsletter")
					{
						$time     = $this->generate_time($starton);
						if(!empty($name) && !empty($to_group) && !empty($subject) && !empty($content) && !empty($starton))
						{
							$startover = Request::post("startover");
							Db::bind("name", $name);
							Db::bind("group", $to_group);
							Db::bind("subject", $subject);
							Db::bind("content", $content);
							Db::bind("time", $time);

							if($startover == "On")
							{
								Db::bind("progress", "0");
								Db::bind("offset", "0");
							}
							else
							{
								Db::bind("progress", $getone["progress"]);
								Db::bind("offset", $getone["offset"]);
							}

							Db::bind("id", $getone["id"]);
							Db::bind("uat", time());
							$ex = Db::query("UPDATE `newsletteres` SET `name` = :name, `to_group` = :group, `subject` = :subject, `content` = :content, `starton` = :time, `progress` = :progress, `offset` = :offset, `updated_at` = :uat WHERE id = :id");
							if($ex)
							{
								define("alert_success", "Success, Mail Updated !!");
							}
							else
							{
								define("alert_error", "something went wrong, Please try again");
							}
						}
						else
						{
							define("alert_error", "Please complete the form");
						}
						$this->makejson();
					}
					set("info", $getone);
					set("title2", "Edit");
				}
				else
				{
					to_router("admin_newsletteres");
				}
			}
			else
			{
				$pag     = Pagination::build(router("admin_newsletteres"), "newsletteres", 30);
				$getdata = Getdata::newsletteres($pag[0], $pag[1]);
				set("newsletteres", $getdata);
				set("pagination", $pag[2]);
				set("title2", "Newsletteres");
			}
			Template::view("newsletteres");
		}
		else
		{
			to_router("admin_login");
		}
	}

	public function logout()
	{
		Auth::logout();
		to_router("admin_login");
	}

	public function double_number($number)
	{
		$ex = explode(".", $number);
		if(!empty($ex[0]) && !empty($ex[1]))
		{
			return $number;
		}
		else if(!empty($ex[0]) && empty($ex[1]))
		{
			return $ex[0].".00";
		}
		else if(empty($ex[0]) && !empty($ex[1]))
		{
			return "0.".$ex[1];
		}
		else
		{
			return "0.00";
		}
	}

	public function ajax_delete()
	{
		if(Auth::check("admins") && Check::this_referer())
		{
			$tables = array("admins", "exchange", "hits", "payments", "plans", "referrals", "users", "websites", "newsletteres");
			$table  = strip_tags(Request::post("del", "a"));
			$id     = strip_tags(Request::post("id", "i"));
			if(!empty($table) && !empty($id))
			{
				if(in_array($table, $tables))
				{
					Db::bind("id", $id);
					$query = "DELETE FROM ".$table." WHERE id = :id";
					if(Db::query($query))
					{
						define("alert_success", "Deleted");
					}
					else
					{
						define("alert_error", "Delete Faild");
					}
				}
				else
				{
					define("alert_error", "wrong table");
				}
			}
			else
			{
				define("alert_error", "empty data");
			}
		}
		$this->makejson();
	}

    public function upgrade_user($match="")
    {
        if(Auth::check("admins") && Check::this_referer())
        {
            $uid = strip_tags(Request::post("user_id"));
            $dur = strip_tags(Request::post("duration"));
            $durtype = strip_tags(Request::post("durtype"));
            $time = Upgrade::export_time($dur."-".$durtype);
            $get_user = Getdata::one_user($uid);
            if(!empty($get_user) && is_array($get_user) && $get_user["type"] != "pro")
            {
                $query = "UPDATE users SET `type` = :newtype, `pro_exp` = :exp WHERE id = :uid";
                Db::bind("newtype", "pro");
                Db::bind("exp", $time);
                Db::bind("uid", $get_user["id"]);
                Db::query($query);
                define("alert_success", "Downgrade Account");
            }
            else if($get_user["type"] == "pro")
            {
                $query = "UPDATE users SET `type` = :newtype, `pro_exp` = :exp WHERE id = :uid";
                Db::bind("newtype", "free");
                Db::bind("exp", time()-2);
                Db::bind("uid", $get_user["id"]);
                Db::query($query);
                define("alert_success", "Upgrade Account");
            }
            else
            {
                define("alert_error", "Something went wrong, Please Try again !!");
            }
        }
        else
        {
            define("alert_error", "You need to login first !!");
        }
        $this->makejson();
    }

	public function ajax_status($match="")
	{
		if(Auth::check("admins") && Check::this_referer())
		{
			$tables = array("admins", "exchange", "hits", "payments", "plans", "referrals", "users", "websites", "newsletteres");
			$table  = strip_tags(Request::post("set", "a"));
			$id     = strip_tags(Request::post("id", "i"));
			if(!empty($table) && !empty($id))
			{
				if(in_array($table, $tables))
				{
					Db::bind("id", $id);
					$old = Db::query("SELECT * FROM ".$table." WHERE id = :id");
					$old = $old[0];
					if(!empty($old))
					{
						$query = "UPDATE ".$table." SET `status` = :newstatus WHERE id = :itemid";
						Db::bind("itemid", $old["id"]);
						if($old["status"]=="0")
						{
							Db::bind("newstatus", "1");
							$st = "Disable";
						}
						else
						{
							Db::bind("newstatus", "0");
							$st = "Enable";
						}
						if(Db::query($query))
						{
							define("alert_success", $st);
						}
						else
						{
							define("alert_error", "Update Faild");
						}
					}
					else
					{
						define("alert_error", "wrong data");
					}
				}
				else
				{
					define("alert_error", "wrong table");
				}
			}
			else
			{
				define("alert_error", "empty data");
			}
		}
		$this->makejson();
	}

	public function ajax_confirm($match="")
	{
		if(Auth::check("admins") && Check::this_referer())
		{
			$tables   = array("payments", "referrals", "websites");
			$table = strip_tags(Request::post("set", "a"));
			$id    = strip_tags(Request::post("id", "i"));
			if(!empty($table) && !empty($id))
			{
				if(in_array($table, $tables))
				{
					Db::bind("id", $id);
					$old = Db::query("SELECT * FROM ".$table." WHERE id = :id");
					$old = $old[0];
					if(!empty($old))
					{
						$ex = 0;
						if($table=="referrals")
						{
							if($old["confirmed"] == "0")
							{
								Db::bind("newstatus", "1");
								Db::bind("itemid", $old["id"]);
								$query = "UPDATE `referrals` SET `confirmed` = :newstatus WHERE id = :itemid";
								$ex = Db::query($query);
								if($ex)
								{
									$points = s("defaults/referrals_points");
									Wallet::move($points, "pending", "confirmed", $old["user_id"]);
									define("alert_success", "Confirmed");
								}
								else
								{
									define("alert_error", "Error - Update faild");
								}
							}
							else
							{
								define("alert_error", "Already confirmed");
							}
						}
						else if($table=="websites")
						{
							if($old["activated"] == "0")
							{
								Db::bind("newstatus", "1");
								$stat = "Disable Confirmation";
							}
							else
							{
								Db::bind("newstatus", "0");
								$stat = "Confirm";
							}
							Db::bind("itemid", $old["id"]);
							$query = "UPDATE `websites` SET `activated` = :newstatus WHERE id = :itemid";
							$ex = Db::query($query);
							if($ex)
							{
								define("alert_success",  $stat);
							}
							else
							{
								define("alert_error", "Error - Update faild");
							}
						}
						else if($table=="payments" && $old["confirmed"] == "1")
						{
							Db::bind("id", $old["plan_id"]);
							$plan = Db::query("SELECT * FROM plans WHERE id = :id");
							$plan = $plan[0];
							if(!empty($plan))
							{
								Db::bind("newstatus", "2");
								Db::bind("itemid", $old["id"]);
								$query = "UPDATE `payments` SET `confirmed` = :newstatus WHERE id = :itemid";
								$ex = Db::query($query);
								if($plan["type"]=="upgrade")
								{
									if(Upgrade::up($old["user_id"], $plan["traffic_ratio"], $plan["website_slots"], $plan["session_slots"], $plan["duration"]) && $ex)
									{
										define("alert_success", "Confirmed");
									}
									else
									{
										Db::bind("newstatus", "1");
										Db::bind("itemid", $old["id"]);
										$query = "UPDATE `payments` SET `confirmed` = :newstatus WHERE id = :itemid";
										Db::query($query);
										define("alert_error", "Sorry something went wrong - please try again");
									}
								}
								else if($plan["type"]=="websites")
								{
									if(More::websites($old["user_id"], $plan["website_slots"]) && $ex)
									{
										define("alert_success", "Confirmed");
									}
									else
									{
										Db::bind("newstatus", "1");
										Db::bind("itemid", $old["id"]);
										$query = "UPDATE `payments` SET `confirmed` = :newstatus WHERE id = :itemid";
										Db::query($query);
										define("alert_error", "Sorry something went wrong - please try again");
									}
								}
								else if($plan["type"]=="sessions")
								{
									if(More::sessions($old["user_id"], $plan["session_slots"]) && $ex)
									{
										define("alert_success", "Confirmed");
									}
									else
									{
										Db::bind("newstatus", "1");
										Db::bind("itemid", $old["id"]);
										$query = "UPDATE `payments` SET `confirmed` = :newstatus WHERE id = :itemid";
										Db::query($query);
										define("alert_error", "Sorry something went wrong - please try again");
									}
								}
								else if($plan["type"]=="traffic")
								{
									if(More::traffic($old["user_id"], $plan["points"]) && $ex)
									{
										define("alert_success", "Confirmed");
									}
									else
									{
										Db::bind("newstatus", "1");
										Db::bind("itemid", $old["id"]);
										$query = "UPDATE `payments` SET `confirmed` = :newstatus WHERE id = :itemid";
										Db::query($query);
										define("alert_error", "Sorry something went wrong - please try again");
									}
								}
								else
								{
									define("alert_error", "wrong type");
								}
							}
							else
							{
								define("alert_error", "Sorry this plan it's no more exists");
							}
						}
						else
						{
							define("alert_error", "Already confirmed");
						}
					}
					else
					{
						define("alert_error", "wrong data");
					}
				}
				else
				{
					define("alert_error", "wrong table / status");
				}
			}
			else
			{
				define("alert_error", "empty data");
			}
		}
		$this->makejson();
	}

	public function ajax_add($match="")
	{
		if(Auth::check("admins") && Check::this_referer())
		{
			$type = Request::post("kindofpost");
			if($type=="plan")
			{
				$plan_name     = Request::post("plan_name");
				$plan_type     = Request::post("plan_type");
				$plan_points   = Request::post("plan_points");
				$plan_websites = Request::post("plan_websites");
				$plan_sessions = Request::post("plan_sessions");
				$plan_ratio    = Request::post("plan_ratio");
				$plan_currency = Request::post("plan_currency");
				$plan_duration = Request::post("plan_duration")."-".Request::post("plan_duration_type");
				$plan_price    = Request::post("plan_price");
				$plan_price = $this->double_number($plan_price);
				if(!empty($plan_name) && !empty($plan_type) && !empty($plan_currency))
				{
					$query = "INSERT INTO plans(`name`, `type`, `website_slots`, `session_slots`, `traffic_ratio`, `price`, `currency`, `duration`, `points`, `status`, `created_at`, `updated_at`) VALUES (:name, :type, :website_slots, :session_slots, :traffic_ratio, :price, :currency, :duration, :points, :status, :created_at, :updated_at)";
					if($plan_type == "upgrade")
					{
						Db::bind("name", $plan_name);
						Db::bind("type", "upgrade");
						Db::bind("website_slots", $plan_websites);
						Db::bind("session_slots", $plan_sessions);
						Db::bind("traffic_ratio", $plan_ratio);
						Db::bind("price", $plan_price);
						Db::bind("currency", $plan_currency);
						Db::bind("duration", $plan_duration);
						Db::bind("points", "");
						Db::bind("status", "1");
						Db::bind("created_at", time());
						Db::bind("updated_at", time());
						$ex = Db::query($query);
					}
					else if($plan_type == "traffic")
					{
						Db::bind("name", $plan_name);
						Db::bind("type", "traffic");
						Db::bind("website_slots", "");
						Db::bind("session_slots", "");
						Db::bind("traffic_ratio", "");
						Db::bind("price", $plan_price);
						Db::bind("currency", $plan_currency);
                        Db::bind("duration", "");
						Db::bind("points", $plan_points);
						Db::bind("status", "1");
						Db::bind("created_at", time());
						Db::bind("updated_at", time());
						$ex = Db::query($query);
					}
					else if($plan_type == "websites")
					{
						Db::bind("name", $plan_name);
						Db::bind("type", "websites");
						Db::bind("website_slots", $plan_websites);
						Db::bind("session_slots", "");
						Db::bind("traffic_ratio", "");
						Db::bind("price", $plan_price);
						Db::bind("currency", $plan_currency);
                        Db::bind("duration", "");
						Db::bind("points", "");
						Db::bind("status", "1");
						Db::bind("created_at", time());
						Db::bind("updated_at", time());
						$ex = Db::query($query);
					}
					else if($plan_type == "sessions")
					{
						Db::bind("name", $plan_name);
						Db::bind("type", "sessions");
						Db::bind("website_slots", "");
						Db::bind("session_slots", $plan_sessions);
						Db::bind("traffic_ratio", "");
						Db::bind("price", $plan_price);
						Db::bind("currency", $plan_currency);
                        Db::bind("duration", "");
						Db::bind("points", "");
						Db::bind("status", "1");
						Db::bind("created_at", time());
						Db::bind("updated_at", time());
						$ex = Db::query($query);
					}
					else
					{
						define("alert_error", "Sorry we cannot found this type");
					}
					if($ex)
					{
						define("alert_success", "Plan was added successfully");
					}
					else
					{
						define("alert_error", "Error - something went wrong, Please try again");
					}
				}
				else
				{
					define("alert_error", "Please complete the form");
				}
			}
			else if($type=="admin")
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
								define("alert_success", "Done , a new admin was added.");
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
			}
            else if($type=="user")
			{
				$username  = strtolower(Request::post("username"));
				$email     = Request::post("email");
				$password  = Request::post("password");
				$password2 = Request::post("password2");
				if(!empty($username) && !empty($email) && !empty($password) && Check::is_safe($username, "iaA") && Check::is_email($email))
				{
                    Auth::table("users");
					if(!Auth::check_username($username) && !Auth::check_email($email))
                    {
                        Auth::table("admins");
						if($password==$password2)
						{
							$query = "INSERT INTO `users` (`username`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES (:username, :email, :password, :status, :created_at, :updated_at)";
							Db::bind("username", $username);
							Db::bind("email", $email);
							Db::bind("password", Encryption::encode($password));
							Db::bind("status", "1");
							Db::bind("created_at", time());
							Db::bind("updated_at", time());
							$ex = Db::query($query);
							if($ex)
							{
								define("alert_success", "Done , a new user was added.");
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
			}
		}
		$this->makejson();
	}

	public function ajax_update($match="")
	{
		$id = $match["params"]["id"];
		if(Auth::check("admins") && Check::this_referer() && !empty($id))
		{
			$type = Request::post("kindofpost");
			if($type=="plan")
			{
				$plan_name     = Request::post("plan_name");
				$plan_type     = Request::post("plan_type");
				$plan_points   = Request::post("plan_points");
				$plan_websites = Request::post("plan_websites");
				$plan_sessions = Request::post("plan_sessions");
				$plan_ratio    = Request::post("plan_ratio");
				$plan_currency = Request::post("plan_currency");
				$plan_duration = Request::post("plan_duration")."-".Request::post("plan_duration_type");
				$plan_price    = Request::post("plan_price");
				$plan_price = $this->double_number($plan_price);
				if(!empty($plan_name) && !empty($plan_type) && !empty($plan_currency))
				{
					$query = "UPDATE `plans` SET `name` = :name, `type` = :type, `website_slots` = :website_slots, `session_slots` = :session_slots, `traffic_ratio` = :traffic_ratio, `price` = :price, `currency` = :currency, `duration` = :duration, `points` = :points, `status` = :status, `created_at` = :created_at, `updated_at` = :updated_at WHERE id = :id";
					if($plan_type == "upgrade")
					{
						Db::bind("id", $id);
						Db::bind("name", $plan_name);
						Db::bind("type", "upgrade");
						Db::bind("website_slots", $plan_websites);
						Db::bind("session_slots", $plan_sessions);
						Db::bind("traffic_ratio", $plan_ratio);
						Db::bind("price", $plan_price);
						Db::bind("currency", $plan_currency);
						Db::bind("duration", $plan_duration);
						Db::bind("points", "");
						Db::bind("status", "1");
						Db::bind("created_at", time());
						Db::bind("updated_at", time());
						$ex = Db::query($query);
					}
					else if($plan_type == "traffic")
					{
						Db::bind("id", $id);
						Db::bind("name", $plan_name);
						Db::bind("type", "traffic");
						Db::bind("website_slots", "");
						Db::bind("session_slots", "");
						Db::bind("traffic_ratio", "");
						Db::bind("price", $plan_price);
						Db::bind("currency", $plan_currency);
						Db::bind("points", $plan_points);
						Db::bind("status", "1");
						Db::bind("created_at", time());
						Db::bind("updated_at", time());
						$ex = Db::query($query);
					}
					else if($plan_type == "websites")
					{
						Db::bind("id", $id);
						Db::bind("name", $plan_name);
						Db::bind("type", "websites");
						Db::bind("website_slots", $plan_websites);
						Db::bind("session_slots", "");
						Db::bind("traffic_ratio", "");
						Db::bind("price", $plan_price);
						Db::bind("currency", $plan_currency);
						Db::bind("points", "");
						Db::bind("status", "1");
						Db::bind("created_at", time());
						Db::bind("updated_at", time());
						$ex = Db::query($query);
					}
					else if($plan_type == "sessions")
					{
						Db::bind("id", $id);
						Db::bind("name", $plan_name);
						Db::bind("type", "sessions");
						Db::bind("website_slots", "");
						Db::bind("session_slots", $plan_sessions);
						Db::bind("traffic_ratio", "");
						Db::bind("price", $plan_price);
						Db::bind("currency", $plan_currency);
						Db::bind("points", "");
						Db::bind("status", "1");
						Db::bind("created_at", time());
						Db::bind("updated_at", time());
						$ex = Db::query($query);
					}
					else
					{
						define("alert_error", "Sorry we cannot found this type");
					}
					if($ex)
					{
						define("alert_success", "Plan was updated successfully");
					}
					else
					{
						define("alert_error", "Error - something went wrong, Please try again");
					}
				}
				else
				{
					define("alert_error", "Please complete the form");
				}
			}
			else if($type=="admin")
			{
				$username  = strtolower(Request::post("edit_username"));
				$email     = Request::post("edit_email");
				$password  = Request::post("edit_password");
				$password2 = Request::post("edit_password2");
				$old = Getdata::one_admin($id);
				if(!empty($username) && !empty($email))
				{
					if(Check::is_safe($username, "iaA") && Check::is_email($email))
					{
						if(!Auth::check_username($username) or $old["username"]==$username)
						{
							if(!Auth::check_email($email) or $old["email"]==$email)
							{
								$query = "UPDATE `admins` SET `username` = :username, `email` = :email, `updated_at` = :updated_at WHERE id = :id";
								Db::bind("username", $username);
								Db::bind("email", $email);
								Db::bind("id", $id);
								Db::bind("updated_at", time());
								$ex = Db::query($query);
								if($ex)
								{
									define("alert_success", "Done , Updated.");
								}
								else
								{
									define("alert_error", "Error - something went wrong, Please try again");
								}
							}
							else
							{
								define("alert_error", "This email is already exists please change it!");
							}
						}
						else
						{
							define("alert_error", "This username is already exists please change it!");
						}
					}
					else
					{
						define("alert_error", "characters allowed on username/email is (a-z A-Z 0-9)");
					}
				}
				else if(!empty($password))
				{
					if($password==$password2)
					{
						$query = "UPDATE `admins` SET `password` = :password, `updated_at` = :updated_at WHERE id = :id";
						Db::bind("id", $id);
						Db::bind("password", Encryption::encode($password));
						Db::bind("updated_at", time());
						$ex = Db::query($query);
						if($ex)
						{
							define("alert_success", "Done , Updated.");
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
					define("alert_error", "Please fill out all field !");
				}
			}
			else if($type=="user")
			{
				$username  = strtolower(Request::post("edit_username"));
				$email     = Request::post("edit_email");
				$websites  = Request::post("edit_website_slots", "i");
				$sessions  = Request::post("edit_session_slots", "i");
				$ratio     = Request::post("edit_traffic_ratio", "i");
				$points    = Request::post("edit_points", "i");
				$password  = Request::post("edit_password");
				$password2 = Request::post("edit_password2");
				$old = Getdata::one_user($id);
				if(empty($websites)){ $websites = 0; }
				if(empty($sessions)){ $sessions = 0; }
				if(empty($ratio)){    $ratio = 0; }
				if(empty($points)){   $points = 0; }
				if(!empty($username) && !empty($email))
				{
					if(Check::is_safe($username, "iaA") && Check::is_email($email))
					{
						Auth::table("users");
						if(!Auth::check_username($username) or $old["username"]==$username)
						{
							Auth::table("users");
							if(!Auth::check_email($email) or $old["email"]==$email)
							{
								Auth::table("admins");
								$query = "UPDATE `users` SET `username` = :username, `email` = :email, `website_slots` = :websites, `session_slots` = :sessions, `traffic_ratio` = :ratio, `points` = :points, `updated_at` = :updated_at WHERE id = :id";
								Db::bind("username", $username);
								Db::bind("email", $email);
								Db::bind("websites", $websites);
								Db::bind("sessions", $sessions);
								Db::bind("ratio", $ratio);
								Db::bind("points", $points);
								Db::bind("id", $id);
								Db::bind("updated_at", time());
								$ex = Db::query($query);
								if($ex)
								{
									define("alert_success", "Done , Updated.");
								}
								else
								{
									define("alert_error", "Error - something went wrong, Please try again");
								}
							}
							else
							{
								define("alert_error", "This email is already exists please change it!");
							}
						}
						else
						{
							define("alert_error", "This username is already exists please change it!");
						}
					}
					else
					{
						define("alert_error", "characters allowed on username/email is (a-z A-Z 0-9)");
					}
				}
				else if(!empty($password))
				{
					if($password==$password2)
					{
						$query = "UPDATE `users` SET `password` = :password, `updated_at` = :updated_at WHERE id = :id";
						Db::bind("id", $id);
						Db::bind("password", Encryption::encode($password));
						Db::bind("updated_at", time());
						$ex = Db::query($query);
						if($ex)
						{
							define("alert_success", "Done , Updated.");
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
					define("alert_error", "Please fill out all field !");
				}
			}
			else if($type=="payment")
			{
				$user_id    = Request::post("edit_payment_user_id");
				$plan_id    = Request::post("edit_payment_plan_id");
				$payment_id = Request::post("edit_payment_id");
				$kind       = Request::post("edit_payment_kind");
				$amount     = Request::post("edit_payment_amount");
				$currency   = Request::post("edit_payment_currency");
				$service    = Request::post("edit_payment_service");
				$info       = Request::post("edit_payment_info");
				$amount     = $this->double_number($amount);
				$query = "UPDATE `payments` SET `user_id` = :user_id, `plan_id` = :plan_id, `payment_id` = :payment_id, `kind` = :kind, `amount` = :amount, `currency` = :currency, `payment_service` = :service, `payment_info` = :info WHERE id = :id";
				Db::bind("id", $id);
				Db::bind("user_id", $user_id);
				Db::bind("plan_id", $plan_id);
				Db::bind("payment_id", $payment_id);
				Db::bind("kind", $kind);
				Db::bind("amount", $amount);
				Db::bind("currency", $currency);
				Db::bind("service", $service);
				Db::bind("info", $info);
				$ex = Db::query($query);
				if($ex)
				{
					define("alert_success", "Done , Payment Updated.");
				}
				else
				{
					define("alert_error", "Error - something went wrong, Please try again");
				}
			}
			else if($type=="website")
			{
				$user_id     = Request::post("edit_user_id");
				$website_url = Request::post("edit_website_url");
				$website_max_hits      = Request::post("edit_website_max_hits");
				$website_max_hour_hits = Request::post("edit_website_max_hour_hits");
				$website_duration      = Request::post("edit_website_duration");
				$website_source        = Request::post("edit_website_source");
                $website_useragent     = Request::post("edit_website_useragent");
                $get_target            = Request::post("edit_website_geotarget");
                if(!empty($get_target) && is_array($get_target))
                {
                    $geo_targeting = "";
                    $list_of_countries = array_keys(s("geotarget/list"));
                    foreach($get_target as $target)
                    {
                        if(in_array($target, $list_of_countries))
                        {
                            $geo_targeting .= "[".$target."]";
                        }
                    }
                }
                else
                {
                    $geo_targeting = "[ALL]";
                }
				$query = "UPDATE `websites` SET `user_id` = :user_id, `url` = :url, `max_hits` = :max_hits, `max_hour_hits` = :max_hour_hits, `duration` = :duration, `source` = :source, `useragent` = :useragent, `geolocation` = :geolocation, `updated_at` = :uat WHERE id = :id";
				Db::bind("id", $id);
				Db::bind("user_id", $user_id);
				Db::bind("url", $website_url);
				Db::bind("max_hits", $website_max_hits);
				Db::bind("max_hour_hits", $website_max_hour_hits);
				Db::bind("duration", $website_duration);
				Db::bind("source", $website_source);
                Db::bind("useragent", $website_useragent);
                Db::bind("geolocation", $geo_targeting);
				Db::bind("uat", time());
				$ex = Db::query($query);
				if($ex)
				{
					define("alert_success", "Done , Website Updated.");
				}
				else
				{
					define("alert_error", "Error - something went wrong, Please try again");
				}
			}
		}
		$this->makejson();
	}
}
?>
