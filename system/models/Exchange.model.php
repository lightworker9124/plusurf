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

class Exchange extends BaseModel
{
	private static $attack = 0;
    public static $info = array();
	public static $useragents = array(
	"android" => array(
		"Mozilla/5.0 (Linux; U; Android 2.2; fr-fr; Desire_A8181 Build/FRF91) App3leWebKit/53.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1",
		"Mozilla/5.0 (Linux; U; Android 4.0.3; fr-fr; MIDC410 Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30",
		"Mozilla/5.0 (Linux; U; Android 4.0.4; fr-fr; MIDC409 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30",
		"Mozilla/5.0 (Linux; U; Android 4.1.1; ru-ru; Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30",
		"Mozilla/5.0 (Linux; Android 4.1.1; Nexus 7 Build/JRO03D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Safari/535.19",
		"Mozilla/5.0 (Android; Mobile; rv:26.0) Gecko/26.0 Firefox/26.0",
		"Mozilla/5.0 (Android; Mobile; rv:22.0) Gecko/22.0 Firefox/22.0",
		"Mozilla/5.0 (Linux; U; Android 4.1.2; zh-tw; GT-N7100 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30",
		"Mozilla/5.0 (Linux; U; Android 4.1.2; zh-tw; GT-I9300 Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30",
		"Mozilla/5.0 (Linux; U; Android 4.1.2; en-us; SM-T210R Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30",
		"Mozilla/5.0 (Android; Mobile; rv:24.0) Gecko/24.0 Firefox/24.0",
		"Mozilla/5.0 (Android; Mobile; rv:23.0) Gecko/23.0 Firefox/23.0",
		"Mozilla/5.0 (Linux; U; Android 4.0.2; en-us; Galaxy Nexus Build/ICL53F) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30",
		"Mozilla/5.0 (Linux; U; Android 4.0.4; en-us; MIDC409 Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30"
		),
	"firefox" => array(
		"Mozilla/5.0 (Windows NT 5.1; rv:5.0.1) Gecko/20100101 Firefox/5.0.1",
		"Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1",
		"Mozilla/5.0 (Windows NT 6.1; rv:5.0) Gecko/20100101 Firefox/5.02",
		"Mozilla/5.0 (Windows NT 6.1; rv:2.0b7pre) Gecko/20100921 Firefox/4.0b7pre",
		"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:5.0) Gecko/20100101 Firefox/5.0",
		"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0",
		"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0",
		"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20130406 Firefox/23.0",
		"Mozilla/5.0 (Windows NT 6.2; WOW64; rv:16.0.1) Gecko/20121011 Firefox/16.0.1",
		"Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0",
		"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0",
		"Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0"
		),
	"chrome" => array(
		"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17",
		"Mozilla/5.0 (Windows NT 6.0) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1",
		"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.112 Safari/535.1",
		"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.8 (KHTML, like Gecko) Chrome/18.6.872.0 Safari/535.8",
		"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.8 (KHTML, like Gecko) Chrome/17.0.940.0 Safari/535.8",
		"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17",
		"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17",
		"Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17",
		"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.34 Safari/534.24",
		"Mozilla/5.0 (Linux; Android 4.2.1; Nexus 7 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Safari/535.19",
		"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17",
		"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11",
		"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17",
		"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17"
		),
	"ie" => array(
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0)",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Cente",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0; .NET4.0E; .NET4.0C; .NET CLR 3.5.30729; .NET CLR 2.0.50727; .NET CLR 3.0.30729",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch; NOKIA; Lumia 920)",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; ARM; Touch; WPDesktop)",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/4.0; InfoPath.2; SV1; .NET CLR 2.0.50727; WOW64)",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Win64; x64; Trident/6.0)",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Win64; x64; Trident/6.0)",
		"Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0; Touch)",
		"Mozilla/5.0 (compatible; MSIE 10.6; Windows NT 6.1; Trident/5.0; InfoPath.2; SLCC1; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; .NET CLR 2.0.50727) 3g"
		),
	"ipad" => array(
		"Mozilla/5.0 (iPad; CPU OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10B329 Safari/8536.25",
		"Mozilla/5.0 (iPad; CPU OS 5_1_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9B206 Safari/7534.48.3",
		"Mozilla/5.0 (iPad; CPU OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11B554a Safari/9537.53",
		"Mozilla/5.0 (iPad; CPU OS 7_1_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D201 Safari/9537.53",
		"Mozilla/5.0 (iPad; CPU OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53",
		"Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.10",
		"Mozilla/5.0 (iPad; CPU OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53",
		"Mozilla/5.0 (iPad; CPU OS 7_0_2 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A501 Safari/9537.53",
		"Mozilla/5.0 (iPad; CPU OS 7_0_3 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11B511 Safari/9537.53",
		"Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B367 Safari/531.21.10",
		"Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5355d Safari/8536.25",
		"Mozilla/5.0 (iPad; CPU OS 6_1_2 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10B146 Safari/8536.25",
		"Mozilla/5.0 (iPad; CPU OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3",
		"Mozilla/5.0 (iPad; CPU OS 7_0_6 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11B651 Safari/9537.53"
		),
	"iphone" => array(
		"Mozilla/5.0(iPhone;U;CPUiPhoneOS4_0likeMacOSX;en-us)AppleWebKit/532.9(KHTML,likeGecko)Version/4.0.5Mobile/8A293Safari/6531.22.7",
		"Mozilla/5.0 (iPhone; CPU iPhone OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10B329 Safari/8536.25",
		"Mozilla/5.0 (iPhone; CPU iPhone OS 6_1_4 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10B350 Safari/8536.25",
		"Mozilla/5.0 (iPod; CPU iPhone OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10B329 Safari/8536.25",
		"Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7A341 Safari/528.16",
		"Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11B554a Safari/9537.53",
		"Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D201 Safari/9537.53",
		"Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53",
		"Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_2 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8H7 Safari/6533.18.5",
		"Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7",
		"Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53",
		"Mozilla/5.0 (iphone; cpu iphone os 7_0_2 like mac os x) Applewebkit/537.51.1 (khtml, like gecko) version/7.0 mobile/11a501 safari/9537.53",
		"Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_3 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11B511 Safari/9537.53",
		"Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3"
		),
	"opera" => array(
		"Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.15",
		"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)Opera/9.20 (Windows NT 5.1; U)",
		"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)Opera/9.20 (Windows NT 5.1; U)",
		"Opera/9.80 (Windows NT 6.1; WOW64) Presto/2.12.388 Version/12.16",
		"Opera/9.80 (Macintosh; Intel Mac OS X; U; en) Presto/2.2.15 Version/10.00",
		"Opera/9.80 (X11; Linux zbov) Presto/2.11.355 Version/12.10",
		"Opera/9.80 (Windows NT 6.1; WOW64) Presto/2.12.388 Version/12.15",
		"Opera/9.80 (X11; Linux i686) Presto/2.12.388 Version/12.16",
		"Opera/9.80 (X11; Linux x86_64; Edition Linux Mint) Presto/2.12.388 Version/12.10",
		"Opera/9.80 (Windows NT 6.1; U; es-ES) Presto/2.9.181 Version/12.00",
		"Opera/9.80 (Android 2.3.7; Linux; Opera Mobi/46154) Presto/2.11.355 Version/12.10",
		"Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.16",
		"Opera/9.80 (X11; Linux zbov) Presto/2.11.355 Version/10.00",
		"Opera/9.70 (Windows NT 5.1; U; en) TMO-US_LEO"
		),
	"safari" => array(
		"Mozilla/5.0 (Windows; U; Windows NT 6.1; tr-TR) AppleWebKit/533.20.25 (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27",
		"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; de-at) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1",
		"Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5355d Safari/8536.25",
		"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.75.14 (KHTML, like Gecko) Version/7.0.3 Safari/7046A194A",
		"Mozilla/5.0 (iPod; U; CPU iPhone OS 4_3_3 like Mac OS X; ja-jp) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
		"Mozilla/5.0 (iPod; U; CPU iPhone OS 4_3_1 like Mac OS X; zh-cn) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8G4 Safari/6533.18.5",
		"Mozilla/5.0 (iPhone; U; fr; CPU iPhone OS 4_2_1 like Mac OS X; fr) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8C148a Safari/6533.18.5",
		"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_4; th-th) AppleWebKit/533.17.8 (KHTML, like Gecko) Version/5.0.1 Safari/533.17.8",
		"Mozilla/5.0 (X11; U; Linux x86_64; en-us) AppleWebKit/531.2+ (KHTML, like Gecko) Version/5.0 Safari/531.2+",
		"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; zh-cn) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16",
		"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; en-us) AppleWebKit/534.1+ (KHTML, like Gecko) Version/5.0 Safari/533.16",
		"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; el-gr) AppleWebKit/533.16 (KHTML, like Gecko) Version/5.0 Safari/533.16",
		"Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_4_11; nl-nl) AppleWebKit/533.16 (KHTML, like Gecko) Version/4.1 Safari/533.16",
		"Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10.5; en-US; rv:1.9.1b3pre) Gecko/20081212 Mozilla/5.0 (Windows; U; Windows NT 5.1; en) AppleWebKit/526.9 (KHTML, like Gecko) Version/4.0dp1 Safari/526.8"
		)
	);
	public static $default_analytics = array(
		"http://google.com"
	);
	public static function check($user, $session)
	{
		$ipcheck = s("exchange/ipcheck");
		if(!empty($ipcheck))
		{
			if($ipcheck == "disabled")
			{
				return true;
			}
			if($ipcheck == "onlyfree")
			{
				if($user["type"] != "Bronze")
				{
					return true;
				}
			}
			if(self::check_ip(Sys::ip(), $session["id"]))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else {
			return true;
		}
	}

	public static function random($user_id, $limit=1)
	{
        $geo_location = self::geo_iso();
        $rand = rand(1, 555);
        if($rand >= 500)
        {
            $query = "SELECT * FROM websites WHERE status = :status and user_points = :userpoints and activated = :activated and enabled = :enabled and user_id != :uid and geolocation LIKE :geolike ORDER BY RAND() LIMIT :limit";
            Db::bind("geolike", "%".$geo_location."%");
        }
        else if($rand < 500)
        {
            Db::bind("status", "1");
            Db::bind("activated", "1");
            Db::bind("enabled", "1");
            Db::bind("userpoints", "working");
            Db::bind("uid", strip_tags($user_id));
            Db::bind("limit", $limit);
            Db::bind("geo", "");
            $count = Db::query("SELECT COUNT(id) FROM  websites WHERE status = :status and user_points = :userpoints and activated = :activated and enabled = :enabled and user_id != :uid and geolocation = :geo");
            if($count[0]["COUNT(id)"] > 0)
            {
                $newrand = rand(1, 10);
                if($newrand < 5)
                {
                    $query = "SELECT * FROM websites WHERE status = :status and user_points = :userpoints and activated = :activated and enabled = :enabled and user_id != :uid and geolocation LIKE :geolike ORDER BY RAND() LIMIT :limit";
                    Db::bind("geolike", "");
                }
                else
                {
                    $query = "SELECT * FROM websites WHERE status = :status and user_points = :userpoints and activated = :activated and enabled = :enabled and user_id != :uid and geolocation LIKE :geolike ORDER BY RAND() LIMIT :limit";
                    Db::bind("geolike", "%[ALL]%");
                }
            }
            else
            {
                $query = "SELECT * FROM websites WHERE status = :status and user_points = :userpoints and activated = :activated and enabled = :enabled and user_id != :uid and geolocation LIKE :geolike ORDER BY RAND() LIMIT :limit";
                Db::bind("geolike", "%[ALL]%");
            }
        }
		Db::bind("status", "1");
		Db::bind("activated", "1");
		Db::bind("enabled", "1");
		Db::bind("userpoints", "working");
		Db::bind("uid", strip_tags($user_id));
		Db::bind("limit", $limit);
		$rand = Db::query($query);
		return $rand[0];
	}

    public static function geo_iso()
    {
        $ipAddress = Sys::ip();
        $databaseFile = 'uploads/GeoIP/GeoLite2-Country.mmdb';
        $reader = new MaxMind\Db\Reader($databaseFile);
        $GeoData = $reader->get($ipAddress);
        $iso_code = $GeoData["country"]["iso_code"];
        $reader->close();
        if(!empty($iso_code))
        {
            return "[".$iso_code."]";
        }
        else
        {
            return "[ALL]";
        }
    }

	public static function get_website($user_id)
	{
        $count_websites = Getdata::howmany("websites");
        if($count_websites == 0)
        {
            return array(
				"id" => "noexchange",
				"url" => s("defaults/website"),
				"source" => "",
				"max_hits" => 0,
				"max_hour_hits" => 0,
				"duration" => 15,
				"user_id" => 0
				);
        }
		$status = 1;
		while($status)
		{
			$website    = self::random($user_id, 1);
			$hour_hits  = self::hist_in_last_hour($website["id"]);
			$total_hits = $website["hits"];
			$user       = Getdata::one_active_user($website["user_id"]);
			$return_website = array();
			if(!empty($website) && is_array($website) && $user["points"] > 0 && $hour_hits < $website["max_hour_hits"] && $total_hits < $website["max_hits"])
			{
				$return_website = $website;
				$status = 0;
				break;
			}
			else if(!empty($website) && is_array($website) && $user["points"] > 0 && $hour_hits < $website["max_hour_hits"] && $website["max_hits"]=='0' || empty($website["max_hits"]) && !empty($website) && is_array($website) && $user["points"] > 0 && $hour_hits < $website["max_hour_hits"])
			{
				$return_website = $website;
				$status = 0;
				break;
			}
			else
			{
				if(self::$attack > 100 && empty($return_website))
				{
					$return_website = array(
					"id" => "noexchange",
					"url" => s("defaults/website"),
					"source" => "",
					"max_hits" => 0,
					"max_hour_hits" => 0,
					"duration" => 15,
					"user_id" => 0
					);
					$status = 0;
					break;
				}
				else
				{
					$status = 1;
					self::$attack = self::$attack+1;
					continue;
				}
			}
		}
		if(!empty($return_website))
		{
			return $return_website;
		}
		else
		{
			return array();
		}
	}

	private static function hist_in_last_hour($wid)
	{
		Db::bind("time", time()-3600);// last hour
		Db::bind("wid", strip_tags($wid));
		$get = Db::query("SELECT COUNT(id) FROM hits WHERE website_id = :wid and created_at > :time");
		if($get)
		{
			return $get[0]["COUNT(id)"];
		}
		else
		{
			return 0;
		}
	}

    public static function info($info)
    {
        self::$info = $info;
    }

    public static function delete($id)
	{
        $sessionid = strip_tags($id);
		if(is_numeric($sessionid))
		{
            $u = self::$info;
			Db::bind("id", strip_tags($sessionid));
            Db::bind("uid", $u["id"]);
			$get = Db::query("SELECT * FROM exchange WHERE id = :id and user_id = :uid");
			if(!empty($get))
			{
				Db::bind("sid", $sessionid);
				Db::query("DELETE FROM exchange WHERE id = :sid");
			}
		}
	}

	public static function clear($id)
	{
        $sessionid = strip_tags($id);
		if(is_numeric($sessionid))
		{
			setcookie("plusurfreferer", "", time()-200, "/");
			setcookie("plusurfuseragent", "", time()-200, "/");
			setcookie("plusurfurls", "", time()-200, "/");
            $u = self::$info;
			Db::bind("id", strip_tags($sessionid));
            Db::bind("uid", $u["id"]);
			$get = Db::query("SELECT * FROM exchange WHERE id = :id and user_id = :uid");
			if(!empty($get))
			{
				Db::bind("sid", $sessionid);
                Db::bind("check_run", floor(time()-s("exchange/maxduration")-200));
				Db::query("UPDATE exchange SET `last_run` = :check_run WHERE id = :sid");
			}
		}
	}

	public static function add()
	{
		if(!empty(self::$info))
        {
            $u = self::$info;
            $sessions = Getdata::howmany("exchange WHERE user_id = :userid", array(
                "userid" => $u["id"]
            ));
            if($u["session_slots"] > $sessions)
            {
                Db::bind("uid", $u["id"]);
                Db::bind("cat", time());
                Db::bind("uat", time());
                Db::bind("lastrun", floor(time()-s("exchange/maxduration")-200));
                $query = "INSERT INTO exchange(`user_id`, `lasturl_id`, `accepted_time`, `last_run`, `closed`, `status`, `created_at`, `updated_at`) VALUES(:uid, '', '', :lastrun, '0', '1', :cat, :uat)";
                if(Db::query($query))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        else
        {
            return false;
        }
	}

	public static function active_now($who="")
	{
        $u = self::$info;
		if(empty($who))
		{
			$id = $u["id"];
			if(empty($id)){ return 0; }
			Db::bind("uid", $id);
			Db::bind("check_run", floor(time()-s("exchange/maxduration")));
			$query = "SELECT COUNT(id) FROM exchange WHERE user_id = :uid and last_run > :check_run";
			$get = Db::query($query);
			if($get)
			{
				return $get[0]["COUNT(id)"];
			}
			else
			{
				return 0;
			}
		}
		else if(empty($who))
		{
			$id = $u["id"];
			if(empty($id)){ return 0; }
			Db::bind("uid", $id);
			Db::bind("check_run", floor(time()-s("exchange/maxduration")));
			$query = "SELECT COUNT(id) FROM exchange WHERE user_id = :uid and last_run > :check_run";
			$get = Db::query($query);
			if($get)
			{
				return $get[0]["COUNT(id)"];
			}
			else
			{
				return 0;
			}
		}
		else if(!empty($who) && $who=="all")
		{
			Db::bind("check_run", floor(time()-s("exchange/maxduration")));
			$query = "SELECT COUNT(id) FROM exchange WHERE last_run > :check_run";
			$get = Db::query($query);
			if($get)
			{
				return $get[0]["COUNT(id)"];
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

    public static function is_active($session_id, $sdata=array())
    {
        $session = strip_tags($session_id);
        if(is_numeric($session))
        {
			if(empty($sdata))
			{
				$sdata = Getdata::one_active_exchange($session);
			}

            if(!empty($sdata) && $sdata["id"] == $session)
            {
                $time = floor(time()-s("exchange/maxduration"));
                if($sdata["last_run"] > $time)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

	public static function check_ip($ip="", $session_id="")
	{
		if(empty($ip))
		{
			$ip = Sys::ip();
		}
		$search_and_count = Getdata::howmany("exchange WHERE ip = :ip and status = :status",
		array(
			"ip" => $ip,
			"status" => "1"
		));

		if($search_and_count > 0)
		{
			$exchanges = Db::query("SELECT * FROM exchange WHERE ip = :ip and status = :status",
			array(
				"ip" => $ip,
				"status" => "1"
			));
			if(!empty($exchanges) && is_array($exchanges))
			{
				foreach($exchanges as $exchange)
				{
					if(self::is_active($exchange["id"], $exchange))
					{
						if(!empty($session_id) && $session_id == $exchange["id"])
						{
							return true;
							break;
						}
						return false;
						break;
					}
				}
			}
		}
		return true;
	}

	public static function run($id)
	{
        $id = strip_tags($id);
		if(!empty(self::$info) && !empty($id))
		{
            $posted_id = Encryption::decode(strip_tags(Request::post("browse")));
            if(is_numeric($posted_id) && !empty($posted_id))
            {
                $check_website = Getdata::one_website($posted_id);
            }
            else
            {
                $check_website = array();
            }
            if(self::is_active($id) && $check_website["id"] != $posted_id && $posted_id != "noexchange" || empty(self::$info))
            {
                return array(array(
					"status" => false,
					"open_status" => false,
					"show_url" => "",
					"url" => "",
					"duration" => "0",
					"browse" => "",
					"points" => "0",
                    "message" => false
				));
            }
			$user = self::$info;
			$user_id = $user["id"];
			$website = self::get_website($user_id);
			Db::bind("id", $id);
            Db::bind("uid", $user["id"]);
			$exchange = Db::query("SELECT * FROM exchange WHERE id = :id and user_id = :uid");
            $exchange = $exchange[0];
			if(!empty($exchange) && !empty($website))
			{
                $session_uid = Session::get("current_exchange".$exchange["id"]);
                if(!empty($posted_id) && $exchange["lasturl_id"]==$session_uid && $exchange["lasturl_id"]==$posted_id && $exchange["accepted_time"] <= time())
				{
					if($exchange["lasturl_id"]=='noexchange')
					{
                        Points::info($user);
						Points::add("noexchange");
					}
					else
					{
						$oldwebsite = Getdata::one_active_website($exchange["lasturl_id"]);
                        if(!empty($oldwebsite))
                        {
                            Hits::info($user);
                            Hits::add($oldwebsite["id"]);
                            Points::info($user);
                            Points::add($oldwebsite["id"]);
                        }
					}
				}
                $eid = Encryption::encode($website["id"]);
				$esid = Encryption::encode($exchange["id"]);
				$accepted_time = floor(time()+$website["duration"]);
				Db::bind("uid", $user["id"]);
				Db::bind("sid", $id);
				Db::bind("lastrun", time());
				Db::bind("ip", Sys::ip());
				Db::bind("urlid", $website["id"]);
				Db::bind("actime", $accepted_time);
				Db::bind("lastrun", time());
				Db::bind("uat", time());
				Db::query("UPDATE exchange SET `lasturl_id` = :urlid, `accepted_time` = :actime, `last_run` = :lastrun, `ip` = :ip, `closed` = '0', `updated_at` = :uat WHERE `id` = :sid and user_id = :uid");
				$norefurl = router("noref", array("id" => $eid, "sid" => $esid));
				if(s("exchange/ipcheck") == "all")
				{
					setcookie("plusurfreferer", $website["source"], time()+40000, "/");
					setcookie("plusurfuseragent", self::useragent($website["useragent"]), time()+40000, "/");
					setcookie("plusurfurls", urlencode(json_encode(array_merge(array(
						$website["url"],
						$norefurl
					), self::$default_analytics))), time()+40000, "/");
				}
				return array(array(
					"status" => true,
					"open_status" => true,
					"show_url" => urldecode($website["url"]),
					"url" => $norefurl,
					"duration" => floor(($_SESSION['switcher']=='manual_'?10:6)+1),
					"source" => $website["source"],
					"useragent" => self::useragent($website["useragent"]),
					"browse" => $eid,
					"points" => round(Points::get($user["id"]), 2),
                    "message" => false
				));
			}
			else
			{
				return array(array(
					"status" => false,
					"open_status" => false,
					"show_url" => "",
					"url" => "",
					"duration" => "0",
					"browse" => "",
					"points" => "0",
                    "message" => false
				));
			}
		}
	}

    public static function check_session($uid, $sid)
    {
        $uid = strip_tags($uid);
        $sid = strip_tags($sid);
        if(is_numeric($uid) && is_numeric($sid))
        {
            Db::bind("id", $sid);
            $session = Db::query("SELECT * FROM exchange WHERE id = :id");
            $exchange = $session[0];
            if($exchange["user_id"] == $uid && $exchange["id"] == $sid)
            {
                return true;
            }
        }
        return false;
    }

	public static function useragent($agent)
	{
        if($agent=="all")
        {
			$rnd = rand(1, 6);
			if($rnd > 3)
			{
				$new_agents = array();
	            foreach(self::$useragents as $ag)
				{
					$new_agents = array_merge($ag, $new_agents);
				}
	            return $new_agents[array_rand($new_agents)];
			}
			else {
				return strip_tags($_SERVER["HTTP_USER_AGENT"]);
			}
        }
		$agent = str_replace(array(",,,", ",,"), ",", $agent);
		$agents = explode(",", $agent);
		if(!empty($agent) && !empty($agents) && is_array($agents))
		{
			$new_agents = array();
			foreach($agents as $useragent)
			{
				if(is_array(self::$useragents[$useragent]) && !empty(self::$useragents[$useragent]))
				{
					$new_agents = array_merge(self::$useragents[$useragent], $new_agents);
				}
			}
			if(!empty($new_agents))
			{
				return $new_agents[array_rand($new_agents)];
			}
		}
		return strip_tags($_SERVER["HTTP_USER_AGENT"]);
	}

}
?>
