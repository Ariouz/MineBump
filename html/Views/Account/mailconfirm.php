<?php  

$this->pTitle = "Confirmation de compte";

$displayError = false;
$displaySuccess = false;

if($controller->getError() != null){
	$displayError = true;
}

if($controller->getSuccess() != null){
	$displaySuccess = true;
}

$this->additional_header = '
<head>
<link href="css/mailconfirm.css.php" rel="stylesheet" type="text/css" media="screen" >
</head>
';

?>

<div class="content" align="center">
	<?php 

			if($displayError){
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $controller->getError(); ?>
				</div>
				<?php
			}

			if($displaySuccess){
				?>
				<div class="alert alert-success" role="alert">
				  <?php echo $controller->getSuccess(); ?>
				</div>
				<?php
			}

		 ?>
</div>