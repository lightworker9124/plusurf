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

class Points extends BaseModel
{
    
    public static $info = array();
    
    public static function info($info)
    {
        self::$info = $info;
    }
    
	public static function calcul($duration)
	{
		if(!empty($duration) && !empty(self::$info))
		{
			$u = self::$info;
			$ratio = $u["traffic_ratio"];
			if(empty($ratio)){ return ""; }
			$point_per_minute = s("nochange/point");
			if(empty($point_per_minute)){ return ""; }
			$point = abs((($duration*$point_per_minute/60)*($ratio))/100);
			return $point;
		}
	}
	
	public static function our_points($duration)
	{
		if(!empty($duration) && !empty(self::$info))
		{
			$u = self::$info;
			$ratio = $u["traffic_ratio"];
			if(empty($ratio)){ return ""; }
			$point_per_minute = s("nochange/point");
			if(empty($point_per_minute)){ return ""; }
			$point = abs((($duration*$point_per_minute/60)*(100-$ratio))/100);
			return $point;
		}
	}
	
	public static function add($wid)
	{
        $u = self::$info;
		if(!empty($wid) && !empty(self::$info))
		{
			if($wid == "noexchange")
			{
				$id      = $u["id"];
				$points  = self::calcul(6);
				$tpoints = $points;
				More::remove_our_traffic($tpoints);
				More::traffic($id, $tpoints);
			}
			else if($wid != "noexchange")
			{
				$website = Getdata::one_active_website($wid);
				if(!empty($website))
				{
					$check_sold = floor($u["points"] < 0.6);
					if($check_sold)
					{
						self::stop_websites($usr["id"]);
					}
					$id      = $u["id"];
					$points  = self::calcul($website["duration"]);;
					$ourp    = self::our_points($website["duration"]);
					$tpoints = $points+$ourp;
					More::remove_traffic($website["user_id"], $tpoints);
					More::our_traffic($ourp);
					More::traffic($id, $points);
				}
			}	
		}
	}
	
	public static function empty_points($user_id)
	{
		if(!empty($user_id))
		{
			$query = "UPDATE users SET `points` = '0' WHERE id = :uid";
			Db::bind("uid", $user_id);
			$run = Db::query($query);
			if($run)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	public static function stop_websites($user_id)
	{
		if(!empty($user_id))
		{
			$query = "UPDATE websites SET `user_points` = 'expired' WHERE user_id = :uid";
			Db::bind("uid", $user_id);
			Db::query($query);
		}
	}
	
	public static function active_websites($user_id)
	{
		if(!empty($user_id))
		{
			$query = "UPDATE `websites` SET `user_points` = :status WHERE user_id = :id";
			Db::bind("id", $user_id);
			Db::bind("status", "working");
			$d = Db::query($query);
		}
	}
    
    public static function get($user_id)
	{
		if(!empty($user_id))
		{
			$query = "SELECT * FROM `users` WHERE id = :id";
			Db::bind("id", $user_id);
			$ex = Db::query($query);
            if(!empty($ex))
            {
                return $ex[0]["points"];
            }
            else
            {
                return false;
            }
		}
	}
}
?>