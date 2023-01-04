<?php include_once '../library/database.php'; ?>


<?php


$db = new DataBase();

if (isset($_POST['complainId1'])) {
    $complainId1 = $_POST['complainId1'];
    $policeStationId1 = $_POST['policeStationId1'];
    $userId1 = $_POST['userId1'];
    $adminid1 = $_POST['adminid1'];
    $adminFeed1 = $_POST['adminFeed1'];

    $query = "INSERT INTO complain_admin_msg(admin_com_id,admin_police_station_id,user_sl,admin_ID,admin_msg)VALUES('$complainId1','$policeStationId1','$userId1','$adminid1','$adminFeed1')";

    $data = $db->insert($query);
    if ($data) { ?>
<span>Message Sent</span>
<?php } else { ?>
<span class="div1">Message Failed</span>
<?php }
}


?>