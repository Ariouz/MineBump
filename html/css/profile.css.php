<?php
include "vars.php";

?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

@media only screen and (min-width: 768px){

  .content{
    position: relative;
    width: 100%;
    margin-bottom: 1vh;
  }

  .content .title{
    font-size: 3.5em;
    color: white;
    font-weight: 700;
    margin-bottom: 5vh;
  }

  .profile{
    background-color: <?=$darker_background_color?>;
    width: 100%;
    display: flex;
    flex-direction: row;
    padding: 5vh 1vw;
  }

  .profile .left{
    background-color: <?=$light_container_color?>;
    flex: 1;
    margin-right: auto;
    margin-left: auto;
    width: 30%;
    padding: 5vh 0;
  }

  .left .avatar_img{
    position: relative;
    max-width: 60%;
    height: auto;
    border-radius: 50%;
    margin: 5%;
  }

  .left .data{
    display: flex;
    flex-direction: column;
    font-size: 1.05em;
    text-align: left;
    justify-content: center;
    align-items: center;
    line-height: 4vh;
  }

  .data_key{
    font-weight: 500;
    color: #fff;
  }

  .data_value{
    font-weight: 400;
    color: #ffffff90;
  }

  .profile .right{
    flex: 3;
    margin-right: auto;
    margin-left: auto;
  }

  .profile .right{

    margin-right: auto;
    margin-left: auto;
    display: flex;
    flex-direction: row;
    padding: 5vh 0;
  }

  .f_part{
    display: flex;
    flex-direction: column;
    margin: auto;
    flex: 3;
  }

  .s_part{
    display: flex;
    flex-direction: column;
    margin: auto;
    flex: 2;
  }

  .servers h2{
    color: #fff;
  }

  .server_item{
    padding: 2vh 2vw;
    margin: 2vh 2vw;
    display: flex;
    flex-direction: row;
    max-width: 100%;
    background-color: <?=$container_color?>;
  }

  .server_icon{
    display: flex;
    flex-direction: column;
  }

  .server_icon img {
  	max-width: 5vw;
    flex: 1;
  }

  .server_id{
    margin-top: 1vh;
  }

  .server_data{
    margin-left: 2vw;
    display: flex;
    flex-direction: column;
    flex: 3;
    text-align: left;
    line-height: 3vh;
  }

  .edit_server{
    flex: 3;
    margin-top: 3vh;
  }

  .server_edit_link{
    color: #fff;
    text-decoration: underline;
    transition: 0.3s ease 0s;
  }

  .server_edit_link:hover{
    color: <?=$base_color?>;
  }

  .view_profile_button{
    padding: 1vh 3vw;
    background: transparent;
    border-radius: 15px;
    border: 1px solid <?=$base_color?>;
    box-shadow: 1px 1px 10px <?=$darker_base_color?>;
    transition: 0.3s ease 0s;
    color: white;
  }

  .view_profile_button:hover{
    background-color: <?=$darker_base_color?>;;
    color: white;
  }

  .edit_profile_button, .logout_button{
    margin: 5vh;
    width: 20vw;
  }

  .edit_profile_button{
    border: 1px solid <?=$role_cyan_color?>;;
    box-shadow: 1px 1px 10px <?=$role_blue_color?>;
  }

  .edit_profile_button:hover{
    background-color: <?=$role_blue_color?>;
  }

  .logout_button{
    border: 1px solid <?=$role_red_color?>;
    box-shadow: 1px 1px 10px <?=$role_orange_color?>;
  }

  .logout_button:hover{
    background-color: <?=$role_orange_color?>;
  }

}

@media only screen and (max-width: 768px){

}
