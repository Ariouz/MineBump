<?php 

$this->title = "Profil";

?>

<?php
$this->additional_header = '
<head>
<link href="css/profile.css.php" rel="stylesheet" type="text/css" media="screen" >
</head>

'

?>

<div class="content" align="center">

	<?php 

		if($success_msg != null){
			?>

			<div class="alert alert-success" role="alert">
				  <?php echo $success_msg ?>
			</div>

			<?php
		}else{
			echo $userAccount->showConfirmMailMessage($userAccount->getId());
		}

	 ?>

	<h1 class="title">Profil</h1>
	    	<div class="profile">
	    		<div class="left">
	    			<div class="avatar">
	    				<img src="https://minebump.com/Ressources/images/default_avatar.webp" class="avatar_img">
	    				<hr>
	    			</div>
	    			<div class="data">
	    				<span class="data_key">Identifiant: <span class="data_value"><?=$userAccount->getUsername()?></span></span>
	    				<span class=data_key>Email: <span class="data_value"><?=$userAccount->getEmail()?></span></span>
	    			</div>
	    		</div>
	    		<div class="right">
	    			<div class="servers f_part">
	    				<h2>Vos serveurs</h2>


	    				<?php 


	    				if(empty($userAccount->getServers())){
	    					?>

	    					<div class="alert alert-info" role="alert" style="margin: 3vh auto 0 auto;">
								  Vous n'avez pas de serveur. <a href="https://minebump.com/addserver">Ajoutez le votre ici !</a>
							</div>

	    					<?php
	    				}else{
		    				foreach($userAccount->getServers() as $serverId){
		    					$serverData = new ServerData($serverId);
		    					
		    					?>

		    					<div class="server_item">
			    					<div class="server_icon">
			    						<img src="https://minebump.com/<?=$serverData->getServerLogoPath() . "/" . $serverData->getServerLogoFileName()?>">
			    						<span class="server_id data_key">#<span class="data_value"><?=$serverData->getServerId()?></span></span>
			    					</div>
			    					<div class="server_data">
			    						<span class="server_name data_key">Serveur: <span class="data_value"><?=$serverData->getServerName()?></span></span>
			    						<span class="server_ip data_key">Ip: <span class="data_value"><?=$serverData->getServerIp()?></span></span>
			    						<span class="server_add_date data_key">Date d'ajout: <span class="data_value"><?=$serverData->getServerAddedDate()?></span></span>
			    					</div>
			    					<div class="edit_server">
			    						<span class="server_edit_link"><a href="https://minebump.com/servers/edit/<?=$serverData->getServerId()?>" class="server_edit_link">Modifier la fiche serveur</a></span>
			    					</div>
			    				</div>


		    					<?php
		    				}
		    			}
	    				 ?>


	    			</div>
	    			<div class="s_part">
	    				<div class="edit_profile">
		    				<a href="#"><button class="edit_profile_button view_profile_button"></i>Editer Profil</button></a>
		    			</div>
		    			<div class="logout">
		    				<a href="https://minebump.com/account/logout"><button class="logout_button view_profile_button">Se Déconnecter</button></a>
		    			</div>
	    			</div>
	    		</div>
	    	</div>
	    	
</div>