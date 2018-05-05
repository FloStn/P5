<?php

if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['message']))
{
    if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['message']))
    {
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        
        $emailTo = 'flo.stein9578@gmail.com';
        $subject = 'Blog Projet 5 OpenClassrooms.';
        $body = "Nom: $surname\n\n Prénom: $name \n\nEmail: $email \n\nMessage:\n$message";
        $headers = 'From: '.$email."\r\n" .
                   'Reply-To: '.$email."\r\n";
    
        if(mail($emailTo, $subject, $body, $headers)) {
            $result = array( 'response' => 'success', 'message'=>'<strong>Merci !</strong> Votre message a bien été délivré. =)' );
        }
        else
        {
            $result = array( 'response' => 'error', 'message'=>'<strong>Une erreur s\'est produite !</strong> Veuillez rééssayer plus tard. =('  );
        }
    
        echo json_encode($result);
    
        die;
    }
}
header("Refresh: 3; url=index.php");
throw new Exception("Tous les champs sont requis ! Vous allez être redirigé vers l'acceuil dans 3 secondes...");
