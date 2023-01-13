<?php include_once 'include/header.php'; ?>




<div class="container">
    <div class="row">

        <div class="col-lg-3">

            <div class="more_event_style">
                <h4 class="moreEvent">More event's</h4>

                <?php

                $db = new DataBase();

                $query1 = "SELECT * FROM admin_event ORDER BY start_time DESC LIMIT 3";

                $data1 = $db->select($query1);

                if ($data1) {
                    foreach ($data1 ?: [] as $value1) { ?>


                <div class="event_card_panel">
                    <div class="card" style="width: 15rem; margin:5px;">
                        <img class="card-img-top" src="../admin/upload/<?= $value1['event_cover_photo'] ?>"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 style="color:blue;" class="card-title"><?= $value1['event_title'] ?></h5>
                            <p class="card-text"><?= substr($value1['event_description'], 0, 150) ?></p>
                            <a href="view_event.php?e_id=<?= $value1['event_id'] ?>" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                <?php }
                } else {
                    echo "No event's runnig";
                }

                ?>
            </div>

        </div>

        <div class="col-lg-9">

            <?php

            $db = new DataBase();

            if (isset($_GET['e_id'])) {
                $e_id = $_GET['e_id'];

                $query = "SELECT * FROM admin_event WHERE event_id = '$e_id'";

                $data = $db->select($query);

                if ($data) {
                    foreach ($data ?: [] as $value) { ?>

            <?php

                        $date = date_create($value['start_date']);
                        $dateFormat = date_format($date, 'D,F d, Y ');
                        $time = date_create($value['start_time']);
                        $timeFormat = date_format($time, 'h.i A');

                        $startDay = date_create($value['start_date']);
                        $startDaytime = date_format($startDay, 'd');
                        $endDay = date_create($value['end_date']);
                        $endDayformat = date_format($endDay, 'd');

                        $duration = $endDayformat - $startDaytime;

                        ?>

            <div class="event_header">
                <h2 class="moreEvent">Event Info</h2>
                <div class="event_header_image">
                    <img src="../admin/upload/<?= $value['event_cover_photo'] ?>" alt="">
                </div>

                <div class="event_card_style">
                    <h2><?= $dateFormat ?> AT <span><?= $timeFormat ?></span></h2>
                    <h2><?= $value['event_title'] ?></h2>
                    <h2><?= $value['event_location'] ?></h2>
                </div>

                <hr>

                <div class="event_user_react">
                    <button>Interested</button>
                    <button>Going</button>
                    <button>Share</button>
                </div>

                <hr>

                <div class="event_details">
                    <h3>Details</h3>

                    <div class="event_info">
                        <p>
                            <i class="fa fa-user" aria-hidden="true"></i> Event by : <?= $value['event_host'] ?>
                        </p>
                        <p>
                            <i class="fa fa-product-hunt" aria-hidden="true"></i> Sponser by :
                            <?= $value['event_sponsor'] ?>
                        </p>

                        <p>
                            <i class="fa fa-clock-o" aria-hidden="true"></i> Duration : <?= $duration . "day's" ?>
                        </p>
                        <p>
                            <i class="fa fa-globe" aria-hidden="true"></i> <span>Event in </span>
                            <?= $value['event_type'] ?> . Anyone attend <?= $value['event_status'] ?>
                        </p>
                        <p>
                            <i class="fa fa-paragraph" aria-hidden="true"></i> <?= $value['event_description'] ?>
                        </p>
                    </div>

                </div>

                <hr>

                <div class="host_meet">
                    <h6 class="hostTitle">Event Host</h6>

                    <div class="host_div_block">
                        <div class="host_div">
                            <h5><?= $value['event_host'] ?></h5>
                        </div>
                        <h4>Dhaka Metropoliton Police</h4>
                        <h4>Dhaka , Bangladesh</h4>
                    </div>

                </div>

            </div>
            <?php }
                } else {
                    echo "Something Wrong";
                }
            }

            ?>

        </div>


    </div>
</div>



<script src="js/style.js"></script>
<?php include_once 'include/footer.php'; ?>