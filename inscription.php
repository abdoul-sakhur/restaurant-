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
<?php

// ce sont des composants de phpMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['inscription'])){

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $message="Veuillez entrer un email valide s'il vous plait";
    }
     elseif(empty($_POST['password']) || $_POST['password'] != $_POST['verif_password']){
        $message="Mot de passe incorrect , veuillez reessayer";
     }
     
     elseif(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['password']) && $_POST['password'] == $_POST['verif_password'] ){
    
        require_once 'includes/conn.php';

            $Email=$_POST['email'];
            $requette=$database-> prepare(' SELECT * FROM membres WHERE email=:email');
            $requette->bindValue(':email',$Email);
            $requette->execute();
            $resultat=$requette->fetchAll(PDO::FETCH_ASSOC);
            
            if($resultat){
                $message="désolé cet email est déjà lié à un compte";
            }
            else{

                // creation d'une fonction qui genere des token aleatoire
                function token_random_string($taille=20){
                    $string='1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
                    $token='';
                    // remplissage du token avec une boucle for 
                    for($i=0;$i<$taille; $i++){
                        $token .= $string[rand(0,strlen($string)-1)];
                    }
                    return $token;
                }
                $token=token_random_string(20);
                
        if(isset($_POST['username'])){
            $username=$_POST['username'];
            $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
            $requette=$database->prepare('INSERT INTO membres(username,email,Motpasse,Tokenn) VALUES(:username, :email, :Motpasse,:Tokenn)');
            $requette->bindValue(':username', $username);
            $requette->bindValue(':email', $_POST['email']);
            $requette->bindValue(':Motpasse',$password);
            $requette->bindValue(':Tokenn',$token);
            $requette->execute();
            $message="Inscription réussie";


//Envoi de l'email par phpmailer avec le protocole smtp 


// code d'envoi d'Email
//Include required PHPMailer files
require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';
require 'PHPMailer/includes/Exception.php';
//Define name spaces

//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
//Set gmail username
$mail->Username = "sarbaabdoulsacourou@gmail.com";
//Set gmail password
$mail->Password = "uarajznmuanksubu";
//Email subject
$mail->Subject = "Test email using PHPMailer";
//Set sender email
$mail->setFrom('sarbaabdoulsacourou@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Attachment
// $mail->addAttachment('');
//Email body
$corps_du_message=' s\'il  vous plait veuillez cliquer sur le lien pour confirmer l\'inscription:

<a href="http://localhost/restaurant_ida/includes/verification_Email.php?email='.$_POST['email'].'&tokenn='.$token.'"> confirmez </a>';

$mail->Body=$corps_du_message;

//Add recipient
if(isset($_POST['email'])){
    $mail->addAddress($_POST['email']);
}else{
    echo"L'email de destination n'a pas été recuperé ";
}
//Finally send email
if ( $mail->send() ) {
echo "Email envoyé avec succès !";
}else{
echo "Erreur lors de l'envoi du message : " . $mail->ErrorInfo;;
}
//Closing smtp connection
$mail->smtpClose();

        }   
            }
    } 

 } 

?>

<style>
    body{
        background:url(images/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg);
        background-size:cover;
        background-repeat:no-repeat;
        background-position:center center;
        background-attachment:fixed;
    }
</style>
<form class='form_inscriprion' action="" method='post'>
     <h1>Inscription</h1>
     <?php if(isset($message)) echo $message?>
     <input type="text" name='username' placeholder='Nom d"utilisateur '>
     <input type="email" name='email' placeholder='Email'>
     <input type="password" name='password' placeholder='Mot de passe'>
     <input type="password" name='verif_password' placeholder='Confirmation du mot de passe '>
     <button type='submit' name='inscription'>S'inscrire </button>
     <p class='lien-connexion' >Vous avez déjà un compte ?<a href="connexion.php"> cliquez ici </a></p>
</form>


<!-- <p class="copy"> copyright @ 2023 by <strong>Sarba abdoul sacourou</strong> </p> -->
    <script src="app.js"></script>
    <script src="slider.js"></script>
</body>
</html>