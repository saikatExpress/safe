<?php include_once 'include/header.php'; ?>


<div class="user_complains">



    <div class="complain_category">
        <h4 class="complain_head">Complain's Box</h4>
        <div class="category_name">
            <div class="category_name_box">

                <div class="complain_blog">
                    <h4>Police</h4>
                    <h6>
                        <span>Today</span> : <?php echo date('d M'); ?>
                    </h6>
                    <img src="images/police1.jpg" alt="no images">
                </div>

                <div class="complain_blog1">

                    <!--Request list query and HTML start From here-->
                    <?php
                    //For request list

                    $db = new DataBase();

                    $query2 = "SELECT COUNT('c_id') AS CID FROM complains WHERE category = 'police'";
                    $data2 = $db->select($query2);
                    foreach ($data2 ?: [] as $value2) {
                        $Request1 = $value2['CID'];
                    }

                    $query2 = "SELECT COUNT('action_id') AS actID FROM action_complain";
                    $data2 = $db->select($query2);
                    foreach ($data2 ?: [] as $value2) {
                        $pending1 = $value2['actID'];
                    }

                    $totalRequest = $Request1 - $pending1;


                    ?>


                    <button type="button" class="btn btn-primary">
                        Request <span style="background-color: blue;"
                            class="badge badge-light"><?= $totalRequest ?></span>
                    </button>

                    <!--Request list query and HTML end From here-->




                    <!--Pending List query and HTML code start from here-->
                    <?php

                    //For Pending list query

                    $db = new DataBase();



                    $query2 = "SELECT COUNT('complain_rep_id') AS REPID FROM complain_feedback";
                    $data2 = $db->select($query2);
                    foreach ($data2 ?: [] as $value2) {
                        $Request = $value2['REPID'];
                    }



                    $query2 = "SELECT COUNT('action_id') AS actID FROM action_complain";
                    $data2 = $db->select($query2);
                    foreach ($data2 ?: [] as $value2) {
                        $pending = $value2['actID'];
                    }


                    $totalPending = $pending - $Request;

                    ?>


                    <a href="pending_request.php">

                        <button id="pendingButton" type="button" class="btn btn-primary">
                            Pending <span style="background-color: blue;"
                                class="badge badge-light"><?= $totalPending ?></span>
                        </button>

                    </a>

                    <!--Pending List query and HTML code end from here-->


                    <!---Success list query and HTML code start from here-->
                    <?php

                    $db = new DataBase();

                    $query2 = "SELECT COUNT('complain_rep_id') AS REPID FROM complain_feedback";
                    $data2 = $db->select($query2);
                    foreach ($data2 ?: [] as $value2) {
                    }


                    ?>

                    <a href="success_request.php">
                        <button type="button" class="btn btn-primary">
                            Success <span style="background-color: blue;"
                                class="badge badge-light"><?= $value2['REPID'] ?></span>
                        </button>
                    </a>

                    <!---Success list query and HTML code start from here-->

                </div>



                <?php


                $db = new DataBase();
                $query = "SELECT * FROM complains
                LEFT JOIN user_reg ON complains.u_id = user_reg.id
                LEFT JOIN action_complain ON complains.c_id = action_complain.complainId
                LEFT JOIN complain_feedback ON complains.c_id = complain_feedback.com_id
                 WHERE complains.category = 'police' ORDER BY complains.c_id DESC";
                $data = $db->select($query);
                foreach ($data ?: [] as $value) { ?>

                <?php

                    $comID = $value['c_id'];
                    $acComId = $value['complainId'];
                    $comFeed = $value['com_id'];
                    $pId = $value['police_station_id'];

                    ?>

                <?php

                    $date = date_create($value['complain_time']);
                    $dateFromat = date_format($date, 'd M');
                    $time = date_format($date, 'h:ia');

                    ?>

                <?php

                    if ($comID != $acComId && $comID != $comFeed) { ?>

                <div class="complain_user_details">
                    <div class="my_color">
                        <p>
                            <?php echo $time; ?>
                        </p>
                        <p>
                            <?php echo $dateFromat; ?>
                        </p>
                    </div>
                    <div class="tool1text">
                        <h3><?php echo $value['firstname'] . " " . $value['lastname']; ?></h3>
                        <section class="too1ltiptext">
                            <h2><i class="fa fa-user" aria-hidden="true"></i>
                                <?php echo $value['firstname'] . " " . $value['lastname']; ?>
                            </h2>
                            <p>Trap in : <b style="color:darkred;"><?php echo $value['problems']; ?></b></p>
                            <h2>Area : <b style="color:red"><?php echo $value['locations']; ?></b></h2>
                            <h2>Mobile : <?php echo $value['mobile']; ?></h2>
                        </section>
                    </div>

                    <h2><?php echo $value['mobile']; ?></h2>

                    <?php

                            if ($comID == $acComId) { ?>



                    <?php

                                if ($comID == $comFeed) { ?>
                    <mark class="mark_div"><?= $value['complain_status'] ?></mark>
                    <?php } else { ?>
                    <mark class="p_mark">
                        <?= "Pending on : " ?> <br>
                        <p style="font-size: 10px;margin-bottom:0">
                            <?php

                                            $query1 = "SELECT * FROM police_station WHERE p_id = '$pId'";
                                            $data1 = $db->select($query1);
                                            foreach ($data1 ?: [] as $value1) {
                                                echo $value1['p_name'];
                                            }

                                            ?>
                        </p>
                    </mark>
                    <?php }

                                ?>



                    </p>
                    <?php } else { ?>
                    <mark class="mark_div1">
                        <?= "Request" ?>
                    </mark>
                    <?php }

                            ?>
                    <h5>
                        <?php

                                if ($comID == $acComId) { ?>

                        <a href="action_view.php?c_id=<?= $value['c_id'] ?>">View</a>
                        <?php } else { ?>
                        <a href="complain.php?c_id=<?= $value['c_id'] ?>"><?= 'View' ?></a>
                        <?php  }

                                ?>
                    </h5>
                </div>
                <?php }

                    ?>



                <?php }


                ?>
            </div>

            <div class="category_name_box">

                <div class="complain_blog">
                    <h4>Fire Service</h4>
                    <h6>
                        <span>Today</span> : <?php echo date('d M'); ?>
                    </h6>
                    <img src="images/fire2.jpg" alt="">
                </div>

                <div class="complain_blog1">





                    <button type="button" class="btn btn-primary">
                        Request <span style="background-color: blue;" class="badge badge-light">9</span>
                    </button>

                    <button type="button" class="btn btn-primary">
                        Pending <span style="background-color: blue;" class="badge badge-light">3</span>
                    </button>


                    <button type="button" class="btn btn-primary">
                        Success <span style="background-color: blue;" class="badge badge-light">5</span>
                    </button>

                </div>

                <?php


                $db = new DataBase();
                $query = "SELECT * FROM complains
                LEFT JOIN user_reg ON complains.u_id = user_reg.id WHERE complains.category = 'fireservice' ORDER BY id DESC";
                $data = $db->select($query);
                foreach ($data ?: [] as $value) { ?>

                <?php

                    $date = date_create($value['added_time']);
                    $dateFormat = date_format($date, 'd M');
                    $timeFormat = date_format($date, 'h:ia');


                    ?>

                <div class="complain_user_details">
                    <div class="my_color">
                        <a href="complain.php?c_id=<?php echo $value['c_id']; ?>">
                            <p>
                                <?php echo $timeFormat; ?>
                            </p>
                            <p>
                                <?php echo $dateFormat; ?>
                            </p>
                        </a>
                    </div>
                    <div class="tool1text">
                        <a href="complain.php?c_id=<?php echo $value['c_id']; ?>">
                            <h3><?php echo $value['firstname'] . " " . $value['lastname']; ?></h3>
                            <section class="too1ltiptext">
                                <h2><i class="fa fa-user" aria-hidden="true"></i>
                                    <?php echo $value['firstname'] . " " . $value['lastname']; ?>
                                </h2>
                                <p>Trap in : <b style="color:darkred;"><?php echo $value['problems']; ?></b></p>
                                <h2>Area : <b style="color:red"><?php echo $value['locations']; ?></b></h2>
                                <h2>Mobile : <?php echo $value['mobile']; ?></h2>
                            </section>
                        </a>
                    </div>
                    <h2><?php echo $value['mobile']; ?></h2>
                    <mark>Request</mark>
                    <h5>View</h5>
                </div>

                <?php }


                ?>

            </div>


            <div class="category_name_box">

                <div class="complain_blog">
                    <h4>Ambulance</h4>
                    <h6>
                        <span>Today</span> : <?php echo date('d M'); ?>
                    </h6>
                    <img src="images/imssages.png" alt="no images">
                </div>





                <?php


                $db = new DataBase();
                $query = "SELECT * FROM complains
                LEFT JOIN user_reg ON complains.u_id = user_reg.id
                LEFT JOIN action_complain ON complains.c_id = action_complain.complainId
                LEFT JOIN complain_feedback ON complains.c_id = complain_feedback.com_id
                 WHERE complains.category = 'ambulance' ORDER BY complains.c_id DESC";
                $data = $db->select($query);
                foreach ($data ?: [] as $value) { ?>

                <?php

                    $date = date_create($value['complain_time']);
                    $dateFromat = date_format($date, 'd M');
                    $time = date_format($date, 'h:ia');

                    ?>
                <div class="complain_user_details">

                    <div class="my_color">
                        <p>
                            <?php echo $time; ?>
                        </p>
                        <p>
                            <?php echo $dateFromat; ?>
                        </p>
                    </div>

                    <!--Tooltip text HTML code start from here--->
                    <div class="tool1text">
                        <h3><?php echo $value['firstname'] . " " . $value['lastname']; ?></h3>
                        <section class="too1ltiptext">
                            <h2><i class="fa fa-user" aria-hidden="true"></i>
                                <?php echo $value['firstname'] . " " . $value['lastname']; ?>
                            </h2>
                            <p>Trap in : <b style="color:darkred;"><?php echo $value['problems']; ?></b></p>
                            <h2>Area : <b style="color:red"><?php echo $value['locations']; ?></b></h2>
                            <h2>Mobile : <?php echo $value['mobile']; ?></h2>
                        </section>
                    </div>
                    <!--Tooltip text HTML code end from here--->


                    <h2><?php echo $value['mobile']; ?></h2>



                    <!--<mark class="mark_div">Something</mark>-->

                    <!---  <mark class="p_mark">
                        <p style="font-size: 10px;margin-bottom:0"></p>
                    </mark>
                    --->

                    <mark class="mark_div1">Requets</mark>



                    <h5>
                        <a href="complain.php?c_id=<?= $value['c_id'] ?>"><?= 'View' ?></a>
                    </h5>
                </div>

                <?php



                    ?>



                <?php }


                ?>
            </div>


        </div>
    </div>
</div>



<?php include_once 'include/footer.php'; ?>