<?php
require 'SendGrid-API/vendor/autoload.php';
$shouldSend = ($_GET["mode"] == "prod");
if ($shouldSend)
	echo "will send emails\n";
else
	echo "test mode\n";

	
$oku = fopen("mails/mail0.txt",'r'); 
while(!feof($oku)){  
	$email = fgets($oku);
	$email = trim($email);
	try {
		
		$from = new SendGrid\Email("YOUR_NAME", "YOUR_EMAIL");
		$subject = "SUBJECT";
		$to = new SendGrid\Email("NAME", $email);
		$content = new SendGrid\Content("text/html", "EMAIL_DETAIL");
		/*Send the mail*/
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = ('SENDGRID_APIKEY');
		$sg = new \SendGrid($apiKey);
		/*Response*/
		
		if ($shouldSend)
			$response = $sg->client->mail()->send()->post($mail);
		echo "sent " . $email . "\n";
	} catch (Exception $e) {
		echo "cannot sent " . $email . "\n";
	}
} 
fclose($oku);  

?>
