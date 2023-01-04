<?php include_once 'include/header.php'; ?>








<div class="pending_block">
    <h2 class="succHead">Pending List</h2>
    <span></span>
    <?php

    $db = new DataBase();

    $query = "SELECT * FROM action_complain WHERE complain_category = 'fireservice'";

    $data = $db->select($query);

    foreach ($data ?: [] as $value) {
        $comID = $value['complainId'];
        $polID = $value['police_station_id'];



        $query1 = "SELECT * FROM complains
LEFT JOIN user_reg ON complains.u_id = user_reg.id 
LEFT JOIN complain_feedback ON complains.c_id = complain_feedback.com_id
WHERE complains.c_id = '$comID' ORDER BY complains.c_id DESC ";

        $data1 = $db->select($query1);
        foreach ($data1 ?: [] as $value1) {
            $date = date_create($value1['complain_time']);
            $dateFormat = date_format($date, 'd M');
            $timeFormat = date_format($date, 'h.ia');
            $comFeed = $value1['com_id'];

            if ($comID != $comFeed) { ?>
    <div class="complain_user_details">
        <div class="my_color">
            <p>
                <?= $timeFormat ?>
            </p>
            <p>
                <?= $dateFormat ?>
            </p>
        </div>
        <h4><?= $value1['firstname'] . ' ' . $value1['lastname'] ?></h4>
        <h2><?= $value1['mobile'] ?></h2>
        <mark class="mark_div">Pending</mark>
        <h5><a href="action_view.php?c_id=<?= $comID ?>">View</a></h5>

    </div>
    <?php }
        }
    }



    ?>



</div>





<?php include_once 'include/footer.php'; ?>