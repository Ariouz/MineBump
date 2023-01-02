<?php
  include "vars.php";

 ?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

@media only screen and (min-width: 768px){

.page_title{
	color: white;
	text-align: center;
}

.subtitle{
	color: white;
	text-align: center;
	margin-top: 3vh;
}

<!-- CHOOSE SERVER -->

.boosted_servers_container{
	margin-left: auto;
	margin-right: auto;
}

.boosted_servers{
	display: flex;
	flex-direction: row;
	margin-top: 10vh;
	justify-content: center;
}

.boosted_server{
	display: flex;
	flex-direction: column;
	justify-content: center;
	padding: 5vh 1vw;
	background-color: <?=$container_color?>;
	margin-left: 2.5vw;
	margin-right: 2.5vw;
	width: 23vw;
	max-width: 23vw;
}

.boosted_server_logo{
	max-width: 12vw;
	height: 12vw;
	margin-left: auto;
	margin-right: auto;
}

.boosted_server_name{
	text-align: left;
	margin-top: 3vh;
	margin-left: auto;
	margin-right: auto;
}

.boosted_server_name a:hover{
	color: white;
}


.boosted_server_short_description{
	color: #ffffff99;
	margin-left: auto;
	margin-right: auto;
}

.boosted_server_ip{
	margin-top: 3vh;
	text-align: center;
	color: white;
	font-size: 1.1em;
	cursor: pointer;
	padding: 1vh 2vw;
	background-color: <?=$light_container_color?>;
	transition: all 0.3s ease 0s;
	margin-left: auto;
	margin-right: auto;
	text-decoration: none;
}

.boosted_server_ip:hover{
	background-color: <?=$background_color?>;
	color: white;
}

.boosted_servers_categories_container{
	margin-left: 0;
}

.boosted_server_categories_boosted{
	display: flex;
	flex-direction: row;
	align-items: center;
	margin-top: 4vh;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
	justify-content: center;
}

.server_category{
	color: #ffffff;
	padding: 0.5vh 1vw;
	background-color: <?=$darker_background_color?>;
	margin: 0.5vw;
}

.server_see_more, .server_see_more a{
	text-align: right;
	color: #ffffff95;
	text-decoration: underline;
	font-weight: normal;
	margin-bottom: -3vh;
}


.offers_container{
	margin-right: auto;
	margin-left: auto;
	display: flex;
	flex-direction: row;
	justify-content: center;
	margin-top: 8vh;
	gap: 2vw;
}

.offer{
	background-color: <?=$darker_background_color?>;
	color: white;
	display: flex;
	flex-direction: column;
	text-align: center;
	transition: 0.3s ease 0s;
}

.offer:hover{
	transform: scale(1.05);
}

.offer_header{
	width: 100%;
	padding: 2vw 7vw;
	font-size: 1.3em;
	font-weight: 600;
}

.offer_price{
	margin-top: 5vh;
	font-size: 2em;
	font-weight: 600;
}

.offer_benefits{
	margin-top: 5vh;
	margin-right: auto;
	margin-left: auto;
	text-align: center;
	display: flex;
	flex-direction: column;
}

.offer_benefits div{
	color: #ffffff99;
}

.offer_benefits div hr{
	width: 100%;
}

.offer_select_button{
	margin-top: 5vh;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: 5vh;
	width: 50%;
}

.offer_select_button a{
	padding: 1.8vh 2.2vw;
	transition: 0.3s ease 0s;
}

.offer_select_button a:hover{
	color: white;
}

.bg_role_cyan{
	background-color: <?=$role_cyan_color?>;
}

a.bg_role_cyan:hover{
	background-color: <?=$role_cyan_color?>99;
}

.border_cyan_color{
	border: 0.5px solid <?=$role_cyan_color?>;
}

.bg_role_blue{
	background-color: <?=$role_blue_color?>;
}

a.bg_role_blue:hover{
	background-color: <?=$role_blue_color?>99;
}

.border_blue_color{
	border: 0.5px solid <?=$role_blue_color?>;
}

.bg_role_orange{
	background-color: <?=$role_orange_color?>;
}

a.bg_role_orange:hover{
	background-color: <?=$role_orange_color?>99;
}

.border_orange_color{
	border: 0.5px solid <?=$role_orange_color?>;
}

.bg_role_red{
	background-color: <?=$role_red_color?>;
}

a.bg_role_red:hover{
	background-color: <?=$role_red_color?>99;
}

.border_red_color{
	border: 0.5px solid <?=$role_red_color?>;
}

.select_date_container{
	margin-top: 5vh;
	width: 50%;
	margin-right: auto;
	margin-left: auto;
}

.date_entry{
	display: flex;
	margin-right: auto;
	margin-left: auto;
	flex-direction: column;
	width: 50%;
}

.date_entry label{
	color: white;
}

.date_entry input[type="date"]::-webkit-clear-button {
    display: none;
}

.date_entry input[type="date"]::-webkit-inner-spin-button { 
    display: none;
}

.date_entry input[type="date"]::-webkit-calendar-picker-indicator {
    color: #2c3e50;
}

.date_entry input[type="date"] {
    appearance: none;
    -webkit-appearance: none;
    color: #95a5a6;
    font-family: "Helvetica", arial, sans-serif;
    font-size: 18px;
    border:1px solid <?=$container_color?>;
    background: <?=$container_color?>;
    padding:5px;
    display: inline-block !important;
    visibility: visible !important;
}

.date_entry input[type="date"], focus {
    color: #95a5a6;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
}

.choose_date{
	background-color: <?=$base_color?>;
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	font-size: 16px;
	cursor: pointer;
	margin-top: 5vh;
	margin-left: auto;
	margin-right: auto;
	font-size: 1.1em;
	transition: 0.3s ease 0s;
}

.choose_date:hover{
	background-color: <?=$darker_base_color?>;
}

.payment_container{
	margin-top: 5vh;
	width: 80%;
	margin-right: auto;
	margin-left: auto;
	color: white;
}

.sum_main_container{
	display: flex;
	flex-direction: column;
	background-color: <?=$darker_background_color?>;
}

.summary_title{
	padding: 2vh 2vw;
	margin-bottom: -3vh;
}

.summary_container{
	text-align: center;
	display: flex;
	flex-direction: row;
	background-color: <?=$container_color?>;
	margin-top: 5vh;
}


.summary_first{
	text-align: left;
	display: flex;
	flex-direction: column;
	background-color: <?=$darker_background_color?>;
	padding: 2vh 5vw;
}

.summary_second{
	display: flex;
	flex-direction: column;
	background-color: <?=$container_color?>;
	padding: 2vh 5vw;
}

.summary_third{
	width: 150%;
	height: 100%;
	padding: 2vw 5vw 1vh;
	margin-right: auto;
	margin-left: auto;
	background-color: <?=$light_container_color?>;
}

.data_value{
	color: #ffffff99;
}


}



@media only screen and (max-width: 768px){

}