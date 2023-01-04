<?php include_once '../library/database.php'; ?>



<?php

$db = new DataBase();


if (isset($_POST['uid1'])) {

    $uid = $_POST['uid1'];
    $nid = $_POST['nid1'];
    $cmnt = $_POST['comment1'];

    $query = "INSERT INTO news_comment(u_id,n_id,comment)
VALUES('$uid','$nid','$cmnt')";
    $data = $db->insert($query);
    if ($data) { ?>
<p>
    <?php echo "Comment post successfully"; ?>
</p>

<?php }
}


?>