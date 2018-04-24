<?php

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
	$email = trim($_POST['email']);
	$message = trim($_POST['message']);
	
	$emailTo = 'flo.stein9578@gmail.com';
	$subject = 'Blog Projet 5 OpenClassrooms.';
	$body = "Nom: $surname\n\n Prénom: $name \n\nEmail: $email \n\nMessage:\n$message";
	$headers = 'From: '.$email."\r\n" .
        'Reply-To: '.$email."\r\n";

	//mail($emailTo, $subject, $body, $headers);
	//$emailSent = true;
	if (mail($emailTo, $subject, $body, $headers)) {
        $result = array( 'response' => 'success', 'message'=>'<strong>Merci !</strong> Votre message a bien été délivré. =)' );
    } else {
        $result = array( 'response' => 'error', 'message'=>'<strong>Une erreur a été rencontrée !</strong> Veuillez rééssayer plus tard. =('  );
    }

    echo json_encode( $result );

    die;
