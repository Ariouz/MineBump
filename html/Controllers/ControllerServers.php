<?php 

require_once('structure/Controller.php');
require_once('Models/ServerData.php');
require_once('Models/VotesData.php');
require_once('Models/UserAccount.php');
require_once('Models/Servers.php');
require_once('Models/BoostedServer.php');
require_once('Models/AddBoostedServerProcess.php');
require_once('Models/UtilFunctions.php');
require_once('Models/MinecraftStatus.php');


class ControllerServers extends Controller{

	public function __construct(){

	}

	public function index(){
		$userAccount = new UserAccount();
		$utilFunctions = new UtilFunctions();
		$category_filter = null;
		$sortType = null;
		$page = 1;

		if(isset($_GET['category']) && !empty($_GET['category'])){
			$category_filter = htmlspecialchars(urldecode($_GET['category']));
		}else{
			header("Location: https://minebump.com/servers/?category=all");
		}

		if(isset($_GET['sort-type']) && !empty($_GET['sort-type'])){
			$sortType = htmlspecialchars(urldecode($_GET['sort-type']));
		}else{
			$sortType = "bump_desc";
		}

		if(isset($_GET['page']) && !empty($_GET['page'])){
			$page = $_GET['page'];
			if($page == 0){
				$page = 1;
			}
		}

		$this->generateView(array('userAccount' => $userAccount, 'utilFunctions' => $utilFunctions, 'category_filter' => $category_filter, "sortType" => $sortType, "page" => $page));
	}

	public function view(){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$serverId = $_GET['id'];
			$serverData = new ServerData($serverId);
			$votesData = new VotesData();
			$userAccount = new UserAccount();
			$utilFunctions = new UtilFunctions();

			$this->generateView(array('serverData' => $serverData, 'votesData' => $votesData, 'userAccount' => $userAccount, 'utilFunctions' => $utilFunctions));

		}else{
			header("Location: https://minebump.com/servers");
			return;
		}
	}

	public function boost(){
		$userAccount = new UserAccount();
		$utilFunctions = new UtilFunctions();

		$serverId = null;
		$offer = null;
		$date = null;

		$erreur = null;

		if(!isset($_SESSION['id'])){
			header("Location: https://minebump.com/login/");
		}

		
		if(isset($_GET['id']) AND !empty($_GET['id'])){ // NO ID PROVIDED
			$serverId = htmlspecialchars(urldecode($_GET['id']));

			if(!isset($_GET['page']) OR empty($_GET['page'])){
				header("Location: https://minebump.com/servers/boost/?id=".$serverId);
			}

			if(isset($_GET['offer']) AND !empty($_GET['offer']) AND ($_GET['page'] == "date" OR $_GET['page'] == "payment")){
				$offer = htmlspecialchars($_GET['offer']);
				if(isset($_GET['date']) AND !empty($_GET['date'])){
					$date = $_GET['date'];
				}else{
					if($_GET['page'] != "date"){
						header("Location: https://minebump.com/servers/boost/?page=date&id=".$serverId."&offer=".$offer); // REDIRECT TO date SELECTOR PAGE
					}
				}
			}else{
				if($_GET['page'] != "offers") {
					header("Location: https://minebump.com/servers/boost/?page=offers&id=".$serverId); // REDIRECT TO OFFER SELECTOR PAGE
				}
			}
		}else{
			if(!isset($_GET['page']) OR empty($_GET['page'])){
				header("Location: https://minebump.com/servers/boost/?page=select-server"); // REDIRECT TO SERVER SELECTOR PAGE
			}
			// NO ID BUT HAS PAGE IN GET
			if(empty($userAccount->getServers())){
				$erreur = "Vous n'avez aucun serveur";
			}
		}



		$this->generateView(array('userAccount' => $userAccount, 'serverId' => $serverId, "offer" => $offer, "startDate" => $date, 'utilFunctions' => $utilFunctions, 'erreur' => $erreur));
	}

}

 ?>