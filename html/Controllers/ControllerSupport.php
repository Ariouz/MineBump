<?php 

require_once('structure/Controller.php');

class ControllerSupport extends Controller{

	public function __construct(){

	}

	public function index(){
		$this->generateView(array());
	}

	public function discord(){
		header("Location: https://discord.gg/FSBVTUa62D");
	}

}


 ?>