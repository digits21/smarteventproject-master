<?php

    session_start();
    $id_user = $_SESSION['id'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];

    $id_event = $_GET['id_event'];

    require_once '../config.php';

    $event_title = htmlspecialchars($_POST['event_title']);
    $opening = htmlspecialchars($_POST['opening_date']);
    $closing = htmlspecialchars($_POST['closing_date']);
    $address = htmlspecialchars($_POST['event_address']);
    $ticket = htmlspecialchars($_POST['ticket_price']);
    $description = htmlspecialchars($_POST['event_description']);

    $picture = addslashes($_FILES['event_picture']['tmp_name']);
    $picture = file_get_contents($picture);
    $picture = base64_encode($picture);

    update_listing($event_title, $opening, $closing, $description, $address, $ticket, $picture, $id_event);

    header("Location: ../../pages/user_account.php?id=" . $_SESSION['id'] . "&user=" . $_SESSION['user'] . "&email=" . $_SESSION['email']);
?>