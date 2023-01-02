<?php 

require_once("structure/Controller.php");
require_once("Models/UserAccount.php");
require_once("Models/ServerData.php");

class ControllerAccount extends Controller{

	private $error = null;
	private $success = null;

	public function __construct(){

	}

	public function index(){

	}

	public function profile(){
		$userAccount = null;
		if(isset($_SESSION['id'])){
			$userAccount = new UserAccount();

			$success_msg = null;
			if(isset($_GET['success_msg'])){
				$success_msg = urldecode($_GET['success_msg']);
			}

			$this->generateView(array('userAccount' => $userAccount, 'success_msg' => $success_msg));
		}else{
			header("Location: https://minebump.com/login");
		}
	}

	public function mailconfirm(){
		$userAccount = null;
		if(isset($_GET['id'])){
			$get = urldecode($_GET['id']);
			$userAccount = new UserAccount();
			if($userAccount->accountExistsId($get)){
				$accountData = $userAccount->getAccountDataFromId($get);
				if(!$userAccount->isMailConfirmed($get)){
					$userAccount->confirmMail($get);
					$this->success = "Votre adresse mail à été confirmée ! <br/> <a href='https://minebump.com'>Retourner à l'accueil.</a>";
				}else{
					$this->error = "Cette adresse mail est déjà verifiée !";
				}
			}else{
				$this->error = "Aucun compte associé à cette adresse mail n'existe !";
			}
		}

		$this->generateView(array('userAccount' => $userAccount, 'controller' => $this));
	}

	public function sendmailconfirm(){
		$userId = null;
		if(isset($_SESSION['id'])){
			$userId = $_SESSION['id'];
			$userAccount = new UserAccount();
			$data = $userAccount->getAccountDataFromId($userId);
			$userAccount->sendMailConfirmation($data['email'], $data['username']);

			$scs_msg = "Un email de confirmation a été envoyé à l'adresse mail " . $data['email'];
			header("Location: https://minebump.com/account/profile/?success_msg=".urlencode($scs_msg));
		}else{
			header("Location: https://minebump.com/login");
		}
	}

	public function logout(){
		$userId = null;
		if(isset($_SESSION['id'])){
			$userId = $_SESSION['id'];
			$userAccount = new UserAccount();
			$userAccount->logout();
			header("Location: https://minebump.com");
		}
	}

	public function getError(){
		return $this->error;
	}

	public function getSuccess(){
		return $this->success;
	}

}

 ?>