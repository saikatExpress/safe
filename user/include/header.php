<?php
include_once 'library/session.php';
Session::checkSession();
?>
<?php include_once 'library/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Help Line</title>

    <!--Font famile of google font link--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Kanit:wght@300&family=Libre+Baskerville&family=Lobster&family=Oswald:wght@500&family=Pacifico&family=Satisfy&family=Space+Mono:ital,wght@1,400;1,700&family=Vollkorn:ital@1&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali&display=swap" rel="stylesheet">
    <!--Font famile of google font link--->

    <link rel="shortcut icon" type="image/png" href="images/help-line.png" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>


    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/slick-theme.css" />


    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />


    <style>
    body {
        background-color: #D4D4D4;
    }
    </style>
</head>

<body>

    <!--Header Start here-->
    <header>
        <div class="container">
            <div style="background: white; margin-top:5px; border-radius:2px;" class="row">
                <div class="col-lg-4">
                    <img style="width: 100px; padding:5px;" src="images/inddfex.jpeg" alt="no images">
                    <div class="project_logo">
                        <h4>Controlled by : </h4>
                        <h5>Bangladesh Youth Foundation</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="project_title">
                        <h4 style="font-size: 20px;">Emergency Help Line</h4>
                        <h6>Safe People , Serve people</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="user_profile">
                        <ul>
                            <li><a href="">Notice</a></li>
                            <li><a href="">News</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="logout.php">Log out</a></li>
                        </ul>
                        <div class="user_details">
                            <h6><?php echo Session::get("firtsname") . " " . Session::get("lastname"); ?></h6>
                            <?php

                            $db = new DataBase();
                            $id = $_SESSION['id'];
                            $query = "SELECT images FROM profile_pic WHERE u_id = '$id' ORDER BY id DESC LIMIT 1";
                            $image = $db->select($query);
                            if (empty($image)) { ?>
                            <img src="images/demo.png" alt="no images">
                            <?php  } else {
                                foreach ($image ?: [] as $value) { ?>
                            <img src="upload/<?php echo $value['images']; ?>">
                            <?php }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">

            <div class="menu_bar" id="stickyheader">
                <a class="menubar_anchor" href="index.php">Home</a>
                <a class="menubar_anchor" href="about.php">About</a>
                <a class="menubar_anchor" href="police.php">Police</a>
                <a class="menubar_anchor" href="fireservice.php">Fire Service</a>
                <a class="menubar_anchor" href="ambulance.php">Ambulance</a>
                <a class="menubar_anchor" href="doctor.php">Doctor's</a>
                <a class="menubar_anchor" href="hospital.php">Hospital</a>
                <a class="menubar_anchor" href="blog.php">Blog</a>
                <button type="button" id="userBtn">
                    <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                </button>

                <div class="user_drop_menu" style="display: none;" id="myClass">

                    <div class="user_drop_profile">
                        <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                        <h4><?= Session::get("firtsname") . " " . Session::get("lastname") ?></h4>
                    </div>

                    <hr>

                    <div class="user_drop_anchor">
                        <a href="logout.php">Log out</a>
                        <a href="">Edit your profile</a>
                        <a href="">Update Password</a>
                    </div>

                </div>
            </div>



        </div>
    </div>

    <script>
    var userBtn = document.getElementById("userBtn");
    userBtn.addEventListener('click', function() {
        var myClass = document.getElementById("myClass");
        if (myClass.style.display === 'none') {
            myClass.style.display = 'block';
        } else {
            myClass.style.display = 'none';
        }
    })
    </script>

    <!--Header End here-->