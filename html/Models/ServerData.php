<?php 

require_once('structure/Model.php');

class ServerData extends Model{

	private $minebump_servers = "minebump_servers";

	private $serverId;
	private $serverOwnerId;
	private $serverName;
	private $serverShortDesc;
	private $serverLongDesc;
	private $serverWebsite;
	private $serverDiscord;
	private $serverIp;
	private $serverVersion;
	private $serverBannerFileName;
	private $serverLogoFileName;
	private $serverAddedDate;
	private $categories;

	private $serverBannerPath;
	private $serverLogoPath;

	public function __construct($serverId){
		$this->serverId = $serverId;

		$sql = "SELECT * FROM " . $this->minebump_servers . " WHERE server_id = ?";
		$request = $this->executeRequest($sql, array($serverId));
		$data = $request->fetch();

		$this->serverOwnerId = $data['server_owner_id'];
		$this->serverName = $data['server_name'];
		$this->serverShortDesc = $data['server_short_description'];
		$this->serverLongDesc = $data['server_description'];
		$this->serverWebsite = $data['server_website'];
		$this->serverDiscord = $data['server_discord'];
		$this->serverIp = $data['server_game_ip'];
		$this->serverVersion = $data['server_game_version'];
		$this->serverBannerFileName = $data['server_banner_file'];
		$this->serverLogoFileName = $data['server_logo_file'];
		$this->serverAddedDate = $data['server_added_date'];
		$this->categories = explode(",", $data['categories']);

		$this->serverBannerPath = "Ressources/files/servers/banners";
		$this->serverLogoPath = "Ressources/files/servers/logos";
	}

	public function getServerId(){
		return $this->serverId;
	}

	public function getServerOwnerId(){
		return $this->serverOwnerId;
	}

	public function getServerName(){
		return $this->serverName;
	}

	public function getServerShortDescription(){
		return $this->serverShortDesc;
	}

	public function getServerLongDescription(){
		return $this->serverLongDesc;
	}

	public function getServerWebsite(){
		return $this->serverWebsite;
	}

	public function getServerDiscord(){
		return $this->serverDiscord;
	}

	public function getServerIp(){
		return $this->serverIp;
	}

	public function getServerVersion(){
		return $this->serverVersion;
	}

	public function getServerBannerFileName(){
		return $this->serverBannerFileName;
	}

	public function getServerLogoFileName(){
		return $this->serverLogoFileName;
	}

	public function getServerAddedDate(){
		return $this->serverAddedDate;
	}

	public function getServerBannerPath(){
		return $this->serverBannerPath;
	}

	public function getServerLogoPath(){
		return $this->serverLogoPath;
	}

	public function getCategories(){
		return $this->categories;
	}

}

 ?>