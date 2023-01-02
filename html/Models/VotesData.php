<?php 

require_once('structure/Model.php');

class VotesData extends Model{

	private $table;

	public function __construct(){
		$this->table = "servers_votes";
	}

	public function getServerVotes($serverId){
		$sql = "SELECT * FROM " . $this->table . " WHERE server_id = ?";
		$req = $this->executeRequest($sql, array($serverId));
		$sum = 0;
		while($data = $req->fetch()){
			$sum++;
		}
		return $sum;
	}

	public function getVoteData($voteId){
		$sql = "SELECT * FROM " . $this->table . " WHERE vote_id = ?";
		$req = $this->executeRequest($sql, array($voteId));
		$data = $req->fetch();
		return $data;
	}

	public function addServerVote($serverId, $userId){
		$sql = "INSERT INTO " . $this->table . "VALUES(?, ?, now())";
		$req = $this->executeRequest($sql, array($serverId, $userId));
	}

	public function getVoteCooldown($voteId){
		$datetime = $this->getVoteData($voteId)['vote_datetime'];
		// TODO TO COMPLETE
		return 0;
	}

	public function getUserVotes($userId){
		$sql = "SELECT * FROM " . $this->table . " WHERE user_id = ?";
		$req = $this->executeRequest($sql, array($userId));
		$sum = 0;
		while($data = $req->fetch()){
			$sum++;
		}
		return $sum;
	}

	public function getTotalVotes(){
		$sql = "SELECT * FROM " . $this->table;
		$req = $this->executeRequest($sql, array());
		$sum = 0;
		while($data = $req->fetch()){
			$sum++;
		}
		return $sum;
	}

	public function getLastVoteData(){
		$sql = "SELECT * FROM " . $this->table . " ORDER BY vote_datetime DESC";
		$req = $this->executeRequest($sql, array());
		$data = $req->fetch();
		return $data;
	}

	public function getLastServerVoteData($serverId){
		$sql = "SELECT * FROM " . $this->table . " WHERE server_id = ? ORDER BY vote_datetime DESC";
		$req = $this->executeRequest($sql, array($serverId));
		$data = $req->fetch();
		return $data;
	}

	public function getMonthlyVotes($serverId){
		$sql = "SELECT * FROM " . $this->table . " WHERE server_id = ?";
		$req = $this->executeRequest($sql, array($serverId));

		$sum = 0;
		while($data = $req->fetch()){
			$now = new DateTime();
			$datetime = new DateTime($data["vote_datetime"]);

			if($now->format('Y:m') == $datetime->format("Y:m")){
				$sum++;
			}	
		}
		return $sum;
	}

}

 ?>