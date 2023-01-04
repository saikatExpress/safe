<?php include_once '../library/database.php'; ?>

<?php

$db = new DataBase();


if (isset($_POST['uId'])) {
    $uid = $_POST['uId'];
    $aid = $_POST['aId'];
    $cmnt = $_POST['cmnt'];

    $query = "INSERT INTO activity_comment(u_id,a_id,a_comment)VALUES('$uid','$aid','$cmnt')";
    $data = $db->insert($query);
    if ($data) { ?>
<p>
    <?php echo "Comment posted"; ?>
</p>

<?php }
}


?>