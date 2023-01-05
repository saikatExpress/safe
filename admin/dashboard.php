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


    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>

    <section>
        <div class="dash_content">
            <div class="dash_profile">
                <div class="dash_profile_block">
                    <div class="dash_profile_img">
                        <img src="images/user-demo.png" alt="no images">
                    </div>
                    <div class="dash_profile_title">
                        <h4>Saikat Talukder</h4>
                        <h3>
                            <i style="color:blue;" class="fa fa-phone-square" aria-hidden="true"></i> 01751810216
                        </h3>
                        <h5>Employee</h5>
                        <a href="logout.php">Log Out</a>
                    </div>

                    <div class="dash_board_info">
                        <h4>Employee Details : </h4>
                        <h6>
                            <span>Designation : </span> Super Admin
                        </h6>
                        <h6>
                            <span>Branch : </span> Netrakona Branch
                        </h6>

                        <h6>
                            <span>District : </span> Jamalpur
                        </h6>
                        <h6>
                            <span>Division : </span> Mymensingh
                        </h6>
                        <h6>
                            <span>Joined on : </span> March 27,2022
                        </h6>
                    </div>
                </div>
            </div>

            <div class="dash_body">
                <div class="dashboard_div">

                    <div class="dashborad_div_item">
                        <a href="index.php">
                            <h4>
                                Admin
                            </h4>
                        </a>

                        <h6 class="dashText">
                            This feature only for Admin Panel.Don't try to log in to the panel...Thank you
                        </h6>
                        <span>For any Query ...? = </span> <b>01713-617913</b>
                    </div>

                    <div class="dashborad_div_item">


                        <?php

                        $db = new DataBase();

                        $query1 = "SELECT COUNT(p_id) AS pid FROM police_station WHERE admin_category = 'police'";
                        $data1 = $db->select($query1);
                        foreach ($data1 ?: [] as $value1) {
                        }

                        $query2 = "SELECT COUNT(c_id) AS cid FROM complains WHERE category = 'police'";
                        $data2 = $db->select($query2);
                        foreach ($data2 ?: [] as $value2) {
                        }

                        $query3 = "SELECT COUNT(complain_rep_id) AS rid FROM complain_feedback  WHERE complain_categories = 'police' and complain_status = 'success'";
                        $data3 = $db->select($query3);
                        foreach ($data3 ?: [] as $value3) {
                        }

                        $query4 = "SELECT COUNT(complain_rep_id) AS fid FROM complain_feedback  WHERE complain_categories = 'police' and complain_status = 'fail'";
                        $data4 = $db->select($query4);
                        foreach ($data4 ?: [] as $value4) {
                        }

                        ?>

                        <a href="police.php">
                            <h4>Police</h4>
                        </a>
                        <h6>
                            <span>Total Station : </span> <b><?= $value1['pid'] ?></b>
                        </h6>

                        <h6>
                            <span>Total Complain : </span> <b><?= $value2['cid'] ?></b>
                        </h6>

                        <h6>
                            <span>Success Complain : </span> <b><?= $value3['rid'] ?></b>
                        </h6>

                        <h6>
                            <span>Failed Complain's : </span> <b><?= $value4['fid'] ?></b>
                        </h6>
                    </div>

                    <div class="dashborad_div_item">

                        <?php

                        $db = new DataBase();

                        $query1 = "SELECT COUNT(p_id) AS pid FROM police_station WHERE admin_category = 'fireservice'";
                        $data1 = $db->select($query1);
                        foreach ($data1 ?: [] as $value1) {
                        }

                        $query2 = "SELECT COUNT(c_id) AS cid FROM complains WHERE category = 'fireservice'";
                        $data2 = $db->select($query2);
                        foreach ($data2 ?: [] as $value2) {
                        }

                        $query3 = "SELECT COUNT(complain_rep_id) AS rid FROM complain_feedback  WHERE complain_categories = 'fireservice' and complain_status = 'success'";
                        $data3 = $db->select($query3);
                        foreach ($data3 ?: [] as $value3) {
                        }

                        $query4 = "SELECT COUNT(complain_rep_id) AS fid FROM complain_feedback  WHERE complain_categories = 'fireservice' and complain_status = 'fail'";
                        $data4 = $db->select($query4);
                        foreach ($data4 ?: [] as $value4) {
                        }

                        ?>

                        <a href="fireservice.php">
                            <h4>Fire Service</h4>
                        </a>

                        <h6>
                            <span>Total Station : </span> <b><?= $value1['pid'] ?></b>
                        </h6>

                        <h6>
                            <span>Total Complain : </span> <b><?= $value2['cid'] ?></b>
                        </h6>

                        <h6>
                            <span>Success Complain : </span> <b><?= $value3['rid'] ?></b>
                        </h6>

                        <h6>
                            <span>Failed Complain's : </span> <b><?= $value4['fid'] ?></b>
                        </h6>
                    </div>

                    <div class="dashborad_div_item">


                        <?php

                        $db = new DataBase();

                        $query1 = "SELECT COUNT(p_id) AS pid FROM police_station WHERE admin_category = 'ambulance'";
                        $data1 = $db->select($query1);
                        foreach ($data1 ?: [] as $value1) {
                        }

                        $query2 = "SELECT COUNT(c_id) AS cid FROM complains WHERE category = 'ambulance'";
                        $data2 = $db->select($query2);
                        foreach ($data2 ?: [] as $value2) {
                        }

                        $query3 = "SELECT COUNT(complain_rep_id) AS rid FROM complain_feedback  WHERE complain_categories = 'ambulance' and complain_status = 'success'";
                        $data3 = $db->select($query3);
                        foreach ($data3 ?: [] as $value3) {
                        }

                        $query4 = "SELECT COUNT(complain_rep_id) AS fid FROM complain_feedback  WHERE complain_categories = 'ambulance' and complain_status = 'fail'";
                        $data4 = $db->select($query4);
                        foreach ($data4 ?: [] as $value4) {
                        }

                        ?>

                        <a href="ambulance.php">
                            <h4>Ambulance</h4>
                        </a>

                        <h6>
                            <span>Total Station : </span> <b><?= $value1['pid'] ?></b>
                        </h6>

                        <h6>
                            <span>Total Complain : </span> <b><?= $value2['cid'] ?></b>
                        </h6>

                        <h6>
                            <span>Success Complain : </span> <b><?= $value3['rid'] ?></b>
                        </h6>

                        <h6>
                            <span>Failed Complain's : </span> <b><?= $value4['fid'] ?></b>
                        </h6>
                    </div>

                    <div class="dashborad_div_item">


                        <?php

                        $db = new DataBase();

                        $query = "SELECT COUNT(id) AS totalUser FROM user_reg";

                        $data = $db->select($query);

                        foreach ($data ?: [] as $value) {
                        }

                        ?>

                        <h4>
                            Total User +
                        </h4>

                        <p>
                            <?= $value['totalUser'] . "+ " ?>
                        </p>


                    </div>

                    <div class="dashborad_div_item">


                        <?php

                        $db = new DataBase();

                        $query = "SELECT COUNT(c_id) AS totalCom FROM complains";

                        $data = $db->select($query);

                        foreach ($data ?: [] as $value) {
                        }

                        ?>

                        <h4>
                            Total Complain
                        </h4>

                        <p>
                            <?php echo $value['totalCom'] . "+"; ?>
                        </p>


                    </div>

                    <div class="dashborad_div_item">

                        <?php

                        $db = new DataBase();

                        $query = "SELECT COUNT(complain_rep_id) AS sucCom FROM complain_feedback WHERE complain_status = 'success'";

                        $data = $db->select($query);

                        foreach ($data ?: [] as $value) {
                        }

                        ?>

                        <h4>
                            Success
                        </h4>

                        <p>
                            <?php echo $value['sucCom'] . "+"; ?>
                        </p>
                    </div>

                    <div class="dashborad_div_item">

                        <?php

                        $db = new DataBase();

                        $query = "SELECT COUNT(complain_rep_id) AS failCom FROM complain_feedback WHERE complain_status = 'fail'";

                        $data = $db->select($query);

                        foreach ($data ?: [] as $value) {
                        }

                        ?>

                        <h4>
                            Failed
                        </h4>

                        <p>
                            <?php echo $value['failCom'] . "+"; ?>
                        </p>
                    </div>




                </div>
            </div>
        </div>
    </section>




</body>

</html>