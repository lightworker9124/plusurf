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

class More extends BaseModel
{
	public static function websites($userid, $website_slots)
	{
		$user = Getdata::one_user(strip_tags($userid));
		if(empty($user)) { return false; }
		Db::bind("uid", strip_tags($userid));
		Db::bind("wslots", strip_tags($website_slots));
		if(Db::query("UPDATE users SET `website_slots` = :wslots WHERE id = :uid"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public static function sessions($userid, $session_slots)
	{
		$user = Getdata::one_user(strip_tags($userid));
		if(empty($user)) { return false; }
		Db::bind("uid", strip_tags($userid));
		Db::bind("sslots", strip_tags($session_slots));
		if(Db::query("UPDATE users SET `session_slots` = :sslots WHERE id = :uid"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public static function traffic($userid, $points)
	{
		$user = Getdata::one_user(strip_tags($userid));
		if(empty($user)) { return false; }
		$points = $user["points"]+$points;
		Db::bind("uid", strip_tags($userid));
		Db::bind("points", strip_tags($points));
		if(Db::query("UPDATE users SET `points` = :points WHERE id = :uid"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public static function our_traffic($points)
	{
		$points = s("earned/points")+$points;
		Db::bind("name", "earned");
		Db::bind("points", serialize(array("points" => $points)));
		if(Db::query("UPDATE settings SET `option_value` = :points WHERE option_name = :name"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public static function remove_our_traffic($points)
	{
		$points = s("earned/points")-$points;
		Db::bind("name", "earned");
		Db::bind("points", serialize(array("points" => $points)));
		if(Db::query("UPDATE settings SET `option_value` = :points WHERE option_name = :name"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public static function remove_traffic($userid, $points)
	{
		$user = Getdata::one_user(strip_tags($userid));
		$points = $user["points"]-$points;
		Db::bind("uid", strip_tags($userid));
		Db::bind("points", strip_tags($points));
		if(Db::query("UPDATE users SET `points` = :points WHERE id = :uid"))
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