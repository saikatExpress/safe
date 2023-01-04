<?php include_once 'include/header.php'; ?>




<div class="pending_block">

    <?php

    $db = new DataBase();

    $query2 = "SELECT COUNT('complain_rep_id') AS REPID FROM complain_feedback WHERE complain_categories = 'police'";
    $data2 = $db->select($query2);
    foreach ($data2 ?: [] as $value2) {
    }


    ?>

    <h2 class="succHead">
        Success List
        <span><?= $value2['REPID'] ?></span>
    </h2>
    <?php

    $db = new DataBase();

    $query = "SELECT * FROM complain_feedback";

    $data = $db->select($query);

    foreach ($data ?: [] as $value) {
        $comID = $value['com_id'];
        $polID = $value['pol_id'];



        $query1 = "SELECT * FROM complains
LEFT JOIN user_reg ON complains.u_id = user_reg.id 
WHERE complains.c_id = '$comID' ORDER BY complains.c_id DESC ";

        $data1 = $db->select($query1);
        foreach ($data1 ?: [] as $value1) { ?>
    <?php

            $date = date_create($value1['complain_time']);
            $dateFormat = date_format($date, 'd M');
            $timeFormat = date_format($date, 'h.ia');
            //$comFeed = $value1['com_id'];

            ?>

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
        <mark class="mark_div">Success</mark>
        <h5><a href="action_view.php?c_id=<?= $comID ?>">View</a></h5>

    </div>

    <?php  }
    }



    ?>



</div>




<?php include_once 'include/footer.php'; ?>