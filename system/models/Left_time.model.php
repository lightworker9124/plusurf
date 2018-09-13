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

class Left_time extends BaseModel
{
    
    public static function translate($res, $form=":a :b :c")
    {
        $form = strtolower($form);
        $source = array(
                "s"  => l("time_left_s"),
                "s1" => l("time_left_s1"),
                "s2" => l("time_left_s2"),
                "s3" => l("time_left_s3"),
                "i"  => l("time_left_i"),
                "i1" => l("time_left_i1"),
                "i2" => l("time_left_i2"),
                "i3" => l("time_left_i3"),
                "h"  => l("time_left_h"),
                "h1" => l("time_left_h1"),
                "h2" => l("time_left_h2"),
                "h3" => l("time_left_h3"),
                "d"  => l("time_left_d"),
                "d1" => l("time_left_d1"),
                "d2" => l("time_left_d2"),
                "d3" => l("time_left_d3")
        );
        $source2 = array(  
                "g" => l("time_left_g"),
                "l" => l("time_left_l")
        );
        $source3 = array(  
                "now" => l("time_left_now"),
                "1"   => l("time_left_1"),
                "2"   => l("time_left_2"),
                "3"   => l("time_left_3")
        );
        $ex_res    = explode(",", $res);
        if(in_array($ex_res[0], array_keys($source3)))
        {
            $option1 = str_replace($ex_res[0], $source3[$ex_res[0]], $ex_res[0]);
        }
        else
        {
            $option1 = $ex_res[0];
        }
        $option2   = str_replace($ex_res[1], $source[$ex_res[1]], $ex_res[1]);
        $option3   = str_replace($ex_res[2], $source2[$ex_res[2]], $ex_res[2]);
        $left_time = str_replace(":a", $option1, $form);
        $left_time = str_replace(":b", $option2, $left_time);
        $left_time = str_replace(":c", $option3, $left_time);
        return $left_time;
    }

    public static function clean($new_time, $type)
    {
        if($new_time === 2)
        {
            $res = $new_time.",".$type."2,g";
        }
        else if($new_time === 1)
        {
            $res = $new_time.",".$type."1,g";
        }
        else if($new_time >= 3 && $new_time <= 10)
        {
            $res = $new_time.",".$type."3,g";
        }
        else if($new_time === -2)
        {
            $res = str_replace("-", "", $new_time).",".$type."2,l";
        }
        else if($new_time === -1)
        {
            $res = str_replace("-", "", $new_time).",".$type."1,l";
        }
        else if($new_time <= -3 && $new_time >= -10)
        {
            $res = str_replace("-", "", $new_time).",".$type."3,l";
        }
        else if($new_time < -10)
        {
            $res = str_replace("-", "", $new_time).",".$type.",l";
        }
        else
        {
            $res = $new_time.",".$type.",g";
        }
        return $res;
    }
    
    public static function convert($time, $op=":a :b :c", $format="d M Y H:i", $type="AM")
    {
        $time  = strip_tags($time);
        $sec   = date("s", $time);
        $min   = date("i", $time);
        $hours = date("H", $time);
        $day   = date("d", $time);
        $check = date("Ym", $time);
        if(empty($op))
        {
            $op = ":a :b :c";
        }
        $now   = time();
        if($check != date("Ym", $now))
        {
            $res = date($format, $time)." ".$type;
        }
        else if($day != date("d", $now))
        {
            $new_time = date("d", $now)-$day;
            $res = self::clean($new_time, "d");
        }
        else if($hours != date("H", $now))
        {
            $new_time = date("H", $now)-$hours;
            $res = self::clean($new_time, "h");
        }
        else if($min != date("i", $now))
        {
            $new_time = date("i", $now)-$min;
            $res = self::clean($new_time, "i");
        }
        else if($sec != date("s", $now))
        {
            $new_time = date("s", $now)-$sec;
            $res = self::clean($new_time, "s");
        }
        else
        {
            $res = "now";
        }
        return self::translate($res, $op);
    }
}
?>