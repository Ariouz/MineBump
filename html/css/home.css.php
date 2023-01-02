<?php
  include "vars.php";

 ?>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

@media only screen and (min-width: 768px){
.banner{
    margin-top: -5%;
}

.image {
    position: static;
    z-index: -1;
    background: url('../Ressources/images/home_background.webp');
    filter: blur(5px);
    opacity: 80%;
    -webkit-filter: blur(5px);
    display: flex;
    width: 100%;
    padding: 20% 0% 20% 0%;
    justify-content: center;
    -webkit-clip-path: polygon(0 20%, 100% 15%, 100% 85%, 0 90%);
    clip-path: polygon(0 20%, 100% 15%, 100% 85%, 0 90%);
}

.banner .content{
    position: absolute;
    left: 50%;
    margin-top: -20%;
    transform: translate(-50%, -50%);
    color: white;
}

.banner .content h1{
    font-weight: 700;
    font-size: 40px;
}

.banner .content h1::after{
    content: "";
    display: flex;
    width: 25%;
    height: 10px;
    background-color: <?=$base_color?>;
    margin: 3px auto 0px auto;
}

.banner .content h2{
    margin-top: 15px;
    font-weight: 600;
    font-size: 30px;
}

.banner .content h2 span{
  color: <?=$base_color?>;
}

.banner .search{
    position: relative;
    z-index: 4;
    display: flex;
    background-color: <?=$base_color?>;
    padding: 9px;
    width: 20%;
    margin-left: auto;
    margin-right: auto;
    margin-top: -15%;
    margin-bottom: 10%;
    text-align: center;
    border: none;
    border-radius: 5px;
    transition: transform 0.5s ease 0s;
    box-shadow: 1px 1px 5px <?=$base_color?>95;
}

.banner .search span{
    width: 100%;
    margin-right: 5px;
}

.banner .search i{
    font-size: 25px;
    vertical-align: middle;
}

.banner .search:hover{
    color: white;
    transform: scale(1.05);
}

div.server_top{
    margin: 0px auto 0px auto;
    color: white;
    font-family: "Poppins", sans-serif;
    font-weigh: 600;
    width: 80%;
}

.server_top .title h2{
    text-align: center;
    font-weight: 600;
    font-size: 40px;
}

.server_top .title h2::after{
    content: "";
    display: flex;
    width: 20%;
    margin: 3px auto 0px auto;
    height: 5px;
    background-color: <?=$base_color?>;
}

.server_top .list{
    display: flex;
    flex-direction: row;
    margin-top: 8vh;
    margin-left: auto;
    margin-right: auto;
}


div.work_explaination{
    margin: 5% auto 0px auto;
    color: white;
    font-family: "Poppins", sans-serif;
    font-weigh: 600;
    width: 80%;
}

.work_explaination .title h2{
    text-align: center;
    font-weight: 600;
    font-size: 40px;
}

.work_explaination .title h2::after{
    content: "";
    display: flex;
    width: 20%;
    margin: 3px auto 0px auto;
    height: 5px;
    background-color: <?=$base_color?>;
}

.work_explaination .content{
    margin-top: 5%;
    display: flex;
}

.work_explaination .content .icon{
    flex: 1;
    font-size: 15em;
    color: <?=$base_color?>;
    position: relative;
}

.work_explaination .content .icon i{
    position: absolute;

}

.work_explaination .content .text{
    padding: 2% 3% 2% 3%;
    flex: 3;
    background-color: <?=$container_color?>;
    text-align: center;
    border-radius: 25px;
}

.work_explaination .content .text a{
    display: flex;
    background-color: <?=$base_color?>;
    padding: 9px;
    width: 30%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 2%;
    border: none;
    border-radius: 5px;
    transition: transform 0.5s ease 0s;
    box-shadow: 1px 1px 5px <?=$base_color?>95;
    justify-content: center;
}

.work_explaination .content .text a:hover{
    color: white;
    transform: scale(1.05);
}

.global_stats{
    display: flex;
    flex-direction: row;
    margin: 5% auto 0px auto;
    color: white;
    width: 80%;
}

.global_stats .stat_item{
    display: flex;
    flex-direction: column;
    vertical-align: center;
    padding: 2% 3% 2% 3%;
    margin-right: auto;
    margin-left: auto;
    text-align: center;
    width: 20%;
    overflow: hidden;
}

.global_stats .stat_item i{
    vertical-align: center;
    font-size: 100px;
    color: <?=$base_color?>;
    font-weight: 400;
}

.global_stats .stat_item .count{
    font-size: 3em;
    font-weight: 700;
}

.global_stats .stat_item .desc{
    font-size: 1.2em;
    font-weight: 500;
    margin-top: -5%;
}

.top_server{
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 5vh 1vw;
    background-color: <?=$container_color?>;
    margin-left: 2.5vw;
    margin-right: 2.5vw;
    width: 25vw;
    max-width: 25vw;
}

.top_server_logo{
    max-width: 12vw;
    height: 12vw;
    margin-left: auto;
    margin-right: auto;
}

.top_server_name{
    text-align: left;
    margin-top: 3vh;
    margin-left: auto;
    margin-right: auto;
}

.top_server_name a:hover{
    color: white;
}


.top_server_short_description{
    color: #ffffff99;
    margin-left: auto;
    margin-right: auto;
    margin-top: 1.5vh;
}

.top_server_ip{
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

.top_server_ip:hover{
    background-color: <?=$background_color?>;
}

.top_servers_categories_container{
    margin-left: 0;
}

.top_server_categories{
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-top: 4vh;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}

.top_server_categories_boosted{
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-top: 4vh;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    justify-content: center;
}

.top_server_category{
    color: <?=$base_color?>99;
    text-align: center;
    padding: 0 5px;
    font-weight: 600;
    font-size: 1em;
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

}

@media only screen and (max-width: 768px){

.image {
    z-index: -1;
    position: relative;
    background: url('../Ressources/images/home_background.webp');
    filter: blur(5px);
    opacity: 80%;
    -webkit-filter: blur(5px);
    display: flex;
    width: 100%;
    height: 100vh;
    margin-top: -40vh;
    justify-content: center;
    -webkit-clip-path: polygon(0 40%, 100% 35%, 100% 95%, 0% 100%);
    clip-path: polygon(0 40%, 100% 35%, 100% 95%, 0% 100%);
}


.banner .content{
    position: relative;
    z-index: -1;
    left: 50%;
    margin-top: -40vh;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
}

.banner .content h1{
    font-weight: 700;
    font-size: 30px;
}

.banner .content h1::after{
    content: "";
    display: flex;
    width: 30vh;
    height: 10px;
    background-color: <?=$base_color?>;
    margin: 3px auto 0px auto;
}

.banner .content h2{
    margin-top: 15px;
    font-weight: 600;
    font-size: 25px;
    text-align: center;
}

.banner .content h2 span{
  color: <?=$base_color?>;
}

.banner .search{
    text-align: center;
    display: flex;
    background-color: <?=$base_color?>;
    padding: 9px;
    width: 80vw;
    margin-left: auto;
    margin-right: auto;
    margin-top: 1vh;
    margin-bottom: 10vh;
    border: none;
    border-radius: 50px;
    transition: all 0.3s ease 0s;
    box-shadow: 3px 3px 10px <?=$offWhite_color?>;
}

.banner .search span{
    width: 100%;
    font-size: 15px;
    vertical-align: middle;
    margin-left: -10vw;
}

.banner .search i{
    font-size: 30px;
    vertical-align: middle;
    margin-right: 25px;
}

.banner .search:hover{
    color: white;
    background-color: <?=$darker_base_color?>
}

div.server_top{
    margin: 25vh auto 0px auto;
    color: white;
    font-family: "Poppins", sans-serif;
    font-weigh: 600;
    width: 95%;
}

.server_top .title h1{
    text-align: center;
    font-weight: 600;
    font-size: 40px;
}

.server_top .title h1::after{
    content: "";
    display: flex;
    width: 20%;
    margin: 3px auto 0px auto;
    height: 5px;
    background-color: <?=$base_color?>;
}

div.work_explaination{
    margin: 10vh auto 0px auto;
    color: white;
    font-family: "Poppins", sans-serif;
    font-weigh: 600;
    width: 80%;
}

.work_explaination .title h1{
    text-align: center;
    font-weight: 600;
    font-size: 40px;
}

.work_explaination .title h1::after{
    content: "";
    display: flex;
    width: 20%;
    margin: 3px auto 0px auto;
    height: 5px;
    background-color: <?=$base_color?>;
}

.work_explaination .content{
    margin-top: 5vh;
    display: flex;
    flex-direction: column;
}

.work_explaination .content .icon{
    display: none;
}

.work_explaination .content .icon i{
    position: relative;
}

.work_explaination .content .text{
    padding: 3vh 3vw 2vh 3vw;
    background-color: <?=$container_color?>;
    text-align: center;
    border-radius: 25px;
}

.work_explaination .content .text a{
    display: flex;
    background-color: <?=$base_color?>;
    padding: 9px;
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 2%;
    border: none;
    border-radius: 50px;
    transition: all 0.3s ease 0s;
    box-shadow: 3px 3px 3px <?=$base_color?>;
    justify-content: center;
}

.work_explaination .content .text a:hover{
    color: white;
    background-color: <?=$darker_base_color?>;
    box-shadow: 3px 3px 3px <?=$darker_base_color?>;
}

.global_stats{
    display: flex;
    flex-direction: column;
    margin: 5vh auto 0px auto;
    color: white;
    width: 95%;
}

.global_stats .stat_item{
    display: flex;
    flex-direction: column;
    vertical-align: center;
    padding: 2vh 3vw 2vh 3vw;
    margin-right: auto;
    margin-left: auto;
    text-align: center;
    width: 95%;
    overflow: hidden;
}

.global_stats .stat_item i{
    vertical-align: center;
    font-size: 50px;
    color: <?=$base_color?>;
    font-weight: 400;
}

.global_stats .stat_item .count{
    font-size: 2.5em;
    font-weight: 700;
}

.global_stats .stat_item .desc{
    font-size: 1em;
    font-weight: 500;
    margin-top: -5%;
}

}