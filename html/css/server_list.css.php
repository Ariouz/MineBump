<?php
  include "vars.php";

 ?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

@media only screen and (min-width: 768px){

.page_title{
	margin-top: 1vh;
	text-align: center;
	color: white;

}

.main_container{
	margin-top: 10vh;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}

.categories_navbar ul{
	display: flex;
	flex-direction: row;
	list-style-type: none;
}

.category{
	padding: 1vh 2vw;
	margin: 0 1vw;
	width: 10vw;
	text-align: center;
	background-color: <?=$container_color?>;
	border-radius: 10px;
	transition: all 0.3s ease 0s;
	color: white;
}

.category:hover{
	background-color: <?=$base_color?>;
	color: white;
}

.category a:hover{
	color: white;
}

.servers_order_by{
	margin: 2vw auto 0 auto;
	color: white;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
}

.servers_order_by span {
	margin-right: 1vw;
}

.servers_select_order_by{
	margin-right: 1vw;
	border: 1px solid <?=$container_color?>;
	padding: 1vh 0.5vw;
	background-color: <?=$light_container_color?>;
	outline: none;
	color: white;
}

.servers_select_order_by option{
	background-color: <?=$light_container_color?>;
	color: #ffffff99;
	padding: 1vh 2vw;
}

.servers_select_order_by option:hover{
	background-color: <?=$container_color?>;
}

.servers_select_order_by option:checked{
	background-color: <?=$container_color?>;
	box-shadow: 0 0 10px 100px <?=$container_color?> inset;
}

.servers_select_order_by option[disabled]{
	color: gray;
}

.servers_select_category_hidden{
	display: none;
}

.servers_order_by_button{
	background-color: <?=$container_color?>;
	border: 1px solid <?=$darker_background_color?>;
	color: #ffffff99;
	transition: 0.3s ease 0s;
	padding: 1vh 1vw;
}

.servers_order_by_button:hover{
	color: white;
	background-color: <?=$darker_background_color?>;
}

.boosted_servers_list{
	margin-top: 5vh;
}

.boosted_servers_list h2{
	color: white;
	text-align: center;
}

.boosted_servers{
	display: flex;
	flex-direction: row;
	margin-top: 10vh;
	margin-left: auto;
	margin-right: auto;
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
}

.boosted_server_ip:hover{
	background-color: <?=$background_color?>;
}

.boosted_servers_categories_container{
	margin-left: 0;
}

.boosted_server_categories{
	display: flex;
	flex-direction: row;
	align-items: center;
	margin-top: 4vh;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
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

.boosted_server_category{
	color: <?=$base_color?>99;
	text-align: center;
	padding: 0 5px;
	font-weight: 600;
	font-size: 1em;
}

.server_see_more, .server_see_more a{
	text-align: right;
	color: #ffffff95;
	text-decoration: underline;
	font-weight: normal;
	margin-bottom: -3vh;
}

.servers_list{
	margin-top: 10vh;
}

.servers_list h2{
	color: white;
	text-align: center;
}

.servers{
	display: flex;
	flex-direction: column;
	margin-bottom: 10vh;
	margin-left: auto;
	margin-right: auto;
}

.server_card{
	display: flex;
	flex-direction: column;
	padding: 5vh 5vw;
	background-color: <?=$container_color?>;
	margin-left: 2.5vw;
	margin-right: 2.5vw;
	margin-top: 5vh;
}

.server_card .infos{
	display: flex;
	flex-direction: row;
}

.server_card .infos .right{
	display: flex;
	flex-direction: column;
	margin-left: 5vw;
	justify-content: center;
}

.server_card .infos .left{
	margin: auto 0 auto 0;
}

.server_logo{
	width: 14vw;
	height: auto;
}

<!-- .stats .server_banner{
	margin-top: 2vh;
	margin-left: auto;
	margin-right: auto;
	max-width: 100%;
	height: auto;
} -->

.server_name{
	text-align: left;
	margin-top: 1vh;
	font-size: 1.1em;
}

.server_name a:hover{
	color: white;
}


.server_short_description{
	color: #ffffff99;
	margin-top: 2vh;
}

.server_ip{
	margin-top: 5vh;
	text-align: center;
	color: white;
	font-size: 1.1em;
	width: 20vw;
	cursor: pointer;
	padding: 1vh 0vw;
	background-color: <?=$light_container_color?>;
	transition: all 0.3s ease 0s;
	overflow: hidden;
}

.server_ip:hover{
	background-color: <?=$background_color?>;
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

.stats{
	display: flex;
	flex-direction: column;
	margin-left: 5vw;
	width: 40%;
	position: relative;
}

.stats .server_vote{
	color: white;
	text-align: left;
	margin-top: 1vh;
	font-size: 1.1em;
	text-decoration: underline;
}

.server_month_votes, .server_last_vote{
	margin-top: 2vh;
	color: #ffffff99;
}

.stats .server_see_more{
	margin-top: 15vh;
}

.stats_value{
	color: <?=$base_color?>;
	font-weight: 600;
}

.stats .server_status {
	color: white;
	text-align: left;
	margin-top: 1vh;
	font-size: 1.1em;
	text-decoration: underline;
}

.stats .server_status_online, .server_player_count, .server_status_version{
	margin-top: 2vh;
	color: #ffffff99;
}

.stats .server_status_green{
	color: <?=$role_green_color?>;
}

.stats .server_status_red{
	color: <?=$role_red_color?>;
}

.stats .server_status_icon{
	font-size: 1.2em;
	vertical-align: middle;
}

.pagination{
	display: flex;
	flex-direction: row;
	justify-content: center;
}

.pagination .pagination_button{
	background-color: <?=$darker_background_color?>;
	padding: 1.5vh 1.5vw;
	margin-left: -1vw;
	margin-right: -1vw;
	color: #ffffff99;
	transition: 0.3s ease 0s;
}

.pagination .pagination_button:hover{
	color: white;
}

.pagination .pagination_current{
	background-color: <?=$base_color?>;
	color: white;
}

.pagination .pagination_current:hover{
	background-color: <?=$darker_base_color?>;
	color: white;
}

}

}

@media only screen and (max-width: 768px){

}