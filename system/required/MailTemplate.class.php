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

class MailTemplate
{
	
    public static $themes_path = "themes/mail/";
	
    public static function default_template()
    {
        $default_template = s("mail_template");
        if(!empty($default_template))
        {
            return $default_template;
        }
        else
        {
            return $GLOBALS["_SETTINGS"]["MAILTEMPLATE"];
        }
    }
    
    public static function themes_path()
    {
        return self::$themes_path;
    }
    
    public static function url()
    {
        return Sys::url().'/'.self::$themes_path.self::default_template();
    }
    
    private static function read($file)
    {
        $filename = self::themes_path().self::default_template()."/".$file.".html";
		$filename2 = self::themes_path().self::default_template()."/".$file;
        if(is_file($filename))
        {
            $handle = fopen($filename, "r");
            $contents = fread($handle, filesize($filename));
            fclose($handle);
            return $contents;
        }
        else if(is_file($filename2))
        {
            $handle = fopen($filename2, "r");
            $contents = fread($handle, filesize($filename2));
            fclose($handle);
            return $contents;
        }
        else
        {
            return false;
        }
    }
	
	public static function make($file, $replace=array())
	{
		$content = self::read($file);
		$replace["url"] = self::url();
		if($content && !empty($replace) && is_array($replace))
		{
			foreach($replace as $key => $value)
			{
				$content = str_replace("<<<:".$key.":>>>", $value, $content);
			}
			return $content;
		}
		else
		{
			return $content;
		}
	}
	
}
?>