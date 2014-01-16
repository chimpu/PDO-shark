
<?php
//echo 'heel';
$fcontroller=SERVER_ROOT . '/protected/controller/frontend/'.$query1ans.'_controller.php';
//echo $fcontroller;
$frontend=SERVER_ROOT.'/protected/views/frontend/'.$query1ans.".php";

if(file_exists($frontend ))
{
	if(file_exists($fcontroller))
	include $fcontroller;
	include $frontend;
}
else
{
    
	//include SERVER_ROOT . '/protected/controller/frontend/login_controller.php';
	include SERVER_ROOT.'/protected/views/frontend/login.php';
}
?>