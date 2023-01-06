<?php include_once '../library/database.php' ?>


<?php

$db = new DataBase();

if (isset($_POST['father1'])) {
    $father1 = $_POST['father1'];
    $mother1 = $_POST['mother1'];
    $school1 = $_POST['school1'];
    $college1 = $_POST['college1'];
    $varsity1 = $_POST['varsity1'];
    $district1 = $_POST['district1'];
    $policestation1 = $_POST['policestation1'];
    $area1 = $_POST['area1'];
    $userID1 = $_POST['userID1'];

    $query = "UPDATE user_profile SET father_name='$father1',mother_name='$mother1',school='$school1',college='$college1',university='$varsity1',district='$district1',police_station='$policestation1',village='$area1' WHERE u_id = '$userID1'";
    $data = $db->update($query);
    if ($data) {
        echo "Update Successfull";
    }
}

?>