<?php
    require_once 'config.php';

    $email = $_GET['email'];

    mail_confirm($email);

    header('Location: /pages/login.html');

?>