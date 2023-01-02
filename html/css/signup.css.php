<?php
  include "vars.php";

 ?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

@media only screen and (min-width: 768px){

.content{
	position: relative;
	width: 100%;
}

.content .login_form .title{
	font-size: 50px;
	color: white;
	font-weight: 700;
}

.content .login_form{
	margin: 4% auto;
	padding: 1% 0 1% 0;
	width: 30%;
	border-radius: 25px;
	background-color: <?=$darker_background_color?>;
}

.content .login_form form{
	margin-top: 10%;
}

.content .login_form .form_entry{
	margin-top: 5%;
	width: 100%;
	margin-right: auto;
	margin-left: auto;
}

.content .login_form input{
	width: 70%;
	height: 50px;
	background-color: <?=$container_color?>;
	border-radius: 20px;
	padding: 15px 15px 15px 45px;
	color: white;
	border: none;
}

.content .login_form .form_entry .input_icon{
	position: absolute;
	margin-top: 10px;
	margin-left: 10px;
	font-size: 30px;
	vertical-align: middle;
	color: white;
}

.content .login_form .form_submit{
	margin: 10% auto;
	padding: 10px;
	border-radius: 20px;
	width: 70%;
	border: none;
	color: white;
	text-align: center;
	background-color: <?=$base_color?>;
	font-size: 20px;
	font-weight: 600;
	transition: all 0.3s ease 0s;
}

.content .login_form .form_submit:hover{
	background-color: <?=$darker_base_color?>;
}

.content .login_form .create_account_link, .content .login_form .create_account_link a{
	font-weight: 300;
	color: white;
}

}




@media only screen and (max-width: 768px){
.content{
	position: relative;
	width: 100%;
}

.content .login_form .title{
	font-size: 50px;
	color: white;
	font-weight: 700;
}

.content .login_form{
	margin: 0vh auto 10vh auto;
	padding: 1% 0 1% 0;
	width: 80%;
	border-radius: 25px;
	background-color: <?=$darker_background_color?>;
}

.content .login_form form{
	margin-top: 10%;
}

.content .login_form .form_entry{
	margin-top: 5%;
	width: 100%;
	margin-right: auto;
	margin-left: auto;
}

.content .login_form input{
	width: 90%;
	height: 50px;
	background-color: <?=$container_color?>;
	border-radius: 20px;
	padding: 15px 15px 15px 45px;
	color: white;
	border: none;
}

.content .login_form .form_entry .input_icon{
	position: absolute;
	margin-top: 10px;
	margin-left: 10px;
	font-size: 30px;
	vertical-align: middle;
	color: white;
}

.content .login_form .form_submit{
	margin: 10% auto;
	padding: 10px;
	border-radius: 20px;
	width: 70%;
	border: none;
	color: white;
	text-align: center;
	background-color: <?=$base_color?>;
	font-size: 20px;
	font-weight: 600;
	transition: all 0.3s ease 0s;
}

.content .login_form .form_submit:hover{
	background-color: <?=$darker_base_color?>;
}

.content .login_form .create_account_link, .content .login_form .create_account_link a{
	font-weight: 300;
	color: white;
	font-size: 14px;
}

.content .login_form .create_account_link a{
	text-decoration: underline;
}

}
