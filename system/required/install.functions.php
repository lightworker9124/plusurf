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

require_once("Encryption.class.php");
require_once("Log.class.php");
require_once("Sys.class.php");
require_once("Db.class.php");
require_once("Check.class.php");

function get_version()
{
    $settings = Check::is_table("settings");
    $affiliate = Check::is_table("affiliate");
    $newsletteres = Check::is_table("newsletteres");
    if($settings)
    {
        $get_version = array();
        $get = Db::query("SELECT * FROM settings");
        if(!empty($get))
        {
            foreach($get as $data)
            {
                if(!empty($data["option_name"]))
                {
                    if($data["option_name"]=="version")
                    {
                        if(!empty($data["option_value"]))
                        {
                            $get_version = unserialize($data["option_value"]);
                        }
                    }
                }
            }
        }
        
    }
    if($settings && !$affiliate)
    {
        return "1.0";
    }
    else if($settings && $affiliate && !$newsletteres)
    {
        return "2.0";
    }
    else if($settings && $affiliate && $newsletteres && empty($get_version["plusurf"]))
    {
        return "3.0";
    }
    else if($settings && $affiliate && $newsletteres && !empty($get_version["plusurf"]))
    {
        return $get_version["plusurf"];
    }
    else
    {
        return "unknown";
    }
}

?>