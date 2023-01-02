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

class ControllerHome extends Controller {

    public function __construct() {

    }

    public function index() {
        $utilFunctions = new UtilFunctions();
        $userAccount = new UserAccount();
        $this->generateView(array('utilFunctions' => $utilFunctions, 'userAccount' => $userAccount));
    }

}

?>