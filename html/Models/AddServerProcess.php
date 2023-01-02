<?php 

require_once('structure/Model.php');
require_once('Models/UserAccount.php');
require_once('Models/MailSender.php');

class AddServerProcess extends Model{

	private $minebump_servers = "minebump_servers";

	private $all_field_message = "Tous les champs doivent être remplis.";

	private $error;
	private $success;

	public function __construct(){
		$this->error = null;
		$this->success = null;
	}

	public function processData($ownerId, $data){
		extract($data);
		$userAccount = new UserAccount();
		$user_data = $userAccount->getAccountDataFromId($ownerId);

		// Vérification des données
		if(!$this->checkField($server_name)) return;
		if(!$this->checkField($server_short_desc)) return;
		if(!$this->checkField($server_long_desc)) return;
		if(!$this->checkField($server_website)) return;
		if(!$this->checkField($server_discord)) return;
		if(!$this->checkField($server_ip)) return;
		if(!$this->checkSelect($server_games, 3, "mode de jeu", "modes de jeu")) return;
		if(!$this->checkSelect($server_versions, 2, "version", "versions")) return;


		$serverId = rand(10000, 1000000);
        while ($this->existServer($serverId)) {
            $serverId = rand(10000, 1000000);
        }

		if(!$this->checkFieldImage($server_banner, "banners", $serverId)) return;
		if(!$this->checkFieldImage($server_logo, "logos", $serverId)) return;

		$server_name = htmlspecialchars($server_name);
		$server_short_desc = htmlspecialchars($server_short_desc);
		$server_long_desc = htmlspecialchars($server_long_desc);
		$server_website = htmlspecialchars($server_website);
		$server_discord = htmlspecialchars($server_discord);
		$server_ip = htmlspecialchars($server_ip);

		
        $banner_type = strtolower(pathinfo(basename($server_banner["name"]) ,PATHINFO_EXTENSION));
		$banner_fileName = $serverId . "." . $banner_type;

		$logo_type = strtolower(pathinfo(basename($server_logo["name"]) ,PATHINFO_EXTENSION));
		$logo_fileName = $serverId . "." . $logo_type;

		// Upload des fichiers sur le site.
		if(!$this->checkFieldImage($server_banner, "banners", $serverId, true) or ! $this->checkFieldImage($server_logo, "logos", $serverId, true)){
			$this->error = "Echec lors de l'envoi des fichiers.";
			return;
		}

        $sql = "INSERT INTO " . $this->minebump_servers . "(server_id, server_owner_id, server_name, server_short_description, server_description, server_website, server_discord, server_game_ip, server_banner_file, server_logo_file, server_added_date, server_game_version, categories) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), ? , ?)";

        $request = $this->executeRequest($sql, array($serverId, $ownerId, $server_name, $server_short_desc, $server_long_desc, $server_website, $server_discord, $server_ip, $banner_fileName, $logo_fileName, $this->getSelectAsString($server_versions), $this->getSelectAsString($server_games)));
		

		$this->success = "Votre serveur a été ajouté avec succès à notre liste. Redirection vers votre fiche serveur dans 5 secondes...";

		$this->sendServerAddedMail($serverId, $server_name, $user_data);
		sleep(5);
		header("Location: https://minebump.com/servers/view/".$serverId);

	}

	public function existServer($serverId){
		$sql = "SELECT * FROM " . $this->minebump_servers." WHERE server_id = ?";
		$request = $this->executeRequest($sql, array($serverId));
		return $request->rowCount() >= 1;
	}

	public function checkField($var){
		if(!isset($var) or $var == ""){
			$this->error = $this->all_field_message;
			return false;
		}
		return true;
	}

	public function checkSelect($options, $max, $type, $plural){
		if(!count($options) > 0){
			$this->error = "Vous devez selectionner au moins 1 ". $type;
			return false;
		} else if(count($options) > $max){
			$this->error = "Vous ne pouvez selectionner que " . $max . " " . $plural;
			return false;
		}
		return true;
	}

	public function checkFieldImage($var, $filePath, $serverId, $upload = false){
		if(!isset($var) or $var['name'] == ""){
			$this->error = $this->all_field_message;
			return false;
		}

		$filename = pathinfo($var['name']);
        $extension_upload = $filename['extension'];
        $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $allowed_extensions)) {
                $type = strtolower(pathinfo(basename($var["name"]) ,PATHINFO_EXTENSION));
			    $this->fileName = $serverId . "." . $type;
			    if($upload){
			    	if(!move_uploaded_file($var["tmp_name"], "Ressources/files/servers/".$filePath."/" . str_replace($type, "webp", $this->fileName))){
			        	$this->error = "Echec de l'envoi du fichier.";
			    	}
			    }
        }else {
            $this->error = "Les extensions acceptées sont: .png, .jpeg, .jpg, .gif";
        }

		return true;
	}

	public function sendServerAddedMail($serverId, $serverName, $user_data){
		ob_start();
		include("Ressources/mails/server_added.php");
		$content = ob_get_clean();

		$mailer = new MailSender();
		$mailer->mail($user_data['email'], $user_data['username'], "Votre serveur sur MineBump !", $content);
	}

	public function getSelectAsString($select){
		return implode(",", $select);
	}

	public function getError(){
		return $this->error;
	}

	public function getSuccess(){
		return $this->success;
	}

}

 ?>