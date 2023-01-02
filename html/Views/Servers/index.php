<?php 


$this->title = "Liste des serveurs";

$this->additional_header = '
<head>
<link href="css/server_list.css.php" rel="stylesheet" type="text/css" media="screen" >
</head>

';

$servers = new Servers();

function isFilterCategory($cat){
	return $category_filter == $cat ? "selected" : "";
}

 ?>

 <h1 class="page_title">Découvrir des serveurs</h1>

 <div class="main_container">
 	
 	<div class="categories_navbar">
 		<ul>
 			<?php $category_base = "https://minebump.com/servers/?category="; ?>
 			<li><a class="category" href="<?=$category_base?>all" rel="nofollow">Tous</a></li>
 			<li><a class="category" href="<?=$category_base?>skyblock" rel="nofollow">Skyblock</a></li>
 			<li><a class="category"href="<?=$category_base?>pvp" rel="nofollow">PvP</a></li>
 			<li><a class="category" href="<?=$category_base?>survie" rel="nofollow">Survie</a></li>
 			<li><a class="category" href="<?=$category_base?>mini-jeux" rel="nofollow">Mini-Jeux</a></li>
 			<li><a class="category" href="<?=$category_base?>freebuild" rel="nofollow">FreeBuild</a></li>
 			<li><a class="category" href="<?=$category_base?>semi-rp" rel="nofollow">Semi-RP</a></li>
 			<li><a class="category" href="<?=$category_base?>autre" rel="nofollow">Autre</a></li>
 		</ul>
 		<div class="servers_order_by"><span>Trier par:</span>
 			<form method="get" action="">
 				<select class="servers_select_category_hidden" name="category">
 					<option value="all" <?php if($category_filter == "all"){echo "selected";}?> ></option>
 					<option value="skyblock" <?php if($category_filter == "skyblock"){echo "selected";}?>></option>
 					<option value="pvp" <?php if($category_filter == "pvp"){echo "selected";}?> ></option>
 					<option value="survie" <?php if($category_filter == "survie"){echo "selected";}?> ></option>
 					<option value="mini-jeux" <?php if($category_filter == "mini-jeux"){echo "selected";}?> ></option>
 					<option value="freebuild" <?php if($category_filter == "freebuild"){echo "selected";}?> ></option>
 					<option value="semi-rp" <?php if($category_filter == "semi-rp"){echo "selected";}?> ></option>
 					<option value="autre" <?php if($category_filter == "autre"){echo "selected";}?> ></option>
 				</select>
 				<select class="servers_select_order_by" name="sort-type">
	 				<option value="bumps_desc">Bumps +</option>
	 				<option value="bumps_asc">Bumps -</option>
	 				<option value="date_asc">Date d'ajout +</option>
	 				<option value="date_desc">Date d'ajout -</option>
	 				<option value="alpahabet_asc">Alphabétique +</option>
	 				<option value="alpahabet_desc">Alphabétique -</option>
 				</select>
 				<input type="submit" class="servers_order_by_button" value="Valider"></input>
 			</form>
 			
 		</div>
 	</div>

 	<div class="boosted_servers_list">

 		<h2>Serveurs en avant</h2>

 		<?php 

 		$boostedServers = $servers->getEnabledBoostedServers();

 		?><div class="boosted_servers"><?php
 		$j = 0;
 		for($i = 0; $i<3; $i++){
 			
 			if(count($boostedServers) >= $j+1){
 				$boostedServer = new BoostedServer($boostedServers[$i]);

 				?>
 				<!-- <span>i: <?=$i?>; Check: <?=$boostedServer->checkTime()?>; Remain: <?=$boostedServer->calculateRemainingTime()?>; Id: <?=$boostedServer->getBoostId()?></span> --><?php
 				if(!$boostedServer->checkTime()){
 					$boostedServer->disableBoost();
 					// echo "Disabled " . $boostedServer->getBoostId();
 					$j--;
 					continue;
 				}

 				$serverData = new ServerData($boostedServer->getServerId());
		 		?>


		 		<div class="boosted_server">
	 				<img src="https://minebump.com/<?=$serverData->getServerLogoPath() . "/" . $serverData->getServerLogoFileName()?>" class="boosted_server_logo">
	 				<span class="boosted_server_short_description">Serveur boosté</span>
	 				<span class="boosted_server_ip" id="data_server_ip_<?=$boostedServer->getServerId()?>" onclick="copyIp('<?=$serverData->getServerIp()?>', '<?=$boostedServer->getServerId()?>');"><?=$serverData->getServerIp()?></span>
	 				<div class="boosted_servers_categories_container">
		 				<div class="boosted_server_categories_boosted">
		 					<?php

					 			foreach ($serverData->getCategories() as $category) {
					 				$s = $utilFunctions->capitalize_after_delimiters($category, array('-'));
					 				?><span class="server_category"><?=ucfirst($category)?></span><?php
					 			}
					 		?>

		 				</div>
	 				</div>
	 				<span class="server_see_more"><a href="https://minebump.com/servers/view/<?=$boostedServer->getServerId()?>" rel="nofollow">Page serveur</a></span>
	 			</div> 

		 		<?php
		 	}else{
		 		?>
				<div class="boosted_server">
	 				<img src="https://minebump.com/Ressources/minebump_logo.webp" class="boosted_server_logo">
	 				<span class="boosted_server_name"><a href="https://minebump.com/servers/boost/">Votre serveur ici</a></span>
	 				<span class="boosted_server_short_description">Boostez votre serveur</span>
	 				<span class="boosted_server_ip">Votre IP</span>
	 				<div class="boosted_server_categories" align="center">
	 					<span class="boosted_server_category">Vos modes de jeu</span>
	 				</div>
	 				<span class="server_see_more"><a href="https://minebump.com/servers/boost/">Booster !</a></span>
	 			</div> 	

		 		<?php
		 	}

		 	
		 	$j++;
		 	if($j == 3){
		 		break;
		 	}
 		}

 		 ?>
 		
 		</div>
 	</div>

 	<div class="servers_list" id="server_list">
 		<h2>Liste des serveurs</h2>
 		<div class="servers">

	 		<?php
	 		
	 		$serversPerPage = 2;
	 		$limitStart = ($page-1) * $serversPerPage;

	 		if($category_filter != null and $category_filter != "all"){
				$servers_list = $servers->getCategoryServers($category_filter, $sortType, $limitStart, $serversPerPage);
			}else{
				$servers_list = $servers->getAllServers($sortType, $limitStart, $serversPerPage);
			}
	 		
	 		//$orderedList = $servers->sortByMonthlyVotes($servers_list);


	 		$votesData = new VotesData();

	 		if(count($servers_list) == 0){
	 			?>

	 			<p align="center">Aucun serveur sur cette page...</p>
	 			<?php
	 		}

	 		foreach ($servers_list as $serverId => $votes) {

	 			$serverData = new ServerData($serverId);
	 			$lastVote = $votesData->getLastServerVoteData($serverData->getServerId());
 				$account = $userAccount;
 				$lastVoteUser = $account->getAccountDataFromId($lastVote['user_id']);

 				$serverStatus = new MinecraftStatus($serverData->getServerIP());

	 			?>
	 			<div class="server_card">
		 			<div class="infos">
		 				<div class="left">
			 				<img src="https://minebump.com/<?=$serverData->getServerLogoPath()?>/<?=$serverData->getServerLogoFileName()?>" class="server_logo">
			 			</div>
			 			<div class="right">
			 				<span class="server_name"><a href="https://minebump.com/servers/view/<?=$serverId?>/"><?=$serverData->getServerName()?></a></span>
				 			<span class="server_short_description"><?=$serverData->getServerShortDescription()?></span>
				 			<span class="server_ip" id="data_server_ip_<?=$serverId?>" onclick="copyIp('<?=$serverData->getServerIp()?>', '<?=$serverId?>');"><?=$serverData->getServerIp()?></span>
				 			<div class="server_categories" align="center">

				 				<?php

				 				foreach ($serverData->getCategories() as $category) {
				 					$s = $utilFunctions->capitalize_after_delimiters($category, array('-'));
				 					?><span class="server_category"><?=ucfirst($category)?></span><?php
				 				}

				 				?>

				 			</div>
				 			
			 			</div>
						<div class="stats">
			 				<span class="server_vote">Votes</span>
			 				<span class="server_month_votes"><span class="stats_value"><?=$votesData->getMonthlyVotes($serverId)?></span> Bump (<?=$votesData->getServerVotes($serverData->getServerId())?> totaux)</span>
			 				<span class="server_last_vote">Dernier bump: <span class="stats_value">
			 					<?=($votesData->getServerVotes($serverData->getServerId()) >= 1 ? $utilFunctions->getSecondsToTimeString($utilFunctions->getDateTimeToSeconds($lastVote['vote_datetime'])) . " par " . $lastVoteUser['username'] : "Aucun bump")?></span></span>
			 				<hr>
			 				<span class="server_status">Status</span>
			 				<span class="server_status_online"><?=$serverStatus->isOnline() == 1 ? "<i class='bx bx-check-circle server_status_green server_status_icon'></i>": "<i class='bx bx-x-circle server_status_red server_status_icon' ></i>" ?> <?=($serverStatus->isOnline() == 1 ? "En ligne" : "Hors ligne")?></span>
			 				<span class="server_player_count">
			 					Connecté<?=$serverStatus->getOnlineCount() >= 1 ? "s" : ""?>: 
			 					<?= ($serverStatus->isOnline() == 1 ? "<span class='stats_value'>".$serverStatus->getOnlineCount() . "</span>/<span class='stats_value'>" . $serverStatus->getMaxOnline() . "</span>" : "<span class='stats_value'>0/?</span>") ?></span>
			 				<span class="server_status_version">Version: <?=$serverData->getServerVersion()?></span></span>

			 				<!-- <div class="banner">
				 				<img src="https://minebump.com/<?=$serverData->getServerBannerPath()?>/<?=$serverData->getServerBannerFileName()?>" class="server_banner">
				 			</div> -->
			 			
			 			</div>
		 			</div>
		 			
		 			<span class="server_see_more"><a href="https://minebump.com/servers/view/<?=$serverId?>" rel="nofollow">Page serveur</a></span>

		 		</div>
	 		<?php
	 		}

	 		?>

 		</div>
 		<div class="pagination">
 			<?php 
	 			function getLinkWithPage($page_){
	 				$sortType = "bumps_desc";
	 				if(isset($_GET['sort-type']) AND !empty($_GET['sort-type'])) $sortType = $_GET['sort-type'];
	 				return "https://minebump.com/servers/?category=".$_GET['category']."&sort-type=".$sortType."&page=".$page_;
	 			}

 			 ?>
 			<!-- <?php if($page > 1){ ?><ul><a class="pagination_button" href="<?=getLinkWithPage($page-1)?>">Précédent</a></ul><?php } ?> -->
 			<?php for($i = 3; $i>=1; $i--){ if($page-$i >= 1){?> <ul><a class="pagination_button" href="<?=getLinkWithPage($page-$i)?>" rel="nofollow"><?=$page-$i?></a></ul> <?php }} ?>
 			<ul><a class="pagination_current pagination_button" href="" rel="nofollow"><?=$page?></a></ul>
 			<?php for($i = 1; $i<=3; $i++){?> <ul><a class="pagination_button" href="<?=getLinkWithPage($page+$i)?>" rel="nofollow"><?=$page+$i?></a></ul> <?php } ?>
 			<!-- <ul><a class="pagination_button" href="<?=getLinkWithPage($page+1)?>">Suivant</a></ul> -->
 		</div>

 	</div>


 </div>

 <script type="text/javascript">
 	function copyIp(ip, id){
 		navigator.clipboard.writeText(ip);

 		var txt = document.querySelector("#data_server_ip_"+id);
 		txt.innerText = " " + ip + " (copiée)";
 	}
 </script>