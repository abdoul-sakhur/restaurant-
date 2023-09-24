
<?php
require'static/header.php';

?>

<?php 

if(isset($_POST['commander'])){
    $nom_prenom_client=$_POST['nom'];
    $commande=$_POST['commande'];
    $quantite=$_POST['quantite_commande'];
    $date=$_POST['date'];
    $adresse=$_POST['adresse'];
    $telephone=$_POST['telephone'];
    $menu_additionel=$_POST['menu_additionnel'];
    $message=$_POST['message'];

if(  !empty( $nom_prenom_client)
  && !empty( $commande)
  && !empty( $quantite) 
  && !empty( $adresse) 
  && !empty( $date) 
  && !empty( $telephone) 
  && !empty( $menu_additionel) 
  && !empty( $message)){
    require'includes/conn.php';
    $requette=$database ->prepare('INSERT INTO commande(nom_prenom_client,commande,quantite,adresse,telephone,Menu_additionnel,date,message) VALUES(:nom_prenom_client,:commande,:quantite,:adresse,:telephone,:Menu_additionnel,:date,:message)');
    $requette->bindValue(':nom_prenom_client',$nom_prenom_client);
    $requette->bindValue(':commande',$commande);
    $requette->bindValue(':quantite',$quantite);
    $requette->bindValue(':adresse',$adresse);
    $requette->bindValue(':telephone',$telephone);
    $requette->bindValue(':Menu_additionnel',$menu_additionel);
    $requette->bindValue(':date',$date);
    $requette->bindValue(':message',$message);
    $requette->execute();
        //  header ('location:http://localhost/restaurant_ida/index.php'); 
    ?>
    <script>
      Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Votre commande a été pris en compte !',
      showConfirmButton: false,
      timer: 2500
    })
    </script>
  
  <?php 
  } else { 
    ?> <script>
       Swal.fire({
      icon: 'error',
      title: 'oops... !',
      text: 'veuillez remplir tous les champs s\'il vous plait !',
      footer: '<a href="#section6">reessayez s\'il vous plait ! </a>'
    })
    </script>
   
<?php
  }

}
?>







     <?php
             session_start();
             if(isset($_SESSION['id'])){
                ?>                                
                <?php
             }
             ?>


    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- section1 -->
    <section id="section1" class="section-1">
        <div class="big-bloc-1">
            <div class="sect-bloc-1">
                <span>Notre Specialite Maison </span>
                <h1>Spaghetti Luxe </h1>
                <p>Lorem ipsum dolor sit Lorem ipsum dolor, sit amet amet consectetur adipisicing.</p>
                <p>Lorem ipsum dolor sit.</p>
                <button class="commander">
                    <a style="color: #ffffff;" href="#section6">Commander</a>
                </button>
            </div>
            <div class="sect-bloc-1">
                <img src="images/home-img-1.png" alt="">
            </div>
        </div>
        </div>
    </section>
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- section2 -->

    <section id="section2" class="section-2">
        <span>Nos Recettes </span>
        <h1>plats Populaires</h1>

        <div class="big-bloc-2">
            <div class="sect-bloc-2" data-name="p-1">

                <img src="images/thesherisk (40).png" alt="">
                <div class="img-hover-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-hover-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <span>Big burger</span>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>8.000 F</span>
                <button class="ajouter" >
                    <a href="plat-1.php?id=1" style="color: #fff;"> ajouter</a>
                </button>
            </div>

            <div class="sect-bloc-2"  data-name="p-2">
                <img src="images/dish-2.png" alt="">

                <div class="img-hover-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-hover-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>


                </br>
                <span>Chicken</span>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>9.000 F</span>
                <button class="ajouter" >
                    <a href="plat-1.php?id=2" style="color: #fff;"> ajouter</a>
                </button>
            </div>

            <div class="sect-bloc-2" data-name="p-3">
                <img src="images/dish-3.png" alt="">

                <div class="img-hover-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-hover-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <span>Big Chicken</span>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>12.000 F</span>
            
                <button class="ajouter" >
                    <a href="plat-1.php?id=3" style="color: #fff;"> ajouter</a>
                </button>
            </div>

            <div class="sect-bloc-2" data-name="p-4" >
                <img src="images/dish-4.png" alt="">
                <div class="img-hover-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-hover-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <span>Pizza</span>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>10.000 F</span>
    
             
                <button class="ajouter" >
                    <a href="plat-1.php?id=4" style="color: #fff;"> ajouter</a>
                </button>
            </div>
        </div>

       

        </div>

    </section>


    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- section3 -->
    <section id="section3" class="section-3">
        <span>A propos </span>
        <h1>Pourquoi commander chez nous ?</h1>
        <div class="big-bloc-3">
            <div class="sect-bloc-3">
                <img src="images/about-img.png" alt="">
            </div>
            <div class="sect-bloc-3">
                <div class="text-zone-3">
                    <span class="meilleur">Meilleur Resto Du Pays </span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nam, sed quo accusamus eligendi
                        exercitationem natus facilis, libero similique inventore quisquam? Iure repellendus, consequatur
                        commodi quaerat itaque quam rerum veniam.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nam, sed quo accusamus eligendi
                        exercitationem natus facilis, libero similique inventore quisquam? Iure repellendus, consequatur
                        commodi quaerat itaque quam rerum veniam.</p>
                    <div class="livraison">
                        <button class="livreur">
                            <i><a href="#">livraison Gratuite</a></i>
                        </button>
                        <button class="livreur">
                            <i><a href="#">Rapidite garantie</a></i>
                        </button>
                        <button class="livreur">
                            <i><a href="#">courtoisie garantie</a></i>
                        </button>
                       
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- section4 -->
    <section id="section4" class="section-4">
        <span>Nos Menus</span>
        <h1>SPECIALITE DU JOUR</h1>
        <div class="big-bloc-4">
            <div class="sect-bloc-4" data-name="p-5">
                <img src="images/menu-1.jpg" alt="">
                <div class="img-menu-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-menu-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>

                <span>Pizza luxe</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure architecto facilis
                    accusantium, harum temporibus magnam sint.</p>
                <br>
                <span>15.000 F</span>

                <button class="ajouter" id="ajouter">
                    <a href="plat-1.php?id=5" style="color: #fff;"> ajouter</a>
                </button>

            </div>
            <div class="sect-bloc-4" data-name="p-6">
                <img src="images/thesherisk (40).png" alt="">
                <div class="img-menu-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-menu-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>

                <span>Big Burger Classique</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure architecto facilis
                    accusantium, harum temporibus magnam sint.</p>
                <br>
                <span>13.000 F</span>

                <button class="ajouter" id="ajouter">
                    <a href="plat-1.php?id=6" style="color: #fff;"> ajouter</a>

                </button>
            </div>
            <div class="sect-bloc-4"  data-name="p-7">
                <img src="images/crepe-1.png" alt="">
                <div class="img-menu-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-menu-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>Gateau royal</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure architecto facilis
                    accusantium, harum temporibus magnam sint.</p>
                <br>
                <span>7.000 F</span>

                <button class="ajouter" id="ajouter">
                    <a href="plat-1.php?id=7" style="color: #fff;"> ajouter</a>

                </button>
            </div>
            <div class="sect-bloc-4" data-name="p-8">
                <img src="images/chocolat-1 (1).png" alt="">
                <div class="img-menu-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-menu-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>Chocolat</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure architecto facilis
                    accusantium, harum temporibus magnam sint.</p>
                <br>
                <span>5.000 F</span>

                <button class="ajouter" id="ajouter">
                    <a href="plat-1.php?id=8" style="color: #fff;"> ajouter</a>

                </button>
            </div>
            <div class="sect-bloc-4" data-name="p-9">
                <img src="images/pancake.png" alt="">
                <div class="img-menu-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-menu-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>Pancake</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure architecto facilis
                    accusantium, harum temporibus magnam sint.</p>
                <br>
                <span>15.000 F</span>

                <button class="ajouter" id="ajouter">
                    <a href="plat-1.php?id=9" style="color: #fff;"> ajouter</a>

                </button>
            </div>
            <div class="sect-bloc-4" data-name="p-10">
                <img src="images/menu-6.jpg" alt="">
                <div class="img-menu-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-menu-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>Cupecakes</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure architecto facilis
                    accusantium, harum temporibus magnam sint.</p>
                <br>
                <span>3.000 F</span>

                <button class="ajouter" id="ajouter">
                    <a href="plat-1.php?id=10" style="color: #fff;"> ajouter</a>

                </button>
            </div>
            <div class="sect-bloc-4" data-name="p-11">
                <img src="images/menu-7.jpg" alt="">
                <div class="img-menu-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-menu-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>Cocktail</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure architecto facilis
                    accusantium, harum temporibus magnam sint.</p>
                <br>
                <span>3.000 F</span>

                <button class="ajouter" id="ajouter">
                    <a href="plat-1.php?id=11" style="color: #fff;"> ajouter</a>

                </button>
            </div>
            <div class="sect-bloc-4" data-name="p-12">
                <img src="images/menu-8.jpg" alt="">
                <div class="img-menu-1">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="img-menu-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                </br>
                <div class="stars">
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star"></i>
                    <i id="star" class="fa-sharp fa-solid fa-star-half-stroke"></i>
                </div>
                <span>Fraise saute</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure architecto facilis
                    accusantium, harum temporibus magnam sint.</p>
                <br>
                <span>9.000 F</span>

                <button type="submit" class="ajouter" id="ajouter">
                    <a href="plat-1.php?id=12" style="color: #fff;"> ajouter</a>
                </button>
            </div>
        </div>


       </div>
    </section>
    <h1 class="slider-Avis">Ce qu'ils pensent de nous</h1>
<section class="section-slider">
   
<button class="btn_1"><img src="images/971.png" alt=""></button>
<button class="btn_2"><img src="images/972.png" alt=""></button>
    <div class="slider-container">
       
            <!-- <div class="slider">
                <img src="images/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div> -->
            <div class="slider">
                <img src="images/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
            <div class="slider">
                <img src="images/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
            <div class="slider">
                <img src="images/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
            <div class="slider">
                <img src="images/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
            <div class="slider">
                <img src="images/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
            <div class="slider">
                <img src="images/pic-2.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
            <div class="slider">
                <img src="images/pic-2.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
            <div class="slider">
                <img src="images/pic-2.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
            <div class="slider">
                <img src="images/pic-2.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
            <div class="slider">
                <img src="images/pic-2.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. Lorem, ipsum dolor. </p>
            </div>
        </div>
       
       
</section>


    
   
    <section id="section6" class="section-6">
        <span>Commander Maintenant</span>
        <h1>Rapide et Gratuit</h1>
        
        <form  class="formulaire" method="post" >
            <div class="container-form">
                <label for="nom">Nom et prenoms</label>
                <input name='nom' id="nom" type="text" placeholder="veuillez entrer votre nom">
                <label  for="commande "> commande</label>
                <input name='commande' id="commande " type="text" placeholder="veuillez entrer votre commande">
                <label for="quantite">quantite</label>
                <input name='quantite_commande' type="number" id="quantite">
                <label for="adresse">adresse</label>
                <textarea name="adresse" id="adresse" cols="30" placeholder="" rows="10"></textarea>


            </div>



            <div class="container-form">
                <label   for="telephone">Telephone</label>
                <input name='telephone'  type="text" id="telephone" placeholder="entrez votre numero de telephone">
                <label   for="Menu">Menu additionnel</label>
                <input name='menu_additionnel'  type="text" id="menu" placeholder="menu additionnel">
                <label   for="date">Date</label>
                <input name='date'  type="date"  class="date" id="date">
                <label   for="message">message</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>

            </div>


            <button name='commander' type="submit" id="form-commander" class="form-commander" style="color:#fff;">
                Commander
            </button>
        </form>

    </section>
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- footer -->
    <footer id="footer">
        <ul class="vile">
            <h1>ville</h1>
            <li>Abidjan</li>
            <li>Paris</li>
            <li>Los Santos</li>
            <li>Singapour</li>
            <li>Man</li>
        </ul>
        <ul class="lien">
            <h1>liens Rapides</h1>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Repas</a></li>
            <li><a href="#">A propos</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Critique</a></li>
            <li><a href="#">Commande</a></li>
        </ul>
        <ul class="contact">
            <h1>Contact info</h1>
            <li><a href="#"><i class="fa-solid fa-phone"></i> +2225 71327850</a></li>
            <li><a href="#"><i class="fa-solid fa-phone"></i> +225 0505794642</a></li>
            <li><a href="#"><i class="fa-sharp fa-solid fa-envelope"></i> sarba@gmail.com</a></li>
            <li><a href="#"><i class="fa-sharp fa-solid fa-envelope"></i> ppp@gmail.com</a></li>
            <li><a href="#"><i class="fa-solid fa-location-dot"></i> Abidjan, Cocody - Riviera Palmeraie</a></li>
        </ul>
        <ul class="suivie">
            <h1>suivez nous</h1>
            <li><a href="#"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
            <li><a href="#"><i class="fa-brands fa-square-instagram"></i> Instagram</a></li>
            <li><a href="#"><i class="fa-brands fa-square-whatsapp"></i> Whatsapp</a></li>
            <li><a href="#"><i class="fa-brands fa-tiktok"></i> Tiktok</a></li>
        </ul>

    </footer>
    <hr>

    <p class="copy"> copyright @ 2023 by <strong>Sarba abdoul sacourou</strong> </p>

<script>
    const btn_gauche=document.querySelector('.btn_1');
    const btn_droit=document.querySelector('.btn_2');
    const slider=document.querySelectorAll('.slider');

    btn_gauche.addEventListener('click',()=>{
        console.log('bonjour clicker');
        slider[0].style.transform='translateX(-450px)';
        slider[1].style.transform='translateX(-450px)';
        slider[2].style.transform='translateX(-450px)';
        slider[3].style.transform='translateX(-450px)';
        slider[4].style.transform='translateX(-450px)';
        slider[5].style.transform='translateX(-450px)';
        slider[5].style.transform='translateX(-450px)';
        slider[6].style.transform='translateX(-450px)';
        slider[7].style.transform='translateX(-450px)';
        slider[8].style.transform='translateX(-450px)';
        slider[9].style.transform='translateX(-450px)';
        slider[10].style.transform='translateX(-450px)';     
    })
    btn_droit.addEventListener('click',()=>{
        console.log('bonjour clicker');
        slider[0].style.transform='translateX(150px)';
        slider[1].style.transform='translateX(150px)';
        slider[2].style.transform='translateX(150px)';
        slider[3].style.transform='translateX(150px)';
        slider[4].style.transform='translateX(150px)';
        slider[5].style.transform='translateX(150px)';
        slider[5].style.transform='translateX(150px)';
        slider[6].style.transform='translateX(150px)';
        slider[7].style.transform='translateX(150px)';
        slider[8].style.transform='translateX(150px)';
        slider[9].style.transform='translateX(150px)';
        slider[10].style.transform='translateX(150px)';     
    })
</script>
  
    <script src="app.js"></script>
    <script src="package/dist/sweetalert2.min.js"></script>
    <script src="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.js"></script>
</body>


</html>