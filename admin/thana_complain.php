<?php

use FontLib\Table\Type\head;

include_once 'library/session.php';
Session::checkSession();
?>
<?php include_once 'library/database.php';
?>



<?php

$db = new DataBase();


if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    $query = "SELECT * FROM complains
    LEFT JOIN user_reg ON complains.u_id = user_reg.id
    LEFT JOIN action_complain ON complains.c_id = action_complain.complainId
    LEFT JOIN complain_feedback ON complains.c_id = complain_feedback.com_id
     WHERE complains.c_id='$cid'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) {
        $category = $value['category'];
        $comId = $value['c_id'];
        $comFeed = $value['com_id'];
        $uid = $value['id'];

        $query1 = "SELECT * FROM profile_pic WHERE u_id = '$uid'";
        $data1 = $db->select($query1);
        foreach ($data1 ?: [] as $value1) {
            $img = $value1['images'];
        }
    }
}

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
        <div class="header_section_title">
            <h1>Complain Details</h1>
        </div>
        <div class="thana_com_blg">

            <div class="thana_com_full_blog">
                <div class="thana_com_profile">

                    <div class="thana_com_img">
                        <?php

                        if (empty($img)) { ?>
                        <img src="images/user-demo.png" alt="no images">
                        <?php } else { ?>
                        <img src="../user/upload/<?= $img ?>" alt="no images">
                        <?php }

                        ?>
                    </div>

                    <div class="thana_com_details">
                        <h2><?= $value['firstname'] . " " . $value['lastname'] ?></h2>
                        <h3><?php echo $value['mobile']; ?></h3>
                        <h4><?= $value['locations'] ?></h4>
                        <h5><?= $value['problems'] ?></h5>
                        <h6><?= $value['gender'] ?></h6>
                    </div>

                </div>



                <div class="thana_com_map">
                    <iframe style="width: 100%; height:460px;"
                        src="https://maps.google.com/maps?q=<?php echo $value['latitude']; ?>,<?php echo $value['longitude']; ?>&output=embed">
                    </iframe>
                </div>
            </div>



            <div class="com_form">
                <div class="com_form_style">

                    <?php

                    $db = new DataBase();

                    if (isset($_POST['comSend'])) {
                        $comCategory = $_POST['comCategory'];
                        $act = $_POST['act'];
                        $comComment = $_POST['comComment'];
                        $comId = $_POST['comId'];
                        $polId = $_POST['polId'];
                        $userid = $_POST['userid'];
                        $id = $_SESSION['id'];

                        $query = "INSERT INTO complain_feedback(complain_categories,complain_status,complain_comment,com_id,pol_id,user_id,u_id)VALUES('$comCategory','$act','$comComment','$comId','$polId','$userid','$id')";

                        $data = $db->insert($query);

                        if ($data) {
                            echo "Success";
                        }
                    }

                    ?>

                    <?php

                    $db = new DataBase();

                    $police_station_id = $value['police_station_id'];

                    $query2 = "SELECT * FROM thana_admin WHERE police_station_id = '$police_station_id'";
                    $data2 = $db->select($query2);

                    foreach ($data2 ?: [] as $value2) {
                    }


                    if ($comId == $comFeed) { ?>
                    <div class="ok_div" style="color: #fff;">
                        <p>
                            <?= "Complain Report..!" ?> <br>
                            <span>by : <?= $value['complain_comment'] ?></span>
                        </p>

                        <a href="policeStation.php?policeId=<?= $value2['police_station_id'] ?>">Back
                            to panel
                        </a>
                    </div>
                    <?php  } else { ?>
                    <form action="" method="post">
                        <label for="feedback">Give Feedback : </label> <br>
                        <input style="display: none;" type="text" name="comCategory" id="comCategory"
                            value="<?= $category ?>">
                        <select name="act" id="act">
                            <option value="">Select</option>
                            <option value="success">Success</option>
                            <option value="fail">Fail</option>
                        </select> <br>
                        <label for="replayComment">Give Comment : </label> <br>
                        <textarea name="comComment" id="" cols="30" rows="5"></textarea> <br>
                        <div style="display: none;">
                            <label for="">Complain Id : </label> <br>
                            <input type="text" name="comId" value="<?= $cid ?>"> <br>
                            <label for="">Police Station Id : </label> <br>
                            <input type="text" name="polId" value="<?= $value['police_station_id'] ?>"> <br>
                            <label for="userid">User Id : </label> <br>
                            <input type="text" name="userid" value="<?= $value['id'] ?>"> <br>
                            <label for="">Click for save : </label> <br>
                        </div>
                        <input type="submit" id="comSend" name="comSend" value="Send">
                    </form>
                    <?php   }


                    ?>

                </div>
            </div>

        </div>
    </section>
</body>

</html>