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

class Social_Auth extends BaseModel
{
    public static $config = array();
    public static $providers = array(
        "facebook" => "Facebook",
        "twitter" => "Twitter",
        "google" => "Google"
    );
    
    public static function config($config)
    {
        self::$config = $config;   
    }
    
	public static function login($match="")
    {
        Auth::table("users");
        if(isset($_REQUEST['hauth_start']))
        {
            $provider = strip_tags($_REQUEST['hauth_start']);
        }
        if(isset($_REQUEST['hauth_done']))
        {
            $provider = strip_tags($_REQUEST['hauth_done']);
        }
        if(isset($_REQUEST['access']))
        {
            $provider = strip_tags($_REQUEST['access']);
        }
        if(!empty($provider) && in_array(strtolower($provider), array_keys(self::$providers)))
        {
            $config = array(
                "base_url" => router("social_connect"),
                "providers" => array (
                    "Facebook" => array (
                        "enabled" => true,
                        "keys"    => array ( "id" => s("socialauth/facebook/id"), "secret" => s("socialauth/facebook/secret")),
                        "scope"   => "email, user_about_me, user_birthday, user_hometown", // optional
                        "display" => "page"
                    ),
                    "Google" => array (
                        "enabled" => true,
                        "keys" => array("id" => s("socialauth/google/id"), "secret" => s("socialauth/google/secret"))
                    ),
                    "Twitter" => array (
                        "enabled" => true,
                        "keys" => array("key" => s("socialauth/twitter/key"), "secret" => s("socialauth/twitter/secret")),
                        "includeEmail" => true
                    )
                )
            );
            require_once( "system/libraries/Hybrid/Auth.php" );
            require_once( "system/libraries/Hybrid/Endpoint.php" );
            if (isset($_REQUEST['hauth_start']) || isset($_REQUEST['hauth_done']))
            {
                Hybrid_Endpoint::process();
            }
            $hybridauth = new Hybrid_Auth( $config );
            switch($provider)
            {
                case 'Facebook':
                    $adapter = $hybridauth->authenticate( "Facebook" );
                    $user_profile = $adapter->getUserProfile();
                    if(!empty($user_profile))
                    {
                        foreach ($user_profile as $row) {
                            $id       = $user_profile->identifier;
                            $username = $user_profile->firstName;
                            $email    = $user_profile->email;
                            $email_adresse = "";
                            if(!empty($email) && Check::is_email($email) && !Auth::check_email($email))
                            {
                                $email_adresse = $email;
                            }
                        }
                    }
                    $name = strtolower($provider);
                    if(self::add_if_not_exists($name, $id, $username, $email_adresse))
                    {
                        if(Auth::social_login($name, $id))
                        {
                            to_router("home");
                        }
                        else
                        {
                            header("location: ".router("login")."?error=Error_Login");
                        }
                    }
                    else
                    {
                        header("location: ".router("login")."?error=Error_Check_User");
                    }
                break;
                case 'Twitter':
                    $adapter = $hybridauth->authenticate( "Twitter" );
                    $user_profile = $adapter->getUserProfile();
                    if(!empty($user_profile))
                    {
                        foreach ($user_profile as $row) {
                            $id       = $user_profile->identifier;
                            $username = $user_profile->firstName;
                            $email    = $user_profile->email;
                            $email_adresse = "";
                            if(!empty($email) && Check::is_email($email) && !Auth::check_email($email))
                            {
                                $email_adresse = $email;
                            }
                        }
                    }
                    $name = strtolower($provider);
                    if(self::add_if_not_exists($name, $id, $username, $email_adresse))
                    {
                        if(Auth::social_login($name, $id))
                        {
                            to_router("home");
                        }
                        else
                        {
                            header("location: ".router("login")."?error=Error_Login");
                        }
                    }
                    else
                    {
                        header("location: ".router("login")."?error=Error_Check_User");
                    }
                break;
                case 'Google':
                    $adapter = $hybridauth->authenticate( "Google" );
                    $user_profile = $adapter->getUserProfile();
                    if(!empty($user_profile))
                    {
                        foreach ($user_profile as $row) {
                            $id       = $user_profile->identifier;
                            $username = $user_profile->firstName;
                            $email    = $user_profile->email;
                            $email_adresse = "";
                            if(!empty($email) && Check::is_email($email) && !Auth::check_email($email))
                            {
                                $email_adresse = $email;
                            }
                        }
                    }
                    $name = strtolower($provider);
                    if(self::add_if_not_exists($name, $id, $username, $email_adresse))
                    {
                        if(Auth::social_login($name, $id))
                        {
                            to_router("home");
                        }
                        else
                        {
                            header("location: ".router("login")."?error=Error_Login");
                        }
                    }
                    else
                    {
                        header("location: ".router("login")."?error=Error_Check_User");
                    }
                break;
            }
        }
        else
        {
            to_router("login");
        }
    }
    
    public static function add_if_not_exists($name, $id, $username="", $email="")
    {
        $name = strip_tags($name);
        $id = strip_tags($id);
        $username = strip_tags($username);
        $email = strip_tags($email);
        if(!in_array($name, array_keys(self::$providers)))
        {
            return false;
        }
        if(empty($id) && empty($id))
        {
            return false;
        }
        if(!self::check_exists($name, $id))
        {
            Db::bind("username", self::$providers[$name]." / ".$username);
            Db::bind("email", $email);
            Db::bind("password", "-- Social Auth --");
            Db::bind("pid", $id);
            Db::bind("pname", $name);
            Db::bind("activation", "");
            Db::bind("websites", s("defaults/website_slots"));
            Db::bind("sessions", s("defaults/session_slots"));
            Db::bind("tratio", s("defaults/traffic_ratio"));
            Db::bind("points", s("defaults/points"));
            Db::bind("createdat", time());
            Db::bind("updatedat", time());
            Db::bind("status", "1");
            $query = "INSERT into `users` (`username`, `email`, `provider_name`, `provider_id`, `password`, `website_slots`, `session_slots`, `traffic_ratio`, `points`, `status`, `activation_key`, `created_at`, `updated_at`) VALUES (:username, :email, :pname, :pid, :password, :websites, :sessions, :tratio, :points, :status, :activation, :createdat, :updatedat);"; 
            $ex = Db::query($query);
            if($ex)
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
            return true;
        }
    }
    
    public static function check_exists($name, $id)
    {
        Auth::table("users");
        return Auth::check_provider($name, $id);
    }
	
}
?>