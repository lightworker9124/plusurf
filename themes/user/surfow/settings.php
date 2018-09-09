<?php if( ! defined( '_sys' ) ) { exit( 'Direct access to this script is not permitted' ); } ?>
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

/*
|---------------------------------------------------------------
| TEMPLATE SETTINGS
|---------------------------------------------------------------
*/
$TMPL["info"] = array(
               "name" => "Flato",
               "styles" =>  array("#", "#")
);

/*
|---------------------------------------------------------------
| GENERAL SETTINGS
|---------------------------------------------------------------
*/
set("title1", s("generale/name"));
$GLOBALS["check_login"] = Auth::check("users");

?>