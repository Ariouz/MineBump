<?php 

require_once("structure/Model.php");
require_once("structure/Configuration.php");
require('vendor/autoload.php');
use MCServerStatus\MCPing;

class MinecraftStatus extends Model {

	private $adress;
	private $port;
	private $data;

	public function __construct($adress, $port=null){
		$this->adress = $adress;
		$this->port = $port;
		$this->refreshData();
	}

	public function refreshData(){
		$response=MCPing::check($this->adress.($this->port == null ? "" : ":".$this->port));
		
		$this->data = $response;
	}

	public function getDataArray(){
		return $this->data->toArray();
	}

	public function getRawData(){
		return $this->data;
	}

	public function isOnline(){
		return $this->getDataArray()["online"];
	}

	public function getOnlineCount(){
		return $this->getDataArray()["players"];
	}

	public function getMaxOnline(){
		return $this->getDataArray()["max_players"];
	}

	public function getPing(){
		return $this->getDataArray()["ping"];
	}

	/*Ip adress*/
	public function getAdress(){
		return $this->getDataArray()["adress"];
	}

	/*Domain adress or Ip if none*/
	public function getHostname(){
		return $this->getDataArray()["hostname"];
	}

	public function getPort(){
		return $this->getDataArray()["port"];
	}

	public function getProtocol(){
		return $this->getDataArray()["protocol"];
	}

	public function getVersion(){
		return $this->getDataArray()["version"];
	}

	public function getMOTDHtml(){
		return $this->getRawData()->getMotdToHtml();
	}

	public function getMOTDtext(){
		return $this->getRawData()->getMotdToText();
	}

}

 ?>