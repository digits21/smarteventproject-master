<?php

    require_once '../config.php';
    require_once '../mail_confirm.php';


    /**
     * recuperation des donnees envoyees via le formulaire d'inscription
     */

    $prenom = htmlspecialchars($_POST['prenom_user']);
    $nom = htmlspecialchars($_POST['nom_user']);
    $email = htmlspecialchars($_POST['email_user']);
    $password = htmlspecialchars($_POST['password_user']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // envoie d'un lien de confirmation a l'adresse mail de l'utilisateur
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"listing.com"<support@listing.com>'."\n";
    $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
    $header .= 'Content-Transfert-Encoding: 8bit';

    $mail_confirm_message = 
    '
    <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>
    <body class="container">
        <h1>Listing : confirmation </h1>
        <p>
            to confirm your registration, click this button
        </p>
        <!--il faudrait change url ici je t suggère d utiliser $_SERVER['HTTP_POST']-->
        <a href="http://smarteventproject-master.test/config/mail_confirm.php?email='.$email.'">
            <button class="btn btn-primary">confirm</button>
        </a>
    </body>
    </html>
    ';

    if($password == $confirm_password) {
        add_user($prenom, $nom, $email, $password_hashed);

        try {
            mail($email, 'Confirm your mail address', $mail_confirm_message, $header);
            echo 'We have sent a mail to ' . $email . 'check your messages.';
        }
        catch(Exception $e) {
            echo 'Please check your internet connection';
        }
    }
    else {
        echo ' password not confirmed !!!<a href="../../pages/signup.html" title="sign up">retry</a>';
    }

?>
