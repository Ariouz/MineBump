<?php 

require_once "structure/Model.php";


class UtilFunctions extends Model {

	public function __construct(){

	}

	public function getDateTimeToSeconds($datetime){
		$dt = new DateTime($datetime);
		$now = new DateTime();

		$difference_in_seconds = $now->format('U') - $dt->format('U');
		return $difference_in_seconds;
	}

	public function getSecondsToTimeString($seconds){
		$minutes = 0;
		$hours = 0;
		$days = 0;

		while($seconds >= 60){
			$seconds-=60;
			$minutes++;
		}

		while($minutes >= 60){
			$minutes-=60;
			$hours++;
		}

		while($hours >= 24){
			$hours-=24;
			$days++;
		}

		return ($days > 0 ? $days . " jours " : "") . ($hours > 0 ? $hours . " heures " : "") . ($minutes > 0 ? $minutes . " minutes et " : "") . $seconds . " secondes";
	}

	/*Returns String with capitalized letters on delimiters (e.g: Up after '.')*/
	public function capitalize_after_delimiters($string='', $delimiters = array()){
	    foreach ($delimiters as $delimiter) {
	        $temp = explode($delimiter, $string);
	        array_walk($temp, function (&$value) { $value = ucfirst($value); });
	        $string = implode($temp, $delimiter);
	    }
	    return $string;
	}

}

?>