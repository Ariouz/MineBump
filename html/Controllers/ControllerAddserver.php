<?php 

require_once('structure/Controller.php');
require_once('Models/AddServerProcess.php');
require_once('Models/UserAccount.php');

class ControllerAddserver extends Controller{

	private $error;

	public function __construct(){
		$error = null;
	}

	public function index(){
		if(isset($_SESSION['id'])){
			$userAccount = new UserAccount();
			$addServerProcess = null;

			if(!$userAccount->isMailConfirmed($_SESSION['id'])){
				$this->error = "Vous devez confirmer votre adresse mail afin d'ajouter un serveur. <a href='https://minebump.com/account/sendmailconfirm'>Confirmez la maintenant !</a>";
			}

			if(isset($_POST['add_server_submit'])){
				$addServerProcess = new AddServerProcess();
			}

			$this->generateView(array('controller' => $this, 'userAccount' => $userAccount, 'addServerProcess' => $addServerProcess));
		}else{
			header("Location: https://minebump.com/login");
		}
	}

	public function getError(){
		return $this->error;
	}


}


?>