<?php include_once 'include/header.php'; ?>

<?php

$db = new DataBase();
if (isset($_GET['blg_id'])) {
    $blgId = $_GET['blg_id'];
    $query = "SELECT * FROM blogs WHERE blog_id = '$blgId'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) {
        $date = $value['added_time'];
        $dateTime = date_create($date);
        $dateFormat = date_format($dateTime, "d M , y");
        $timeFormat = date_format($dateTime, "h.i a");
    }
}

?>

<div class="container">
    <div class="row">

        <div class="col-lg-3">
            <div class="blog_view_user">
                <div class="blog_action_button">
                    <form style="width: 90%;" action="" method="post">
                        <button id="blogDelete" type="button">Delete Post</button>
                        <button type="button">Edit Post</button>
                    </form>
                </div>
            </div>
        </div>


        <script>
        var blogDelete = document.getElementById("blogDelete");
        blogDelete.addEventListener("click", function() {
            var blgid = document.getElementById("blgid").innerHTML;
            var queryData = "blogId=" + blgid;
            $.ajax({
                type: "POST",
                data: queryData,
                url: 'ajax/blog_delete.php',
                success: function(html) {
                    alert(html);
                }
            })
        })
        </script>

        <div class="col-lg-9">
            <h1>Your Blog</h1>
            <div class="full_blog_info">
                <div class="blog_blk_head">
                    <h1 id="blgid" style="display: none;"><?php echo $value['blog_id']; ?></h1>
                    <h2><?php echo $value['blog_title']; ?></h2>
                    <span><?php echo $dateFormat; ?></span> <br>
                    <i><?php echo $timeFormat; ?></i>
                </div>

                <div class="blog_blck_img">
                    <img src="upload/<?php echo $value['blog_images']; ?>" alt="no images">
                </div>

                <div class="blog_blck_para">
                    <p>
                        <?php echo $value['blog_paragraph']; ?>
                    </p>
                </div>

                <div class="blog_blck_img">
                    <img src="upload1/<?php echo $value['blog_images1']; ?>" alt="no images">
                </div>


                <div class="blog_blck_para">
                    <p>
                        <?php echo $value['blog_conclusion']; ?>
                    </p>
                </div>

            </div>
        </div>


    </div>
</div>

<script src="js/style.js"></script>
<?php include_once 'include/footer.php'; ?>