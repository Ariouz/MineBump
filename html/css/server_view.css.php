<?php 

include "vars.php";

?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

@media only screen and (min-width: 768px){

.content{
	width: 99%;
	margin: 0 auto;
}

.content h1{
	color: white;
	font-size: 3em;
}

.global_card{
	width: 95%;
	background-color: <?=$container_color?>;
}

.banner_card{
	margin: 5vh auto;
	width: 728px;
	height: 90px;
	margin-bottom: 15%;
}

.server_banner{
	max-width: 100%;
	height: auto;
	margin: 5vh auto 1vh auto;
}

.data_card{
	display: flex;
	flex-direction: row;
	padding: 1vh 5vw;
}

.data_separator{
	width: 90%;
	border: 0;
	border-top: 1px solid <?$offWhite_color?>;
}

.data_logo{
	padding: 3vh 3vw;
	flex: 1;
	background-color: <?=$light_container_color?>;
	margin: auto auto;
}

.server_logo{
	max-width: 100%;
	height: auto;
}

.data_f{
	padding: 3vh 3vw;
	display: flex;
	flex-direction: column;
	flex: 2;
	margin-right: auto;
	margin-left: auto;
}

.data_title{
	color: white;
	margin-bottom: 5vh;
}

.data_item{
	line-height: 5vh;
	display: flex;
	flex-direction: row;
}

.data_key{
	font-weight: 700;
	color: white;

}

.data_value, .data_value a{
	font-weight: 500;
	color: white;
	opacity: 0.7;
	margin-left: 8px;
	transition: 0.3s ease 0s;
}

.data_value:hover, .data_value a:hover{
	font-weight: 500;
	opacity: 0.9;
	color: white;
	margin-left: 8px;
}

.server_ip:hover{
	cursor: pointer;
}

.data_s{
	padding: 3vh 3vw;
	flex: 2;
	margin-right: auto;
	margin-left: auto;
	display: flex;
	flex-direction: column;
}

.data_s .vote_title{
	font-size: 1.7em;
	font-weight: 600;
	color: #EEE;
	margin-bottom: 5vh;
}

.datas_item{
	line-height: 5vh;
}

.vote_button{
	margin-top: 5vh;
}

.data_vote_button{
	padding: 2vh 5vh;
	background-color: transparent;
	border-radius: 5px;
	border: 1px solid <?=$darker_base_color?>;
	box-shadow: 1px 1px 5px <?=$darker_base_color?>;
	transition: 0.3s ease 0s;
	cursor: pointer;
}

.data_vote_button:hover{
	color: white;
	background-color: <?=$base_color?>
}

.data_description{
	display: flex;
	flex-direction: column;
	margin-top: 7vh;
}

.about_server{
	margin-left: auto;
	margin-right: auto;
	color: white;
	font-size: 2em;
}

.about_server:after{
	content: "";
	background-color: white;
	margin-left: 0;
	height: 2px;
	width: 70%;
	display: flex;
}

.data_desc_area{
	margin-left: auto;
	margin-right: auto;
	margin-top: 5vh;
	width: 70%;
	height: 40vh;
	background-color: <?=$container_color?>;
	border-radius: 20px;
	padding: 15px 15px 15px 45px;
	color: white;
	border: none;
	resize: none;
}

.server_categories{
	display: flex;
	flex-direction: row;
	margin-top: 5vh;
	align-items: center;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}

.server_category{
	color: #ffffff;
	padding: 0.5vh 1vw;
	background-color: <?=$darker_background_color?>;
	margin: 0.5vw;
}

.server_status_div{
	display: flex;
	flex-direction: column;
}

.server_status {
	text-align: center;
	font-size: 1.7em;
	font-weight: 600;
	color: #EEE;
	margin-top: 5vh;
}

.server_status_online, .server_player_count, .server_status_version{
	margin-top: 2vh;
	color: #ffffff99;
}

.server_status_green{
	color: <?=$role_green_color?>;
}

.server_status_red{
	color: <?=$role_red_color?>;
}

.server_status_icon{
	font-size: 1.2em;
	vertical-align: middle;
}


}

@media only screen and (max-width: 768px){

}