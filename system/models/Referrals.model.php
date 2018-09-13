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

class Referrals extends BaseModel
{
	
	public static function remember($id)
	{
		Cookie::set("ref", strip_tags($id));
	}	
	
	public static function add($id, $newid)
	{
		if(!Auth::check())
		{
			$id = Encryption::decode(strip_tags($id));
			$user = Getdata::one_active_user($id);
			if(!empty($user) && $user["id"] == $id)
			{
				Db::bind("uid", $user["id"]);
				Db::bind("nid", strip_tags($newid));
				Db::bind("ip", Sys::ip());
				if(s("generale/auto_confirm_referrals") == "1")
				{
					Db::bind("confirmed", "1");
				}
				else
				{
					Db::bind("confirmed", "0");
				}
				Db::bind("status", "1");
				Db::bind("cat", time());
				Db::bind("uat", time());
				Db::query("INSERT INTO `referrals`(`user_id`, `new_id`, `ip`, `confirmed`, `status`, `created_at`, `updated_at`) VALUES(:uid, :nid, :ip, :confirmed, :status, :cat, :uat)");
				if(s("generale/auto_confirm_referrals") == "1")
				{
					$points = s("defaults/referrals_points");
					Wallet::add($points, "confirmed", $user["id"]);
				}
				else
				{
					$points = s("defaults/referrals_points");
					Wallet::add($points, "pending", $user["id"]);
				}
			}
		}
	}
}
?>