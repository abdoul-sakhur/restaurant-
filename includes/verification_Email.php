<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web dev devoir </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">
</head>

<?php 
if($_GET){

    if(isset($_GET['email'])){
        $email=$_GET['email'];
    }

    if(isset($_GET['tokenn'])){
        $token=$_GET['tokenn'];
    }

    if(!empty($_GET['email']) && !empty($_GET['tokenn'])){
        require_once'conn.php';

$requette= $database->prepare(' SELECT * FROM membres WHERE email=:email AND tokenn=:tokenn');
$requette->bindValue(':email', $email);
$requette->bindValue(':tokenn', $token);
$requette->execute();
$resultat=$requette->rowCount();


// on met la base de donnees correspondant a l'email entree a jour le tokenn deviens 'valide' et validation recois 1

if($resultat == 1){
    $Update=$database ->prepare(' UPDATE  restbakouan.membres SET validationmail=:validationmail  ,  tokenn=:tokenn WHERE email=:email');
    $Update->bindValue(':validationmail',1);
    $Update->bindValue(':tokenn','valide');
    $Update->bindValue(':email',$email);
    $result_of_updating=$Update->execute();

    if($result_of_updating){
        ?>
        
<style>
    body{
        background:url(images/back-juice2.jpg);
        background-size:cover;
        background-repeat:no-repeat;
    }
</style>
        <div class="confirm">
            <h1 style='text-align:center;'>Votre email a bien été confirmé !</h1>
        </div> 
        <?php 
    }

}

    }
}


?>
