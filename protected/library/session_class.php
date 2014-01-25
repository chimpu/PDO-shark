<?php

class session extends links
{
	public function generate($email)
	{
		//session_start();

		 $token=hash("sha512",$_SERVER['HTTP_ACCEPT_LANGUAGE'].$email.SITE_URL);
		 $_SESSION['token']=$token;
		 $_SESSION['email']=$email;
		 $_SESSION['nonce'] = md5(microtime(true));
		 $_SESSION['logip']=$_SERVER['REMOTE_ADDR'];
		 $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
		 $_SESSION['EXPIRES'] = time()+600;// 600/60=10 min inactivity logout
		 $_SESSION['CURRENT']=0;
		 return $_SESSION;
	}


	public function check()
	{
	   if($_SESSION)
	    {
		    if($_SESSION !== self::generate($_SESSION['email']))
		      {
		      echo 'Token mixmatch (possible session hijacking attempt)';
		      return false;


		      }

		       elseif($_SESSION['logip'] !== $_SERVER['REMOTE_ADDR'])
		       {
		        echo 'IP Address mixmatch (possible session hijacking attempt)';
		        return false;


		        }

		        elseif($_SESSION['userAgent'] !== $_SERVER['HTTP_USER_AGENT'])
		        {
		         echo 'Useragent mixmatch (possible session hijacking attempt)';
		         return false;

		         }
elseif($_SESSION['nonce']!==md5(microtime(true)))
{
    return false;
}

		        elseif(($_SESSION['EXPIRES']-$_SESSION['CURRENT'])=='0')
		        {

		            return false;


		        }
		        else
		        {
		            session_regenerate_id(true);

		             $_SESSION['CURRENT']=time();
		            return true;

		        }
	    }
	    else
	        return false;
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
?>
	<script type="text/javascript">window.location.href="<?php echo self::link($pURL,$panel);?>"</script>
	<?php 	}
			else {
				header("Location: " . self::link($pURL,$panel));
			}
			exit();
		}
	}

public function String2Hex($string){
    $hex='';
    for ($i=0; $i < strlen($string); $i++){
        $hex .= dechex(ord($string[$i]));
    }
    return $hex;
}


public function Hex2String($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}



}


?>
