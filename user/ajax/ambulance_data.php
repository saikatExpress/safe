<?php include_once '../library/database.php'; ?>


<?php

$db = new DataBase();
if (isset($_POST['complain1'])) {
    $cat1 = $_POST['cat1'];
    $complain1 = $_POST['complain1'];
    $location = $_POST['location'];
    $latitude1 = $_POST['latitude1'];
    $longitude1 = $_POST['longitude1'];
    $uid1 = $_POST['uid1'];

    $query = "INSERT INTO complains(category,problems,locations,latitude,longitude,u_id)
    VALUES('$cat1','$complain1','$location','$latitude1','$longitude1','$uid1')";
    $data = $db->insert($query);

    if ($data) {
        echo "Message Sent";
    } else {
        echo "Something wrong";
    }
}

?>