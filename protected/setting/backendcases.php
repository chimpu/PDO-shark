<?php
$bcontroller=SERVER_ROOT . '/protected/controller/backend/'.$query2ans.'_controller.php';
$backend=SERVER_ROOT.'/protected/views/backend/'.$query2ans.'.php';

if(file_exists($backend))
{
	if(file_exists($bcontroller))
	include $bcontroller;
	include $backend;
}

else
{
if(file_exists(SERVER_ROOT . '/protected/controller/backend/home_controller.php') && file_exists(SERVER_ROOT.'/protected/views/backend/home.php'
))
{
	include SERVER_ROOT . '/protected/controller/backend/home_controller.php';
	include SERVER_ROOT.'/protected/views/backend/home.php';
	
	}

}
?>



