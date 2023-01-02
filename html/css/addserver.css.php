<?php
  include "vars.php";

 ?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

@media only screen and (min-width: 768px){

.content{
	position: relative;
	width: 100%;
}

.content .add_server_form .title{
	font-size: 50px;
	color: white;
	font-weight: 700;
}

.content .add_server_form{
	margin: 4% auto;
	padding: 1% 0 1% 0;
	width: 60%;
	border-radius: 25px;
	background-color: <?=$darker_background_color?>;

}

.content .add_server_form form{
	margin-top: 10%;
}

.content .add_server_form .form_entry{
	margin-top: 5%;
	width: 100%;
	margin-right: auto;
	margin-left: auto;
}

.content .add_server_form textarea{
	width: 80%;
	background-color: <?=$container_color?>;
	border-radius: 20px;
	padding: 15px 15px 15px 45px;
	color: white;
	border: none;
}

.content .add_server_form input:not(.input_file){
	width: 80%;
	height: 50px;
	background-color: <?=$container_color?>;
	border-radius: 20px;
	padding: 15px 15px 15px 45px;
	color: white;
	border: none;
}

.content .add_server_form .form_entry .input_icon{
	position: absolute;
	margin-top: 10px;
	margin-left: 10px;
	font-size: 30px;
	vertical-align: middle;
	color: white;
}

.content .add_server_form .form_entry label{
	font-size: 16px;
	vertical-align: middle;
	color: <?=$offWhite_color?>;
	margin-bottom: 5px;
}

.content .add_server_form .form_entry .input_icon_file{
	font-size: 20px;
	vertical-align: middle;
	color: white;
}

.content .add_server_form .form_submit{
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

.content .add_server_form .form_submit:hover{
	background-color: <?=$darker_base_color?>;
}

.content .add_server_form .create_account_link, .content .add_server_form .create_account_link a{
	font-weight: 300;
	color: white;
}

.content .add_server_form .add_server_form_part{
	display:flex;
	flex-direction: row;
}

.content .add_server_form .input_file{
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.content .add_server_form .input_file + label {
    font-size: 1em;
    font-weight: 700;
    margin-top: 5px;
    padding: 7px 12px;
    color: white;
    background-color: <?=$base_color?>;
    border-radius: 10px;
    display: inline-block;
    cursor: pointer;
    transition: all 0.3s ease 0s;
}

.content .add_server_form .input_file:focus + label,
.content .add_server_form .input_file + label:hover {
    background-color: <?=$darker_base_color?>;
}

.content .add_server_form .input_file:focus + label {
	outline: 1px dotted #fff;
	outline: -webkit-focus-ring-color auto 5px;
}

.content .add_server_form .form_select{
	width: 40%;
	height: 30vh;
	border: 1px solid <?=$darker_background_color?>;
	padding: 2vh 1vw;
	background-color: <?=$background_color?>;
	outline: none;
}

.content .add_server_form .form_select option{
	background-color: <?=$background_color?>;
	color: #ffffff99;
	padding: 1vh 2vw;
}

.content .add_server_form .form_select option:hover{
	background-color: <?=$darker_background_color?>;
}

.content .add_server_form .form_select option:checked{
	background-color: <?=$darker_background_color?>;
	box-shadow: 0 0 10px 100px <?=$darker_background_color?> inset;
}

.content .add_server_form .form_select option[disabled]{
	color: gray;
}

.selects_tip{
	color: #ffffff99;
}

}




@media only screen and (max-width: 768px){
.content{
	position: relative;
	width: 100%;
}

.content .add_server_form .title{
	font-size: 50px;
	color: white;
	font-weight: 700;
}

.content .add_server_form{
	margin: 0vh auto;
	padding: 1% 0 1% 0;
	width: 80%;
	border-radius: 25px;
	background-color: <?=$darker_background_color?>;
}

.content .add_server_form form{
	margin-top: 10%;
}

.content .add_server_form .form_entry{
	margin-top: 5%;
	width: 100%;
	margin-right: auto;
	margin-left: auto;
}

.content .add_server_form input{
	width: 90%;
	height: 50px;
	background-color: <?=$container_color?>;
	border-radius: 20px;
	padding: 15px 15px 15px 45px;
	color: white;
	border: none;
}

.content .add_server_form .form_entry .input_icon{
	position: absolute;
	margin-top: 10px;
	margin-left: 10px;
	font-size: 30px;
	vertical-align: middle;
	color: white;
}

.content .add_server_form .form_submit{
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

.content .add_server_form .form_submit:hover{
	background-color: <?=$darker_base_color?>;
}

.content .add_server_form .create_account_link, .content .add_server_form .create_account_link a{
	font-weight: 300;
	color: white;
	font-size: 14px;
}

.content .add_server_form .create_account_link a{
	text-decoration: underline;
}

.content .add_server_form .form_entry label{
	font-size: 16px;
	vertical-align: middle;
	color: <?=$offWhite_color?>;
	margin-bottom: 5px;
}

.content .add_server_form .input_file{
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.content .add_server_form .input_file + label {
    font-size: 1em;
    font-weight: 700;
    margin-top: 5px;
    padding: 7px 12px;
    color: white;
    background-color: <?=$base_color?>;
    display: inline-block;
    cursor: pointer;
    transition: all 0.3s ease 0s;
}

.content .add_server_form .input_file:focus + label,
.content .add_server_form .input_file + label:hover {
    background-color: <?=$darker_base_color?>;
}

.content .add_server_form .input_file:focus + label {
	outline: 1px dotted #fff;
	outline: -webkit-focus-ring-color auto 5px;
}

.content .add_server_form textarea{
	width: 80%;
	background-color: <?=$container_color?>;
	border-radius: 20px;
	padding: 15px 15px 15px 45px;
	color: white;
	border: none;
}


}
