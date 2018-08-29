<?php

    session_start();
    $id_user = $_SESSION['id'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/my_style2.css">
    <title>SignUp</title>
</head>
<body>
    <div class="form_section">
        <h1>Modify profil</h1>
        <hr>
        <form action="../config/post/modify_profil_post.php" method="post">
            <input type="text" name="new_first_name" placeholder="Change your first name" required>
            <input type="text" name="new_last_name" placeholder="Change your last name" required>
            <input type="password" name="new_password" placeholder="Change password" required>
            <input type="password" name="confirm_password" placeholder="Confirm password" required>
            <input type="tel" name="phone_number" placeholder="Add phone number" required>
            <input type="submit" value="Valide" class="submit_btn">
            <a href="user_account.php?id=<?= $id_user ?>&user=<?= $user ?>&email=<?= $email ?>">return</a>
        </form>
    </div>
</body>
</html>
