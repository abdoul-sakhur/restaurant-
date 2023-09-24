<?php
require('static/header.php');
require('includes/conn.php');
?> 
<form action="" method="post" class='form-paiement'>


<div class="commande_panier">
<?php 
$requette=$database->prepare('SELECT * FROM carte ');
$requette->execute();
$nombre_de_ligne=$requette->rowCount();
$somme_total=0;
    if($nombre_de_ligne > 1){
        while($carte_trouver=$requette->fetch(PDO::FETCH_ASSOC)){
            $total=$carte_trouver['prix'] * $carte_trouver['quantite'];
        $somme_total += $total;
   ?>
   <span><?= $carte_trouver['nom']?>(<?= $carte_trouver['quantite']?>)</span>

<?php

        }  
    }
?>
<div class="somme_totaux"><a> XOF<?php echo number_format($somme_total);?></a></div>


</div>

</form>