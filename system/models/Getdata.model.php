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

class Getdata extends BaseModel
{

    public static function howmany($op="", $binds=array())
	{
		if(!empty($op))
		{
            if(!empty($binds) && is_array($binds))
            {
                foreach($binds as $bind => $value)
                {
                    Db::bind($bind, $value);
                }
            }
			$query = "SELECT COUNT(id) FROM ".$op;
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

    public static function one_user($id)
    {
        Db::bind("id", $id);
		$query = "SELECT * FROM `users` WHERE id = :id";
		$get = Db::query($query);
		if(!empty($get))
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

    public static function one_exchange($id)
    {
        Db::bind("id", $id);
		$query = "SELECT * FROM `exchange` WHERE id = :id";
		$get = Db::query($query);
		if(!empty($get))
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_newsletter($id)
    {
        Db::bind("id", $id);
		$query = "SELECT * FROM `newsletteres` WHERE id = :id";
		$get = Db::query($query);
		if(!empty($get))
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_plan($id)
    {
        Db::bind("id", $id);
		$query = "SELECT * FROM `plans` WHERE id = :id";
		$get = Db::query($query);
		if(!empty($get))
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_website($id)
    {
        Db::bind("id", $id);
		$query = "SELECT * FROM `websites` WHERE id = :id";
		$get = Db::query($query);
		if(!empty($get))
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_payment($id)
    {
        Db::bind("id", $id);
		$query = "SELECT * FROM `payments` WHERE id = :id";
		$get = Db::query($query);
		if(!empty($get))
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_referral($id)
    {
        Db::bind("id", $id);
		$query = "SELECT * FROM `referrals` WHERE id = :id";
		$get = Db::query($query);
		if(!empty($get))
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

    public static function one_admin($id)
    {
        Db::bind("id", $id);
		$query = "SELECT * FROM `admins` WHERE id = :id";
		$get = Db::query($query);
		if(!empty($get))
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

    public static function one_active_user($id)
    {
        Db::bind("uid", $id);
		Db::bind("status", "1");
		$query = "SELECT * FROM `users` WHERE id = :uid and status = :status";
		$get = Db::query($query);
		if(!empty($get) && $get[0]["status"] == "1")
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

    public static function one_active_exchange($id)
    {
        Db::bind("uid", $id);
		Db::bind("status", "1");
		$query = "SELECT * FROM `exchange` WHERE id = :uid and status = :status";
		$get = Db::query($query);
		if(!empty($get) && $get[0]["status"] == "1")
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_active_user_using_username($id)
    {
        Db::bind("uid", $id);
		Db::bind("status", "1");
		$query = "SELECT * FROM `users` WHERE username = :uid and status = :status";
		$get = Db::query($query);
		if(!empty($get) && $get[0]["status"] == "1")
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_active_plan($id)
    {
        Db::bind("uid", $id);
		Db::bind("status", "1");
		$query = "SELECT * FROM `plans` WHERE id = :uid and status = :status";
		$get = Db::query($query);
		if(!empty($get) && $get[0]["status"] == "1")
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_active_website($id)
    {
        Db::bind("uid", $id);
		Db::bind("status", "1");
		$query = "SELECT * FROM `websites` WHERE id = :uid and status = :status";
		$get = Db::query($query);
		if(!empty($get) && $get[0]["status"] == "1")
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_active_payment($id)
    {
        Db::bind("uid", $id);
		Db::bind("status", "1");
		$query = "SELECT * FROM `payments` WHERE id = :uid and status = :status";
		$get = Db::query($query);
		if(!empty($get) && $get[0]["status"] == "1")
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

	public static function one_active_referral($id)
    {
        Db::bind("uid", $id);
		Db::bind("status", "1");
		$query = "SELECT * FROM `referrals` WHERE id = :uid and status = :status";
		$get = Db::query($query);
		if(!empty($get) && $get[0]["status"] == "1")
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

    public static function one_active_admin($id)
    {
        Db::bind("id", $id);
		Db::bind("status", "1");
		$query = "SELECT * FROM `admins` WHERE id = :id and status = :status";
		$get = Db::query($query);
		if(!empty($get) && $get[0]["status"] == "1")
		{
			$info = $get[0];
			return $info;
		}
		else
		{
			return array();
		}
    }

    public static function admin_search($search="", $kind="", $start="", $limit="")
    {
        $kind = strtolower($kind);
        switch($kind)
        {
            case 'users':
                $real_query = "users WHERE id LIKE :id or username LIKE :username or email LIKE :email  or type LIKE :type";
                Db::bind("id", "%".$search."%");
                Db::bind("username", "%".$search."%");
                Db::bind("email", "%".$search."%");
                Db::bind("type", "%".$search."%");
            break;
            case 'websites':
                $real_query = "websites WHERE id LIKE :id or user_id LIKE :userid or url LIKE :url  or geolocation LIKE :geolocation";
                Db::bind("id", "%".$search."%");
                Db::bind("userid", "%".$search."%");
                Db::bind("url", "%".$search."%");
                Db::bind("geolocation", "%".$search."%");
            break;
            case 'payments':
                $real_query = "payments WHERE id LIKE :id or payment_id LIKE :paymentid or amount LIKE :amount  or payment_service LIKE :paymentservice or currency LIKE :currency";
                Db::bind("id", "%".$search."%");
                Db::bind("paymentid", "%".$search."%");
                Db::bind("paymentid", "%".$search."%");
                Db::bind("paymentservice", "%".$search."%");
                Db::bind("currency", "%".$search."%");
            break;
            case 'plans':
                $real_query = "plans WHERE id LIKE :id or name LIKE :name or price LIKE :price  or type LIKE :type or currency LIKE :currency";
                Db::bind("id", "%".$search."%");
                Db::bind("name", "%".$search."%");
                Db::bind("price", "%".$search."%");
                Db::bind("currency", "%".$search."%");
                Db::bind("type", "%".$search."%");
            break;
            case 'newsletteres':
                $real_query = "newsletteres WHERE id LIKE :id or name LIKE :name or subject LIKE :subject or to_group LIKE :togroup";
                Db::bind("id", "%".$search."%");
                Db::bind("name", "%".$search."%");
                Db::bind("subject", "%".$search."%");
                Db::bind("togroup", "%".$search."%");
            break;
        }
        if(!empty($real_query))
        {
            if(!empty($start) or $start ==0 && !empty($limit))
            {
                Db::bind("start", $start);
                Db::bind("limit", $limit);
                $query = "SELECT * FROM ".$real_query." ORDER BY id DESC LIMIT :start, :limit";
            }
            else if(!empty($limit))
            {
                Db::bind("limit", $limit);
                $query = "SELECT * FROM ".$real_query." ORDER BY id DESC LIMIT :limit";
            }
            else
            {
                $query = "SELECT * FROM ".$real_query." ORDER BY id DESC LIMIT 10";
            }
            $get = Db::query($query);
            if(!empty($get))
            {
                return $get;
            }
            else
            {
                return array();
            }
        }
        else
        {
            return array();
        }
    }

    public static function users($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `users` ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `users` ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `users` ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }


    public static function exchanges($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `exchange` ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `exchange` ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `exchange` ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function newsletteres($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `newsletteres` ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `newsletteres` ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `newsletteres` ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }


	public static function plans($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `plans` ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `plans` ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `plans` ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function websites($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `websites` ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `websites` ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `websites` ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function payments($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `payments` ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `payments` ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `payments` ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function withdrawals($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `wallet` WHERE withdrawal_sold > 0 ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `payments` WHERE withdrawal_sold > 0 ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `payments` WHERE withdrawal_sold > 0 ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function user_websites($id, $start="", $limit="")
    {
		Db::bind("id", $id);
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `websites` WHERE user_id = :id ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `websites` WHERE user_id = :id ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `websites` WHERE user_id = :id ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function referrals($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `referrals` ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `referrals` ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `referrals` ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }


    public static function admins($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `admins` ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `admins` ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `admins` ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

    public static function search_users($start="", $limit="", $search_query="")
    {
		$search_query = '%'.strip_tags(str_replace(array("<", ">"), "", $search_query)).'%';
		Db::bind("username", $search_query);
		Db::bind("about", $search_query);
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `users` WHERE `username` LIKE :username OR `about` LIKE :about ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `users` WHERE `username` LIKE :username OR `about` LIKE :about ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `users` WHERE `username` LIKE :username OR `about` LIKE :about ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

    public static function active_users($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `users` WHERE status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `users` WHERE status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `users` WHERE status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

    public static function active_exchanges($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `exchange` WHERE status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `exchange` WHERE status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `exchange` WHERE status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function active_plans($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `plans` WHERE status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `plans` WHERE status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `plans` WHERE status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function unconfirmed_websites($start="", $limit="")
	{
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			Db::bind("act", "0");
			$query = "SELECT * FROM `websites` WHERE activated = :act RDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			Db::bind("act", "0");
			$query = "SELECT * FROM `websites` WHERE activated = :act ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			Db::bind("act", "0");
			$query = "SELECT * FROM `websites` WHERE activated = :act ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
	}

	public static function reported_websites($start="", $limit="")
	{
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			Db::bind("act", "1");
			$query = "SELECT * FROM `websites` WHERE reported = :act RDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			Db::bind("act", "1");
			$query = "SELECT * FROM `websites` WHERE reported = :act ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			Db::bind("act", "1");
			$query = "SELECT * FROM `websites` WHERE reported = :act ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
	}

	public static function active_websites($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `websites` WHERE status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `websites` WHERE status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `websites` WHERE status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function active_payments($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `payments` WHERE status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `payments` WHERE status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `payments` WHERE status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function user_active_websites($id, $start="", $limit="")
    {
		Db::bind("id", $id);
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `websites` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `websites` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `websites` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function user_active_exchanges($id, $start="", $limit="")
    {
		Db::bind("id", $id);
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `exchange` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `exchange` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `exchange` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function user_active_referrals($id, $start="", $limit="")
    {
		Db::bind("id", $id);
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `referrals` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `referrals` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `referrals` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function user_active_payments($id, $start="", $limit="")
    {
		Db::bind("id", $id);
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `payments` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `payments` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `payments` WHERE user_id = :id and status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

	public static function active_referrals($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `referrals` WHERE status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `referrals` WHERE status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `referrals` WHERE status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }


    public static function active_admins($start="", $limit="")
    {
		if(!empty($start) or $start ==0 && !empty($limit))
		{
            Db::bind("start", $start);
            Db::bind("limit", $limit);
			$query = "SELECT * FROM `admins` WHERE status = '1' ORDER BY id DESC LIMIT :start, :limit";
		}
		else if(!empty($limit))
		{
			Db::bind("limit", $limit);
			$query = "SELECT * FROM `admins` WHERE status = '1' ORDER BY id DESC LIMIT :limit";
		}
		else
		{
			$query = "SELECT * FROM `admins` WHERE status = '1' ORDER BY id DESC LIMIT 10";
		}
		$get = Db::query($query);
		if(!empty($get))
		{
			return $get;
		}
		else
		{
			return array();
		}
    }

}

?>
