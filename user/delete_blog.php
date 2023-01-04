<?php include_once 'library/database.php'; ?>


<?php

$db = new DataBase();

if (isset($_GET['blgId'])) {
    $blgId = $_GET['blgId'];

    $query = "DELETE blogs,approve_blog FROM blogs
    LEFT JOIN approve_blog ON blogs.blog_id = approve_blog.blogid
     WHERE blogs.blog_id = '$blgId'";
    $data = $db->delete($query);
    if ($data) {
        header('Location: blog_list.php');
        echo "Deleted";
    }
}

?>