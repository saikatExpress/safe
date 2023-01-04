<?php include_once 'include/header.php'; ?>

<?php

$db = new DataBase();
if (isset($_GET['blogId'])) {
    $blogId = $_GET['blogId'];
    $query = "SELECT * FROM blogs
LEFT JOIN user_reg ON user_reg.id = blogs.u_id
LEFT JOIN profile_pic ON profile_pic.u_id = blogs.u_id
WHERE blogs.blog_id = '$blogId'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) {
    }
}

?>


<div class="blog_header">
    <div class="blog_header_panel">
        <button type="button" id="approved">Approve..?</button>
    </div>
</div>

<form style="display: none;" action="" method="post">
    <input type="text" name="blogid" id="blogid" value="<?php echo $value['blog_id']; ?>">
    <input type="text" name="uid" id="uid" value="<?php echo $value['u_id']; ?>">
    <input type="text" name="aid" id="aid" value="<?php echo $_SESSION['id']; ?>">
</form>

<script>
var approved = document.getElementById("approved");
approved.addEventListener("click", function() {
    approved.innerHTML = "Success";
    var blogid = document.getElementById("blogid").value;
    var uid = document.getElementById("uid").value;
    var aid = document.getElementById("aid").value;
    var dataFlow = "blogid1=" + blogid + "&uid1=" + uid + "&aid1=" + aid;

    $.ajax({
        type: "POST",
        url: "ajax/bloglist.php",
        data: dataFlow,
        success: function(html) {
            alert(html);
        }
    })
})
</script>

<div class="blog_view_block">
    <div class="blog_post_block">
        <div class="blog_post_images">
            <img src="../user/upload/<?php echo $value['images']; ?>" alt="no images">
        </div>

        <div class="blog_post_images">
            <h2><?php echo $value['firstname'] . " " . $value['lastname']; ?></h2>
            <p>
                <i class="fa fa-map-marker" aria-hidden="true"></i> Netrakona
            </p>
            <span><i class="fa fa-clock-o" aria-hidden="true"></i> 22 Nov,22 10.48pm</span>
        </div>
    </div>
</div>

<div class="read_blog_panel">
    <div class="read_blog_blok">

        <div class="read_block_style_panel">
            <h4> <i class="fa fa-hand-o-right" aria-hidden="true"></i> <?php echo $value['blog_title']; ?> </h4>
        </div>

        <div class="read_block_style_panel">
            <figure>
                <img src="../user/upload/<?php echo $value['blog_images'] ?>" alt="no images">
                <figcaption>Caption : </figcaption>
            </figure>
        </div>


        <div class="read_block_style_panel">
            <p>
                <?php echo $value['blog_paragraph']; ?>
            </p>
        </div>

        <div class="read_block_style_panel">
            <figure>
                <img src="../user/upload1/<?php echo $value['blog_images1']; ?>" alt="no images">
                <figcaption>Caption : </figcaption>
            </figure>
        </div>

        <div class="blog_sub_title">
            <p>
                <?php echo "''" . $value['blog_sub_title'] . "''" ?>
            </p>
        </div>

        <div class="read_block_style_panel">
            <p>
                <?php echo $value['blog_conclusion']; ?>
            </p>
        </div>

    </div>
</div>



<div class="also_read_blog">

    <div class="also_read_blog_title">
        <h6>Also Read</h6>
    </div>




    <div class="also_read_display">
        <?php

        $db = new DataBase();
        $query = "SELECT * FROM blogs";
        $data = $db->select($query);
        if ($data) {
            foreach ($data ?: [] as $value) { ?>

        <?php

                $blogSub = $value['blog_sub_title'];
                $blogString = substr($blogSub, 0, 300);

                ?>
        <div class="also_read_panel">
            <a href="">
                <img src="../user/upload/<?php echo $value['blog_images']; ?>" alt="no images">
                <h4>
                    <?php echo $value['blog_title']; ?>
                </h4>
            </a>
            <p>
                <?php echo $blogString; ?>
            </p>
        </div>

        <?php  }
        } else {
            echo "no blogs available";
        }



        ?>



    </div>

</div>




<?php include_once 'include/footer.php'; ?>