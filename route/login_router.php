<?php

echo session_status();

    if(session_status() == 2) {
        session_start();
        header('Locatoin: ../pages/user_account.php?id=' . $_SESSION['id'] . '&user=' . $_SESSION['user'] . '&email=' .$_SESSION['email']);
        echo 'OKK';
    }
    else {
        header('Loaction: ../pages/login.html');

        echo 'Baddd';
    }

?>