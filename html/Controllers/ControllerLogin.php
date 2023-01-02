<?php 

require_once 'structure/Controller.php';

require_once 'Models/UserAccount.php';

class ControllerLogin extends Controller{

	public function __construct() {

    }

	public function index() {
		$userAccount = null;

		if(isset($_COOKIE['user_id'])){
			if(!(isset($_SESSION['id']))){

				$userAccount = new UserAccount();

				$data = $userAccount->getAccountDataFromId($_COOKIE['user_id']);

				if(isset($_COOKIE['user_pass'])){ // CHECK COOKIE PASS WITH DB PASS
					$user_pass = $_COOKIE['user_pass'];
					if($userAccount->checkPassword($data['email'], $user_pass)){
						$_SESSION['id'] = $_COOKIE['user_id'];
						$_SESSION['username'] = $data['username'];
						$_SESSION['email'] = $data['email'];

						header("Location: https://minebump.com/account/profile");
						return;
					}	
					
				}

			}
		}

		if(isset($_POST['login_submit']) || isset($_SESSION['id'])){
			$userAccount = new userAccount();
		}
		$this->generateView(array('userAccount' => $userAccount));
	}

}

?>