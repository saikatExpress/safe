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
    <title>Admin panel | Home Page</title>

    <!--Google fonts link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Oswald:wght@500&family=Pacifico&display=swap"
        rel="stylesheet">
    <!--Google Fonts Link-->


    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/administrator.png" />
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


    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>


    <section>


        <!--Side bar Menu-->
        <div class="side_bar_menu">
            <div class="project_logo">
                <a href="index.php">
                    <div class="logo_image">
                        <img src="logos/24-hour-service-icon-phone-600w-461391034.webp" alt="no images">
                    </div>
                    <div class="project_title">
                        <h4>Emergency Help Line</h4>
                    </div>
                </a>
            </div>

            <div class="project_menu">
                <div class="menu_item">
                    <a href="dashboard.php">
                        <div class="menu_icon">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Dashboard</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="user.php">
                        <div class="menu_icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>User Managements</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="admin.php">
                        <div class="menu_icon">
                            <i class="fa fa-unlock" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Admin Managements</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="allComplain.php">
                        <div class="menu_icon">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Complain's</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="thana.php">
                        <div class="menu_icon">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Create Police Station</h4>
                        </div>
                    </a>
                </div>


                <div class="menu_item">
                    <a href="ambulance_panel.php">
                        <div class="menu_icon">
                            <i class="fa fa-ambulance" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Ambulance Panel</h4>
                        </div>
                    </a>
                </div>


                <div class="menu_item">
                    <a href="fireservice_panel.php">
                        <div class="menu_icon">
                            <i class="fa fa-fire" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Fire Service Panel</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="news.php">
                        <div class="menu_icon">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Add News</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="activity.php">
                        <div class="menu_icon">
                            <i class="fa fa-building" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Activities</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="blog.php">
                        <div class="menu_icon">
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>User Blog</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="event.php">
                        <div class="menu_icon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Event's</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="hospital.php">
                        <div class="menu_icon">
                            <i class="fa fa-h-square" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Add Hospital's</h4>
                        </div>
                    </a>
                </div>

                <div class="menu_item">
                    <a href="doctors.php">
                        <div class="menu_icon">
                            <i class="fa fa-user-md" aria-hidden="true"></i>
                        </div>
                        <div class="menu_name">
                            <h4>Doctor Managements</h4>
                        </div>
                    </a>
                </div>




            </div>
        </div>

        <!--Main body-->
        <div class="main_body">
            <div class="admin_header">
                <div class="admin_header_style">
                    <div class="head_item">

                        <div class="head_item_anchor">
                            <a href="police_complain_all.php">Police</a>
                        </div>

                        <div class="head_item_anchor">
                            <a href="fireservice_complain_all.php">Fire Service</a>
                        </div>

                        <div class="head_item_anchor">
                            <a href="ambulance_complain_all.php">Ambulance</a>
                        </div>

                    </div>

                    <div class="social_icons">

                        <a href="https://www.facebook.com/AzmiMedia1/posts/pfbid028bh3rVKwoKz4LVa2jiZfQ1rCB8DEdr1cXL4H6Ke8xHoGUuFzPTJkp7Ht1kt1srcTl"
                            target="_blank">
                            <i class="fa fa-facebook-official" aria-hidden="true"></i>
                        </a>


                        <a href="https://twitter.com/" target="_blank">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>

                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </a>


                        <a href="">
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </a>


                        <a href="">
                            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                        </a>


                    </div>

                    <div class="admin_details">
                        <div class="admin_notification">
                            <a style="text-decoration: none;" href="admin_notice.php">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                            </a>
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>

                        <div class="admin_profile">

                            <?php

                            $db = new DataBase();
                            $id = $_SESSION['id'];
                            $query = "SELECT firstname,lastname FROM admin_reg WHERE id = '$id'";
                            $data = $db->select($query);
                            foreach ($data ?: [] as $value) {
                            }

                            ?>

                            <h4><?php echo $value['firstname']; ?></h4>
                            <img src="images/profile 2.JPG" alt="no images">
                            <a href="logout.php">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



            <!--main body code start from here and call the test div from css-->
            <div class="test_div">