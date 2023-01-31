<?php 

require_once("structure/Model.php");
require_once("structure/Configuration.php");
require('vendor/autoload.php');

class MailSender extends Model {


	public function mail($email, $username, $topic, $content){
		$apiKey = "";

		$mailer = new \SendGrid\Mail\Mail(); 
		$mailer->setFrom("contact@minebump.com", "MineBump");
		$mailer->setSubject($topic);
		$mailer->addTo($email, $username);
		$mailer->addContent(
		    "text/html", $content
		);
		
		$sendgrid = new \SendGrid($apiKey);
		try {
		    $response = $sendgrid->send($mailer);
		} catch (Exception $e) { }
	}

}

 ?>
