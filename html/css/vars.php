<?php 

	require "../structure/Configuration.php";

	header('content-type: text/css'); 


	$background_color = Configuration::get("config", "background_color");
	$darker_background_color = Configuration::get("config", "darker_background");
	$container_color = Configuration::get("config", "container_color");
	$light_container_color = Configuration::get("config", "light_container_color");
	$base_color = Configuration::get("config", "base_color");
	$darker_base_color = Configuration::get("config", "darker_base_color");
	$offWhite_color = Configuration::get("config", "offWhite_color");

	$role_cyan_color = Configuration::get("config", "role_cyan_color");
	$role_green_color = Configuration::get("config", "role_green_color");
	$role_yellow_color = Configuration::get("config", "role_yellow_color");
	$role_red_color = Configuration::get("config", "role_red_color");
	$role_blue_color = Configuration::get("config", "role_blue_color");
	$role_orange_color = Configuration::get("config", "role_orange_color");

 ?>