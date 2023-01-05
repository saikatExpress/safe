<?php
include_once 'library/session.php';
Session::checkSession();
?>
<?php include_once 'library/database.php';
?>

<?php

$db = new DataBase();

if (!empty($_GET['policeId'])) {
    $policeId = $_GET['policeId'];
    $query = "SELECT * FROM thana_admin
    LEFT JOIN police_station ON thana_admin.police_station_id = police_station.p_id
    WHERE thana_admin.police_station_id = '$policeId'";

    $data = $db->select($query);

    foreach ($data ?: [] as $value) {
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thana Admin | Home Page</title>

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


            <div class="police_blck_div">

                <div class="station_police_div">
                    <h4><?= $value['p_name']; ?></h4>
                    <h6><?= $value['p_location'] ?></h6>
                </div>

                <div class="thana_header">

                    <div class="button_box">

                        <?php

                        $db = new DataBase();

                        $query = "SELECT COUNT(admin_msg_id) AS msgId FROM  complain_admin_msg WHERE admin_police_station_id = '$policeId'";

                        $data = $db->select($query);
                        foreach ($data ?: [] as $value) {
                        }

                        ?>

                        <button type="button" id="msg">Message <span><?= $value['msgId'] ?></span></button>
                        <form style="display: none;" action="" method="get">
                            <input type="text" name="policeStationSl" id="policeStationSl" value="<?= $policeId ?>">
                            <br>
                        </form>
                    </div>

                    <div class="button_box">
                        <button>Email <span>8</span></button>
                    </div>

                    <div class="button_box">

                        <?php

                        $db = new DataBase();

                        $query2 = "SELECT * FROM thana_admin WHERE police_station_id = '$policeId'";

                        $data2 = $db->select($query2);

                        foreach ($data2 ?: [] as $value2) {
                        }

                        ?>

                        <button type="button" id="updateBttn">Update</button>
                        <div style="display: none;" id="updateForm" class="update_form">
                            <form style="width: 100%;" action="" method="post">
                                <input style="display: none;" type="text" name="polId" id="polId"
                                    value="<?= $value2['police_station_id'] ?>">
                                <label for="updateKey">Update Key : </label> <br>
                                <input type="text" name="upKey" id="upKey" value="<?= $value2['police_station_key'] ?>">
                                <br>
                                <label for="updatePass">Update Password : </label> <br>
                                <input type="text" name="upPass" id="upPass"
                                    value="<?= $value2['police_station_password'] ?>"> <br>
                                <button type="button" id="updateFormBtn">Update</button>
                            </form>
                        </div>
                    </div>

                    <a href="dashboard.php">Dashboard</a>
                </div>



                <div id="message_pan" class="message_pan">

                    <script>
                    var updateFormBtn = document.getElementById('updateFormBtn');
                    updateFormBtn.addEventListener('click', function() {
                        var polId = document.getElementById('polId').value;
                        var upKey = document.getElementById('upKey').value;
                        var upPass = document.getElementById('upPass').value;

                        var dataString = "polId1=" + polId + "&upKey1=" + upKey + "&upPass1=" + upPass;

                        $.ajax({
                            type: 'POST',
                            data: dataString,
                            url: 'ajax/adminKeyupdate.php',
                            success: function(html) {
                                alert(html);
                            }
                        })
                    })
                    </script>

                </div>

                <div class="thana_admin_complains">
                    <h2>Complains</h2>

                    <?php

                    $db = new DataBase();


                    if (isset($_GET['policeId'])) {
                        $policeId = $_GET['policeId'];

                        $query = "SELECT * FROM action_complain
                        LEFT JOIN complain_feedback ON action_complain.complainId = complain_feedback.com_id
                         WHERE action_complain.police_station_id = '$policeId' ORDER BY action_complain.police_station_id DESC";

                        $data = $db->select($query);

                        if ($data) {
                            foreach ($data ?: [] as $value) {



                                $cId = $value['complainId'];
                                $cmfeed = $value['com_id'];
                                $query1 = "SELECT * FROM complains WHERE c_id = '$cId'";

                                $data1 = $db->select($query1);

                                foreach ($data1 ?: [] as $value1) {

                                    $time = date_create($value1['complain_time']);

                                    $dateFormat = date_format($time, 'd M');
                                    $timeFormat = date_format($time, 'h:i a');

                                    $uId = $value1['u_id'];
                                    $query3 = "SELECT * FROM user_reg WHERE id = '$uId'";
                                    $data3 = $db->select($query3);
                                    foreach ($data3 ?: [] as $value3) { ?>
                    <div class="thana_complains_item">

                        <a href="thana_complain.php?cid=<?= $value1['c_id'] ?>">
                            <div class="com_div_style1">

                                <h6>
                                    <?= $timeFormat ?>
                                </h6>

                                <h6>
                                    <?= $dateFormat ?>
                                </h6>

                            </div>

                            <div class="com_div_style">
                                <h2><?= $value3['firstname'] . " " . $value3['lastname'] ?></h2>
                            </div>

                            <div class="com_div_style">
                                <h5><?= $value3['mobile'] ?></h5>
                            </div>

                            <div class="com_div_style">
                                <h5><?= $value1['locations']; ?></h5>
                            </div>

                            <div class="com_div_style">
                                <span>
                                    Sent by DMP
                                </span>
                            </div>

                            <div class="com_div_style">
                                <span>Major</span>
                            </div>

                            <div class="com_div_style">


                                <?php

                                                    if ($cId == $cmfeed) { ?>
                                <mark style="background-color: blue; color:#fff">
                                    <?= $value['complain_status']; ?>
                                </mark>

                                <?php  } else { ?>
                                <mark style="background-color: darkred; color:#fff">
                                    <?= "Pending"; ?>
                                </mark>
                                <?php  }

                                                    ?>



                            </div>

                        </a>


                    </div>
                    <?php  }
                                }
                            }
                        } else {
                            echo "Panel has no complains yet!";
                        }
                    }

                    ?>







                </div>


            </div>
        </div>
    </div>

    <script>
    var updateBttn = document.getElementById("updateBttn");
    updateBttn.addEventListener('click', function() {
        var updateForm = document.getElementById("updateForm");
        if (updateForm.style.display === 'none') {
            updateForm.style.display = 'block';
        } else {
            updateForm.style.display = 'none';
        }
    })
    </script>

    <script>
    var msg = document.getElementById("msg");
    msg.addEventListener('click', function() {
        var policeStationSl = document.getElementById('policeStationSl').value;
        var messagePan = document.getElementById("message_pan");
        var dataString = "policeStationSl1=" + policeStationSl;
        $.ajax({
            type: 'GET',
            data: dataString,
            url: 'ajax/admin_msg.php',
            success: function(html) {
                messagePan.innerHTML = html;
            }
        })
    });
    </script>




</body>

</html>