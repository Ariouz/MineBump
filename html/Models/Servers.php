<?php 

require_once("/var/www/html/structure/Model.php");
require_once("Models/VotesData.php");

class Servers extends Model {

	private $minebump_servers = "minebump_servers";
	private $boosted_servers = "boosted_servers";

	public function __construct(){

	}

	public function getAllServers($sortType, $limitStart, $limit){
		$servers = array();
		$sql = "SELECT * FROM " . $this->minebump_servers . $this->sortExtension($sortType) . " LIMIT ".$limitStart.",".$limit;
		$req = $this->executeRequest($sql, array());
		while($data = $req->fetch()){
			array_push($servers, $data['server_id']);
		}

		$map = array();

		$votesData = new VotesData();
		foreach($servers as $i){
			$map[$i] = $votesData->getMonthlyVotes($i);
		}

		return $map;
	}

	public function getAllServersNoLimit(){
		$servers = array();
		$sql = "SELECT * FROM " . $this->minebump_servers;
		$req = $this->executeRequest($sql, array());
		while($data = $req->fetch()){
			array_push($servers, $data['server_id']);
		}

		return $servers;
	}

	// UTULISEE POUR FILTRE
	public function getCategoryServers($category, $sortType, $limitStart, $limit){
		$servers = array();
		$sql = "SELECT * FROM " . $this->minebump_servers . " WHERE categories LIKE ? ".$this->sortExtension($sortType) . " LIMIT " . $limitStart . "," . $limit;
		$req = $this->executeRequest($sql, array("%".$category."%"));
		while($data = $req->fetch()){
			array_push($servers, $data['server_id']);
		}

		$map = array();

		$votesData = new VotesData();
		foreach($servers as $i){
			$map[$i] = $votesData->getMonthlyVotes($i);
		}

		return $map;
	}


	public function sortExtension($sortType){
		switch ($sortType) {
			case 'bumps_asc':
				return " ORDER BY votes_count ASC";
				break;
			case 'bumps_desc':
				return " ORDER BY votes_count DESC";
				break;
			case 'date_asc':
				return " ORDER BY server_added_date";
				break;
			case 'date_desc':
				return " ORDER BY server_added_date DESC";
				break;
			case 'alpahabet_asc':
				return " ORDER BY server_name";
				break;
			case 'alpahabet_desc':
				return " ORDER BY server_name DESC";
				break;
			default:
				"";
				break;
		}
	}

	public function sortByMonthlyVotes($input){
		arsort($input);
		return $input;
	}

	public function sortByMonthlyVotesAsc($input){
		asort($input);
		return $input;
	}

	public function getEnabledBoostedServers(){
		$sql = "SELECT * FROM " . $this->boosted_servers . " WHERE enabled = '1' ORDER BY start_date";
		$req = $this->executeRequest($sql, array());

		$servers = array();
		while($row = $req->fetch()){
			array_push($servers, $row['boost_id']);
		}
		return $servers;
	}

	public function getUnavailablesBoostedDates($duration){
		$dates = array();

		$sql = "SELECT * FROM " . $this->boosted_servers . " WHERE enabled = '1' ORDER BY start_date";
		$req = $this->executeRequest($sql, array());

		// GET ALL DATES WITH BOOSTED SERVERS
		$uncountedDates = array();
		while($row = $req->fetch()){
			$currentStartDate = $row['start_date'];
			$currentEndDate = $row['end_date'];
			foreach ($this->getDatesFromRange($currentStartDate, $currentEndDate) as $c) {
				array_push($uncountedDates, $c);
			}
		}

		$vals = array_count_values($uncountedDates);

		// ADD IF DATE IS REPEATED 3 TIMES
		foreach($vals as $key => $value){
			if($value >= 3){
				array_push($dates, $key);
			}
		}

		// ADD DATES IF -X DAYS AND +X DAYS IS NOT AVAILABLE

		foreach ($dates as $key) {
			$dateBefore = new DateTime($key);
			$interval = new DateInterval('P'.$duration.'D');
			$dateBefore->sub($interval);

			 // X DAYS BEFORE AVAILABLE
			
			$toDisable = $this->getDatesFromRange($dateBefore->format("Y-m-d"), $key);

			foreach($toDisable as $disable){
				if(!in_array($disable, $dates)){
					array_push($dates, $disable);
				}
			}


			// X DAYS AFTER AVAILABLE

			$dateAfter = new DateTime($key); 
			$interval = new DateInterval('P'.$duration.'D');
			$dateAfter->add($interval);

			$toDisable = $this->getDatesFromRange($dateAfter->format("Y-m-d"), $key);

			foreach($toDisable as $disable){
				if(!in_array($disable)){
					array_push($dates, $disable);
				}
			}
			
		}

		return implode(",", $dates);
	}

	public function getDatesFromRange($start, $end, $format = 'Y-m-d') {
	    $array = array();
	    $interval = new DateInterval('P1D');

	    $realEnd = new DateTime($end);
	    // $realEnd->add($interval);

	    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

	    foreach($period as $date) { 
	        $array[] = $date->format($format); 
	    }

	    return $array;
	}

}

 ?>