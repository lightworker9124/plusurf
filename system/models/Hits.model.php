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

class Hits extends BaseModel
{
    public static $info = array();
    
	public static function info($info)
    {
        self::$info = $info;
    }
    
	public static function add($wid)
	{
		if(!empty(self::$info) && $wid!="noexchange" )
		{
			$u = self::$info;
			$website = Getdata::one_active_website($wid);
			if(!empty($website))
			{
                Points::info(self::$info);
				$point   = Points::calcul($website["duration"]);
				$browser = new Browser\Browser;
				$os      = new Browser\Os;
				Db::bind("uid", $u["id"]);
				Db::bind("wid", strip_tags($wid));
				Db::bind("point", strip_tags($point));
				Db::bind("ip", Sys::ip());
				Db::bind("browser", strip_tags($browser->getName()));
				Db::bind("os", strip_tags($os->getName()));
				Db::bind("uat", time());
				Db::bind("cat", time());
				$query = "INSERT INTO hits(`website_id`, `user_id`, `point`, `ip`, `browser`, `os`, `created_at`, `updated_at`) VALUES(:wid, :uid, :point, :ip, :browser, :os, :uat, :cat)";
				Db::query($query);
				if(!empty($website["hits"]))
				{
					$newhits = $website["hits"]+1;
				}
				else
				{
					$newhits = 1;
				}
				Db::bind("wid", strip_tags($wid));
				Db::bind("newhits", $newhits);
				$newquery = "UPDATE `websites` SET `hits` = :newhits WHERE `websites`.`id` = :wid";
				Db::query($newquery);
			}
		}
	}
	
	public static function gives()
	{
        if(Auth::check())
        {
            self::$info = Auth::info();
        }
		if(!empty(self::$info))
		{
			$id = self::$info["id"];
			Db::bind("id", $id);
			$query = "SELECT COUNT(id) FROM hits WHERE user_id = :id";
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
	}
	
	public static function got()
	{
        if(Auth::check())
        {
            self::$info = Auth::info();
        }
		if(!empty(self::$info))
		{
			$id = self::$info["id"];
			Db::bind("id", $id);
			$query = "SELECT * FROM websites WHERE user_id = :id";
			$get = Db::query($query);
			$count = 0;
			if(!empty($get) and is_array($get))
			{
				foreach($get as $web)
				{
					if(!empty($web["hits"]))
					{
						$addhit = $web["hits"];
					}
					else
					{
						$addhit = 0;
					}
					$count = $count+$addhit;
				}
				return $count;
			}
			else
			{
				return 0;
			}
		}
	}
	
	public static function hits_in_month($month)
	{
        if(Auth::check())
        {
            self::$info = Auth::info();
        }
		if(!empty(self::$info))
		{
			if($month < 13)
			{
				$mindate = mktime(1, 1, 1, $month, 1, date("Y"));
				$maxdate = mktime(24, 59, 59, $month, 30, date("Y"));
			}
			else
			{
				return 0;
			}
			$id = self::$info["id"];
			Db::bind("uid", $id);
			Db::bind("status", "1");
			$websites = Db::query("SELECT * FROM websites WHERE user_id = :uid and status = :status");
			if(!empty($websites) && is_array($websites))
			{
				foreach($websites as $website)
				{
					Db::bind("wid", $website["id"]);
					Db::bind("mxdate", $mindate);
					Db::bind("mndate", $maxdate);
					$query = "SELECT COUNT(id) FROM hits WHERE website_id = :wid and created_at > :mxdate and created_at < :mndate";
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
			}
			else
			{
				return 0;
			}
		}
	}
	
	public static function points_in_month($month)
	{
        if(Auth::check())
        {
            self::$info = Auth::info();
        }
		if(!empty(self::$info))
		{
			if($month < 13)
			{
				$mindate = mktime(1, 1, 1, $month, 1, date("Y"));
				$maxdate = mktime(24, 59, 59, $month, 30, date("Y"));
			}
			else
			{
				return 0;
			}
			$id = self::$info["id"];
			Db::bind("id", $id);
			Db::bind("mxdate", $mindate);
			Db::bind("mndate", $maxdate);
			$query = "SELECT * FROM hits WHERE user_id = :id and created_at > :mxdate and created_at < :mndate";
			$get = Db::query($query);
			$count = 0;
			if(!empty($get) and is_array($get))
			{
				foreach($get as $web)
				{
					if(isset($web["point"]))
					{
						$addhit += $web["point"];
					}
					else
					{
						$addhit += 0;
					}
				}
				return $addhit;
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
	
	public static function all_hits_in_month($month)
	{
        if(Auth::check())
        {
            self::$info = Auth::info();
        }
		if(!empty($month))
		{
			if($month < 13)
			{
				$mindate = mktime(1, 1, 1, $month, 1, date("Y"));
				$maxdate = mktime(24, 59, 59, $month, 30, date("Y"));
			}
			else
			{
				return 0;
			}
			Db::bind("mxdate", $mindate);
			Db::bind("mndate", $maxdate);
			$query = "SELECT COUNT(id) FROM hits WHERE created_at > :mxdate and created_at < :mndate";
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
	}
	
	public static function all_points_in_month($month)
	{
        if(Auth::check())
        {
            self::$info = Auth::info();
        }
		if(!empty($month))
		{
			if($month < 13)
			{
				$mindate = mktime(1, 1, 1, $month, 1, date("Y"));
				$maxdate = mktime(24, 59, 59, $month, 30, date("Y"));
			}
			else
			{
				return 0;
			}
			Db::bind("mxdate", $mindate);
			Db::bind("mndate", $maxdate);
			$query = "SELECT * FROM hits WHERE created_at > :mxdate and created_at < :mndate";
			$get = Db::query($query);
			$count = 0;
			if(!empty($get) and is_array($get))
			{
				foreach($get as $web)
				{
					if(!empty($web["point"]))
					{
						$addhit = $web["point"];
					}
					else
					{
						$addhit = 0;
					}
					$count = $count+$addhit;
				}
				return $count;
			}
			else
			{
				return 0;
			}
		}
	}
	
	public static function all_hits()
	{
		$query = "SELECT COUNT(id) FROM hits";
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
	
	public static function all_points()
	{
		$query = "SELECT * FROM users";
		$get = Db::query($query);
		$count = 0;
		if(!empty($get) and is_array($get))
		{
			foreach($get as $web)
			{
				if(!empty($web["points"]))
				{
					$addhit = $web["points"];
				}
				else
				{
					$addhit = 0;
				}
				if(!empty($addhit))
				{
					$count = $count+$addhit;
				}
				else
				{
					$count = $count+0;
				}
			}
			return $count;
		}
		else
		{
			return 0;
		}
	}
	
	public static function all_hits_by_browser($browser)
	{
		if(!empty($browser))
		{
			$query = "SELECT COUNT(id) FROM hits WHERE browser = :br";
			Db::bind("br", $browser);
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
	}
	
	public static function all_hits_by_os($os)
	{
		if(!empty($os))
		{
			$query = "SELECT COUNT(id) FROM hits WHERE os = :item";
			Db::bind("item", $os);
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
	}
	
}
?>