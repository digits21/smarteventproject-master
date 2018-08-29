<?php
    session_start();
    $id_user = $_SESSION['id'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="../css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="../css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="../css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- My own css file -->
    <link rel="stylesheet" href="../css/my_style2.css">
    <title>Account</title>
</head>
<body class="container-fluid account">
    <div class="container">
        <div class="account_avatar">
            <a href="#" title="add photo">
                <img src="../images/profil.png" alt="profil" class="avatar">
            </a>
            <h1><?= $user; ?></h1>
            <a href="modify_profil.php?id=<?= $id_user ?>&user=<?= $user ?>&email=<?= $email ?>" title="modify profile"><?= $email; ?></a>
        </div>
        <div class="my_listing_section">
            <h3>My listings</h3>
            <hr>
            <!-- LISTING -->
            
            <div class="row my_listing">
                <?php 
                    require_once '../config/config.php';

                    $request = show_listing($id_user);

                    while($resultat = $request->fetch()) {

                        $id_event = $resultat['id_event'];
                        $event_title = $resultat['titre_event'];
                        $opening = $resultat['ouverture_event'];
                        $closing = $resultat['cloture_event'];
                        $description = $resultat['description_event'];
                        $address = $resultat['lieu_event'];
                        $ticket = $resultat['prix_ticket'];
                        $picture = $resultat['image_event'];
                ?>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="../detail.php?id=<?= $_SESSION['id'] ?>&user=<?= $_SESSION['user'] ?>&email=<?= $_SESSION['email'] ?>&id_event=<?= $id_event ?>">
                            <img src="data:image/jpeg;base64,<?= $picture ?>" class="img-fluid" alt="event picture" title="<?= $event_title ?>">
                            <span class="featured-rating-orange"><?= $ticket ?></span>
                            <div class="featured-title-box">
                                <h6><?= $event_title ?></h6>
                                <p>Event_type </p> <span>• </span>
                                <p>3 Reviews</p> <span> • </span>
                                <p><span>$$$</span>$$</p>
                                <ul>
                                    <li><span class="icon-location-pin"></span>
                                        <p><?= $address ?></p>
                                    </li>
                                    <li><span class="icon-screen-smartphone"></span>
                                        <p>Telephone</p>
                                    </li>
                                    <li><span class="icon-link"></span>
                                        <p>site web</p>
                                    </li>
                                </ul>
                                <div class="bottom-icons">
                                    <div class="closed-now">CLOSED NOW</div>
                                    <span class="ti-heart"></span>
                                    <span class="ti-bookmark"></span>
                                </div>
                            </div>
                        </a>
                        <div class="closed-now">
                            <a href="update_event.php?id_event=<?= $id_event ?>" class="modify">MODIFY</a>
                            <a href="../config/delete_event.php?id=<?= $id_event ?>" class="delete">DELETE</a>
                        </div>
                    </div>
                </div>

                <?php 
                    }
                    $request->closeCursor();
                ?>
            </div>
            <!-- END LISTING -->

            <div class="add_listing">
                <a href="new_listing.php" title="Add Listing"><img src="../images/plus.png" alt="add listing"></a>
            </div>
        </div>
        <div class="row">
            
        </div>
    </div>
    <!--============================= FOOTER =============================-->
    <footer class="main-block dark-bg">
        <div class="container">
            <nav>
                <div class="container">
                    <div>
                        <ul>
                            <li><a href="<?= '../index.html?id=' . $id_user . '&user=' . $user . '&email=' . $email ?>">Home</a></li>
                            <li><a href="<?= '../listing.html?id=' . $id_user . '&user=' . $user . '&email=' . $email ?>">Listing</a></li>
                            <li><a href="new_listing.php">Add listing</a></li>
                            <li><a href="modify_profil.php?id=<?= $id_user ?>&user=<?= $user ?>&email=<?= $email ?>">Modify profile</a></li>
                            <li><a href="../index.html">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright &copy; 2018 <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">AlSo</a></p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <ul>
                            <li><a href="#"><span class="ti-facebook"></span></a></li>
                            <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                            <li><a href="#"><span class="ti-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--//END FOOTER -->
</body>
</html>