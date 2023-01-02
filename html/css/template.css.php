<?php
	include "vars.php";

 ?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap');

body {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
	background-color: <?=$background_color?> ;
	color: <?=$base_color?>;
	scroll-behavior: smooth;
}

.alert{
	width: 80%;
	animation-name: FadeIn;
  	animation-duration: 1s;
  	transition-timing-function: ease;
}

.alert a{
	color: <?=$darker_background_color?>;
	text-decoration: underline;
	font-size: 0.9em;
}


@keyframes FadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@-moz-keyframes FadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@-webkit-keyframes FadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@-o-keyframes FadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@-ms-keyframes FadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@media only screen and (min-width: 768px){

header{
	display: flex;
	justify-content: flex-end;
	align-items: center;
	padding: 30px 5%;
	<!-- background-color: <?=$darker_background_color?>; -->
}

.logo{
	font-family: "Poppins", sans-serif;
	font-weight: 700;
	font-size: 60px;
	cursor: pointer;
	margin-right: auto;
	transform: scale(0.7);
	color: #fff;
}

.logo_dot{
	color: <?=$base_color?>;
}

.logo_img{
	position: absolute;
	left: 0;
	margin-left: 1%;
}

.logo_img img{
	max-width: 7vw;
	height: auto;
}

.menuToggle, #menuToggle input{
	visibility: hidden;
}

.nav_links{
	list-style: none;
	display: flex;
}

.nav_links li {
	padding: 0px 20px;
}

.nav_links li a{
	transition: all 0.3s ease 0s;
}


li, a, button{
	font-family: "Poppins", sans-serif;
	font-weight: 500;
	font-size: 16px;
	color: #fff;
	text-decoration: none;
}

.nav_link a::after{
	content: "";
	display: block;
	width: 0%;
	height: 3px;
	background-color: <?=$base_color?>;
	margin-left: auto;
	margin-right: auto;
	transition: all 0.3s ease 0s;
}

.nav_link a:hover{
	color: <?=$base_color?>;
}

.nav_link a:hover::after{
	width: 75%;
}

.login_button{
	margin-left: 20px;
	padding: 9px 25px;
	background-color: <?=$base_color?>;
	border: none;
	border-radius: 50px;
	cursor: pointer;
	transition: all 0.3s ease 0s;
}

.login_button:hover{
	background-color: <?=$darker_base_color?>;
	color: #fff;
}

.profile_button{
	margin-left: 20px;
	padding: 9px 25px;
	background-color: <?=$base_color?>;
	border: none;
	border-radius: 50px;
	cursor: pointer;
	transition: all 0.3s ease 0s;
}

.profile_button i{
	vertical-align: middle;
	margin-right: 5px;
	font-size: 1.5em;
}

.profile_button:hover{
	background-color: <?=$darker_base_color?>;
	color: #fff;
}

}



@media only screen and (max-width: 768px){

html{
	overflow: hidden;
	overflow-y: scroll;
}

body{
	margin: 0;
	width: 100%;
	height: 100%;
	overflow: hidden;
}

img{
	max-width: 100%;
	height: auto;
}

li, a, button{
	font-family: "Poppins", sans-serif;
	font-weight: 500;
	font-size: 12px;
	color: #fff;
	text-decoration: none;
}

.header{
	width: 100%;
	height: 5%;
	margin-bottom: 25vh;
}

header{
	display: inline-block;
	padding: 0px 5%;
	position: fixed;
	z-index: 150;
	background-color: <?=$darker_background_color?>;
	width: 100%;
	top: 0;
}

.logo{
	margin-right: auto;
	margin-left: auto;
	margin-left: 25px;
	font-family: "Poppins", sans-serif;
	font-weight: 700;
	font-size: 45px;
	cursor: pointer;
	transform: scale(0.7);
	color: #fff;
}

.logo_dot{
	color: <?=$base_color?>;
}

.logo_chevrons{
	visibility: hidden;
}

nav{
	position: absolute;
	z-index: 5;
	top: 0;
	left: -10px;
}

#menuToggle {
  display: flex;
  flex-direction: column;
  position: relative;
  z-index: 6;
  top: 25px;
  left: 25px;
  -webkit-user-select: none;
  user-select: none;
}

#menuToggle input{
  display: flex;
  width: 40px;
  height: 32px;
  position: absolute;
  cursor: pointer;
  opacity: 0;
  z-index: 2;
}

#menuToggle span{
  display: flex;
  width: 29px;
  height: 2px;
  margin-bottom: 5px;
  position: relative;
  background: #ffffff;
  border-radius: 3px;
  z-index: 1;
  transform-origin: 5px 0px;
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              background 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              opacity 0.55s ease;
}

#menuToggle span:first-child{
	transform-origin: 0% 0%;
}

#menuToggle span:nth-last-child(2){
	transform-origin: 0% 100%;
}

#menuToggle input:checked ~ span{
	opacity: 1;
	transform: rotate(45deg) translate(-3px, -1px);
	background: white;
}

#menuToggle input:checked ~ span:nth-last-child(3){
	opacity: 0;
	transform: rotate(0deg) scale(0.2, 0.2);
}

#menuToggle input:checked ~ span:nth-last-child(2){
	transform: rotate(-45deg) translate(0, -1px);
}

#menu{
	position: absolute;
	list-style-type: none;
	width: 50vw;
	height: 60vh;
	box-shadow: 0 0 10px <?=$container_color?>;
	margin: -50px 0 0 -50px;
	padding: 50px;
	padding-top: 100px;
	background-color: <?=$container_color?>;
	-webkit-font-smoothing: antialiased;
	transform-origin: 0% 0%;
	transform: translate(-100%, 0);
	transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
}

#menu li{
	vertical-align: center;
	margin-top: auto;
	margin-bottom: auto;
	font-size: 16px;
	margin-left: 20px;
	padding: 5px 0;
	transition-delay: 2s;
}

#menuToggle input:checked ~ ul{
  transform: none;
}

.nav_link a, .login_button{
	transition: all 0.3s ease 0s;
}

.login_button{
	position: absolute;
	bottom: 3vh;
	margin-left: -20px;
	padding: 9px 25px;
	background-color: #fff;
	border: none;
	border-radius: 50px;
	cursor: pointer;
	transition: all 0.3s ease 0s;
}

.login_button:hover{
	background-color: <?=$darker_base_color?>;
	color: #fff;
}

.nav_link a:hover, .login_button, login_button:hover, .profile_button, profile_button:hover{
	color: <?=$base_color?>;
}

.profile_button{
	position: absolute;
	bottom: 3vh;
	margin-left: -20px;
	padding: 9px 25px;
	background-color: #fff;
	border: none;
	border-radius: 50px;
	cursor: pointer;
	transition: all 0.3s ease 0s;
}

.profile_button i{
	vertical-align: middle;
	margin-right: 5px;
	font-size: 1.5em;
}


}


@font-face {
    font-family: 'Poppins';
    src: url("https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap");
    font-display: swap;
}



.footer-dark {
	margin-top: 3%;
  padding: 50px 0;
  color: #f0f9ff;
  background-color: <?=$darker_background_color?>;
}

.footer-dark h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-dark ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-dark ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.6;
}

.footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}

.footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}

.footer-dark .copyright {
  text-align: center;
  padding-top: 24px;
  opacity: 0.5;
  font-size: 13px;
  margin-bottom: 0;
}

