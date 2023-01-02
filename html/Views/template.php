<?php 


 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <base href="<?= $webRoot?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=6">
    <link rel="icon" type="image/png" href="https://minebump.com/Ressources/minebump_logo.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/template.css.php" rel="stylesheet" type="text/css" media="screen" >
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <link rel="canonical" href="https://minebump.com"/>

    <title>MineBump - <?= $pTitle ?></title>
    <?=$this->additional_header?>
    <meta name="description" content="MineBump est un site web et un bot discord vous permettant de mettre en avant à la fois votre serveur Minecraft et Discord. En tant que joueur, vous pouvez parcourir la liste des serveurs inscrits sur notre site web et les filtrer selon plusieurs critères afin de trouver celui qui vous correspond!">
    <meta property="oh:title" content="MineBump - Serveurs Minecraft">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://minebump.com/Ressources/minebump_logo.png"/>
    

    <script src="scripts/jquery-3.6.0.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-P6RJ54CQK1"></script> -->
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-P6RJ54CQK1');
    </script>

    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4169295588213024" -->
     <!-- crossorigin="anonymous"></script> -->

</head>
<body> 
    
    <div class="header"></div>
    <header>
        <span class="logo_img" onclick="location.href='https://minebump.com/home'"><img src="https://minebump.com/Ressources/minebump_logo.webp" alt="MineBump logo"> </span>
        <!-- <span class="logo_chevrons" onclick="location.href='https://minebump.com/home'"><i class='bx bx-chevrons-up'></i></span> -->
        <span class="logo" onclick="location.href='https://minebump.com/home'">MineBump<span class="logo_dot">.</span></span>
        
            <nav role="navigation">
                <div id="menuToggle">
                    <input type="checkbox">
                    <span></span>
                    <span></span>
                    <span></span>
                    
                    <ul class="nav_links" id="menu">
                        <li class="nav_link"><a href="https://minebump.com/home">Accueil</a></li>
                        <li class="nav_link"><a href="https://minebump.com/servers">Liste des Serveurs</a></li>
                        <li class="nav_link"><a href="https://minebump.com/support/">Support</a></li>
                        <li class="nav_link"><a href="https://minebump.com/addserver">Ajouter Serveur</a></li>
                        
                        <!-- Login Button switch w/ Profile button -->

                        <?php 

                            if(!(isset($_SESSION['id']))){
                                ?>
                                <li><a href="https://minebump.com/login" class="login_button">Connexion</a></li>
                                <?php
                            }else{
                                ?>
                                <li><a href="https://minebump.com/account/profile" class="profile_button"><i class='bx bx-user-circle'></i> <?=$_SESSION['username']?></a></li>
                                <?php
                            }

                         ?>
                    </ul>
                </div>
           </nav>     

    </header>

    <!-- <script type="text/javascript" src="scripts/template.js"></script> -->
    <!-- <script type="text/javascript">fadeInPage();</script> -->

    <main>
        <?= $content ?> 
    </main>

    <script type="text/javascript">
        ScrollReveal({delay: 100, mobile: true}).reveal('.scroll_reaveal');
    </script>

    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Liens</h3>
                        <ul>
                            <li><a href="https://minebump.com/servers">Liste des serveurs</a></li>
                            <li><a href="https://minebump.com/addserver">Ajouter votre serveur</a></li>
                            <li><a href="https://minebump.com/login">Se Connecter</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>A propos</h3>
                        <ul>
                            <li><a href="https://minebump.com/support">Aide / Support</a></li>
                            <li><a href="https://minebump.com/team">Notre équipe</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>MineBump</h3>
                        <p>MineBump est un site web et un bot discord vous permettant de mettre en avant votre serveur Minecraft. Vous pouvez parcourir la liste des serveurs et les filtrer afin de trouver celui qui vous correspond!</p>
                    </div>
                    <div class="col item social">
                        <a href="https://minebump.com/support/discord"><i class='bx bxl-discord-alt'></i></a>
                        <a href="https://twitter.com/MineBump"><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>
                <p class="copyright">MineBump © 2022</p>
            </div>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>

</body>
</html>
