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

class Upgrade extends BaseModel
{
	public static function export_time($value)
	{
		$value  = explode("-", $value);
		$type   = strtolower($value[1]);
		$number = $value[0];
		if($number < 0)
		{
			$number = 0;
		}
		if(!empty($number) && !empty($type))
		{
			if($type=="y")
			{
				$time = time()+floor((86400*366)*$number);
			}
			else if($type=="m")
			{
				$time = time()+floor((86400*31)*$number);
			}
			else if($type=="d")
			{
				$time = time()+floor((86400*1)*$number);
			}
			else
			{
				$time = time();
			}
			return $time;
		}
		else
		{
			return time();
		}
	}
	
	public static function up($userid, $traffic_ratio, $websites, $sessions, $time)
	{
		Db::bind("uid", strip_tags($userid));
		Db::bind("tratio", strip_tags($traffic_ratio));
		Db::bind("webslots", strip_tags($websites));
		Db::bind("websessions", strip_tags($sessions));
		Db::bind("exptime", self::export_time($time));
		if(Db::query("UPDATE users SET `type` = 'pro', `traffic_ratio` = :tratio, `website_slots` = :webslots, `session_slots` = :websessions, `pro_exp` = :exptime WHERE id = :uid"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public static function down($userid, $traffic_ratio, $websites, $sessions)
	{
		Db::bind("uid", strip_tags($userid));
		Db::bind("tratio", strip_tags($traffic_ratio));
		Db::bind("webslots", strip_tags($websites));
		Db::bind("websessions", strip_tags($sessions));
		Db::bind("exptime", time());
		if(Db::query("UPDATE users SET `type` = 'free', `website_slots` = :webslots, `session_slots` = :websessions, `traffic_ratio` = :tratio, `pro_exp` = :exptime WHERE id = :uid"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>