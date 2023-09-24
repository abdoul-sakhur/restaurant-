<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Au-ghetti </title>
     <link rel='icon' type='image/png' href="images/spaghetti-12-450358.png" /> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
  
    
</head>
<body>

    <nav>
<?php 
require('includes/conn.php');
$requette=$database->prepare('SELECT * FROM carte ');
$requette->execute();
$nombre_de_ligne=$requette->rowCount();
// echo $nombre_de_ligne;
?>

        <ul class="list-items">
            <span class="logo"><i class="fa-sharp fa-solid fa-utensils"></i> AU-GHETTI</span>
            <div id="lesliste">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php#section2">Repas</a></li>
                <li><a href="index.php#section3">A propos</a></li>
                <li><a href="index.php#section4">Menu</a></li>
                <li><a href="index.php#section5">Critique</a></li>
                <li><a href="index.php#section6">Commande </a></li>
                <div class="logo-users">
                    <div id="log-user" class="log-us"> <a href="inscription.php" style='color:#000;'><i class="fa-solid fa-user"></i></a></div>
                    <div class="log-us"><i class="fa-solid fa-heart"></i></div>
                    <div class="log-us"><a href="carte.php" style='color:#000;'><i class="fa-solid fa-cart-shopping"><span class="compteur" style=' font-weight:bold;'><?php echo $nombre_de_ligne;?></span></i></a></div>
                </div>
            </div>
            <div class="hamburger"><img src="hamburger/icons8-hamburger-menu-24.png" alt=""></div>
        </ul>
</nav>
<script src="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.js"></script>
<script src="package/dist/sweetalert2.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="app.js"></script>
    <!-- <script src="slider.js"></script> -->
</body>
    </html>