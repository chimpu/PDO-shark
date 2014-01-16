<?php
class links{
	
	public function link($pagename,$panel=NULL,$query=NULL)
	{
		
if($panel==NULL)
		return SITE_URL.'/index.php?page='.$pagename.$query;
elseif($panel==Admin)
	return SITE_URL."/index.php?page=home&".Admin."=".$pagename.$query;
		
		
		
	}
	public function hrefquery()
	{
		$request=$_SERVER['REQUEST_URI'];

		$parsed= explode('?', $request);
		
       $parsed=explode('=',$parsed['2']);
      
	return $parsed;
		
		
	}
	
}
?>