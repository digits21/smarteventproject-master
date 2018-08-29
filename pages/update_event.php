<?php

    session_start();
    $user_id = $_SESSION['id'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];

    $id_event = $_GET['id_event'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/my_style.css">
    <title>Update listing</title>
</head>
<body>
    <div class="form_section">
        <h1>Update listing</h1>
        <hr>
        <form action="../config/post/update_event_post.php?id_event=<?= $id_event ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="event_title" class="event_title" placeholder="Event title" required>
            <label for="opening_date">Opening date : </label>
            <input type="datetime-local" name="opening_date" id="opening_date" class="opening_date" placeholder="Opening date" required>
            <label for="closing_date">Closing date : </label>
            <input type="datetime-local" name="closing_date" id="closing_date" class="closing_date" placeholder="Closing date" required>
            <input type="text" name="event_address" class="event_address" placeholder="Address" required>
            <input type="number" name="ticket_price" class="ticket_price" placeholder="Ticket price $" required>
            <textarea name="event_description" class="event_description" placeholder="Description" required></textarea>
            
            <input type="file" name="event_picture" class="event_picture" id="event_picture" accept="image/*">
            
            <input type="submit" value="Update listing" class="submit_btn">
            <a href="<?= "user_account.php?id=" . $_SESSION['id'] . "&user=" . $_SESSION['user'] . "&email=" . $_SESSION['email'] ?>">return</a>
        </form>
    </div>
</body>
</html>
