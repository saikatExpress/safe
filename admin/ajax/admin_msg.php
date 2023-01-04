<?php include_once '../library/database.php'; ?>


<?php

$db = new DataBase();

if (isset($_GET['policeStationSl1'])) {
    $policeStationSl1 = $_GET['policeStationSl1'];


    $query4 = "SELECT * FROM complain_admin_msg
    LEFT JOIN action_complain ON complain_admin_msg.admin_com_id = action_complain.complainId
     WHERE complain_admin_msg.admin_police_station_id = '$policeStationSl1' ORDER BY complain_admin_msg.admin_msg_id DESC";

    $data4 = $db->select($query4);

    if ($data4) {
        foreach ($data4 ?: [] as $value4) { ?>

<?php

            $date = date_create($value4['msg_time']);
            $timeFor = date_format($date, 'h:ia');
            $dateFor = date_format($date, 'd M');

            ?>


<div class="message_box">
    <a href="thana_complain.php?cid=<?= $value4['complainId'] ?>">
        <span>Complain No : <?= $value4['complainId'] ?></span> <span
            class="timeSpan"><?= $dateFor . ',' . $timeFor ?></span>
        <p>
            <?= $value4['admin_msg'] ?>
        </p>
    </a>
</div>

<?php  }
    } else {
        echo "No message available";
    }
}


?>