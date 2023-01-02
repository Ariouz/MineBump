<?php 
require_once("/var/www/html/Models/AddBoostedServerProcess.php");

header('Content-Type: application/json');

$serverId = $_REQUEST['serverId'];
$startDate = $_REQUEST['startDate'];
$endDate = $_REQUEST['endDate'];

$startDate = new DateTime("".$startDate);
$endDate = new DateTime("".$endDate);

$startDate = $startDate->format('Y-m-d H:i:s');
$endDate = $endDate->format('Y-m-d H:i:s');

$serverProcess = new AddBoostedServerProcess($serverId);
$serverProcess->addBoost($startDate, $endDate);


$data = ["success"=>"Votre serveur a bien été boosté!"];
echo json_encode($data);

 ?>