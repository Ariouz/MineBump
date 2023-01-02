<?php 


$this->title = "Booster";

$this->additional_header = '
<head>
<link href="css/boost_server.css.php" rel="stylesheet" type="text/css" media="screen" >
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>

';

?>



<?php 

		// SELECT SERVER TO BOOST SECTION 

if(isset($_GET['page']) AND !empty($_GET['page'])){
	if($_GET['page'] == "select-server"){
		?>

		<section class="select_server_section">

			<h1 class="page_title">Booster votre Serveur</h1>
			<h2 class="subtitle">Choisissez un serveur</h2>


			<?php 
			if($erreur != null){
				echo $erreur;
			}

			?><div class="boosted_servers_container">
				<div class="boosted_servers"><?php

				if(empty($userAccount->getServers())){
					
				}else{
					$i = 0;
					$j = 0;
					foreach($userAccount->getServers() as $serverId){
						$serverData = new ServerData($serverId);

						if($i >= 3){
							?> </div><div class="boosted_servers"> <?php
							$i = 0;
							$j++;
						}

						$i++

			 		?>

			 		<div class="boosted_server">
		 				<img src="https://minebump.com/<?=$serverData->getServerLogoPath() . "/" . $serverData->getServerLogoFileName()?>" class="boosted_server_logo">
		 				<span class="boosted_server_name"><a href=""><?=$serverData->getServerName()?></a></span>
		 				<span class="boosted_server_short_description">Votre Serveur</span>
		 				<a class="boosted_server_ip" id="server_select_choose" href="https://minebump.com/servers/boost/?page=offers&id=<?=$serverData->getServerId()?>">Choisir</a>
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
		 				<span class="server_see_more"><a href="https://minebump.com/servers/view/<?=$serverData->getServerId()?>">Fiche Serveur</a></span>
		 			</div> 


						<?php
					}
				}


				?>
				</div>		
			</div>
		</section>

		<?php
	}else if($_GET['page'] == "offers"){ // OFFERS SELECT PAGE
		if(isset($_GET['id']) AND !empty($_GET['id'])){
			
			?>

			<section class="select_offer_section">
			<h1 class="page_title">Choisissez une offre</h1>

			<div class="offers_container">
				<div class="offer">
					<div class="offer_header bg_role_cyan">
						<span>OFFRE 1</span>
					</div>
					<div class="offer_price">
						<span>3€</span>
					</div>
					<div class="offer_benefits">
						<div>
							<span>Mise en avant 3 jours</span>
							<hr class="border_role_cyan">
						</div>
						<div>
							<span>Choix de la date</span>
							<hr class="border_role_cyan">
						</div>
					</div>
					<div class="offer_select_button">
						<a href="https://minebump.com/servers/boost/?page=date&id=<?=$_GET['id']?>&offer=1" class="bg_role_cyan">Choisir</a>
					</div>
				</div>

				<div class="offer">
					<div class="offer_header bg_role_blue">
						<span>OFFRE 2</span>
					</div>
					<div class="offer_price">
						<span>5€</span>
					</div>
					<div class="offer_benefits">
						<div>
							<span>Mise en avant 7 jours</span>
							<hr class="border_role_blue">
						</div>
						<div>
							<span>Choix de la date</span>
							<hr class="border_role_blue">
						</div>
					</div>
					<div class="offer_select_button">
						<a href="https://minebump.com/servers/boost/?page=date&id=<?=$_GET['id']?>&offer=2" class="bg_role_blue">Choisir</a>
					</div>
				</div>

				<div class="offer">
					<div class="offer_header bg_role_orange">
						<span>OFFRE 3</span>
					</div>
					<div class="offer_price">
						<span>9€</span>
					</div>
					<div class="offer_benefits">
						<div>
							<span>Mise en avant 14 jours</span>
							<hr class="border_role_orange">
						</div>
						<div>
							<span>Choix de la date</span>
							<hr class="border_role_orange">
						</div>
					</div>
					<div class="offer_select_button">
						<a href="https://minebump.com/servers/boost/?page=date&id=<?=$_GET['id']?>&offer=3" class="bg_role_orange">Choisir</a>
					</div>
				</div>

				<div class="offer">
					<div class="offer_header bg_role_red">
						<span>OFFRE 4</span>
					</div>
					<div class="offer_price">
						<span>15€</span>
					</div>
					<div class="offer_benefits">
						<div>
							<span>Mise en avant 30 jours</span>
							<hr class="border_role_red">
						</div>
						<div>
							<span>Choix de la date</span>
							<hr class="border_role_red">
						</div>
					</div>
					<div class="offer_select_button">
						<a href="https://minebump.com/servers/boost/?page=date&id=<?=$_GET['id']?>&offer=4" class="bg_role_red">Choisir</a>
					</div>
				</div>
			</div>

		</section>

			<?php

		}else{
			header("Location: https://minebump.com/servers/boost/?page=select-server");
		}
	}else if($_GET['page'] == "date"){ // DATE SELECT PAGE
		if(isset($_GET['id']) AND !empty($_GET['id'])){
			if(isset($_GET['offer']) AND !empty($_GET['offer'])){
				
				?>

				<section class="select_date_section">
				<h1 class="page_title">Choisissez la date de début</h1>

				<div class="select_date_container">
					<div class="date_form">
						<form method="get" action="">
							<div class="date_entry">
								<?php 
									$hiddens = array("controller", "action");
									foreach($_GET as $name => $value) {
										if(in_array($name, $hiddens)){
										 continue;	
										}

										if($name == "page"){
											$value = "payment";
										}
										$name = htmlspecialchars($name);
										$value = htmlspecialchars($value);
									  	echo '<input type="hidden" name="'. $name .'" value="'. $value .'">';
									}

								 ?>
								<label for="date">Date de début</label>
								<input type="date" id="datepicker" name="date" placeholder="Choisir une date de début" value="Date de début" required readonly>
								<input class="choose_date" type="submit" value="Choisir">
							</div>
						</form>
					</div>
				</div>

				<?php 

				$servers = new Servers();
				$duration = 0;

				switch ($_GET['offer']) {
					case '1':
						$duration = 3;
						break;
					case '2':
						$duration = 7;
						break;
					case '3':
						$duration = 14;
						break;
					case '4':
						$duration = 30;
						break;
					default:
						header("Location: https://minebump.com/servers/boost/?page=offers&id=".$_GET['id']);
						break;
				}

				$str = $servers->getUnavailablesBoostedDates($duration);

				 ?>

				<script type="text/javascript">
					var array = "<?=$str?>".split(",");
					console.log(array);

					$(function () {
					  $('input').datepicker({
					    dateFormat: 'yy-mm-dd',
					    minDate: new Date(),
					    beforeShowDay: function(date) {
					      var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
					      return [array.indexOf(string) == -1]
					    },
					    onSelect: function(dateText, inst) { 
					      var dateAsString = dateText;
					      var dateAsObject = $(this).datepicker( 'getDate' );
					      $("#selected_date").text(dateAsString);
					    }
					  });
					});

				</script>

			</section>
				<?php

			}else{
				header("Location: https://minebump.com/servers/boost/?page=offers&id=".$_GET['id']);
			}
		}else{
			header("Location: https://minebump.com/servers/boost/?page=select-server");
		}
	}else if($_GET['page'] == "payment"){

		$price = 0;
		$days = 0;

		switch ($offer){
			case 1:
				$price = 0.30;
				$days = 3;
				break;
			case 2:
				$price = 5;
				$days = 7;
				break;
			case 3:
				$price = 9;
				$days = 14;
				break;
			case 4:
				$price = 15;
				$days = 30;
				break;
			default:
				header("Location: https://minebump.com/servers/boost/?id=".$serverId);
				break;
		}

		$finalPrice = round(0.30 + ($price*1.05), 2);
		$interval = new DateInterval("P".$days."D");
		$startDate = new DateTime($startDate);
		$startDate = $startDate->format("d-m-Y");
		$endDate = new DateTime($startDate);
		$endDate->add($interval);
		$endDate = $endDate->format("d-m-Y");


		?>


			<section class="select_date_section">
			<h1 class="page_title">Paiement</h1>

			<div class="payment_container">
				<div class="sum_main_container">
					<div class="alert-box" align="center" style="width: 100%; margin-top: 2vh;">
						<div class="alert alert-warning" role="alert" id="error_alert_box" hidden="">
						  <span id="error_alert"></span>
						</div>
						<div class="alert alert-success" role="alert" id="success_alert_box" hidden="">
						  <span id="success_alert"></span>
						</div>
					</div>
					<h2 class="summary_title">Récapitulatif</h2>
					<div class="summary_container">
						<div class="summary_first">
							<h4><u>Boost de serveur</u></h4><hr>
							<span>Serveur: <span class="data_value"><?=$serverId?></span></span>
							<span>Offre: <span class="data_value"><?=$offer?> (<?=$days?> jours)</span></span>
							<span>Date: <span class="data_value"><?=$startDate?> » <?=$endDate?></span></span>
						</div>
						<div class="summary_second">
							<h4><u>Prix à payer</u></h4><hr>
							<span>Offre: <span class="data_value"><?=$price?>€</span></span>
							<span>Taxes: <span class="data_value">0.30€ + 5%</span></span>
							<hr>
							<span>Prix Total: <span class="data_value"><?=$finalPrice?>€</span></span>

						</div>
						<div id="smart-button-container">
					      <div style="text-align: center" class="summary_third">
					        <div id="paypal-button-container"></div>
					      </div>
					    </div>
					</div>
				</div>

				<!-- PAYPAL BUTTONS -->
				
				  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory" data-namespace="paypal_sdk"></script>
				  <script>
				    paypal.Button.render({
					      env: 'production', // 'sandbox' ou 'production',
					      commit: true,
					      style: {
					        shape: 'rect',
					        color: 'gold',
					        layout: 'vertical',
					        label: 'paypal',
					        size: 'responsive'
					
					      },

					      payment: function() {
					        
					        var CREATE_URL = 'https://minebump.com/payment/create?price=<?=$finalPrice?>&offer=<?=$offer?>&duration=<?=$days?>';
					        
					        return paypal.request.post(CREATE_URL)
					          .then(function(data_post) { 

					            if (data_post.success) { 

					               return data_post.paypal_response.id;
					            } else {
					               return false;
					            }
					         });
					      },

					      onAuthorize: function(data, actions) {
					        
					        var EXECUTE_URL = 'https://minebump.com/payment/execute';
					     

					        var data_post = {
					          paymentID: data.orderID,
					          payerID: data.payerID
					        };


					        return paypal.request.post(EXECUTE_URL, data_post)
					          .then(function (data_return) {
					          if (data_return.success) { 


					          	// ADD SERVER TO DB USING POST REQUEST TO PHP FILE
					            $.ajax({
									type : "POST",
									url  : "https://minebump.com/Models/boostServerRequest.php",
									data : {serverId: <?=$_GET['id']?>, startDate: "<?=$startDate?>", endDate: "<?=$endDate?>"},
									success: function(res){
										showAlert(res.success, false);                        
									}
								});

					          } else {
					            
					            showAlert(data_return.msg, true);
					          }
					        });
					      },

					      onCancel: function(data, actions) {
					        showAlert("Paiement annulé : vous avez fermé la fenêtre de paiement.", true);
					      	
					      },

					      onError: function(err) {
					        showAlert("Paiement annulé : une erreur est survenue. Merci de bien vouloir réessayer ultérieurement.", true);
					      }
					    }, '#paypal-button-container');
				  </script>

				  <script type="text/javascript">
				  	function showAlert(message, error){
				  		const alertBox = document.getElementById("error_alert_box");
				  		const successBox = document.getElementById("success_alert_box");

				  		const alertMsg = document.getElementById("error_alert");
				  		const successMsg = document.getElementById("success_alert");
				  		if(error){
				  			alertMsg.innerText = message;
				  			alertBox.removeAttribute("hidden");
							successBox.setAttribute("hidden", "");
				  		}else{
				  			successMsg.innerText = message;
							alertBox.setAttribute("hidden", "");
							successBox.removeAttribute("hidden");
				  		}
				  	}
				  </script>

			</div>
			</section>


		<?php
	}
}


?>

