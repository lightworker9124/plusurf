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
| CONFIG FILE
|---------------------------------------------------------------
*/




// DATABASE SETTINGS
$GLOBALS["_SETTINGS"]["DB"]["HOST"]  = "localhost"; // HOST
$GLOBALS["_SETTINGS"]["DB"]["USER"]  = "root"; // USER
$GLOBALS["_SETTINGS"]["DB"]["NAME"]  = "exchange"; // NAME
$GLOBALS["_SETTINGS"]["DB"]["PASS"]  = ""; // PASS
// AUTRE
$GLOBALS["_SETTINGS"]["DB"]["CLASS"] = "pdo"; // PDO - MYSQLI
$GLOBALS["_SETTINGS"]["ADMINPATH"]   = "control";
$GLOBALS["_SETTINGS"]["KEY"]         = "a45fJpB3ZEBn8yNqa45fJpB1";
$GLOBALS["_SETTINGS"]["PROTOCOL"]    = "http";

/*
|---------------------------------------------------------------
| AUTH SETTINGS
|---------------------------------------------------------------
*/
$GLOBALS["_SETTINGS"]["DB"]["USERAUTH"]  = "users";
$GLOBALS["_SETTINGS"]["DB"]["ADMINAUTH"] = "admins";
$GLOBALS["_SETTINGS"]["AUTHTABLES"]      = array("users", "admins");

/*
|---------------------------------------------------------------
| COOKIES SETTINGS
|---------------------------------------------------------------
*/
$GLOBALS["_SETTINGS"]["LIFE_TIME"] = time()+86000;

/*
|---------------------------------------------------------------
| TEMPLATE SETTINGS
|---------------------------------------------------------------
*/
$GLOBALS["_SETTINGS"]["TEMPLATE"] = "default";
$GLOBALS["_SETTINGS"]["MAILTEMPLATE"] = "default";
$GLOBALS["_SETTINGS"]["ADMIN_TEMPLATE"] = "default";

/*
|---------------------------------------------------------------
| LANGUAGES SETTINGS
|---------------------------------------------------------------
*/
$GLOBALS["_SETTINGS"]["LANGUAGE"] = "en";

/*
|---------------------------------------------------------------
| TIMEZONE SETTINGS
|---------------------------------------------------------------
*/
$GLOBALS["_SETTINGS"]["TIMEZONE"] = "GMT";

/*
|---------------------------------------------------------------
| ENVIRONMENT SETTINGS
|---------------------------------------------------------------
|
| you can set (DEVELOPMENT/TESTING/PRODUCTION)
|
*/
$GLOBALS["_SETTINGS"]["ENVIRONMENT"] = "PRODUCTION";

?>
