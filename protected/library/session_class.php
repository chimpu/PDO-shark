<?php

class session extends links
{
	public function generate($email)
	{
		//session_start();
		
		 $token=hash("sha512",$_SERVER['HTTP_ACCEPT_LANGUAGE'].$email.SITE_URL);
		 $_SESSION['token']=$token;
		 $_SESSION['email']=$email;
		 $_SESSION['logip']=$_SERVER['REMOTE_ADDR'];
		
		 return $_SESSION;
	
		 
	}
	
	
	public function check($session)
	{

		if(!empty($_SESSION) && isset($_SESSION))
		{
			
			 $sess=self::generate($_SESSION['email']);
		if($_SESSION['token']===$sess['token'])
		return true;
		else
		return false;
				
			}
	else	return false;
					
			
			
	}
	
	public function destroy($page,$panel=NULL)
	{
		unset($_SESSION);
		session_unset();
		session_destroy();
		if(empty($_SESSION))
		self::redirect($page,$panel);
		
		else
			echo "There is a problem";
	}
	
	
	
	public function redirect($pURL,$panel=NULL) {
		
		if (strlen($pURL) > 0) {
			if (headers_sent()) {
echo '<script type="text/javascript">window.location.href="'.self::link($pURL,$panel).'"</script>';
	}
			else {
				header("Location: " . self::link($pURL,$panel));
			}
			exit();
		}
	}

}


?>