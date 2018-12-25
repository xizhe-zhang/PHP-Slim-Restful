<?php
//ob_start("ob_gzhandler");
error_reporting(0);
session_start();

/* DATABASE CONFIGURATION */
define('DB_DATABASE', 'sqlite:/Users/kitetsu/Projects/repo/lighttpd_plugin/lighttpd1.4/test.db');
define("SITE_KEY", '123456');


function getDB() 
{
	$dbconn=DB_DATABASE;
	$dbConnection = new PDO("$dbconn");
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
}
/* DATABASE CONFIGURATION END */

/* API key encryption */
function apiToken($session_uid)
{
$key=md5(SITE_KEY.$session_uid);
return hash('sha256', $key);
}
?>