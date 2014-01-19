<?php

/**
 * This controller routes all incoming requests to the appropriate controller and page
 */

$request= $_SERVER['QUERY_STRING'];

$parsed= explode('?', $request);

$parsed= explode('=', $parsed['0']);
$query1= $parsed['0'];

$getParsed=explode('&',$parsed['1']);

$query2=$getParsed[1];


$query1ans= $getParsed['0'];

$query2ans=$parsed['2'];


/* directory that contain classes */

$classesDir= array( SERVER_ROOT.'/protected/library/' );

/*  loading all library components in everywhere  */
spl_autoload_register(function ($class)
	 {
		global $classesDir;
		foreach($classesDir as $directory)
		 {
			if(file_exists($directory. $class. '_class.php'))
			{
				require($directory. $class. '_class.php');
				
				return;
			}
		}
	 }
 );
 
 /*loading all library end*/
 
 /* Connect to an ODBC database using driver invocation */
$db = new db("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

$password= new password();


$link=new links();
//$upload= new upload();
$session= new session();
$mail=new mail();
//echo $query1;
include SERVER_ROOT . '/protected/setting/settings.php';
/* cases */

if($query2== Admin)
{

	if($query2ans!="loginadmin"  && $query2ans!= "downloads" && $query2ans!= "logout" )
	{	
		include SERVER_ROOT . '/protected/views/backend/header.php';
		include SERVER_ROOT . '/protected/controller/backend/header_controller.php';
		include SERVER_ROOT . '/protected/views/backend/sidebar.php';
	}
	
	include SERVER_ROOT . '/protected/setting/backendcases.php';
	
	if($query2ans!="loginadmin")
	include SERVER_ROOT . '/protected/views/backend/footer.php';
}
else
{
	//echo "router tk phunch gaya".'<br>';
	//echo SERVER_ROOT.'<br>';
	include SERVER_ROOT . '/protected/views/frontend/header.php';
	include SERVER_ROOT . '/protected/setting/frontendcases.php';
	include SERVER_ROOT . '/protected/views/frontend/footer.php';
}

?>
