<?php $this->title = "Inscription"; 

$displayError = false;
$displaySuccess = false;

if(isset($userAccount)){
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$password_confirm = htmlspecialchars($_POST['password_confirm']);

	$userAccount->processSignupData($username, $email, $password, $password_confirm);


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
<link href="css/signup.css.php" rel="stylesheet" type="text/css" media="screen" >
</head>

'

?>

<div class="content" align="center">
	<div class="login_form">
		<h1 class="title">Inscription</h1>
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
				<i class='bx bx-user input_icon'></i>
				<input type="text" name="username" id="username" placeholder="Identifiant" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>">
			</div>
			<div class="form_entry">
				<i class='bx bx-envelope input_icon'></i>
				<input type="email" name="email" id="email" placeholder="Adresse E-Mail" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>">
			</div>
			<div class="form_entry">
				<i class='bx bx-lock-alt input_icon'></i>
				<input type="password" name="password" id="password" placeholder="Mot De Passe">
			</div>
			<div class="form_entry">
				<i class='bx bx-lock-alt input_icon'></i>
				<input type="password" name="password_confirm" id="password_confirm" placeholder="Confirmez le Mot De Passe">
			</div>
			<button type="submit" class="form_submit" id="signup_submit" name="signup_submit">S'inscrire</button>
		</form>
		<span class="create_account_link">Vous avez déjà un compte ? <a href="https://minebump.com/login">Connectez-vous !</a></span>
	</div>
</div>