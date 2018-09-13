<?php if( ! defined( '_sys' ) ) { exit( 'Direct access to this script is not permitted' ); } ?>
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

/*
|---------------------------------------------------------------
| TEMPLATE SETTINGS
|---------------------------------------------------------------
*/
$TMPL["info"] = array(
               "name" => "Admin",
               "styles" =>  array("#", "#")
);

/*
|---------------------------------------------------------------
| GENERAL SETTINGS
|---------------------------------------------------------------
*/
set("title1", s("generale/name"));
$GLOBALS["check_login"] = Auth::check("admins");

?>