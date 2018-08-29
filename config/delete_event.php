<?php

    session_start();
    $id_user = $_SESSION['id'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];

    require_once 'config.php';

    $id_event = $_GET['id'];

    delete_listing($id_event);

    header('Location: ../pages/user_account.php?id=' . $id_user . '&user=' . $user . '&email=' . $email);

?>