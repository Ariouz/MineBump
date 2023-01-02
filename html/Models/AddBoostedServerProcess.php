<?php 

require_once('/var/www/html/structure/Model.php');

class AddBoostedServerProcess extends Model{


	private $error;
	private $success;

	private $serverId;
	private $boost_id;

	private $boosted_servers = "boosted_servers";

	public function __construct($serverId){

		$this->error = null;
		$this->success = null;
		$this->serverId = $serverId;
	}


	public function addBoost($startDate, $endDate){

		$this->boost_id = rand(10000, 1000000);
        while ($this->existBoostId($this->boost_id)) {
            $this->boost_id = rand(10000, 1000000);
        }

        $sql = "INSERT INTO " . $this->boosted_servers . " (boost_id, server_id, start_date, end_date) VALUES(?, ?, ?, ?)";
        $req = $this->executeRequest($sql, array($this->boost_id, $this->serverId, $startDate, $endDate));
	}

	public function existBoostId($boost_id){
		$sql = "SELECT * FROM " . $this->boosted_servers . " WHERE boost_id = ?";
		$req = $this->executeRequest($sql, array($boost_id));
		return $req->rowCount() >= 1;
	}

}

 ?>