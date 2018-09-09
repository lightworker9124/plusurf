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

/**
 * Usersonline is Smart class Gives you a live results
 * without cost you alot of space in your server
 * and without using any Database like Mysql...
 *
 */
class Usersonline extends BaseModel
{
    /* Setting the storage folder */
    private static $main_dir = "usersonline";
    /* The storage file extension */
    private static $ext = "data";
    /* Store the results info */
    private static $online = array();

    /**
     * Calcul how many things online
     *
     * @access public static
     * @param kind: String
     */
    public static function calcul($kind = "all")
    {
        /* Str to lower */
        $kind = strtolower($kind);
        switch($kind)
        {
            case 'guests':
                $data = "guest";
            break;
            case 'users':
                $data = "user";
            break;
            case 'admins':
                $data = "admin";
            break;
            case 'apis':
                $data = "api";
            break;
            case 'robots':
                $data = "robot";
            break;
            default:
                $data = "all";
            break;
        }
        if($data == "all")
        {
            /* calculate all Types  */
            $guests = self::refresh_and_count("guest");
            $users  = self::refresh_and_count("user");
            $admins = self::refresh_and_count("admin");
            $apis   = self::refresh_and_count("api");
            $robots = self::refresh_and_count("robot");
            $calcul = floor($guests+$users+$admins+$apis+$robots);
        }
        else
        {
            /* Calculate only one Type */
            $calcul = self::refresh_and_count($data);
        }
        return $calcul;
    }

    /**
     * Add new online to Data
     *
     * @access public static
     * @param kind: String
     */
    public static function add($kind="guest")
    {
        /* Get the real ip */
        $ip   = self::real_ip();

        /* Get the current time */
        $time = time();

        if(!empty($ip) && !empty($time))
        {
            /* Get the folder path */
            $path = self::get_path($kind);

            /* Scan all databases Extension */
            $get  = glob($path."*.".self::$ext);

            /* Count how many of databases */
            $datacount = count($get);

            /* Build The new data */
            $new_content = array("ip" => $ip, "time" => $time);
            if(!empty($get) && is_array($get))
            {
                $check_exist = false;
                foreach($get as $key => $data)
                {
                    /* Read and unserialize one database */
                    $newdata = self::read_data($data);

                    if(!empty($newdata) && is_array($newdata))
                    {
                        foreach($newdata as $key => $info)
                        {

                            if(is_array($info) && !empty($info))
                            {
                                $checkip = $info["ip"];
                            }
                            else
                            {
                                $checkip = null;
                            }

                            if($checkip == $ip)
                            {
                                $newmap[] = array("ip" => $ip, "time" => time());
                                $check_exist = true;
                            }
                            else
                            {
                                $newmap[] = $info;
                            }
                        }
                        /* Update the database with a Fresh data */
                        self::write_data($data, $newmap);
                    }
                }
                $updated = false;
                foreach($get as $key => $data)
                {
                    $filesize = filesize($data);
                    $thelast  = floor($key+1);
                    if(!$check_exist && !$updated)
                    {
                        /* check if the file is lower than 2MB */
                        if($filesize <= 2000000)
                        {
                            /* Read */
                            $old_content = self::read_data($data);
                            if(!empty($old_content) && is_array($old_content))
                            {
                                $old_content[sizeof($old_content)] = $new_content;
                                $final_content = $old_content;
                            }
                            else
                            {
                                $final_content = $new_content;
                            }
                            /* Write or Update the database */
                            self::write_data($data, $final_content);
                            $updated = true;
                        }
                        else if($datacount == $thelast)
                        {
                            /* Get a name for the new databse */
                            $newkey = Encryption::generate(8);
                            /* Get the new database path */
                            $path   = self::get_path($kind).$newkey.".".self::$ext;
                            /* Put the content */
                            self::write_data($path, $new_content);
                            /* Set true so we can know if a new database are created */
                            $updated = true;
                        }
                    }
                }
            }
            else
            {
                /* Get a name for the new databse */
                $newkey = Encryption::generate(8);
                /* Get the new database path */
                $path   = self::get_path($kind).$newkey.".".self::$ext;
                /* Put the content */
                self::write_data($path, array($new_content));
                /* Set true so we can know if a new database are created */
                $updated = true;
            }
        }
    }

    /**
     * Refresh all databases with a new Times for the sessions and with a Fresh data
     *
     * @access private static
     * @param kind: String
     */
    private static function refresh_and_count($kind="guest")
    {
        /* Get the database path */
        $path = self::get_path($kind);

        /* Scan all Databases in a folder  */
        $get  = glob($path."*.".self::$ext);

        /* count How many Databases are detected */
        $datacount = count($get);
        if(!empty($get) && is_array($get))
        {
            /* set an empty array */
            $newmap = array();
            foreach($get as $data)
            {
                /* Read */
                $newdata = self::read_data($data);
                if(!empty($newdata) && is_array($newdata))
                {
                    foreach($newdata as $info)
                    {
						if(!empty($info["time"]))
						{
							/* Calculate */
	                        $calcul = floor(time()-$info["time"]);
	                        if($calcul <= 30)
	                        {
	                            /* build a new data */
	                            $newmap[] = $info;
	                        }
						}
                    }
                }
                if(!empty($newmap))
                {
                    /* Write the new data if not empty */
                    self::write_data($data, $newmap);
                }
                else if(empty($newmap) && $datacount > 20)
                {
                    /* Delete the old databases */
                    @unlink($data);
                }
            }
            /* set the results info ( IP - LAST CHECK TIME)*/
            self::$online[$kind] = $newmap;

            /* Return The results */
            return count($newmap);
        }
        return 0;
    }

    /**
     * Get info for each Type
     *
     * @access public static
     * @param kind: String
     */
    public static function info($kind="guest")
    {
        $check = array("guest", "admin", "user", "api", "robot");
        $kind  = strtolower($kind);
        if(in_array($kind, $check))
        {
            $info = self::$online[$kind];
            if(!empty($info))
            {
                return $info;
            }
            else
            {
                self::refresh_and_count();
            }
            return self::$online[$kind];
        }
    }

    /**
     * Read - using fread()
     *
     * @access private static
     * @param path: String
     */
    private static function read_data($path)
    {
        /* check is the file exist */
        if(is_file($path))
        {
            /* check for The 0 filesize */
            $filesize = floor(filesize($path));
            if($filesize <= 0)
            {
                /* Return an empty array if we have an empty file */
                return array();
            }
            /* Open */
            $handle   = @fopen($path, "r");
            /* Read */
            $contents = @fread($handle, filesize($path));
            /* Close */
            @fclose($handle);
            /* Unserialize to array */
            $res = unserialize($contents);

            /* check is it an array */
            if(is_array($res))
            {
                /* Return*/
                return $res;
            }
            else
            {
                /* another method to Read ( Because we have only one line )*/
                $content = @file($path);
                if(!empty($content))
                {
                    /* Unserialize  */
                    $res = unserialize($content[0]);
                    return $res;
                }
                else
                {
                    return array();
                }

            }
        }
        else
        {
            return array();
        }
    }

    /**
     * Write - using fwrite()
     *
     * @access private static
     * @param path: String, contents: array
     */
    private static function write_data($path, $contents)
    {
        if(!empty($contents) && !empty($path))
        {
            /* Open */
            $handle = @fopen($path, "w");
            /* Serialize before Write */
            $res = serialize($contents);
            /* Write */
            @fwrite($handle, $res);
            /* Close */
            @fclose($handle);
            /* Writing success */
            return true;
        }
        else
        {
            /* Writing failed */
            return false;
        }
    }

    /**
     * Get the Real IP
     *
     * @access private static
     * @param none
     */
    public static function real_ip()
    {
        $ipaddress = '';
        if ($_SERVER['HTTP_CLIENT_IP'])
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if($_SERVER['HTTP_X_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if($_SERVER['HTTP_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if($_SERVER['HTTP_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if($_SERVER['REMOTE_ADDR'])
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     * Get the databases folder by Types
     *
     * @access private static
     * @param kind: String
     */
    private static function get_path($kind="guest")
    {
        $kind = strtolower($kind);
        switch($kind)
        {
            case 'guest':
                $data = "guests";
            break;
            case 'user':
                $data = "users";
            break;
            case 'admin':
                $data = "admins";
            break;
            case 'api':
                $data = "apis";
            break;
            case 'robot':
                $data = "robots";
            break;
            default:
                $data = "guests";
            break;
        }
        $path = "system/storage/".self::$main_dir."/".$data."/";
        return $path;
    }

}
?>
