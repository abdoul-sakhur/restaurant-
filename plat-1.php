<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AU-GHETTI</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">
</head>

<body>
    <style>
        .container-princ{
            margin:0 auto;
        }
    </style>
<?php
    require('static/header.php');
    require('includes/conn.php');
    $id=$_GET['id'];
    // var_dump($id);
    $requette=" SELECT * from repas WHERE NumRepas=$id";
    $result=$database->query($requette);
        $data=$result->fetch();
        // var_dump($data);
?>
    <div class="container-princ">
        <div class="sous-cont-gauche">
            <div class="big-image">
                <img src="<?php echo ( $data['Lien_Image']) ?>"   onclick="ShowImage(this.src)" alt="">
            </div>
            <div class="small-images">
                <div class="image-item">
                    <img src="<?php echo( $data['sousimageUN']) ?>" onclick="ShowImage(this.src)" alt="">
                </div>
                <div class="image-item">
                    <img src="<?php echo( $data['sousimageDEUX']) ?>" onclick="ShowImage(this.src)" alt="">
                </div>
                <div class="image-item">
                    <img src="<?php echo( $data['sousimageTROIS']) ?>" onclick="ShowImage(this.src)" alt="">
                </div>
            </div>
        </div>
        
        <div class="sous-cont-droie">
            <h1 class="product-name"><?php echo( $data['Libele']) ?></h1>
            <p class="prix-du-produit"><?php echo($data['Prix']) ?></p>
            <p class='star-span'><?php 
             for ($i=0; $i < $data['Notation']; $i++){
                echo("<span>&#9733</span>");
             }
            ?>
            </p>
            <?php 
    if(isset($_POST['ajouter_panier'])){
       
    $requeteRepas = "SELECT * FROM repas WHERE NumRepas = :id";
    $resultatRepas = $database->prepare($requeteRepas);
    $resultatRepas->bindValue(':id', $id);
    $resultatRepas->execute();
    $dataRepas = $resultatRepas->fetch();

  
    $requeteInsertion = "INSERT INTO carte (image, nom, prix,quantite) VALUES (:image, :nom, :prix ,:quantite)";
    $resultatInsertion = $database->prepare($requeteInsertion);
    $resultatInsertion->bindValue(':image', $dataRepas['Lien_Image']);
    $resultatInsertion->bindValue(':nom', $dataRepas['Libele']);
    $resultatInsertion->bindValue(':prix', $dataRepas['Prix']);
    $resultatInsertion->bindValue(':quantite', 1);
    $resultatInsertion->execute();

?>
<script>
      Swal.fire({
      position: 'center',
      icon: 'success',
      title: ' Ajouté au panier !',
      showConfirmButton: false,
      timer: 2500
    })
    </script>
<?php

    } 
 ?>
           
 
            









        
            <div class="text">
            <?php echo($data['Description']) ?>
            </div>
            <form action="" method='post'>
            <div class="bts-facture">
                <button type="submit"  name='ajouter_panier'  class="commandeur">Ajouter au panier</button>
                <button type="submit"  name='payer_maintenant' class="payer">Payer maintenant</button>
             
            </div>
            </form>
           
        </div>
    </div>

    <?php 
        require('static/footer.php');
    ?>
<script>
   
   
let  BIGIMAGE=document.querySelector('.big-image img') ;
function ShowImage(IMAGE){
    BIGIMAGE.src=IMAGE;
    
}


</script>


</body>