<?php 
class mail
{
	// for sending mail
	function send_email($to,$message,$name,$fromname,$from=C_EMAIL)
	{
		//require ser'';
		require_once SERVER_ROOT.'/protected/library/swiftmail/swift_required.php';
		$transport=Swift_SmtpTransport::newInstance('dugout7studios.org');
		$mailer=Swift_Mailer::newInstance($transport);
		$message=Swift_Message::newInstance('Your details')->setFrom
		(array
				(
						$from=>$fromname
				))->setTo
				(
						array
						(
								$to=>$name
						))
						->
						setBody
						(
								$message
						);
		
		$numSent=$mailer->send (
				$message
		);
		if($mailer->send($message))
	{
		return true;
		}
		else
		{
			return false;
		}
		
		}
}
?>