<?php 

require_once("structure/Controller.php");
require_once("Models/PaypalCreatePayment.php");
require_once("Models/PaypalExecutePayment.php");


class ControllerPayment extends Controller{

	public function __construct(){

	}

	public function index(){

	}

	public function create(){
		$paymentCreate = new PaypalCreatePayment();

		$price = $_GET['price'];
		$offer = $_GET['offer'];
		$duration = $_GET['duration'];

		$paymentCreate->create($price,$offer,$duration);
	}

	public function execute(){
		$paymentExecute = new PaypalExecutePayment();
		$paymentExecute->execute();
	}

}


 ?>