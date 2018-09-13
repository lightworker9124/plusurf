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

function set($key="", $value="")
{
    Sys::set($key, $value);
}

function get($key)
{

    return Sys::get($key);
}

function _get($key)
{
    echo Sys::get($key);
}

function router($route, $params=array(), $mixed=false, $inside=false)
{
    return Template::route($route, $params, $mixed, $inside);
}

function _router($route, $params=array(), $mixed=false, $inside=false)
{
    echo router($route, $params, $mixed, $inside);
}

function to_router($route, $params=array())
{
    $url = Template::route($route, $params);
    header("location: ".$url);
}

function _l($key, $value="")
{
    $key = strip_tags($key);
    if(!empty($GLOBALS["_LNG"][$key]))
    {
        echo $GLOBALS["_LNG"][$key];
    }
    else
    {
        echo $value;
    }
}

function l($key, $value="")
{
    $key = strip_tags($key);
    if(!empty($GLOBALS["_LNG"][$key]))
    {
        return $GLOBALS["_LNG"][$key];
    }
    else
    {
        return $value;
    }
}

function _s($key)
{
    echo Settings::get($key);
}

function s($key)
{
    return Settings::get($key);
}

function _old($name="")
{
    echo Request::old($name);
}

function url($op="", $prtcl="", $mixed=false, $inside=false)
{
	return Sys::url($op, $prtcl, $mixed, $inside);
}

function _url($op="", $prtcl="", $mixed=false, $inside=false)
{
	echo url($op, $prtcl, $mixed, $inside);
}

function turl()
{
	return Template::url();
}

function _turl()
{
	echo turl();
}

function u($key="")
{
	$info = Auth::info();
	return $info[$key];
}

function _u($key="")
{

	echo u($key);
}


function auth()
{
	return Auth::check();
}

function storage($file)
{
	return Sys::url()."/storage/".$file;
}

function _storage($file)
{
	echo Sys::url()."/storage/".$file;
}

function gravatar($email, $size=200)
{
    $usersEmail = strip_tags($email);
    $defaultImage = urlencode("http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?size=".$size);
    // Possible values (G, PG, R, X)
    $avatarRating = "G";
    // URL for Gravatar
    $gravatarURL = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($usersEmail).
				   "&default=".$defaultImage.
				   "&size=".$size.
				   "&rating=".$avatarRating;
	return $gravatarURL;
}

function _gravatar($email, $size=200)
{
    echo gravatar($email, $size);
}

function avatar($file="", $email="", $size=200)
{
	$email = strip_tags($email);
	$file = strip_tags($file);
	if(!empty($file))
	{
		return Sys::urlfile($file);
	}
	else
	{
		return gravatar($email, $size);
	}
}

function _avatar($file="", $email="", $size=200)
{
	echo avatar($file, $email, $size);
}