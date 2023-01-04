<?php include_once '../library/database.php'; ?>

<?php

$db = new DataBase();
if (isset($_POST['userId1'])) {
    $userId1 = $_POST['userId1'];
    $blogId1 = $_POST['blogId1'];
    $blogComment1 = $_POST['blogComment1'];

    $query = "INSERT INTO blog_comment(blogid,uid,blog_cmnt)
    VALUES('$userId1','$blogId1','$blogComment1')";
    $data = $db->insert($query);
    if ($data) { ?>
<p>
    <?php echo "Comment posted"; ?>
</p>
<?php } else {
        echo "Something Wrong";
    }
}


?>