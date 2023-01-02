<?php $this->title = "Connexion"; 

$displayError = false;
$displaySuccess = false;

if(isset($_SESSION['id'])){
	header("Location: https://minebump.com");
}

if(isset($userAccount)){
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);

	$userAccount->processLoginData($email, $password);

	if($userAccount->getError() != null){
		$displayError = true;
	}

	if($userAccount->getSuccess() != null){
		$displaySuccess = true;
	}
}

?>

<?php
$this->additional_header = '
<head>
<link href="css/login.css.php" rel="stylesheet" type="text/css" media="screen" >
</head>

'
?>

<div class="content" align="center">

	<div class="login_form">
		
		<h1 class="title">Connexion</h1>
		<form method="post" action="">
			<?php 

			if($displayError){
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $userAccount->getError(); ?>
				</div>
				<?php
			}

			if($displaySuccess){
				?>
				<div class="alert alert-success" role="alert">
				  <?php echo $userAccount->getSuccess(); ?>
				</div>
				<?php
			}

		 ?>
		 <div class="form_entry">
				<i class='bx bx-envelope input_icon'></i>
				<input type="email" name="email" id="email" placeholder="Adresse E-Mail" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>">
			</div>
			<div class="form_entry">
				<i class='bx bx-lock-alt input_icon'></i>
				<input type="password" name="password" id="password" placeholder="Mot De Passe">
			</div>
			<button type="submit" class="form_submit" name="login_submit">Se Connecter</button>
		</form>
		<span class="create_account_link">Pas de compte ? <a href="https://minebump.com/signup">Créez-en un !</a></span>
	</div>
</div>