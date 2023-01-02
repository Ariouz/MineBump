<?php 

require_once('structure/Model.php');
require_once ('Models/MailSender.php');

class UserAccount extends Model {

private $minebump_users = "minebump_users";
private $minebump_servers = "minebump_servers";

private $id;
private $username;
private $email;

private $error = null;
private $success = null;

public function __construct(){
	if(isset($_SESSION['id'])){
		$this->id = $_SESSION['id'];
		$this->username = $_SESSION['username'];
		$this->email = $_SESSION['email'];
	}
}

public function processSignupData($username, $email, $password, $password_confirm){
	if(!isset($username) || $username == ""){
		$this->error = "Merci de remplir tous les champs";
		return;
	}

	if(!isset($email) || $email == ""){
		$this->error = "Merci de remplir tous les champs";
		return;
	}

	if(!isset($password) || $password == ""){
		$this->error = "Merci de remplir tous les champs";
		return;
	}

	if(!isset($password_confirm) || $password_confirm == ""){
		$this->error = "Merci de remplir tous les champs";
		return;
	}

	if($password != $password_confirm){
		$this->error = "Les mots de passe ne correspondent pas !";
		return;
	}

	if($this->accountExists($email)){
		$this->error = "Un compte avec cette adresse mail existe déjà! Essayez de vous connecter.";
		return;
	}

	$hashedPassword = sha1($password);
	$this->createAccount($username, $email, $hashedPassword);

}

public function createAccount($username, $email, $password){
	$sql = "INSERT INTO ".$this->minebump_users."(username, email, password, newsletter, account_date, servers_id, confirmed_email) VALUES(?, ?, ?, '0', now(), '', '0')";
	$request = $this->executeRequest($sql, array($username, $email, $password));


	$this->sendMailConfirmation($email, $username);
	$this->success = "Un email de confirmation a été envoyé à l'adresse mail " . $email;
}

public function processLoginData($email, $password){

	if(!isset($email) || $email == ""){
		$this->error = "Merci de remplir tous les champs";
		return;
	}

	if(!isset($password) || $password == ""){
		$this->error = "Merci de remplir tous les champs";
		return;
	}

	if(!$this->accountExists($email)){
		$this->error = "Aucun compte n'est associé à cette adresse email.";
		return;
	}

	$hashedPassword = sha1($password);

	if(!$this->checkPassword($email, $hashedPassword)){
		$this->error = "Mot de passe incorrect! <a href='reset-password'>Mot de passe oublié ?</a>";
		return;
	}

	$this->login($email, $hashedPassword);

}

public function login($email, $hash_pass){
	header("Location: https://minebump.com/account/profile");

	$data = $this->getAccountData($email);

	$_SESSION['id'] = $data['user_id'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['email'] = $data['email'];

	setcookie("user_id", $data['user_id'], time()+3600, '/', 'minebump.com', true, true);
	setcookie("user_pass", $hash_pass, time()+3600, '/', 'minebump.com', true, true);
}

public function getId(){
	return $this->id;
}

public function getUsername(){
	return $this->username;
}

public function getEmail(){
	return $this->email;
}

public function getAccountData($email){
	$sql = "SELECT * FROM " .$this->minebump_users." WHERE email = ?";
	$request = $this->executeRequest($sql, array($email));
	$data = $request->fetch();
	return $data;
}

public function getAccountDataFromId($user_id){
	$sql = "SELECT * FROM " . $this->minebump_users." WHERE user_id = ?";
	$request = $this->executeRequest($sql, array($user_id));
	$data = $request->fetch();
	return $data;
}

public function accountExists($email){
	$sql = "SELECT * FROM " . $this->minebump_users." WHERE email = ?";
	$request = $this->executeRequest($sql, array($email));
	return $request->rowCount() >= 1;
}

public function accountExistsId($user_id){
	$sql = "SELECT * FROM " . $this->minebump_users." WHERE user_id = ?";
	$request = $this->executeRequest($sql, array($user_id));
	return $request->rowCount() >= 1;
}

public function sendMailConfirmation($email, $username){
	$data = $this->getAccountData($email);
	$user_id = $data['user_id'];
	ob_start();
	include("Ressources/mails/mail_confirm.php");
	$content = ob_get_clean();

	$mailer = new MailSender();
	$mailer->mail($email, $username, "Confirmez votre adresse mail sur MineBump.com", $content);
}

public function getServers(){
	$sql = "SELECT * FROM " . $this->minebump_servers . " WHERE server_owner_id = ?";
	$req = $this->executeRequest($sql, array($this->id));

	$servers = array();
	while($data = $req->fetch()){
		array_push($servers, $data['server_id']);
	}
	return $servers;
}

public function checkPassword($email, $password){
	$sql = "SELECT * FROM " .$this->minebump_users." WHERE email = ?";
	$request = $this->executeRequest($sql, array($email));
	$data = $request->fetch();
	return $password == $data['password'];
}

public function getError(){
	return $this->error;
}

public function getSuccess(){
	return $this->success;
}

public function isMailConfirmed($user_id){
	$data = $this->getAccountDataFromId($user_id);
	return $data['confirmed_email'] == 1;

}

public function confirmMail($user_id){
	$sql = "UPDATE " . $this->minebump_users . " SET confirmed_email=1 WHERE user_id=?";
	$request = $this->executeRequest($sql, array($user_id));
}


public function showConfirmMailMessage($user_id){
	$content = '';

	if(!$this->isMailConfirmed($user_id)){
		$content = "
			<div class='alert alert-warning' role='alert'>
				Vous n'avez pas encore confirmé votre adresse mail. <a href='https://minebump.com/account/sendmailconfirm'>Confirmez la maintenant !</a>
			</div>
		";
	}

	return $content;
}

public function logout(){
	session_destroy();
	if (isset($_COOKIE['user_id'])) {
	    setcookie('user_id', "", time()-(3600*24), '/', 'minebump.com', true, true); 
	}
	if (isset($_COOKIE['user_pass'])) {
	    setcookie('user_pass', "", time()-(3600*24), '/', 'minebump.com', true, true);
	}	
}

}

?>