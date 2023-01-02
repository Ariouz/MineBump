<?php 


$this->title = "Accueil - Liste Serveurs";

$this->additional_header = '
<head>
<link href="css/home.css.php" rel="stylesheet" type="text/css" media="screen" >
</head>

';

$servers = new Servers();

?>


<div class="banner">
	<div class="image"></div>
	<div class="content">
		<h1 align="center">Découvrez des serveurs Minecraft</h1>
		<h2 align="center"><span>♥</span> Trouvez votre bonheur!</h2>
	</div>
	<a class="search" href="https://minebump.com/servers/">
		<i class='bx bx-search'></i> <span>Parcourir les serveurs</span>
	</a>
</div>

<div class="server_top scroll_reaveal">
	<div class="title">
		<h2>Top des Serveurs</h2>
	</div>
	<div class="list">
		<?php 

	 		$page = 1;
	 		$serversPerPage = 2;
	 		$limitStart = ($page-1) * $serversPerPage;

	 		
			$servers_list = $servers->getAllServers("bumps_desc", $limitStart, $serversPerPage);

	 		//$orderedList = $servers->sortByMonthlyVotes($servers_list);


	 		$votesData = new VotesData();

	 		$keys = array_keys($servers_list);
			$values = array_values($servers_list);

	 		for($i = 0; $i < 3; $i++) {

	 			if(count($servers_list) < $i+1){
		 			?>

		 			
		 			<div class="top_server">
		 				<img src="https://minebump.com/Ressources/minebump_logo.webp" class="top_server_logo" alt="Logo de serveur">
		 				<span class="top_server_short_description">0 Bumps</span>
		 				<span class="top_server_ip" id="data_server_ip_0">Pas de serveur</span>
		 				<div class="top_servers_categories_container">
			 				<div class="top_server_categories_boosted">
			 					<span class="server_category">Catégorie</span>
			 					<span class="server_category">Catégorie</span>
			 				</div>
		 				</div>
		 				<span class="server_see_more"><a href="#">Voir plus...</a></span>
		 			</div> 

		 			<?php

		 			continue;
	 			}else{

	 				$serverId = $keys[$i];
		 			$votes = $values[$i];

		 			$serverData = new ServerData($serverId);
		 			$lastVote = $votesData->getLastServerVoteData($serverData->getServerId());
	 				$account = $userAccount;
	 				$lastVoteUser = $account->getAccountDataFromId($lastVote['user_id']);

	 				$serverStatus = new MinecraftStatus($serverData->getServerIP());

		 			?>
		 			<div class="top_server">
		 				<img src="https://minebump.com/<?=$serverData->getServerLogoPath() . "/" . $serverData->getServerLogoFileName()?>" class="top_server_logo" alt="Logo de Serveur <?=$serverData->getServerId()?>">
		 				<span class="top_server_short_description"><?=$votesData->getMonthlyVotes($serverId)?> Bumps (<?=$votesData->getServerVotes($serverData->getServerId())?> totaux)</span>
		 				<span class="top_server_ip" id="data_server_ip_<?=$serverData->getServerId()?>" onclick="copyIp('<?=$serverData->getServerIp()?>', '<?=$serverData->getServerId()?>');"><?=$serverData->getServerIp()?></span>
		 				<div class="top_servers_categories_container">
			 				<div class="top_server_categories_boosted">
			 					<?php

						 			foreach ($serverData->getCategories() as $category) {
						 				$s = $utilFunctions->capitalize_after_delimiters($category, array('-'));
						 				?><span class="server_category"><?=ucfirst($category)?></span><?php
						 			}
						 		?>

			 				</div>
		 				</div>
		 				<span class="server_see_more"><a href="https://minebump.com/servers/view/<?=$serverData->getServerId()?>">Voir plus...</a></span>
		 			</div> 
		 			<?php
	 			}

	 		}

	 	?>
		
	</div>
</div>

<div class="work_explaination scroll_reaveal">
	<div class="title">
		<h2>Comment ca marche?</h2>
	</div>
	<div class="content">
		<div class="content_item icon">
			<!-- <img src=""> -->
			<i class='bx bx-chevrons-up'></i>
		</div>
		<div class="content-item text">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<a href="https://minebump.com/servers/">Parcourir les serveurs</a>
		</div>
	</div>
</div>

<div class="global_stats scroll_reaveal">
	<div class="stat_item">
		<i class='bx bx-upvote'></i>
		<span class="count stat_counter" data-val="<?=$votesData->getTotalVotes()?>"></span>
		<span class="desc">Bumps effectués</span>
	</div>
	<div class="stat_item">
		<i class='bx bx-server'></i>
		<span class="count stat_counter" data-val="<?=count($servers->getAllServersNoLimit())?>"></span>
		<span class="desc">Serveurs inscrits</span>
	</div>
	<!-- <div class="stat_item">
		<i class='bx bx-user'></i>
		<span class="count stat_counter" data-val="145"></span>
		<span class="desc">Personnes ont visités</span>
	</div> -->
</div>

<script type="text/javascript" src="scripts/home/stat_counter.js"></script>