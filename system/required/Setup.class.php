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

class Setup
{
    
    public static function scan()
    {
        $dir = "system/setup/";
        $ext = ".setup.php";
        $classes = glob($dir."*".$ext, GLOB_BRACE);
        if(!empty($classes))
        {
            foreach($classes as $key => $value)
            {
                $class[$key] = str_replace($dir, "", $value);
                $class[$key] = str_replace($ext, "", $class[$key]);
            }

            return $class;
        }
        else
        {
            return array();
        }
    }
    
    private static function load($class)
    {
        $dir = "system/setup/";
        $ext = ".setup.php";
        $file = $dir.$class.$ext;
        if(is_file($file))
        {
            require_once($file);
        }
    }
    
    public static function install()
    {
        if(Db::check())
        {
            $scan = self::scan();
            if(!empty($scan))
            {
                foreach($scan as $table)
                {
                    self::load($table);
                    if(is_callable(array($table, "install")) && $table::install())
                    {
                        //success
                    }
                    else
                    {
                        Sys::error("Install error : cannot find the installing class - please reinstall it !");
                    }
                }
            }
            else
            {
                Sys::error("Install error : There is no tables to install it !");
                return false;
            }
        }
        else
        {
            Sys::error("Install error : Error connect to the database !");
            return false;
        }
    }
    
    public static function uninstall()
    {
        if(Db::check())
        {
            $scan = self::scan();
            if(!empty($scan))
            {
                foreach($scan as $table)
                {
                    self::load($table);
                    if(is_callable(array($table, "uninstall")) && $table::uninstall())
                    {
                        //success
                    }
                    else
                    {
                        Sys::error("UnInstall error : cannot find the uninstalling class");
                    }
                }
            }
            else
            {
                Sys::error("UnInstall error : There is no tables to uninstall it !");
                return false;
            }
        }
        else
        {
            Sys::error("UnInstall error : Error connect to the database !");
            return false;
        }
    }

    public static function install_once($table="")
    {
        if(Db::check())
        {
            $scan = self::scan();
            if(!empty($scan) && in_array($table, $scan))
            {
                self::load($table);
                if(is_callable(array($table, "install")) && $table::install())
                {
                    return true;
                }
                else
                {
                    Sys::error("Install error : cannot find the installing class");
                    return false;
                }
            }
            else
            {
                Sys::error("Install error : There is no tables to install it !");
                return false;
            }
        }
        else
        {
            Sys::error("Install error : Error connect to the database !");
            return false;
        }
    }
    
    public static function uninstall_once($table="")
    {
        if(Db::check())
        {
            if(!empty($table))
            {
                self::load($table);
                if(is_callable(array($table, "uninstall")) && $table::uninstall())
                {
                    return true;
                }
                else
                {
                    Sys::error("UnInstall error : cannot find the uninstalling class");
                    return false;
                }
            }
            else
            {
                Sys::error("UnInstall error : There is no tables to uninstall it !");
                return false;
            }
        }
        else
        {
            Sys::error("UnInstall error : Error connect to the database !");
            return false;
        }
    }
    
}
?>