<?php 

$this->title = $serverData->getServerName();

$this->additional_header = '
<head>
<link href="css/server_view.css.php" rel="stylesheet" type="text/css" media="screen" >
</head>

';

?>

 <div class="content" align="center">
 	<h1><?=$serverData->getServerName()?></h1>

 <div class="global_card">
 	<div class="banner_card">
 		<img class="server_banner" src="https://minebump.com/<?=$serverData->getServerBannerPath() . "/" . $serverData->getServerBannerFileName()?>">
 	</div>
 	<hr class="data_separator">
 	<div class="data_card">
 		<div class="data_logo">
 			<img class="server_logo" src="https://minebump.com/<?=$serverData->getServerLogoPath() . "/" . $serverData->getServerLogoFileName()?>">
 		</div>
 		<div class="data_f">
 			<h2 class="data_title">Informations du serveur</h2>

 			<div class="data_item">
 				<span class="data_server_name data_key">
 				Nom du Serveur: 
	 			</span>
	 			<span class="data_value"> <?=$serverData->getServerName()?></span>
	 		</div>

	 		<div class="data_item">
	 			<span class="data_server_version data_key">
	 				Version: 
	 			</span>
	 			<span class="data_value"> <?=$serverData->getServerVersion()?></span>
	 		</div>

	 		<div class="data_item">	
	 			<span class="data_server_ip data_key">
	 				Ip: 
	 			</span>
	 			<span class="data_value server_ip" id="data_server_ip" onclick="copyIp()"> <?=$serverData->getServerIp()?></span>
	 		</div>

	 		<div class="data_item">
	 			<span class="data_server_website data_key">
	 				Site Web:  
	 			</span>
	 			<span class="data_value"> <a href="https://<?=$serverData->getServerWebsite()?>" target="_BLANK"><?=$serverData->getServerWebsite()?></a></span>
	 		</div>

	 		<div class="data_item">
				<span class="data_server_discord data_key">
	 				Serveur Discord: 
	 			</span>
	 			<span class="data_value"> <a href="https://<?=$serverData->getServerDiscord()?>" target="_BLANK"><?=$serverData->getServerDiscord()?></a></span>
	 		</div>

	 		<div class="server_categories" align="center">

				 <?php

				 	foreach ($serverData->getCategories() as $category) {
				 		$s = $utilFunctions->capitalize_after_delimiters($category, array('-'));
				 		?><span class="server_category"><?=ucfirst($category)?></span><?php
				 	}

				 ?>

			</div>
 		</div>
 		<div class="data_s">
 			<span class="vote_title">Bump</span>
 			<div class="datas_item">
 				<span class="data_key">Bumps du mois:</span><span class="data_value"><?=$votesData->getMonthlyVotes($serverData->getServerId())?> (<?=$votesData->getServerVotes($serverData->getServerId())?> totaux)</span>
 				<?php 

 					$lastVote = $votesData->getLastServerVoteData($serverData->getServerId());
 					$account = $userAccount;
 					$lastVoteUser = $account->getAccountDataFromId($lastVote['user_id']);

 				 ?>
 			</div>
 			<div class="datas_item">
 				<span class="data_key">Dernier Bump:</span><span class="data_value"><?=($votesData->getServerVotes($serverData->getServerId()) >= 1 ? $utilFunctions->getSecondsToTimeString($utilFunctions->getDateTimeToSeconds($lastVote['vote_datetime'])) . " par " . $lastVoteUser['username'] : "Aucun bump")?></span>
 			</div>
 			<div class="datas_item vote_button">
 				<a class="data_vote_button">Bump ce serveur !</a>
 			</div>
 			<?php $serverStatus = new MinecraftStatus($serverData->getServerIP()); ?>
 			<div class="server_status_div">
 				<span class="server_status">Status</span>
			 <span class="server_status_online"><?=$serverStatus->isOnline() == 1 ? "<i class='bx bx-check-circle server_status_green server_status_icon'></i>": "<i class='bx bx-x-circle server_status_red server_status_icon' ></i>" ?> <?=($serverStatus->isOnline() == 1 ? "En ligne" : "Hors ligne")?></span>
			 <span class="server_player_count">
			 					Connecté<?=$serverStatus->getOnlineCount() >= 1 ? "s" : ""?>: 
			 					<?= ($serverStatus->isOnline() == 1 ? "<span class='stats_value'>".$serverStatus->getOnlineCount() . "</span>/<span class='stats_value'>" . $serverStatus->getMaxOnline() . "</span>" : "<span class='stats_value'>0/?</span>") ?></span>
			 <span class="server_status_version">Version: <?=$serverData->getServerVersion()?></span></span>
 			</div>
 		</div>
 	</div>
 	<hr class="data_separator">
 	<div class="data_description">
 		<span class="about_server">A propos</span>
 		<textarea disabled="" class="data_desc_area"><?=$serverData->getServerLongDescription()?></textarea>
 	</div>
 </div>

 </div>

 <script type="text/javascript">
 	function copyIp(){
 		var ip = "<?=$serverData->getServerIp()?>"
 		navigator.clipboard.writeText(ip);

 		var txt = document.querySelector("#data_server_ip");
 		txt.innerText = " " + "<?=$serverData->getServerIp()?>" + " (copiée)";
 	}
 </script>