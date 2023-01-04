<?php include_once 'include/header.php'; ?>

<?php


$db = new DataBase();

if (!empty($_GET['c_id'])) {
    $cid = $_GET['c_id'];
}


?>

<div class="also_pending">
    <h1 class="also_pen">More Request</h1>
    <hr>
    <div class="pending_list">

        <?php

        $db = new DataBase();


        $query2 = "SELECT * FROM complains WHERE c_id = '$cid'";
        $data2 = $db->select($query2);
        foreach ($data2 ?: [] as $value2) {
            $comcategory = $value2['category'];

            if ($comcategory == 'police') {

                $query1 = "SELECT * FROM complains
                LEFT JOIN action_complain ON complains.c_id = action_complain.complainId
                LEFT JOIN user_reg ON complains.u_id = user_reg.id
                 WHERE complains.category = 'police' ORDER BY complains.c_id DESC";
                $data1 = $db->select($query1);
                foreach ($data1 ?: [] as $value1) { ?>

        <?php

                    $cid = $value1['c_id'];
                    $aid = $value1['complainId'];

                    $date = date_create($value1['complain_time']);
                    $dateFormat = date_format($date, 'd M');
                    $timeFormat = date_format($date, 'h:ia');

                    ?>


        <?php

                    if ($cid != $aid) { ?>
        <a href="complain.php?c_id=<?php echo $cid; ?>"><span style="font-size:12px; color:cornsilk;"><?= $dateFormat ?>
                , <?= $timeFormat ?>
            </span> <br><?= $value1['firstname'] . " " . $value1['lastname'] ?></a>
        <?php  }

                    ?>



        <?php }
            }
        }


        /**1

        if ($comcategory == 'firservice') {

            $query1 = "SELECT * FROM complains
        LEFT JOIN action_complain ON complains.c_id = action_complain.complainId
        LEFT JOIN user_reg ON complains.u_id = user_reg.id
         WHERE complains.category = 'firservice' ORDER BY complains.c_id DESC";
            $data1 = $db->select($query1);
            foreach ($data1 ?: [] as $value1) { ?>

        <?php

                $cid = $value1['c_id'];
                $aid = $value1['complainId'];

                $date = date_create($value1['complain_time']);
                $dateFormat = date_format($date, 'd M');
                $timeFormat = date_format($date, 'h:ia');

                ?>


        <?php

                if ($cid != $aid) { ?>
        <a href="complain.php?c_id=<?php echo $cid; ?>"><span style="font-size:12px; color:cornsilk;"><?= $dateFormat ?>
                , <?= $timeFormat ?>
            </span> <br><?= $value1['firstname'] . " " . $value1['lastname'] ?></a>
        <?php  }

                ?>



        <?php }
        }

         **/


        /** 
        if ($comcategory == 'ambulance') {
            $query1 = "SELECT * FROM complains
            LEFT JOIN action_complain ON complains.c_id = action_complain.complainId
            LEFT JOIN user_reg ON complains.u_id = user_reg.id
             WHERE complains.category = 'ambulance' ORDER BY complains.c_id DESC";
            $data1 = $db->select($query1);
            foreach ($data1 ?: [] as $value1) { ?>

        <?php

                $cid = $value1['c_id'];
                $aid = $value1['complainId'];

                $date = date_create($value1['complain_time']);
                $dateFormat = date_format($date, 'd M');
                $timeFormat = date_format($date, 'h:ia');

                ?>


        <?php

                if ($cid != $aid) { ?>
        <a href="complain.php?c_id=<?php echo $cid; ?>"><span style="font-size:12px; color:cornsilk;"><?= $dateFormat ?>
                , <?= $timeFormat ?>
            </span> <br><?= $value1['firstname'] . " " . $value1['lastname'] ?></a>
        <?php  }

                ?>



        <?php }
        }

         **/
        ?>



    </div>
</div>

<hr>


<div class="user_location_map">
    <h1>
        Complain Info
        <img src="logos/info.jpg" alt="no images">
    </h1>
    <div class="complain_user_page">

        <?php

        $db = new DataBase();
        if (isset($_GET['c_id'])) {
            $cid = $_GET['c_id'];
            $query = "SELECT * FROM complains
LEFT JOIN user_reg ON complains.u_id = user_reg.id
LEFT JOIN profile_pic ON complains.u_id = profile_pic.u_id
WHERE complains.c_id = '$cid' ORDER BY profile_pic.id DESC LIMIT 1";
            $data = $db->select($query);
            foreach ($data ?: [] as $value) { ?>
        <div class="complain_details_block">
            <?php

                    if ($value['images'] == '') { ?>
            <img src="../user/images/demo.png" alt="no images">
            <?php } else { ?>
            <img src="../user/upload/<?php echo $value['images']; ?>" alt="no images">
            <?php }

                    ?>
            <h4> Name : <?php echo $value['firstname'] . " " . $value['lastname']; ?></h4>
            <h5> Mobile : <?php echo $value['mobile']; ?></h5>

            <!--For tooltip text start area code-->
            <div class="texttool">
                <p style="color:#fff;"> Action Area : <?php echo $value['locations']; ?></p>
                <span class="tooltiptext">
                    Hi, <br>
                    I am <q style="color: orange;"><?php echo $value['firstname'] . " " . $value['lastname']; ?></q>
                    <br>
                    i am in trouble at ... <br>
                    <strong style="color: red;"> <?php echo $value['locations']; ?>
                        area.</strong> <br>

                    <i style="color:yellow">Please recover me,here my phone number...</i> <br>
                    <b><?php echo $value['mobile']; ?></b> <br>
                    <h6 style="font-size:14px">Thank you&#128151;</h6>
                </span>
            </div>
            <!--For tooltip text end area code-->


            <p><span><?php echo $value['gender']; ?></span></p>
            <h6>Category : <b><?php echo $value['category']; ?></b></h6>

        </div>
        <?php }
        }

        ?>



        <div class="map_style">
            <div class="user_map">
                <iframe width="100%" height="420"
                    src="https://maps.google.com/maps?q=<?php echo $value['latitude']; ?>,<?php echo $value['longitude']; ?>&output=embed">
                </iframe>
            </div>
        </div>
    </div>


    <!--
    <div class="map_web">
        <a href="https://www.gps-coordinates.net/" target="_blank">click</a>
    </div>
    -->


    <div class="complain_action">



        <div class="action_flex">


            <?php

            $lat = $value['latitude'];
            $lng = $value['longitude'];
            $sum = $lat + $lng;



            $db = new DataBase();

            $query = "SELECT * FROM police_station";

            $data = $db->select($query);

            foreach ($data ?: [] as $value) {
                $pLat = $value['p_latitude'];
                $plng = $value['p_longitutde'];
                $sum1 = $pLat + $plng;

                $sub = $sum - $sum1;





                if ($sum > $sum1) { ?>

            <?php



                    ?>


            <div class="action_box_style">
                <div class="action_details">

                    <div class="action_station">
                        <h2>
                            <?php echo $value['p_name']; ?>
                        </h2>
                        <p style="margin-bottom: 0;">
                            <?= $value['p_contact'] ?>
                        </p>
                    </div>

                    <form action="complain_action.php" method="post">
                        <input type="hidden" class="complainId" name="complainId" id="complainId"
                            value="<?php echo $cid; ?>">
                        <input name="police_station_id" id="police_station_id" type="hidden"
                            value="<?= $value['p_id'] ?>">
                        <input type="hidden" class="adminId" name="adminId" id="adminId"
                            value="<?php echo $_SESSION['id']; ?>">
                        <input type="submit" name="actionForm" value="Action">

                    </form>



                </div>



            </div>



            <?php  } else {
                    //Something will be happend
                }
            }

            ?>





        </div>

    </div>
</div>











<?php include_once 'include/footer.php'; ?>