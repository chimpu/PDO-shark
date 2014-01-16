<?php

/**
 * This controller routes all incoming requests to the appropriate controller and page
 */
//echo "bhangi";
$request= $_SERVER['QUERY_STRING'];//url mein jo value hogi usko show kr dega
//print_r($request);
//echo '<br>';

$parsed= explode('?', $request);//url mein jo ? ke bd ki vlue hgi usko show kr dega
//print_r($parsed);
//echo '<br>';

$parsed= explode('=', $parsed['0']);//ab jo $parsed mein value aayi hai wo array ki frmt mein aayi hai to jo $parsed ['0'] mein jo value hai usmein = ke bd wali value ko show krega...
//print_r($parsed);
//echo '<br>';
//echo $parsed['0'].'000000';
$query1= $parsed['0'];

$getParsed=explode('&',$parsed['1']);
//print_r($getParsed);
//echo '<br>';

$query2=$getParsed[1];

//print_r($query2). 'hey';

//echo"hbhjgbyhujgbgbj";
$query1ans= $getParsed['0'];
//echo $query1ans;

$query2ans=$parsed['2'];
//print_r($query2ans);
//print_r($parsed);


/* directory that contain classes */
//echo SERVER_ROOT;

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