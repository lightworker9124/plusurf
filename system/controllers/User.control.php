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

class User extends BaseController
{

    private $exptime      = 1000;
    private $max_username = 15;
    private $min_username = 5;
    private $max_email    = 60;
    private $min_email    = 4;
    private $max_password = 100;
    private $min_password = 4;
	public $country_list = '{"1afg":"Afghanistan","2alb":"Albania","3alg":"Algeria","4ame":"American Samoa","5and":"Andorra","6ang":"Angola","7ang":"Anguilla","8ant":"Antigua & Barbuda","9arg":"Argentina","10arm":"Armenia","11aru":"Aruba","12aus":"Australia","13aus":"Austria","14aze":"Azerbaijan","15bah":"Bahamas","16bah":"Bahrain","17ban":"Bangladesh","18bar":"Barbados","19bel":"Belarus","20bel":"Belgium","21bel":"Belize","22ben":"Benin","23ber":"Bermuda","24bhu":"Bhutan","25bol":"Bolivia","26bon":"Bonaire","27bos":"Bosnia & Herzegovina","28bot":"Botswana","29bra":"Brazil","30bri":"British Indian Ocean Ter","31bru":"Brunei","32bul":"Bulgaria","33bur":"Burkina Faso","34bur":"Burundi","35cam":"Cambodia","36cam":"Cameroon","37can":"Canada","38can":"Canary Islands","39cap":"Cape Verde","40cay":"Cayman Islands","41cen":"Central African Republic","42cha":"Chad","43cha":"Channel Islands","44chi":"Chile","45chi":"China","46chr":"Christmas Island","47coc":"Cocos Island","48col":"Colombia","49com":"Comoros","50con":"Congo","51coo":"Cook Islands","52cos":"Costa Rica","53cot":"Cote D\'Ivoire","54cro":"Croatia","55cub":"Cuba","56cur":"Curacao","57cyp":"Cyprus","58cze":"Czech Republic","59den":"Denmark","60dji":"Djibouti","61dom":"Dominica","62dom":"Dominican Republic","63eas":"East Timor","64ecu":"Ecuador","65egy":"Egypt","66el ":"El Salvador","67equ":"Equatorial Guinea","68eri":"Eritrea","69est":"Estonia","70eth":"Ethiopia","71fal":"Falkland Islands","72far":"Faroe Islands","73fij":"Fiji","74fin":"Finland","75fra":"France","76fre":"French Guiana","77fre":"French Polynesia","78fre":"French Southern Ter","79gab":"Gabon","80gam":"Gambia","81geo":"Georgia","82ger":"Germany","83gha":"Ghana","84gib":"Gibraltar","85gre":"Great Britain","86gre":"Greece","87gre":"Greenland","88gre":"Grenada","89gua":"Guadeloupe","90gua":"Guam","91gua":"Guatemala","92gui":"Guinea","93guy":"Guyana","94hai":"Haiti","95haw":"Hawaii","96hon":"Honduras","97hon":"Hong Kong","98hun":"Hungary","99ice":"Iceland","100ind":"India","101ind":"Indonesia","102ira":"Iran","103ira":"Iraq","104ire":"Ireland","105isl":"Isle of Man","106ita":"Italy","107isr":"Israil","108jam":"Jamaica","109jap":"Japan","110jor":"Jordan","111kaz":"Kazakhstan","112ken":"Kenya","113kir":"Kiribati","114kor":"Korea North","115kor":"Korea South","116kuw":"Kuwait","117kyr":"Kyrgyzstan","118lao":"Laos","119lat":"Latvia","120leb":"Lebanon","121les":"Lesotho","122lib":"Liberia","123lib":"Libya","124lie":"Liechtenstein","125lit":"Lithuania","126lux":"Luxembourg","127mac":"Macau","128mac":"Macedonia","129mad":"Madagascar","130mal":"Malaysia","131mal":"Malawi","132mal":"Maldives","133mal":"Mali","134mal":"Malta","135mar":"Marshall Islands","136mar":"Martinique","137mau":"Mauritania","138mau":"Mauritius","139may":"Mayotte","140mex":"Mexico","141mid":"Midway Islands","142mol":"Moldova","143mon":"Monaco","144mon":"Mongolia","145mon":"Montserrat","146mor":"Morocco","147moz":"Mozambique","148mya":"Myanmar","149nam":"Nambia","150nau":"Nauru","151nep":"Nepal","152net":"Netherland Antilles","153net":"Netherlands (Holland, Europe)","154nev":"Nevis","155new":"New Caledonia","156new":"New Zealand","157nic":"Nicaragua","158nig":"Niger","159nig":"Nigeria","160niu":"Niue","161nor":"Norfolk Island","162nor":"Norway","163oma":"Oman","164pak":"Pakistan","165pal":"Palau Island","166pal":"Palestine","167pan":"Panama","168pap":"Papua New Guinea","169par":"Paraguay","170per":"Peru","171phi":"Philippines","172pit":"Pitcairn Island","173pol":"Poland","174por":"Portugal","175pue":"Puerto Rico","176qat":"Qatar","177rep":"Republic of Montenegro","178rep":"Republic of Serbia","179reu":"Reunion","180rom":"Romania","181rus":"Russia","182rwa":"Rwanda","183st ":"St Barthelemy","184st ":"St Eustatius","185st ":"St Helena","186st ":"St Kitts-Nevis","187st ":"St Lucia","188st ":"St Maarten","189st ":"St Pierre & Miquelon","190st ":"St Vincent & Grenadines","191sai":"Saipan","192sam":"Samoa","193sam":"Samoa American","194san":"San Marino","195sao":"Sao Tome & Principe","196sau":"Saudi Arabia","197sen":"Senegal","198ser":"Serbia","199sey":"Seychelles","200sie":"Sierra Leone","201sin":"Singapore","202slo":"Slovakia","203slo":"Slovenia","204sol":"Solomon Islands","205som":"Somalia","206sou":"South Africa","207spa":"Spain","208sri":"Sri Lanka","209sud":"Sudan","210sur":"Suriname","211swa":"Swaziland","212swe":"Sweden","213swi":"Switzerland","214syr":"Syria","215tah":"Tahiti","216tai":"Taiwan","217taj":"Tajikistan","218tan":"Tanzania","219tha":"Thailand","220tog":"Togo","221tok":"Tokelau","222ton":"Tonga","223tri":"Trinidad & Tobago","224tun":"Tunisia","225tur":"Turkey","226tur":"Turkmenistan","227tur":"Turks & Caicos Is","228tuv":"Tuvalu","229uga":"Uganda","230ukr":"Ukraine","231uni":"United Arab Emirates","232uni":"United Kingdom","233uni":"United States of America","234uru":"Uruguay","235uzb":"Uzbekistan","236van":"Vanuatu","237vat":"Vatican City State","238ven":"Venezuela","239vie":"Vietnam","240vir":"Virgin Islands (Brit)","241vir":"Virgin Islands (USA)","242wak":"Wake Island","243wal":"Wallis & Futana Is","244yem":"Yemen","245zai":"Zaire","246zam":"Zambia","247zim":"Zimbabwe"}';
    public $user_agents = array(
                              "all" => "Random",
                              "firefox" => "Firefox",
                              "chrome" => "Chrome",
                              "opera" => "Opera",
                              "ie" => "Internet Explorer",
                              "safari" => "Safari",
                              "android" => "Android (phones/tablets)",
                              "iphone" => "Iphone",
                              "ipad" => "Ipad"
                              );
	function __construct()
	{
		if(!Check::is_routed("noref")) { Request::requiressl(); }
		$this->put_whois_online();
		if(Check::is_table("settings"))
		{
			Settings::load();
		}
		Auth::table("users");
		if(Auth::check("users"))
		{
			$websites_count = Getdata::howmany("websites WHERE user_id = ".u('id'));
            Exchange::info(Auth::info());
			set("websites_count", $websites_count);
			set("sessions_count", Exchange::active_now());
			$realtime = Request::get("statistic");
			if($realtime == "realtime" && Check::this_referer() && Request::is_ajax())
			{
				header('Content-Type: application/json');
				$this_month = ltrim(date("m"), "0");
				echo json_encode(array(
				"sessions" => get("sessions_count"),
				"websites" => get("websites_count"),
				"hits" => Hits::hits_in_month($this_month),
				"points" => Hits::points_in_month($this_month),
				"allpoints" => u("points"),
				"month" => $this_month-1
				));
				exit();
			}
			Paypal::settings(array(
			"mode"      => s("payments/paypal/mode"),
			"username"  => s("payments/paypal/username"),
			"password"  => s("payments/paypal/password"),
			"signature" => s("payments/paypal/signature"),
			"callback"  => router("paypal_payment_process"),
			"cancel"    => router("payments")."?cancel=true"
			));
			Payza::settings(array(
			"mode"      => s("payments/payza/mode"),
			"email"     => s("payments/payza/email"),
			"callback"  => router("payza_payment_process"),
			"cancel"    => router("payments")."?cancel=true"
			));
			if(u("type")=="pro")
			{
				if(u("pro_exp") < time())
				{
					Upgrade::down(u("id"), s("defaults/traffic_ratio"), s("defaults/website_slots"), s("defaults/session_slots"));
				}
			}
			$check_sold = floor(u("points") > 0.6);
			if($check_sold)
			{
				Points::active_websites(u("id"));
			}
			else
			{
				Points::stop_websites(u("id"));
			}
			$stripe = s("payments/stripe/secret_key");
			if(!empty($stripe))
			{
				Stripe\Stripe::setApiKey($stripe);
			}
		}
	}

	public function logout()
	{
		Auth::logout();
		to_router("home");
	}

	public function index()
	{
		if(Auth::check("users"))
		{
			set("title2", l("dashboard"));
			Template::view("dashboard");
		}
		else
		{
			to_router("home");
		}
	}

	public function referrals()
	{
		if(Auth::check("users"))
		{
			Wallet::create(u("id"));
			$pagination = Pagination::build(router("referrals"), "referrals WHERE status ='1' and user_id = ".u("id"), 20);
			$referrals  = Getdata::user_active_referrals(u("id"), $pagination[0], $pagination[1]);
			set("referrals", $referrals);
			set("pagination", $pagination[2]);
			$info = Wallet::info(u("id"));
			set("info", $info);
			set("title2", l("referrals"));
			Template::view("referrals");
		}
		else
		{
			to_router("login");
		}
	}

	public static function noref($match="")
	{
        if(Request::is_ajax())
        {
            exit("");
        }
        Request::nossl();
		$id = Encryption::decode(strip_tags($match["params"]["id"]));
        $sid = Encryption::decode(strip_tags($match["params"]["sid"]));
		$getid = explode("-", $id);
		$website = Getdata::one_active_website($getid[0]);
		if($getid[0] == "noexchange")
		{
			Session::set("current_exchange".$sid, "noexchange");
			$url = urldecode(s("defaults/website"));
			echo '<meta name="referrer" content="no-referrer"><a id="sendurl" rel="noreferrer" href="'.$url.'" ></a><form id="submitform" method="get" action="'.$url.'" ></form><script>document.getElementById(\'sendurl\').click();</script><script>document.getElementById(\'submitform\').submit();</script>';
			echo '<meta http-equiv="refresh" content="1;url='.$url.'">';
		}
		else if(!empty($website))
		{
			$ipcheck = s("exchange/ipcheck");
			$referer = strip_tags($_SERVER["HTTP_REFERER"]);
			$refhost = "";
			$webhost = "";
			if(!empty($referer)) {
				$refhost = parse_url($referer);
				$refhost = $refhost["HOST"];
			}
			if(!empty($website["source"])) {
				$webhost = parse_url($website["source"]);
				$webhost = $webhost["HOST"];
			}
			if($refhost == $webhost && $ipcheck == "all" || $ipcheck != "all" || $website["source"] == "")
			{
				Session::set("current_exchange".$sid, $website["id"]);
				$url = urldecode($website["url"]);
				echo '<meta name="referrer" content="no-referrer"><a id="sendurl" rel="noreferrer" href="'.$url.'" ></a><form id="submitform" method="get" action="'.$url.'" ></form><script>document.getElementById(\'sendurl\').click();</script><script>document.getElementById(\'submitform\').submit();</script>';
				echo '<meta http-equiv="refresh" content="1;url='.$url.'">';
			}
			else {
				echo "<script>setTimeout(function(){ window.open('', '_self', ''); window.close(); }, 2000);</script><i>Please install the browser extension first</i>";
			}

		}
		else
		{
            Session::set("current_exchange".$sid, "none");
			to_router("404");
		}
	}

	public function ajax_browsing($match="")
	{
		$uid = strip_tags(Encryption::decode($match["params"]["uid"]));
        $sid = strip_tags(Encryption::decode($match["params"]["sid"]));
		$run = array(
			"status" => false,
			"open_status" => false,
			"show_url" => "",
			"url" => "",
			"duration" => "0",
			"browse" => "",
			"points" => "0",
            "message" => false
		);
		if(Request::is_ajax() && is_numeric($uid) && is_numeric($sid) && Exchange::check(Getdata::one_active_user($uid), Getdata::one_active_exchange($sid)))
        {
            if(Check::this_referer() && Exchange::check_session($uid, $sid))
            {
                $user = Getdata::one_user($uid);
                Exchange::info($user);
                $run = Exchange::run($sid);
            }
        }
        header('Content-Type: application/json');
		echo json_encode($run, true);
	}

	public function browsing()
	{
		if(Auth::check("users"))
		{
            $delid = strip_tags(Request::post("delid", "i"));
			if(!empty($delid) && Request::is_ajax())
			{
				$delexchange = Getdata::one_active_exchange($delid);
				if(!empty($delexchange) && $delexchange["user_id"]==u("id"))
				{
					Db::bind("id", $delexchange["id"]);
					Db::query("DELETE FROM exchange WHERE id = :id");
					define("alert_success", "deleted");
				}
				$this->makejson();
			}
            $clearid = Encryption::decode(strip_tags(Request::post("clearid")));
			if(is_numeric($clearid) && !empty($clearid) && Request::is_ajax())
			{
				$celexchange = Getdata::one_active_exchange($clearid);
				if(!empty($celexchange) && $celexchange["user_id"]==u("id"))
				{
                    Exchange::info(Auth::info());
					Exchange::clear($celexchange["id"]);
					define("alert_success", "Cleared");
				}
				$this->makejson();
			}
            $add = Request::get("add");
            if($add=="new")
            {

                Exchange::info(Auth::info());
                if(Exchange::add())
                {

                    define("alert_success", l("success_added"));
                }
                else
                {
                    define("alert_error", l("error_upgrade"));
                }


            }
            $id = u("id");
            $pagination = Pagination::build(router("browsing"), array(
                "query" => "exchange WHERE status = :status and user_id = :uid",
                "binds" => array(
                    "status" => "1",
                    "uid" => u("id")
                )), 20);
            $sessions = Getdata::user_active_exchanges($id, $pagination[0], $pagination[1]);
            set("sessions", $sessions);
            set("pagination", $pagination[2]);
			set("title2", l("traffic_exchange"));
			Template::view("browsing");
		}
		else
		{
			to_router("login");
		}
	}

	public function browsing_process($match="")
	{
        $uid = strip_tags(Encryption::decode($match["params"]["uid"]));
        $sid = strip_tags(Encryption::decode($match["params"]["sid"]));
        $start = strip_tags(Request::get("start"));
		if(Exchange::check_session($uid, $sid))
		{
			$cancel = strip_tags(Request::get("cancel"));
            $user = Getdata::one_user($uid);
			if(!empty($cancel) && !empty($user))
			{
				$cexchange = Getdata::one_active_exchange($sid);
				if(!empty($cexchange) && $cexchange["user_id"]==$user["id"])
				{
                    Exchange::info($user);
					Exchange::clear($cexchange["id"]);
					to_router("browsing_process",
					array(
						"sid" => Encryption::encode($sid),
						"uid" => Encryption::encode($uid)
					));
				}
			}
            $clearid = Encryption::decode(strip_tags(Request::post("clearid")));
			if(is_numeric($clearid) && !empty($clearid) && Request::is_ajax())
			{
				$celexchange = Getdata::one_active_exchange($clearid);
				if(!empty($celexchange) && $celexchange["user_id"]==$user["id"])
				{
                    Exchange::info($user);
					Exchange::clear($celexchange["id"]);
					define("alert_success", "Cleared");
				}
				$this->makejson();
			}

			$reportid = Encryption::decode(strip_tags(Request::post("reportid")));
			if(is_numeric($reportid) && !empty($reportid) && Request::is_ajax())
			{
				$repexchange = Getdata::one_active_website($reportid);
				if(!empty($repexchange) && is_array($repexchange) && $repexchange["reported"] != "1")
				{
                    Db::bind("id", $repexchange["id"]);
					Db::bind("reported", "1");
					Db::query("UPDATE websites SET `reported` = :reported WHERE id = :id");
					define("alert_success", l("reported", "Reported, Thank you"));
				}
				else if(!empty($repexchange) && is_array($repexchange) && $repexchange["reported"] == "1"){
					define("alert_success", l("reported", "Reported, Thank you"));
				}
				$this->makejson();
			}

            if(Exchange::is_active($sid))
            {
                to_router("browsing");
            }
            if(!empty($start))
            {
                exit("<title>Connecting...</title>Connecting...");
            }
            set("u", $user);
            set("points", $user["points"]);
            set("uid", Encryption::encode($uid));
            set("sid", Encryption::encode($sid));
			if(Exchange::check($user, Getdata::one_active_exchange($sid)))
			{
				set("title2", l("traffic_exchange"));
				Template::view("browsing_process");
			}
			else {
				set("title2", l("traffic_exchange"));
				define("alert_error", "(".Sys::ip().") ".l("ip_used", "This IP is already used in a session"));
				Template::view("browsing_started");
			}
		}
		else
		{
			to_router("404");
		}
	}

	public function websites($match="")
	{
		if(Auth::check("users"))
		{
            set("useragents", $this->user_agents);
			$addurl = Request::post("website_url");
			if(!empty($addurl) && Request::is_ajax())
			{
				$this->add_website();
				$this->makejson();
			}
			$updateurl = Request::post("update_website_url");
			if(!empty($updateurl) && Request::is_ajax())
			{
				$this->update_website();
				$this->makejson();
			}
			$loadid = strip_tags(Request::post("loadid", "i"));
			if(!empty($loadid) && Request::is_ajax())
			{
				$website = Getdata::one_active_website($loadid);
				if(!empty($website) && is_array($website))
				{
					if($website["max_hits"]=="0")
					{
						$checked1 = "checked=''";
						$checked2 = "";
						$display  = "display: none;";
					}
					else
					{
						$checked2 = "checked=''";
						$checked1 = "";
						$display  = "display: block;";
					}
					if(empty($website["source"]))
					{
						$sourcestatus = "noreferer";
					}
					else
					{
						$sourcestatus = "custom";
					}
                    $locations = $website["geolocation"];
                    $exlocation = explode("]", $locations);
                    $new_location = array();
                    if(!empty($exlocation) && is_array($exlocation))
                    {
                        foreach($exlocation as $loc)
                        {
                            $loc = str_replace(array("[", "]"), "", $loc);
                            if(!empty($loc))
                            {
                                $new_location[] = $loc;
                            }
                        }
                    }
					$datashow = Template::build_row("edit_website",
					array(
					"urlform" => router("websites"),
					"web_address" => l("web_address"),
					"web_example_url" => l("web_example_url"),
					"visit_duration" => l("visit_duration"),
					"traffic_source" => l("traffic_source"),
					"source_options" => Template::options(array("noreferer" => l("no_referer"), "custom" => l("custom_referer")), $sourcestatus, "return"),
					"point" => l("point"),
                    "lng_geo_target" => l("get_target", "Geo Targeting"),
                    "lng_user_agent" => l("user_agent", "User Agent"),
                    "select_location" => Template::options(s("geotarget/list"), $new_location, "return"),
                    "select_useragent" => Template::options(get("useragents"), $website["useragent"], "return"),
					"visitor" => l("visitor"),
					"max_per_hour" => l("max_per_hour"),
					"limit_total_hits" => l("limit_total_hits"),
					"unlimited" => l("unlimited"),
					"limited" => l("limited"),
					"update" => l("update"),
					"close" => l("close"),
					"checked1" => $checked1,
					"checked2" => $checked2,
					"sm_input_display" => $display,
					"url_value" => urldecode($website["url"]),
					"duration_value" => $website["duration"],
					"source" => $website["source"],
					"website_id" => $website["id"],
					"max_hour_value" => $website["max_hour_hits"],
					"total_value" => $website["max_hits"]
					));
					define("alert_success", $datashow);
					$this->makejson();
				}
				else
				{
					define("alert_success", l("error_found"));
					$this->makejson();
				}
			}
			$delid = strip_tags(Request::post("delid", "i"));
			if(!empty($delid) && Request::is_ajax())
			{
				$delwebsite = Getdata::one_active_website($delid);
				if(!empty($delwebsite) && $delwebsite["user_id"]==u("id"))
				{
					Db::bind("id", $delwebsite["id"]);
					Db::query("DELETE FROM websites WHERE id = :id");
					define("alert_success", "deleted");
				}
				$this->makejson();
			}
			$runid = strip_tags(Request::post("runid", "i"));
			if(!empty($runid) && Request::is_ajax())
			{
				$runwebsite = Getdata::one_active_website($runid);
				if(!empty($runwebsite) && $runwebsite["user_id"]==u("id"))
				{
					if($runwebsite["enabled"]=="0")
					{
						Db::bind("id", $runwebsite["id"]);
						Db::query("UPDATE websites SET `enabled` = '1' WHERE id = :id");
						define("alert_success", "deleted");
					}
					else
					{
						Db::bind("id", $runwebsite["id"]);
						Db::query("UPDATE websites SET `enabled` = '0' WHERE id = :id");
						define("alert_success", "deleted");
					}
				}
				$this->makejson();
			}
			$pagination = Pagination::build(router("websites"), "websites WHERE status ='1' and user_id = ".u("id"), 20);
			$websites   = Getdata::user_active_websites(u("id"), $pagination[0], $pagination[1]);
			set("websites", $websites);
			set("pagination", $pagination[2]);
			set("title2", l("my_websites"));
			Template::view("websites");
		}
		else
		{
			to_router("login");
		}
	}

	public function payments()
	{
		if(Auth::check("users"))
		{
			set("title2", l("payments"));
			$currency = strtoupper(Request::get("currency"));
			if(!empty($currency))
			{
				if(in_array($currency, array_keys(s("currency"))))
				{
					Session::set("currency", $currency);
				}
				Request::redir_to_referer();
			}
			else
			{
				$current_currency = Session::get("currency");
				if(empty($current_currency))
				{
					if(in_array($current_currency, array_keys(s("currency"))))
					{
						Session::set("currency", $current_currency);
					}
					else{
						Session::set("currency", s("generale/currency"));
					}
				}
			}
			$cur = Session::get("currency");
			if($_GET["upgrade"]=="true")
			{
				Db::bind("type", "upgrade");
				Db::bind("status", "1");
				Db::bind("cur", $cur);
				$plans = Db::query("SELECT * FROM plans WHERE currency = :cur and type = :type and status = :status");
				set("plans", $plans);
			} else if($_GET["traffic"]=="true")
			{
				Db::bind("type", "traffic");
				Db::bind("status", "1");
				Db::bind("cur", $cur);
				$plans = Db::query("SELECT * FROM plans WHERE currency = :cur and type = :type and status = :status");
				set("plans", $plans);
			} else if($_GET["websites"]=="true")
			{
				Db::bind("type", "websites");
				Db::bind("status", "1");
				Db::bind("cur", $cur);
				$plans = Db::query("SELECT * FROM plans WHERE currency = :cur and type = :type and status = :status");
				set("plans", $plans);
			} else if($_GET["sessions"]=="true")
			{
				Db::bind("type", "sessions");
				Db::bind("status", "1");
				Db::bind("cur", $cur);
				$plans = Db::query("SELECT * FROM plans WHERE currency = :cur and type = :type and status = :status");
				set("plans", $plans);
			} else if($_GET["success"]=="true")
			{
				set("title2", l("done"));
			} else if($_GET["cancel"]=="true")
			{
				set("title2", l("canceled"));
			} else
			{
				$pagination = Pagination::build(router("payments"), "payments WHERE status ='1' and user_id = ".u("id"), 20);
				$payments   = Getdata::user_active_payments(u("id"), $pagination[0], $pagination[1]);
				set("payments", $payments);
				set("pagination", $pagination[2]);
			}
			Template::view("payments");
		}
		else
		{
			to_router("login");
		}
	}

	public function checkout($match="")
	{
		if(Auth::check("users"))
		{
			$planid = strip_tags(Encryption::decode($match["params"]["id"]));
			Db::bind("id", $planid);
			$getplan = Db::query("SELECT * FROM `plans` WHERE id = :id");
			$plan = $getplan[0];
			if(!empty($plan) && is_array($plan))
			{
				if($plan["price"] > 0)
				{
					set("plan", $plan);
					set("title2", l("checkout"));
					Template::view("checkout");
				}
				else
				{
					to_router("payments");
				}
			}
			else
			{
				to_router("payments");
			}
		}
		else
		{
			to_router("404");
		}
	}

	public function paypal_redirect($match="")
	{
		if(Auth::check("users"))
		{
			$planid = strip_tags(Encryption::decode($match["params"]["id"]));
			Db::bind("id", $planid);
			$getplan = Db::query("SELECT * FROM `plans` WHERE id = :id");
			if(!empty($getplan[0]) && is_array($getplan[0]))
			{
				Paypal::redirect($getplan[0]["id"]);
			}
			else
			{
				to_router("payments");
			}
		}
		else
		{
			to_router("login");
		}
	}

	public function affiliate_payment_process($match="")
	{
		if(Auth::check("users") && Check::this_referer())
		{
			Wallet::create(u("id"));
			$planid = strip_tags(Encryption::decode(Request::post("plan")));
			Db::bind("id", $planid);
			$plan = Db::query("SELECT * FROM plans WHERE id = :id");
			$plan = $plan[0];
			$wallet = Wallet::info(u("id"));
			if(empty($plan) or empty($wallet))
			{
				header("location: ".router("payments")."?cancel=true&error=soldorplan");
				exit();
			}
			$convert = USD_Convert::convert($plan["price"], $plan["currency"]);
			if(!$convert)
			{
				header("location: ".router("payments")."?cancel=true&error=convert");
				exit();
			}
			if($wallet["confirmed_sold"] >= $convert)
			{
				if(!empty($plan) && is_array($plan))
				{
					Db::bind("user_id", u("id"));
					Db::bind("plan_id", $plan["id"]);
					Db::bind("kind", $plan["name"]);
					Db::bind("payment_id", md5(Encryption::generate(4)));
					Db::bind("amount", $plan["price"]);
					Db::bind("currency", $plan["currency"]);
					Db::bind("ip", Sys::ip());
					Db::bind("confirmed", "2");
					Db::bind("service", "referrals");
					Db::bind("info", "-".$convert." USD from confirmed sold");
					Db::bind("status", "1");
					Db::bind("cat", time());
					Db::bind("uat", time());
					$query = "INSERT INTO payments(`user_id`, `plan_id`, `kind`, `payment_id`, `amount`, `currency`, `ip`, `confirmed`, `payment_service`, `payment_info`, `status`, `created_at`, `updated_at`) VALUES(:user_id, :plan_id, :kind, :payment_id, :amount, :currency, :ip, :confirmed, :service, :info, :status, :cat, :uat)";
					if(Db::query($query))
					{
						$remove = Wallet::remove($convert, "confirmed", u("id"));
						if(!$remove) { header("location: ".router("payments")."?cancel=true&error=removesold"); exit(); }
						if($plan["type"]=="upgrade")
						{
							if(Upgrade::up(u("id"), $plan["traffic_ratio"], $plan["website_slots"], $plan["session_slots"], $plan["duration"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else if($plan["type"]=="websites")
						{
							if(More::websites(u("id"), $plan["website_slots"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else if($plan["type"]=="sessions")
						{
							if(More::sessions(u("id"), $plan["session_slots"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else if($plan["type"]=="traffic")
						{
							if(More::traffic(u("id"), $plan["points"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else
						{
							header("location: ".router("payments")."?success=false");
						}
					}
					else
					{
						header("location: ".router("contact"));
					}
				}
			}
			else
			{
				header("location: ".router("payments")."?cancel=true&error=soldorplan");
			}
		}
		else
		{
			to_router("login");
		}
	}

	public function stripe_payment_process($match="")
	{
		if(Auth::check("users") && Check::this_referer() )
		{
			$token  = Request::post("stripeToken");
			$planid = strip_tags(Encryption::decode(Request::post("plan")));
			$resp = "";
			$plan_info = Getdata::one_plan($planid);
			if(!empty($plan_info) && is_array($plan_info))
			{
				$convert = USD_Convert::convert($plan_info["price"], $plan_info["currency"]);
			} else { $convert = false; }
			if($convert)
			{
				try
				{
					if (!isset($token)){ throw new Exception("The Stripe Token was not generated correctly"); }
					$customer = Stripe\Customer::create(array(
						'email' => u("email"),
						'card'  => $token
					));

					$charge = Stripe\Charge::create(array(
						'customer' => $customer->id,
						'amount'   => round($convert*100, 0, PHP_ROUND_HALF_UP),
						'currency' => 'usd'
					));
					$resp = "success";
				}
				catch(Exception $e)
				{
					$resp = "error";
					$error = $e->getMessage();
				}
			}
			else
			{
				$resp = "error";
				$error = "error convert or plan";
			}
			Db::bind("stripe", $token);
			$pay = Db::query("SELECT * FROM payments WHERE payment_service = 'stripe' and payment_info = :stripe");
			if(!empty($pay[0]) or $resp == "error")
			{
				header("location: ".router("payments")."?cancel=true&error=".urlencode($error));
				exit("payment canceled");
			}

			Db::bind("id", $planid);
			$plan = Db::query("SELECT * FROM plans WHERE id = :id");
			$plan = $plan[0];
			if($resp == "success" && !empty($plan))
			{
				if(is_array($plan))
				{
					Db::bind("user_id", u("id"));
					Db::bind("plan_id", $plan["id"]);
					Db::bind("kind", $plan["name"]);
					Db::bind("payment_id", md5(Encryption::generate(4)));
					Db::bind("amount", $plan["price"]);
					Db::bind("currency", $plan["currency"]);
					Db::bind("ip", Sys::ip());
					Db::bind("confirmed", "2");
					Db::bind("service", "stripe");
					Db::bind("info", $token);
					Db::bind("status", "1");
					Db::bind("cat", time());
					Db::bind("uat", time());
					$query = "INSERT INTO payments(`user_id`, `plan_id`, `kind`, `payment_id`, `amount`, `currency`, `ip`, `confirmed`, `payment_service`, `payment_info`, `status`, `created_at`, `updated_at`) VALUES(:user_id, :plan_id, :kind, :payment_id, :amount, :currency, :ip, :confirmed, :service, :info, :status, :cat, :uat)";
					if(Db::query($query))
					{
						if($plan["type"]=="upgrade")
						{
							if(Upgrade::up(u("id"), $plan["traffic_ratio"], $plan["website_slots"], $plan["session_slots"], $plan["duration"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else if($plan["type"]=="websites")
						{
							if(More::websites(u("id"), $plan["website_slots"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else if($plan["type"]=="sessions")
						{
							if(More::sessions(u("id"), $plan["session_slots"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else if($plan["type"]=="traffic")
						{
							if(More::traffic(u("id"), $plan["points"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else
						{
							header("location: ".router("payments")."?success=false");
						}
					}
					else
					{
						header("location: ".router("contact"));
					}
				}
				else
				{
					header("location: ".router("payments")."?cancel=true&error=plan");
				}
			}
			else
			{
				header("location: ".router("payments")."?cancel=true");
			}
		}
		else
		{
			to_router("login");
		}
	}

	public function paypal_payment_process($match="")
	{
		$validsession = Session::get("paypal");
		if(Auth::check("users") && $validsession=="yes")
		{
			Session::set("paypal", "no");
			$callback = Paypal::callback();
			Db::bind("ppl", $callback["token"]);
			$pay = Db::query("SELECT * FROM payments WHERE payment_service = 'paypal' and payment_info = :ppl");
			if(!empty($pay[0]))
			{
				header("location: ".router("payments")."?cancel=true");
				exit();
			}
			if($callback["status"]=="completed")
			{
				$info = Paypal::info($callback["token"]);
				Db::bind("id", $callback["id"]);
				$plan = Db::query("SELECT * FROM plans WHERE id = :id");
				$plan = $plan[0];
				if(!empty($plan) && is_array($plan))
				{
					Db::bind("user_id", u("id"));
					Db::bind("plan_id", $plan["id"]);
					Db::bind("kind", $plan["name"]);
					Db::bind("payment_id", md5(Encryption::generate(4)));
					Db::bind("amount", $plan["price"]);
					Db::bind("currency", $plan["currency"]);
					Db::bind("ip", Sys::ip());
					Db::bind("confirmed", "2");
					Db::bind("service", "paypal");
					Db::bind("info", $callback["token"]);
					Db::bind("status", "1");
					Db::bind("cat", time());
					Db::bind("uat", time());
					$query = "INSERT INTO payments(`user_id`, `plan_id`, `kind`, `payment_id`, `amount`, `currency`, `ip`, `confirmed`, `payment_service`, `payment_info`, `status`, `created_at`, `updated_at`) VALUES(:user_id, :plan_id, :kind, :payment_id, :amount, :currency, :ip, :confirmed, :service, :info, :status, :cat, :uat)";
					if(Db::query($query))
					{
						if($plan["type"]=="upgrade")
						{
							if(Upgrade::up(u("id"), $plan["traffic_ratio"], $plan["website_slots"], $plan["session_slots"], $plan["duration"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else if($plan["type"]=="websites")
						{
							if(More::websites(u("id"), $plan["website_slots"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else if($plan["type"]=="sessions")
						{
							if(More::sessions(u("id"), $plan["session_slots"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else if($plan["type"]=="traffic")
						{
							if(More::traffic(u("id"), $plan["points"]))
							{
								header("location: ".router("payments")."?success=true");
							}
							else
							{
								header("location: ".router("payments")."?success=false");
							}
						}
						else
						{
							header("location: ".router("payments")."?success=false");
						}
					}
					else
					{
						header("location: ".router("contact"));
					}
				}
			}
			else if($callback["status"]=="pending")
			{
				$info = Paypal::info($callback["token"]);
				Db::bind("id", $info["id"]);
				$plan = Db::query("SELECT * FROM plans WHERE id = :id");
				$plan = $plan[0];
				if(!empty($plan) && is_array($plan))
				{
					Db::bind("user_id", u("id"));
					Db::bind("plan_id", $plan["id"]);
					Db::bind("kind", $plan["name"]);
					Db::bind("payment_id", md5(Encryption::generate(4)));
					Db::bind("amount", $plan["price"]);
					Db::bind("currency", $plan["currency"]);
					Db::bind("ip", Sys::ip());
					Db::bind("confirmed", "1");
					Db::bind("service", "paypal");
					Db::bind("info", "");
					Db::bind("status", "1");
					Db::bind("cat", time());
					Db::bind("uat", time());
					$query = "INSERT INTO payments(`user_id`, `plan_id`, `kind`, `payment_id`, `amount`, `currency`, `ip`, `confirmed`, `service`, `info`, `status`, `created_at`, `updated_at`) VALUES(:user_id, :plan_id, :kind, :payment_id, :amount, :currency, :ip, :confirmed, :service, :info, :status, :cat, :uat)";
					Db::query($query);
					header("location: ".router("payments")."?pending=true");
				}
			}
			else
			{
				header("location: ".router("payments")."?cancel=true");
			}
		}
		else
		{
			to_router("login");
		}
	}

	public function twocheckout_payment_process($match="")
	{
		if(!Auth::check("users"))
		{
			define("alert_error", l("error_login_error"));
			$this->makejson();
			exit();
		}

		$token           = strip_tags(Request::post("token"));
		$billing_name    = strip_tags(Request::post("billing_name"));
		$billing_country = strip_tags(Request::post("billing_country"));
		$billing_address = strip_tags(Request::post("billing_address"));
		$billing_region  = strip_tags(Request::post("billing_region"));
		$billing_code    = strip_tags(Request::post("billing_code"));
		$billing_city    = strip_tags(Request::post("billing_city"));
		$billing_email   = strip_tags(Request::post("billing_email"));
		$billing_phone   = strip_tags(Request::post("billing_phone"));
		$planid          = Encryption::decode(strip_tags(Request::post("plan")));

		if(empty($token) ||
		   empty($billing_name) ||
		   empty($billing_country) ||
		   empty($billing_address) ||
		   empty($billing_code) ||
		   empty($billing_city) ||
		   empty($planid))
		{
			define("alert_error", l("error_empty"));
			$this->makejson();
			exit();
		}

		require_once("system/libraries/Twocheckout/Twocheckout.php");

		$mode = s("payments/twocheckout/mode");
		$private_key = s("payments/twocheckout/private_key");
		$seller_id = s("payments/twocheckout/seller_id");

		Twocheckout::privateKey($private_key);
		Twocheckout::sellerId($seller_id);
		Twocheckout::verifySSL(false);

		if($mode == "sandbox")
		{
			Twocheckout::sandbox(true);
		}
		else {
			Twocheckout::sandbox(false);
		}
		Twocheckout::format('json');

		try {

			Db::bind("id", $planid);
			$plan = Db::query("SELECT * FROM plans WHERE id = :id");
			$plan = $plan[0];

			if(empty($plan) || !is_array($plan))
			{
				define("alert_error", l("error_server"));
				$this->makejson();
				exit();
			}

			$convert = USD_Convert::convert($plan["price"], $plan["currency"]);
			$charge = Twocheckout_Charge::auth(array(
		        "merchantOrderId" => rand(111111, 999999),
		        "token"      => $token,
		        "currency"   => 'USD',
		        "total"      => $convert,
		        "billingAddr" => array(
		            "name" => $billing_name,
		            "addrLine1" => $billing_address,
		            "city" => $billing_city,
		            "state" => $billing_region,
		            "zipCode" => $billing_code,
		            "country" => $billing_country,
		            "email" => $billing_email,
		            "phoneNumber" => $billing_phone
		        )
		    ));
			$charge = json_decode($charge);
			$charge = json_decode(json_encode($charge), true);

			$thePaymentSuccess = false;
			if(!empty($charge['response']['responseCode']))
			{
				if($charge['response']['responseCode'] == 'APPROVED')
				{
					$thePaymentSuccess = true;
				}
			}

		    if($thePaymentSuccess) {

				Db::bind("chout", $token);
				Db::bind("twoc", "2checkout");
				$pay = Db::query("SELECT * FROM payments WHERE payment_service = :twoc and payment_info = :chout");
				if(!empty($pay[0]) && is_array($pay))
				{
					define("alert_error", l("error_server"));
					$this->makejson();
					exit();
				}

				Db::bind("user_id", u("id"));
				Db::bind("plan_id", $plan["id"]);
				Db::bind("kind", $plan["name"]);
				Db::bind("payment_id", md5(Encryption::generate(4)));
				Db::bind("amount", $plan["price"]);
				Db::bind("currency", $plan["currency"]);
				Db::bind("ip", Sys::ip());
				Db::bind("confirmed", "2");
				Db::bind("service", "2checkout");
				Db::bind("info", $token);
				Db::bind("status", "1");
				Db::bind("cat", time());
				Db::bind("uat", time());
				$query = "INSERT INTO payments(`user_id`, `plan_id`, `kind`, `payment_id`, `amount`, `currency`, `ip`, `confirmed`, `payment_service`, `payment_info`, `status`, `created_at`, `updated_at`) VALUES(:user_id, :plan_id, :kind, :payment_id, :amount, :currency, :ip, :confirmed, :service, :info, :status, :cat, :uat)";
				if(Db::query($query))
				{
					if($plan["type"]=="upgrade")
					{
						if(Upgrade::up(u("id"), $plan["traffic_ratio"], $plan["website_slots"], $plan["session_slots"], $plan["duration"]))
						{
							define("alert_success", l("payment_completed_hint"));
							$this->makejson();
							exit();
						}
						else
						{
							define("alert_error", l("payment_pending_wait"));
							$this->makejson();
							exit();
						}
					}
					else if($plan["type"]=="websites")
					{
						if(More::websites(u("id"), $plan["website_slots"]))
						{
							define("alert_success", l("payment_completed_hint"));
							$this->makejson();
							exit();
						}
						else
						{
							define("alert_error", l("payment_pending_wait"));
							$this->makejson();
							exit();
						}
					}
					else if($plan["type"]=="sessions")
					{
						if(More::sessions(u("id"), $plan["session_slots"]))
						{
							define("alert_success", l("payment_completed_hint"));
							$this->makejson();
							exit();
						}
						else
						{
							define("alert_error", l("payment_pending_wait"));
							$this->makejson();
							exit();
						}
					}
					else if($plan["type"]=="traffic")
					{
						if(More::traffic(u("id"), $plan["points"]))
						{
							define("alert_success", l("payment_completed_hint"));
							$this->makejson();
							exit();
						}
						else
						{
							define("alert_error", l("payment_pending_wait"));
							$this->makejson();
							exit();
						}
					}
					else
					{
						//DB server
						define("alert_error", l("payment_pending_wait"));
						$this->makejson();
						exit();
					}
				}
				else
				{
					//DB server
					define("alert_error", l("payment_pending_wait"));
					$this->makejson();
					exit();
				}
		    }
			else {
				// payment faild
				define("alert_error", l("error_server"));
				$this->makejson();
				exit();
			}

		} catch (Twocheckout_Error $e) {

			define("alert_error", $e->getMessage());
			$this->makejson();
			exit();

		}
	}

	public function payza_payment_process($match="")
	{
		$payza = true;
		if($payza)
		{
			$callback = Payza::callback();
			Db::bind("ppz", $callback["token"]);
			$pay = Db::query("SELECT * FROM payments WHERE payment_service = 'payza' and payment_info = :ppz");
			if(!empty($pay[0]))
			{
				header("location: ".router("payments")."?cancel=true");
				exit();
			}
			if($callback["status"]=="completed")
			{
				Db::bind("id", $callback["id"]);
				$plan = Db::query("SELECT * FROM plans WHERE id = :id");
				$plan = $plan[0];
				$user = Getdata::one_user($callback["uid"]);
				if(!empty($plan) && !empty($user) && is_array($plan) && is_array($user))
				{
					Db::bind("user_id", $user["id"]);
					Db::bind("plan_id", $plan["id"]);
					Db::bind("kind", $plan["name"]);
					Db::bind("payment_id", md5(Encryption::generate(4)));
					Db::bind("amount", $plan["price"]);
					Db::bind("currency", $plan["currency"]);
					Db::bind("ip", Sys::ip());
					Db::bind("confirmed", "2");
					Db::bind("service", "payza");
					Db::bind("info", $callback["token"]);
					Db::bind("status", "1");
					Db::bind("cat", time());
					Db::bind("uat", time());
					$query = "INSERT INTO payments(`user_id`, `plan_id`, `kind`, `payment_id`, `amount`, `currency`, `ip`, `confirmed`, `payment_service`, `payment_info`, `status`, `created_at`, `updated_at`) VALUES(:user_id, :plan_id, :kind, :payment_id, :amount, :currency, :ip, :confirmed, :service, :info, :status, :cat, :uat)";
					if(Db::query($query))
					{
						if($plan["type"]=="upgrade")
						{
							Upgrade::up($user["id"], $plan["traffic_ratio"], $plan["website_slots"], $plan["session_slots"], $plan["duration"]);
						}
						else if($plan["type"]=="websites")
						{
							More::websites($user["id"], $plan["website_slots"]);
						}
						else if($plan["type"]=="sessions")
						{
							More::sessions($user["id"], $plan["session_slots"]);
						}
						else if($plan["type"]=="traffic")
						{
							More::traffic($user["id"], $plan["points"]);
						}
					}
				}
			}
		}
		header("location: ".router("payments")."?success=wait");
	}

	public function settings($match="")
	{
		if(Auth::check("users"))
		{
            $provider = u("provider_name");
            if(!empty($provider))
            {
                to_router("404");
                exit();
            }
			$username = Request::post("update_username");
			$email = Request::post("update_email");
			$password = Request::post("update_password");
 			if(!empty($username))
			{
				if(Request::is_ajax())
				{
					$this->update_username();
					$this->makejson();
				}
				else if(!Request::is_ajax())
				{
					$this->update_username();
				}
			}
			if(!empty($email))
			{
				if(Request::is_ajax())
				{
					$this->update_email();
					$this->makejson();
				}
				else if(!Request::is_ajax())
				{
					$this->update_email();
				}
			}
			if(!empty($password))
			{
				if(Request::is_ajax())
				{
					$this->update_pass();
					$this->makejson();
				}
				else if(!Request::is_ajax())
				{
					$this->update_pass();
				}
			}
			set("title2", l("settings"));
			Template::view("account_settings");
		}
		else
		{
			to_router("login");
		}
	}

	public function affiliate($match="")
	{
		$contry_list = json_decode($this->country_list, true);
		set("clist", $contry_list);
		if(Auth::check("users"))
		{
			if(s("defaults/withdrawal_status")!="yes")
			{
				to_router("referrals");
				exit();
			}
			Wallet::create(u("id"));
			$method = strip_tags(Request::post("withdrawal_method"));
			if(!empty($method))
			{
				$array_check = array("paypal", "payoneer");
				if(!empty($method) && in_array($method, $array_check))
				{
					$upd = Wallet::withdrawal_to($method, u("id"));
					if($upd)
					{
						define("alert_success", l("success_update"));
					}
					else
					{
						define("alert_error", l("error_server"));
					}
				}
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}
			else if(empty($method) && !empty($_POST))
			{
				$this->update_affiliate();
				if(Request::is_ajax())
				{
					$this->makejson();
				}
			}
			Db::bind("userid", u("id"));
			$info = Db::query("SELECT * FROM affiliate WHERE user_id = :userid");
			set("info", $info[0]);
			set("wallet", Wallet::info(u("id")));
			set("title2", l("affiliate_settings"));
			Template::view("affiliate_info");
		}
		else
		{
			to_router("login");
		}
	}

	public function convert_points_to_sold($match="")
	{
		if(Auth::check("users"))
		{
			$points = u("points");
			if($points >= 100)
			{
				$calcul = floor(($points/100)*(s("exchange/pointcost")));
				$remove = Points::empty_points(u("id"));
				if($remove)
				{
					$add = Wallet::add($calcul, "confirmed", u("id"));
					if($add)
					{
						to_router("referrals");
					}
					else
					{
						to_router("contact");
					}
				}
				else
				{
					to_router("dashboard");
				}
			}
			else
			{
				to_router("dashboard");
			}
		}
		else
		{
			to_router("404");
		}
	}

	public function withdrawal_all($match="")
	{
		if(Auth::check("users"))
		{
			if(s("defaults/withdrawal_status")!="yes")
			{
				to_router("referrals");
				exit();
			}
			$minwithdrawal = s("defaults/min_for_withdrawal");
			$wallet = Wallet::info(u("id"));
			set("info", $wallet);
			if($wallet["confirmed_sold"] >= $minwithdrawal)
			{
				if(Request::is_post())
				{
					$method = strip_tags(Request::post("withdrawal_method"));
					$array_check = array("paypal", "payoneer");
					if(!empty($method) && in_array($method, $array_check))
					{
						Wallet::withdrawal_to($method, u("id"));
						$move = Wallet::move_all("confirmed", "withdrawal", u("id"));
						if($move)
						{
							to_router("referrals");
						}
					}
				}
			}
			else
			{
				to_router("referrals");
			}
			set("title2", l("withdrawal"));
			Template::view("withdrawal");
		}
		else
		{
			to_router("login");
		}
	}

	public function update_website()
	{
		$id       = Request::post("update_website_id", "i");
		$website  = strip_tags(Request::post("update_website_url"));
		$duration = Request::post("update_website_seconds", "i");
		$maxperh  = Request::post("update_website_hour_max", "i");
		$limit    = Request::post("update_website_limit");
		$total    = Request::post("update_website_limit_value", "i");
        //new
        $useragent = Request::post("user_agent", "a");
        $get_target = Request::post("geo_target");
        //
		$website_data  = Getdata::one_active_website($id);
		$source   = Request::post("update_website_source");
		$blacklist = s("blacklist/lists");
		$whitelist = s("whitelist/lists");
		$website_host = str_replace(array("www.", "http://", "https://", " "), "", $website);
		$website_host = explode("/", $website_host);
		$website_host = $website_host[0];
		if(!empty($source))
		{
			$source = parse_url($source);
			if(!empty($source["scheme"]) && !empty($source["host"]))
			{
				$source = $source["scheme"]."://".$source["host"];
			}
			else
			{
				$source = "";
			}
		} else { $source = ""; }

		if(empty($id) or empty($website_data) or empty($website) or empty($duration) or empty($maxperh) or empty($limit))
		{
			define("alert_error", l("error_empty"));
		}
		else if($website_data["user_id"] != u("id"))
		{
			define("alert_warning", l("error_hacker"));
		}
		else if(!Request::is_url($website))
		{
			define("alert_error", l("error_url"));
		}
		else if(in_array($website_host, $blacklist))
		{
			define("alert_error", "Sorry, ".$website_host." is blocked");
		}
		else if($duration > s("exchange/maxduration") or $maxperh > 2000 or $duration < s("exchange/minduration") or $maxperh < 30)
		{
			define("alert_warning", l("error_hacker"));
		}
        else if(!in_array($useragent, array_keys($this->user_agents)))
        {
            define("alert_warning", l("error_hacker"));
        }
		else if($limit=="on" && empty($total) or $limit=="on" && $total < 0)
		{
			define("alert_error", l("error_empty"));
		}
		else if(Auth::check("users"))
		{
			if($limit=="on")
			{
				$max_hits = $total;
			}
			else
			{
				$max_hits = "0";
			}
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
			Db::bind("url", $website);
			Db::bind("hits", "0");
			Db::bind("uid", u("id"));
			Db::bind("max_hits", $max_hits);
			Db::bind("max_hour_hits", $maxperh);
			Db::bind("last_run", time());
			Db::bind("duration", $duration);
            Db::bind("useragent", $useragent);

            if(u("type")=="pro" || s("geotarget/access")=="free")
			{
				Db::bind("geo", $geo_targeting);
			}
			else
			{
				Db::bind("geo", "[ALL]");
			}

			if(u("type")=="pro" || s("exchange/source")=="yes")
			{
				if(s("exchange/ipcheck")=="all")
				{
					Db::bind("source", $source);
				}
			}
			else
			{
				Db::bind("source", "");
			}

			if(s("generale/auto_confirm_websites")=="1" || in_array($website_host, $whitelist))
			{
				Db::bind("activated", "1");
			}
			else
			{
				Db::bind("activated", "0");
			}

			Db::bind("status", "1");
			Db::bind("cat", time());
			Db::bind("uat", time());
			Db::bind("uid", u("id"));
			Db::bind("id", $id);
			$query = "UPDATE websites SET `url` = :url, `max_hits` = :max_hits, `max_hour_hits` = :max_hour_hits, `last_run` = :last_run, `duration` = :duration, `geolocation` = :geo, `source` = :source, `useragent` = :useragent, `activated` = :activated, `updated_at` = :uat WHERE id = :id and user_id = :uid";
			if(Db::query($query))
			{
				define("alert_success", l("success_added"));
			}
			else
			{
				define("alert_error", l("error_server"));
			}
		}
		else
		{
			define("alert_error", l("error_login_error"));
		}
	}


	public function add_website()
	{
        $_POST["website_seconds"] = (string) 6;
		$website  = Request::post("website_url");
		$duration = Request::post("website_seconds", "i");

		$maxperh  = Request::post("website_hour_max", "i");
		$limit    = Request::post("website_limit");
		$total    = Request::post("website_limit_value", "i");
		$source   = Request::post("website_source");
        //new
        $useragent = Request::post("user_agent", "a");
        $get_target = Request::post("geo_target");
        //
		$wcount   = get("websites_count");
		$blacklist = s("blacklist/lists");
		$whitelist = s("whitelist/lists");
		$website_host = str_replace(array("www.", "http://", "https://", " "), "", $website);
		$website_host = explode("/", $website_host);
		$website_host = $website_host[0];

		if(!empty($source))
		{
			$source = parse_url($source);
			if(!empty($source["scheme"]) && !empty($source["host"]))
			{
				$source = $source["scheme"]."://".$source["host"];
			}
			else
			{
				$source = "";
			}
		} else { $source = ""; }

		if(empty($website) or empty($duration) or empty($maxperh) or empty($limit))
		{
			define("alert_error", l("error_empty"));
		}
		else if($wcount >= u("website_slots"))
		{
			define("alert_error", l("error_upgrade")." <a href='".router("payments")."'>".l("here")."</a>");
		}
		else if(!Request::is_url($website))
		{
			define("alert_error", l("error_url"));
		}
		else if(in_array($website_host, $blacklist))
		{
			define("alert_error", "Sorry, ".$website_host." is blocked");
		}
		/*else if($duration > s("exchange/maxduration") or $maxperh > 2000 or $duration < s("exchange/minduration") or $maxperh < 30)
		{
			define("alert_warning", l("error_hacker"));
		}*/
        else if(!in_array($useragent, array_keys($this->user_agents)))
        {
            define("alert_warning", l("error_hacker"));
        }
		else if($limit=="on" && empty($total) or $limit=="on" && $total < 0)
		{
			define("alert_error", l("error_empty"));
		}
		else if(Auth::check("users"))
		{
			if($limit=="on")
			{
				$max_hits = $total;
			}
			else
			{
				$max_hits = "0";
			}
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
			Db::bind("url", $website);
			Db::bind("hits", "0");
			Db::bind("uid", u("id"));
			Db::bind("max_hits", $max_hits);
			Db::bind("max_hour_hits", $maxperh);
			Db::bind("last_run", time());
			Db::bind("duration", $duration);
            Db::bind("useragent", $useragent);
            if(u("type")=="pro" || s("geotarget/access")=="free")
			{
				Db::bind("geo", $geo_targeting);
			}
			else
			{
				Db::bind("geo", "[ALL]");
			}
			if(u("type")=="pro" || s("exchange/source")=="yes")
			{
				Db::bind("source", $source);
			}
			else
			{
				Db::bind("source", "");
			}
			Db::bind("enabled", "1");
			if(s("generale/auto_confirm_websites")=="1" || in_array($website_host, $whitelist))
			{
				Db::bind("activated", "1");
			}
			else
			{
				Db::bind("activated", "0");
			}
			Db::bind("status", "1");
			Db::bind("cat", time());
			Db::bind("uat", time());
			$query = "INSERT INTO websites (`user_id`, `url`, `hits`, `max_hits`, `max_hour_hits`, `last_run`, `duration`, `geolocation`, `source`, `useragent`, `enabled`, `activated`, `status`, `created_at`, `updated_at`) VALUES (:uid, :url, :hits, :max_hits, :max_hour_hits, :last_run, :duration, :geo, :source, :useragent, :enabled, :activated, :status, :cat, :uat)";
			if(Db::query($query))
			{
				define("alert_success", l("success_added"));
			}
			else
			{
				define("alert_error", l("error_server"));
			}
		}
		else
		{
			define("alert_error", l("error_login_error"));
		}
	}

	public function update_info($match="")
	{
		if(!Auth::check("users"))
		{
			define("alert_error", l("error_login_error"));
			return "";
		}
		$this->security();
		$fullname  = htmlentities(strip_tags(Request::post("update_fullname")));
		$about     = htmlentities(strip_tags(Request::post("update_about")));
		$autoshare = Request::post("update_autoshare");
        if(empty($fullname))
		{
			define("alert_error", l("error_empty"));
		}
		else if(!empty($autoshare) && $autoshare !="yes")
		{
			define("alert_error", l("error_autoshare"));
		}
        else if(!Check::is_max($fullname, $this->max_fullname, true))
		{
            define("alert_error", l("error_max_fullname")." ".$this->max_fullname." ".l("char", "characters"));
		}
        else if(!Check::is_min($fullname, $this->min_fullname, true))
		{
            define("alert_error", l("error_min_fullname")." ".$this->min_fullname." ".l("char", "characters"));
		}
		else if(Auth::check("users"))
		{
			if(empty($autoshare))
			{
				$autoshare = "no";
			}
			Db::bind("fname", $fullname);
			Db::bind("about", $about);
			Db::bind("ashare", $autoshare);
			Db::bind("id", u("id"));
			Db::bind("upat", time());
			$query = "UPDATE `users` SET `fullname` = :fname, `about` = :about, `autoshare` = :ashare, `updated_at` = :upat WHERE id = :id";
			if(Db::query($query))
			{
			    define("alert_success", l("success_update"));
			}
			else
			{
			    define("alert_error", l("error_server"));
			}
		}
		else
		{
			define("alert_error", l("error_login_timeout"));
		}
    }

	public function update_affiliate()
	{
		if(!empty($_POST))
		{
			$this->create_new_affiliate();
			$fullname     = strip_tags(Request::post("update_fullname"));
			$adresse      = strip_tags(Request::post("update_adresse"));
			$country  	  = strip_tags(Request::post("update_country"));
			$city         = strip_tags(Request::post("update_city"));
			$codepostal   = strip_tags(Request::post("update_codepostal"));
			$paypal_email = strip_tags(Request::post("update_paypal_email"));
			$payoneer_email = strip_tags(Request::post("update_payoneer_email"));
			Db::bind("fullname", $fullname);
			Db::bind("adresse", $adresse);
			Db::bind("country", $country);
			Db::bind("city", $city);
			Db::bind("codepostal", $codepostal);
			Db::bind("paypal_email", $paypal_email);
			Db::bind("payoneer_email", $payoneer_email);
			Db::bind("id", u("id"));
			Db::bind("uat", time());
			$query = "UPDATE affiliate SET `fullname` = :fullname, `adresse` = :adresse, `country` = :country, `city` = :city, `codepostal` = :codepostal, `paypal_email` = :paypal_email, `payoneer_email` = :payoneer_email, `updated_at` = :uat WHERE user_id = :id";
			if(Db::query($query))
			{
				define("alert_success", l("success_update"));
			}
			else
			{
				define("alert_error", l("error_server"));
			}
		}
	}

	public function create_new_affiliate()
	{
		if(Auth::check("users"))
		{
			Db::bind("userid", u("id"));
			$check = Db::query("SELECT * FROM affiliate WHERE user_id = :userid");
			if(empty($check) && $check[0]["user_id"]!=u("id"))
			{
				Db::bind("id", u("id"));
				Db::bind("uat", time());
				Db::bind("cat", time());
				$query = "INSERT INTO affiliate(`user_id`, `created_at`, `updated_at`) VALUES(:id, :cat, :uat)";
				if(Db::query($query))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			return true;
		}
	}

	public function update_username($match="")
	{
		if(!Auth::check("users") && !$this->check_provider_user())
		{
			define("alert_error", l("error_login_error"));
			return "";
		}
		$username = strip_tags(Request::post("update_username"));
        if(empty($username))
		{
			define("alert_error", l("error_empty"));
		}
        else if(!Check::is_safe($username, "iaA"))
        {
            define("alert_error", l("error_username_char", "characters allowed on username is (a-z A-Z 0-9)"));
        }
		else if(Auth::check_username($username) && u("username")!=$username)
		{
			define("alert_error", l("error_username_exists"));
		}
        else if(!Check::is_max($username, $this->max_username, true))
        {
            define("alert_error", l("error_max_username", "Sorry ! username is longer than necessary, the Maximum is")." ".$this->max_username." ".l("char", "characters"));
        }
        else if(!Check::is_min($username, $this->min_username, true))
        {
            define("alert_error", l("error_min_username", "Sorry ! username is very small, the minimum is")." ".$this->min_username." ".l("char", "characters"));
        }
		else if(u("username")==$username)
		{
			define("alert_success", l("success_update"));
		}
		else if(Auth::check("users") && !Auth::check_username($username))
		{
			Db::bind("upuser", $username);
			Db::bind("upat", time());
			Db::bind("id", u("id"));
			$query = "UPDATE `users` SET `username` = :upuser, `updated_at` = :upat WHERE id = :id";
			if(Db::query($query))
			{
				Auth::update($username, "");
			    define("alert_success", l("success_update"));
			}
			else
			{
			    define("alert_error", l("error_server"));
			}
		}
		else
		{
			define("alert_error", l("error_login_timeout"));
		}
    }

	public function update_email($match="")
	{
		if(!Auth::check("users") && !$this->check_provider_user())
		{
			define("alert_error", l("error_login_error"));
			return "";
		}
		$email     = strip_tags(Request::post("update_email"));
        if(empty($email))
		{
			define("alert_error", l("error_empty"));
		}
		else if(!Check::is_email($email))
		{
			define("alert_error", l("error_email"));
		}
        else if(!Check::is_max($email, $this->max_email, true))
        {
            define("alert_error", l("error_max_email", "Sorry ! email is longer than necessary, the Maximum is")." ".$this->max_email." ".l("char", "characters"));
        }
        else if(!Check::is_min($email, $this->min_email, true))
        {
            define("alert_error", l("error_min_email", "Sorry ! email is very small, the minimum is")." ".$this->min_email." ".l("char", "characters"));
        }
		else if(Auth::check_email($email) && u("email")!=$email)
		{
			define("alert_error", l("error_email_exists"));
		}
		else if(u("email")==$email)
		{
			define("alert_success", l("success_update"));
		}
		else if(Auth::check("users") && !Auth::check_email($email))
		{
			Db::bind("upemail", $email);
			Db::bind("upat", time());
			Db::bind("id", u("id"));
			$query = "UPDATE `users` SET `email` = :upemail, `updated_at` = :upat WHERE id = :id";
			if(Db::query($query))
			{
				Auth::update($email, "");
			    define("alert_success", l("success_update"));
			}
			else
			{
			    define("alert_error", l("error_server"));
			}
		}
		else
		{
			define("alert_error", l("error_login_timeout"));
		}
    }

	public function update_pass($match="")
	{
		if(!Auth::check("users") && !$this->check_provider_user())
		{
			define("alert_error", l("error_login_error"));
			return "";
		}
		$password  = Request::post("update_password");
		$password2 = Request::post("update_password2");
        if(empty($password) or empty($password2))
		{
			define("alert_error", l("error_empty"));
		}
		else if($password !== $password2 && $password2 !== $password)
		{
			define("alert_error", l("error_match_password"));
		}
		else if(!Check::is_max($password, $this->max_password, true))
		{
			define("alert_error", l("error_max_password")." ".$this->max_password);
		}
		else if(!Check::is_min($password, $this->min_password, true))
		{
			define("alert_error", l("error_min_password")." ".$this->min_password);
		}
		else if(Auth::check("users"))
		{
			Db::bind("uppassword", Encryption::encode($password));
			Db::bind("upat", time());
			Db::bind("id", u("id"));
			$query = "UPDATE `users` SET `password` = :uppassword, `updated_at` = :upat WHERE id = :id";
			if(Db::query($query))
			{
				Auth::update("", $password);
			    define("alert_success", l("success_update"));
			}
			else
			{
			    define("alert_error", l("error_server"));
			}
		}
		else
		{
			define("alert_error", l("error_login_timeout"));
		}
    }

	public function check_provider_user()
	{
		if(Auth::check("users"))
		{
			$provider = u("provider_id");
			if(!empty($provider))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

}
?>
