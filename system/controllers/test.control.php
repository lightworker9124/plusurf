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
class test
{

	function __construct()
	{
		//
	}

    public function switcher()
	{
        $_SESSION['switcher']=$_POST['switcher'];
        header('Location: '.$_SERVER['HTTP_REFERER']);

	}


}
