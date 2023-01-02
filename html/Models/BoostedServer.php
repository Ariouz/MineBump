<?php 

require_once('structure/Model.php');
require_once('Models/UtilFunctions.php');

class BoostedServer extends Model{

	private $boosted_servers;

	private $boost_id;
	private $server_id;
	private $start_date;
	private $end_date;
	private $enabled;

	private $utilFunctions;

	public function __construct($boost_id){
		$this->boost_id = $boost_id;
		$this->boosted_servers = "boosted_servers";

		$sql = "SELECT * FROM " . $this->boosted_servers . " WHERE boost_id = ?";
		$req = $this->executeRequest($sql, array($boost_id));

		$data = $req->fetch();

		$this->server_id = $data['server_id'];
		$this->start_date = $data['start_date'];
		$this->end_date = $data['end_date'];
		$this->enabled = $data['enabled'];

		$this->utilFunctions = new UtilFunctions();
	}


	public function calculateRemainingTime(){
		$end = new DateTime($this->end_date);
		$now = new DateTime();
		$difference = $end->format('U') - $now->format('U');

		return $difference;
	}

	public function getStartDateString(){
		return $this->utilFunctions->getSecondsToTimeString($this->utilFunctions->getDateTimeToSeconds($this->start_date));
	}

	public function getEndDateString(){
		return $this->utilFunctions->getSecondsToTimeString($this->utilFunctions->getDateTimeToSeconds($this->end_date));
	}

	public function checkTime(){
		return $this->calculateRemainingTime() > 0;
	}

	public function disableBoost(){
		$sql = "UPDATE " . $this->boosted_servers . " SET enabled = ? WHERE boost_id = ?";
		$req = $this->executeRequest($sql, array('0', $this->boost_id));
	}

	public function getBoostId(){
		return $this->boost_id;
	}

	public function getServerId(){
		return $this->server_id;
	}

	public function getStartDate(){
		return $this->startDate;
	}

	public function getEndDate(){
		return $this->endDate;
	}

	public function isEnabled(){
		return $this->enabled;
	}


}

 ?>