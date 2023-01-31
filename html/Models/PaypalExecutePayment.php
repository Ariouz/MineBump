<?php 
require_once('structure/Model.php');
require_once("PaypalPayment.php");

class PaypalExecutePayment extends Model{

	public function __construct(){

	}

	public function execute(){
		$success = 0;
		$msg = "(1) Une erreur est survenue, merci de bien vouloir réessayer ultérieurement...";
		$paypal_response = [];

		if (!empty($_POST['paymentID']) AND !empty($_POST['payerID'])) {
			$paymentID = htmlspecialchars($_POST['paymentID']);
			$payerID = htmlspecialchars($_POST['payerID']);

			$payer = new PayPalPayment();
			$payer->setSandboxMode(0);
			$payer->setClientID("");
			$payer->setSecret("");

			/*$payer->setClientID("ASQh5-UE_ejre39S9NruvA1ofcuFwQQqrIiJ1AixzvtpEXsh44uG_aE-ydc4MC6IJi-OsP8XwlBsPE9N");
			$payer->setSecret("EIqFRjaGKwUVRqfzIsNGsN600uGRVV-qg_u-bX4hL-jhh8ELrCowhNPeQCVcPRmBudZ2nyP-e_ED6-HR");*/

			$sql = "SELECT * FROM paiements WHERE payment_id = ?";
			$payment = $this->executeRequest($sql, array($paymentID));
			$payment = $payment->fetch();

			if($payment){
				$paypal_response = $payer->executePayment($paymentID, $payerID);

				$paypal_response = json_decode($paypal_response, true);


				$payer_email = $paypal_response['payer']['email_address'];
				$payer_name = $paypal_response['payer']['name']['surname'] . " " . $paypal_response['payer']['name']['given_name'];
				$payer_id = $paypal_response['payer']['payer_id'];

				$payment_currency = $paypal_response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
				$payment_amount = $paypal_response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];

				$payment_source = $paypal_response['payment_source'][0];

				$db_data = [$payer_email, $payer_name, $payer_id, $payment_currency, $payment_amount, $payment_source];

				$sql = "UPDATE paiements SET payment_status = ?, payment_amount = ?, payment_currency = ?, payment_source = ?, payer_email = ?, payer_id = ?, payer_name = ? WHERE payment_id = ?";
				$update_payment = $this->executeRequest($sql, array($paypal_response['status'], $payment_amount, $payment_currency, $payment_source, $payer_email, $payer_id, $payer_name, $paymentID));

				if ($paypal_response['status'] == "COMPLETED") {
					$success = 1;
					$msg = "Approved";

				} else {
					$msg = "Une erreur est survenue durant l'approbation de votre paiement. Merci de réessayer ultérieurement ou contacter un administrateur du site.";			
				}

			}else {			
				$msg = "Votre paiement n'a pas été trouvé dans notre base de données. Merci de réessayer ultérieurement ou contacter un administrateur du site. (Votre compte PayPal n'a pas été débité) Id: ".$paymentID . " / " . $_POST['paymentID'];
			}
		}

		echo json_encode(["success" => $success, "msg" => $msg, "paypal_response" => $paypal_response, "db_data" => $db_data]);

	}

}
