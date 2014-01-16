<?php
class password
{
	public function stringbreak($postpassword)
	{
		$salt=sha1($postpassword);
		$arr= strlen($postpassword);
		$count=ceil($arr/2);
		$stringarr=str_split($postpassword,$count);
		$password1=hash("sha512", $stringarr['0']); 
		
		$password2=$salt . ( hash( 'whirlpool', $salt . $stringarr['1'] ) );
		return $password1.$password2 ;
	}
}

?>