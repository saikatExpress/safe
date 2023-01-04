<?php include_once 'library/database.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $db = new DataBase();


    if (isset($_POST['actionForm'])) {
        $comCategory = $_POST['comCategory'];
        $complainId = $_POST['complainId'];
        $police_station_id = $_POST['police_station_id'];
        $adminId = $_POST['adminId'];

        $query = "INSERT  INTO action_complain(complain_category,complainId,police_station_id,u_id)VALUES('$comCategory','$complainId','$police_station_id','$adminId')";

        $data = $db->insert($query);

        if ($data) {
            header("Location: index.php");
        }
    }



    ?>
</body>

</html>