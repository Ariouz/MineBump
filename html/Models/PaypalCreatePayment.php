<?php 
require_once('structure/Model.php');
require_once("PaypalPayment.php");

class PaypalCreatePayment extends Model{

	public function __construct(){

	}

	public function create($price, $offer, $duration){
		$success = 1;
		$msg = "(0) Une erreur est survenue, merci de bien vouloir réessayer ultérieurement...";
		$paypal_response = [];

		$payer = new PaypalPayment();
		$payer->setSandboxMode(0);
		$payer->setClientID("");
		$payer->setSecret("");

		/*$payer->setClientID("ASQh5-UE_ejre39S9NruvA1ofcuFwQQqrIiJ1AixzvtpEXsh44uG_aE-ydc4MC6IJi-OsP8XwlBsPE9N");
		$payer->setSecret("EIqFRjaGKwUVRqfzIsNGsN600uGRVV-qg_u-bX4hL-jhh8ELrCowhNPeQCVcPRmBudZ2nyP-e_ED6-HR");*/

		$payment_data = [
		   "intent" => "CAPTURE",
		   "purchase_units" => [
		   		[
		   			"description" => "Minebump Boost ".$duration . " jours",
		  			"amount" => [
		   			"currency_code" => "EUR",
		   			"value" => strval($price)
		   		]

		   	]
		   	
		   ]
		];


		$paypal_response = $payer->createPayment($payment_data);
		$paypal_response = json_decode($paypal_response);

		if (!empty($paypal_response->id)) {
			$sql = "INSERT INTO paiements (payment_id, payment_status, payment_amount, payment_currency, payment_source, payment_date, payer_email, payer_id, payer_name) VALUES (?, ?, '', '', '', NOW(), '', '', '')";
			$insert_ok = $this->executeRequest($sql, array($paypal_response->id, $paypal_response->status));

			if($insert_ok){
				$msg = "Log 0";
				$success = 1;
			}


		} else {
			$msg = "(3) Une erreur est survenue durant la communication avec les serveurs de PayPal. Merci de bien vouloir réessayer ultérieurement.";
		}

		echo json_encode(["success" => $success, "msg" => $msg, "paypal_response" => $paypal_response]);

	}
}

?>
