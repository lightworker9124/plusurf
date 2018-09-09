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

class Wallet extends BaseModel
{
	public static function create($id)
	{
		$id = strip_tags($id);
		Db::bind("userid", $id);
		$check = Db::query("SELECT * FROM wallet WHERE user_id = :userid");
		if(empty($check) or $check[0]["user_id"]!=$id)
		{
			Db::bind("uid", $id);
			Db::bind("cat", time());
			Db::bind("uat", time());
			Db::bind("status", "1");
			Db::bind("confirmed", "0");
			Db::bind("pending", "0");
			Db::bind("withdrawal", "0");
			$query = "INSERT INTO wallet(`user_id`, `confirmed_sold`, `pending_sold`, `withdrawal_sold`, `status`, `created_at`, `updated_at`) VALUES(:uid, :confirmed, :pending, :withdrawal, :status, :cat, :uat)";
			if(Db::query($query))
			{
				return true;
			}
			return false;
		}
		return true;
	}
	
	public static function add($howmuch, $to, $id)
	{
		$to      = strip_tags($to);
		$howmuch = strip_tags($howmuch);
		$id      = strip_tags($id);
		
		if(!is_numeric($howmuch)) 
		{ 
			return false; 
		}
		else
		{
			$old = self::info($id);
			if(empty($old))
			{
				return false;
			}
		}
		
		switch($to)
		{
			case 'confirmed':
				$howmuch = $howmuch+$old["confirmed_sold"];
				Db::bind("uat", time());
				Db::bind("howmuch", $howmuch);
				Db::bind("uid", $id);
				$run = Db::query("UPDATE wallet SET `confirmed_sold` = :howmuch, `updated_at` = :uat WHERE user_id = :uid");
				if($run) 
				{
					return true;
				}
			break;
			case 'pending':
				$howmuch = $howmuch+$old["pending_sold"];
				Db::bind("uat", time());
				Db::bind("howmuch", $howmuch);
				Db::bind("uid", $id);
				$run = Db::query("UPDATE wallet SET `pending_sold` = :howmuch, `updated_at` = :uat WHERE user_id = :uid");
				if($run) 
				{
					return true;
				}
			break;
			case 'withdrawal':
				$howmuch = $howmuch+$old["withdrawal_sold"];
				Db::bind("uat", time());
				Db::bind("howmuch", $howmuch);
				Db::bind("uid", $id);
				$run = Db::query("UPDATE wallet SET `withdrawal_sold` = :howmuch, `updated_at` = :uat WHERE user_id = :uid");
				if($run) 
				{
					return true;
				}
			break;
			default:
				return false;
			break;
		}
	}
	
	public static function remove($howmuch, $from, $id)
	{
		$from = strip_tags($from);
		$howmuch = strip_tags($howmuch);
		$id      = strip_tags($id);
		
		if(!is_numeric($howmuch)) 
		{ 
			return false; 
		}
		else
		{
			$old = self::info($id);
			if(empty($old))
			{
				return false;
			}
		}
		
		switch($from)
		{
			case 'confirmed':
				$howmuch = $old["confirmed_sold"]-$howmuch;
				Db::bind("uat", time());
				Db::bind("howmuch", $howmuch);
				Db::bind("uid", $id);
				$run = Db::query("UPDATE wallet SET `confirmed_sold` = :howmuch, `updated_at` = :uat WHERE user_id = :uid");
				if($run) 
				{
					return true;
				}
			break;
			case 'pending':
				$howmuch = $old["pending_sold"]-$howmuch;
				Db::bind("uat", time());
				Db::bind("howmuch", $howmuch);
				Db::bind("uid", $id);
				$run = Db::query("UPDATE wallet SET `pending_sold` = :howmuch, `updated_at` = :uat WHERE user_id = :uid");
				if($run) 
				{
					return true;
				}
			break;
			case 'withdrawal':
				$howmuch = $old["withdrawal_sold"]-$howmuch;
				Db::bind("uat", time());
				Db::bind("howmuch", $howmuch);
				Db::bind("uid", $id);
				$run = Db::query("UPDATE wallet SET `withdrawal_sold` = :howmuch, `updated_at` = :uat WHERE user_id = :uid");
				if($run) 
				{
					return true;
				}
			break;
			default:
				return false;
			break;
		}
	}
	
	public static function empty_sold($to, $id)
	{
		$to      = strip_tags($to);
		$id      = strip_tags($id);
		
		switch($to)
		{
			case 'confirmed':
				Db::bind("uat", time());
				Db::bind("howmuch", "0");
				Db::bind("uid", $id);
				$run = Db::query("UPDATE wallet SET `confirmed_sold` = :howmuch, `updated_at` = :uat WHERE user_id = :uid");
				if($run) 
				{
					return true;
				}
			break;
			case 'pending':
				Db::bind("uat", time());
				Db::bind("howmuch", "0");
				Db::bind("uid", $id);
				$run = Db::query("UPDATE wallet SET `pending_sold` = :howmuch, `updated_at` = :uat WHERE user_id = :uid");
				if($run) 
				{
					return true;
				}
			break;
			case 'withdrawal':
				Db::bind("uat", time());
				Db::bind("howmuch", "0");
				Db::bind("uid", $id);
				$run = Db::query("UPDATE wallet SET `withdrawal_sold` = :howmuch, `updated_at` = :uat WHERE user_id = :uid");
				if($run) 
				{
					return true;
				}
			break;
			default:
				return false;
			break;
		}
	}
	
	public static function move($sold, $from, $to, $id)
	{
		$id   = strip_tags($id);
		$from = strtolower(strip_tags($from));
		$to   = strtolower(strip_tags($to));
		$sold = strip_tags($sold);
		$check_array = array("confirmed", "pending", "withdrawal");
		$check_db_array = array("confirmed_sold", "pending_sold", "withdrawal_sold");
		if(!empty($id) && in_array($from, $check_array) && in_array($to, $check_array))
		{
			$info = self::info($id);
			if(!empty($info))
			{
				$fromkey   = trim($from)."_sold";
				$tokey     = trim($to)."_sold";
				$move_sold = $sold;
				if(!empty($move_sold) && is_numeric($move_sold) && in_array($fromkey, $check_db_array) && in_array($tokey, $check_db_array))
				{
					$remove = self::remove($move_sold, $from, $id);
					if($remove)
					{
						$add = self::add($move_sold, $to, $id);
						if($add)
						{
							return true;
						}
						else
						{
							self::add($move_sold, $from, $id);
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
	
	public static function move_all($from, $to, $id)
	{
		$id   = strip_tags($id);
		$from = strtolower(strip_tags($from));
		$to   = strtolower(strip_tags($to));
		$check_array = array("confirmed", "pending", "withdrawal");
		$check_db_array = array("confirmed_sold", "pending_sold", "withdrawal_sold");
		if(!empty($id) && in_array($from, $check_array) && in_array($to, $check_array))
		{
			$info = self::info($id);
			if(!empty($info))
			{
				$fromkey   = trim($from)."_sold";
				$tokey     = trim($to)."_sold";
				$move_sold = $info[$fromkey];
				if(!empty($move_sold) && is_numeric($move_sold) && in_array($fromkey, $check_db_array) && in_array($tokey, $check_db_array))
				{
					$empty = self::empty_sold($from, $id);
					if($empty)
					{
						$add = self::add($move_sold, $to, $id);
						if($add)
						{
							return true;
						}
						else
						{
							self::add($move_sold, $from, $id);
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
	
	public static function info($id)
	{
		$id = strip_tags($id);
		Db::bind("uid", $id);
		$query = "SELECT * FROM wallet WHERE user_id = :uid";
		$run   = Db::query($query);
		if($run && !empty($run[0]))
		{
			if(empty($run[0]["comfirmed_sold"])) { $run[0]["comfirmed_sold"]  = "0"; }
			if(empty($run[0]["pending_sold"]))   { $run[0]["pending_sold"]    = "0"; }
			if(empty($run[0]["withdrawal_sold"])){ $run[0]["withdrawal_sold"] = "0"; }
			return $run[0];
		}
		else
		{
			return false;
		}
	}
	
	public static function withdrawal_to($method, $id)
	{
		$id     = strip_tags($id);
		$method = strip_tags($method);
		Db::bind("uid", $id);
		Db::bind("met", $method);
		$query = "UPDATE wallet SET `withdrawal_to` = :met WHERE user_id = :uid";
		$run   = Db::query($query);
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
?>