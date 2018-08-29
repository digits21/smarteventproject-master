<?php
    require_once '../config.php';

    /**
     * recuperation des donnees envoyees via le formulaire de connexion
     */
    
    $email_entered = htmlspecialchars($_POST['email_user']);
    $password_entered = htmlspecialchars($_POST['password_user']);

    $request = connexion($email_entered);

    $resultat = $request->fetch();

    $verify_password = password_verify($password_entered, $resultat['mot_passe_user']);

    if(!$resultat) {
        echo 'Error <a href="../../pages/login.html" title="retry">retry</a>';
    }
    else {
        if($resultat['confirme_mail_user'] == 1) {
            if($verify_password) {
                session_start();
                $_SESSION['id'] = $resultat['id_user'];
                $_SESSION['user'] = ($resultat['prenom_user'] . ' ' . $resultat['nom_user']);
                $_SESSION['first_name'] = $resultat['prenom_user'];
                $_SESSION['last_name'] = $resultat['nom_user'];
                $_SESSION['email'] = $resultat['email_user'];
    
                header('Location: ../../pages/user_account.php?id=' . $_SESSION['id'] . '&user=' . $_SESSION['user'] . '&email=' . $_SESSION['email']);
            }
            else {
                echo 'Incorrect password <a href="../../pages/login.html" title="retry">retry</a>';
            }
        }
        else {
            echo 'Confirm your email address first. Check your email <a href="../../pages/login.html" title="retry">retry</a>';
        }
    }

?>
