<?php 

require_once 'structure/Controller.php';

require_once 'Models/UserAccount.php';

class ControllerSignup extends Controller{

	public function __construct() {

    }

	public function index() {
		$userAccount = null;
		if(isset($_POST['signup_submit'])){
			$userAccount = new UserAccount();
		}
		$this->generateView(array('userAccount' => $userAccount));
	}

}

?>