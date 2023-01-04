<?php include_once '../library/database.php'; ?>

<?php

$db = new DataBase();

if (isset($_POST['policeSationId1'])) {
    $policeSationId1 = $_POST['policeSationId1'];
    $policeStationKey1 = $_POST['policeStationKey1'];
    $passWord1 = $_POST['passWord1'];
    $adminId1 = $_POST['adminId1'];

    $query = "INSERT INTO thana_admin(police_station_id,police_station_key,police_station_password,u_id)VALUES('$policeSationId1','$policeStationKey1','$passWord1','$adminId1')";

    $data = $db->insert($query);

    if ($data) {
        echo "Success";
    }
}

?>