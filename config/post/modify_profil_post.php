<?php

    session_start();
    $id_user = $_SESSION['id'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];

    require_once '../config.php';

    $new_first_name = htmlspecialchars($_POST['new_first_name']);
    $new_last_name = htmlspecialchars($_POST['new_last_name']);
    $new_password = htmlspecialchars($_POST['new_password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    $phone_number = htmlspecialchars($_POST['phone_number']);

    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    if($new_password == $confirm_password) {
        update_user($new_first_name, $new_last_name, $new_password_hash, $phone_number, $id_user);
        header('Location: ../../pages/user_account.php?id=' . $id_user . '&user=' . $user . '&email=' . $email);
    }
    else {
        echo 'Error : confirm password <a href="../../pages/modify_profil.php?id=' . $id_user . '&user=' . $user . '&email=' . $email . '" title="retry">retry</a>';
    }

?>