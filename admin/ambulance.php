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
    <title>Police Sub Admin | Login </title>


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

    <div class="container">
        <div class="row">
            <div class="thana">
                <a href="dashboard.php">Back</a>
                <div class="police_admin_login">

                    <h4 class="th_head">Ambulance Admin Log In</h4>

                    <?php

                    $db = new DataBase();

                    if (isset($_POST['thanaForm'])) {
                        $policeKey = $_POST['policeKey'];
                        $pass = $_POST['pass'];

                        $query = "SELECT * FROM thana_admin
    LEFT JOIN police_station ON thana_admin.police_station_id = police_station.p_id
     WHERE police_station_key = '$policeKey'";

                        $data = $db->select($query);

                        if ($data) {
                            foreach ($data ?: [] as $value) { ?>
                    <?php $policeStationId = $value['police_station_id']; ?>
                    <div class="name_of_police_station">
                        <h4>
                            <?= $value['p_name'] ?>
                        </h4>
                    </div>
                    <div class="police_anchor">
                        <a href="policeStation.php?policeId=<?= $policeStationId ?>">Please enter your Panel</a>
                    </div>
                    <?= exit() ?>
                    <?php }
                        } else { ?>
                    <div class="span_div">
                        <p><?= "Your key and password does not match" ?></p>
                    </div>
                    <?php }
                    }

                    ?>

                    <div class="thana_ad_form">
                        <form autocomplete="off" action="" method="post">
                            <label for="policeKey">Enter your admin key : </label> <br>
                            <input type="text" name="policeKey" id="policeKey" required="1"> <br>
                            <label for="password">Enter Password : </label> <br>
                            <input type="password" name="pass" id="pass"> <br>
                            <input type="submit" name="thanaForm" id="thanaForm" value="Submit">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>