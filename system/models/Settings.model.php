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

class Settings extends BaseModel
{
    
    public static function load($match="")
    {
        $get_settings = Db::query("SELECT * from settings");
        if(is_array($get_settings) && !empty($get_settings))
        {
            foreach($get_settings as $setting)
            {

                $GLOBALS["_SETTINGSFROMDB"][$setting[option_name]] = unserialize($setting[option_value]);

            }
        }
    }
    
    private static function safe_path($path)
    {
        $path = trim($path);
        $path = rtrim(strip_tags($path), "/");
        $path = ltrim($path, "/");
        while(preg_match("/\/\//", $path))
        {
            $path = str_replace("//", "/", $path);
        }
        return $path;
    }
	
    private static function read($path)
    {
        $arrayToAccess = $GLOBALS["_SETTINGSFROMDB"];
        $indexPath = self::safe_path($path);
        $explodedPath = explode('/', $indexPath);
        $value =& $arrayToAccess;
        if(is_array($explodedPath) && !empty($explodedPath))
        {
            foreach ($explodedPath as $key) 
            {
                $value =& $value[$key];
            }
        }
        else
        {
            $path = str_replace("/", "", $path);
            $value =& $value[$path];
        }
        return $value;
    }
	
	private static function update($name, $newdata=array())
	{
        $name = strip_tags($name);
		Db::bind("name", $name);
		if(is_array($newdata))
		{
			Db::bind("data", serialize($newdata));
		}
		else
		{
			Db::bind("data", serialize(array()));
		}
		Db::bind("uat", time());
		if(Db::query("UPDATE settings SET `option_value` = :data, `updated_at` = :uat WHERE `option_name` = :name"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public static function set($name, $value=array())
    {
        return self::update($name, $value);
    }
	
    public static function get($path)
    {
        return self::read($path);
    }
}

?>