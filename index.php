<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
/***** define document path***********/
define('SERVER_ROOT', dirname ( __FILE__)); //server ka path lene ke liye


define('SITE_ROOT', $_SERVER['HTTP_HOST']); //domain ka name findout krne ke liye



$protocol= (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT']== 443) ? "https://" : "http://";





$get_script_path= pathinfo($_SERVER['SCRIPT_NAME']);

define('SCRIPT_DIR_PATH', $get_script_path['dirname']);


define('SCRIPT_BASE_NAME', $get_script_path['basename']);


define('SCRIPT_FILE_NAME', $get_script_path['filename']);

unset($get_script_path);



if(SCRIPT_DIR_PATH == '/')
define('SITE_URL', $protocol.SITE_ROOT);
else 
	define('SITE_URL', $protocol.SITE_ROOT.SCRIPT_DIR_PATH);


define("SITE_MODE", "debug");


if(SITE_MODE== "debug")
{
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', '1');
	ini_set('start_up_errors', '1');
	error_reporting(E_ALL ^ E_NOTICE);
}
else
{
	
	ini_set('error_reporting', 0);
}

include SERVER_ROOT.'/protected/setting/globals.php';
include SERVER_ROOT.'/protected/setting/router.php';
?>