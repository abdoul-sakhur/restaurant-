<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Au-ghetti </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">
    <link rel='icon' type='image/png' href="images/spaghetti-12-450358.png" /> 
</head>
<?php

// ce sont des composants de phpMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['connexion'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    require_once 'includes/conn.php';
 $requette=$database->prepare(' SELECT * FROM membres WHERE email=:email');
 $requette->execute(array('email'=>$email));
 $resultat=$requette->fetch();
 $bienSEconecter =1;
 echo $bienSEconecter;

 if(!$resultat){
    $message="Veuillez entrer un identifiant  valide ";

 }

 if($resultat['validationmail'] == 1){

        //ON GENERE UN TOKEN AU HAZARD POUR ENVOYER A L'EMAIL
            function token_random_string($taille=20){
                $string='0123456789qwertyuiopasdfghjkl;zxcvbnQWERTYUIOPASDFGHJKL';
                $token='';
                for($i=0;$i<$taille;$i++){
                    $token .= $string[rand(0,strlen($string)-1)];
                }
                return $token;
            }
            $token=token_random_string(20);
        $update=$database->prepare('UPDATE membres SET tokenn=:Tokenn WHERE email=:email ');
        $update->bindValue(':Tokenn',$token);
        $update->bindValue(':email',$_POST['email']);
        $update->execute();
        
            
        //ENVOIE DE L'EMAIL PAR PHPMAILER 
        
        
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
        $corps_du_message='s\'il  vous plait veuillez cliquer sur le lien pour confirmer l\'inscription:
        
        <a href="http://localhost/restaurant_ida/includes/verification_Email.php?email='.$_POST['email'].'&tokenn='.$token.'"> confirmez </a>';
        
        $mail->Body=$corps_du_message;
        //Add recipient
        if(isset($_POST['email'])){
                 $mail->addAddress($_POST['email']);
             }else{
                 echo"Email de destination n'a pas ete recuperer";
             }
        //Finally send email
        if ( $mail->send() ) {
            echo "vous n'avez pas encore confirme votre Email ..! Un email de confirmation vous a ete envoye !";
        }else{
            echo "Erreur lors de l'envoi du message : " . $mail->ErrorInfo;;
        }
        //Closing smtp connection
        $mail->smtpClose();
        
        }
}

if($bienSEconecter==1){
    $passwordOK=password_verify($password,$resultat['Motgitpasse']);
    echo $passwordOK;
     if($passwordOK){
        session_start();
         $_SESSION['id']=$resultat['id'];
         if(isset($resultat['username'])){
            $_SESSION['username']=$resultat['username'];
            $_SESSION['email']=$email;
         }

         header ('location:http://localhost/restaurant_ida/index.php'); 

        //  elseif($bienSEconecter != 1){
        //     $message='erreur sur les identifiants';
        // }
           
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
     <h1>Connexion</h1>
     <?php if(isset($message)) echo $message?>
     <input type="email" name='email' placeholder='Email'>
     <input type="password" name='password' placeholder='Mot de passe'>
     <button type='submit' name='connexion'>Se connecter </button>

     <p class='lien-connexion'  >Vous n'avez pas encore de compte ?<a href="inscription.php"> cliquez ici </a></p>

</form>


<!-- <p class="copy"> copyright @ 2023 by <strong>Sarba abdoul sacourou</strong> </p> -->
    <script src="app.js"></script>
    <script src="slider.js"></script>
</body>
</html>