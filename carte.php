
<?php
require('static/header.php');
require('includes/conn.php');
?> 
<?php 


// modification des quantites
if(isset($_POST['btn_modif'])){
    $quantite_recup = $_POST['modif_prix'];
    $quantite_recup_id = $_POST['modif_prix_id'];
    echo $quantite_recup;
    
    $reqtte = $database->prepare('UPDATE carte SET quantite = :quantite_recup WHERE id = :quantite_recup_id');
    $reqtte->bindValue(':quantite_recup', $quantite_recup);
    $reqtte->bindValue(':quantite_recup_id', $quantite_recup_id);
    $reqtte->execute();
    
if($reqtte){
    header ('location:http://localhost/restaurant_ida/carte.php'); 
}
}


//  suprrimer les cartes 1 a 1
if (isset($_GET['supprimer'])){
    $id_supprimer=$_GET['supprimer'];
    $requette=$database->prepare('DELETE FROM carte WHERE id=:id_supprimer');
    $requette->bindValue(':id_supprimer',$id_supprimer);
    $requette->execute();
    header ('location:http://localhost/restaurant_ida/carte.php'); 
}
if(isset($_GET['supprimer_tout'])){
    $requette=$database->prepare('DELETE FROM carte');
    $requette->execute();
    header ('location:http://localhost/restaurant_ida/carte.php'); 
}
?>
 <div class="container">

 <section class="  text-center" id='carte_panier'>
    <h1 class='titre_panier'>PANIER</h1>
    <table>
        <thead class='titre' >
            <th>IMAGE</th>
            <th>NOM</th>
            <th>PRIX</th>
            <th>QUANTITE</th>
            <th>PRIX TOTAL</th>
            <th>ACTION</th>
        </thead>
       

        <tbody>
            <?php 
            $requette=$database->prepare('SELECT * FROM carte ');
            $requette->execute();
            $nombre_de_ligne=$requette->rowCount();
           
            
            $somme_total=0;
            if($nombre_de_ligne > 0){
                while($carte_trouver=$requette->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><img class='image_cart' src="<?php echo $carte_trouver['image'];  ?>" alt=""></td>
                        <td><?php echo $carte_trouver['nom']; ?></td>
                        <td>XOF <?php  echo number_format($carte_trouver['prix']); ?>/-</td>
                       
                        <td class='table_input'>
                            <form action="" method='post'>
                                <input type="hidden"  name='modif_prix_id' value='<?php echo $carte_trouver['id']; ?>'>
                                <input type="number" min='1' class='modif_prix'  name='modif_prix'  value='<?php echo $carte_trouver['quantite']; ?>'>
                                <input type="submit" style='color:#fff;' class='btn_modif' name='btn_modif' value='modifier'>
                            </form>
                        </td>
                        <td> XOF <?php echo $total_plat_prix=number_format($carte_trouver['prix'] * $carte_trouver['quantite']); ?>/-</td>
                        <td><a href="carte.php?supprimer=<?php echo $carte_trouver['id']; ?>"class='btn_supprimer' style='text-decoration:none; color:#fff;' > Supprimer</a></td>
                    </tr>

                <?php
                $total=$carte_trouver['prix'] * $carte_trouver['quantite'];
                $somme_total += $total ;
            
                }
                
            } 
            ?>
            <tr class='table_bottom' style='height:3rem;'>
                <td> <a href="index.php" class="option-btn"  style='text-decoration:none; font-weight:bold; color:#fff;'> Continuer les achats</a></td>
                <td colspan='3' style='color:#fff; font-weight:bold;' >SOMME TOTALE :</td>
                <td><a style='text-decoration:none;color:#fff; font-weight:bold;' href=""> XOF <?php echo number_format($somme_total);?></a></td>
                <td><a href="carte.php?supprimer_tout" class='btn_supprimer_tout' style='text-decoration:none; color:#fff;'> Supprimer tout</a></td>
            </tr>
           
        </tbody>
        
    </table>
    <div class="paiememt">
            <button type='submit' class="btn-paiement<?= ($somme_total > 1) ?'':disabled; ?>"> Payer maintenant !</button>
        </div>
 </section>
 </div>