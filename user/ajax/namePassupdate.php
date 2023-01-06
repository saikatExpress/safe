<?php include_once '../library/database.php'; ?>


<?php

$db = new DataBase();

if (isset($_POST['firstname1'])) {
    $firstname1 = $_POST['firstname1'];
    $lastname1 = $_POST['lastname1'];
    $userpass1 = $_POST['userpass1'];
    $userId1 = $_POST['userId1'];

    $query = "UPDATE user_reg SET firstname='$firstname1' , lastname='$lastname1',password='$userpass1',conpass='$userpass1' WHERE id = '$userId1'";
    $data = $db->update($query);
    if ($data) {
        echo "Successfully update";
    } else {
        echo "Something wrong";
    }
}


?>