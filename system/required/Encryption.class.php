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

class Encryption {
	
	private static $syskey = '';
    
    public static function randomstring($length = 8) 
	{
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return trim($randomString);
    }
	
    public static function direct($sysk)
    {
        $s_count = strlen($sysk);
        if(!empty($sysk) && $s_count >= 8)
        {
            self::$syskey = substr($sysk, 0, 8);
        } 
        else 
        {
            self::$syskey = "systemky";
        }
    }
    
    protected static function safe_b64encode($string)
	{
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    protected static function safe_b64decode($string)
	{
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public static function encode($value)
	{ 
        if(!$value){return false;}
        if(!empty(self::$syskey))
        {
            $s_key = self::$syskey;
        }
        else
        {
            $s_key = self::randomstring();
        }
        $text      = $value;
        $iv_size   = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv        = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $s_key.$GLOBALS["_SETTINGS"]["KEY"], $text, MCRYPT_MODE_ECB, $iv);
        return trim($s_key.self::safe_b64encode($crypttext)); 
    }

    public static function decode($value)
	{
        if(!$value){return false;}
		$custom_key  = substr($value, 0, 8); 
		$value       = str_replace($custom_key, "", $value);
        $crypttext   = self::safe_b64decode($value); 
        $iv_size     = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv          = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $custom_key.$GLOBALS["_SETTINGS"]["KEY"], $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }
	
    public static function generate($length = 10)
	{
        $generated = self::randomstring($length);
		$encode    = self::encode($generated);
		return $encode;
    }

}
?>