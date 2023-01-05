<?php include_once '../library/database.php'; ?>


<?php

$db = new DataBase();

if (isset($_POST['polId1'])) {
    $polId1 = $_POST['polId1'];
    $upKey1 = $_POST['upKey1'];
    $upPass1 = $_POST['upPass1'];

    $query = "UPDATE thana_admin SET police_station_key = '$upKey1', police_station_password = '$upPass1' WHERE police_station_id = '$polId1'";

    $data = $db->update($query);

    if ($data) {
        echo "Update Successfully";
    } else {
        echo "Something Wrong";
    }
}

?>