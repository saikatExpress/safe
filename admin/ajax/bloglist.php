<?php

use Sabberworm\CSS\Property\Selector;

include_once '../library/database.php'; ?>

<?php

$db = new DataBase();
if (isset($_POST['blogid1'])) {
    $blogid1 = $_POST['blogid1'];
    $uid1 = $_POST['uid1'];
    $aid1 = $_POST['aid1'];

    $query = "INSERT INTO  approve_blog(blogid,uid,u_id)
    VALUES('$blogid1','$uid1','$aid1')";
    $data = $db->insert($query);
    if ($data) {
        echo "Approved";
    }
}

?>