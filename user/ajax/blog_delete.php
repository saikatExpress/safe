<?php include_once '../library/database.php'; ?>


<?php

$db = new DataBase();
if (isset($_POST['blogId'])) {
    $blogId = $_POST['blogId'];
    $query = "DELETE FROM blogs WHERE blog_id = '$blogId'";
    $data = $db->delete($query);
    if ($data) {
        echo "Ok";
    }
}


?>