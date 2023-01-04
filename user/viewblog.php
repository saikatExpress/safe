<?php include_once 'include/header.php'; ?>



<?php

$db = new DataBase();
if ($_GET['blogId']) {
    $blogId = $_GET['blogId'];

    $query = "SELECT * FROM blogs
    LEFT JOIN user_reg ON blogs.u_id = user_reg.id
    LEFT JOIN profile_pic ON blogs.u_id = profile_pic.u_id
    LEFT JOIN user_profile ON blogs.u_id = user_profile.u_id
     WHERE blog_id = '$blogId'";
    $data = $db->select($query);
    if ($data) {
        foreach ($data ?: [] as $value) {
            $date = $value['added_time'];
            $dateTime = date_create($date);
            $dateFormat = date_format($dateTime, 'd M , y');
            $timeFormat = date_format($dateTime, 'h:i a');
        }
    } else {
        echo "blog has no data";
    }
}

?>


<div class="container">
    <div class="row">


        <div class="col-lg-3">
            <div class="user_more_blog">

                <div class="user_more_blog_head">
                    <h4>
                        <a href="userview.php?u_id=<?php echo $value['u_id']; ?>">
                            <?php echo $value['lastname']; ?>
                            Blog's
                        </a>
                    </h4>
                </div>

                <?php

                $db = new DataBase();
                if (isset($_GET['blogId'])) {
                    $blogId = $_GET['blogId'];

                    $query = "SELECT * FROM blogs WHERE blog_id = '$blogId'";
                    $data = $db->select($query);
                    if ($data) {
                        foreach ($data ?: [] as $value) {


                            $date = $value['added_time'];
                            $dateTime = date_create($date);
                            $dateFormat = date_format($dateTime, 'd M , y');
                            $timeFormat = date_format($dateTime, 'h:i a');
                            $uid = $value['u_id'];



                            $query1 = "SELECT * FROM blogs
                            WHERE blogs.u_id = $uid ORDER BY blog_id DESC LIMIT 10";
                            $data1 = $db->select($query1);
                            if ($data1) {
                                foreach ($data1 ?: [] as $value1) { ?>
                <div class="user_more_blog_info">
                    <a href="viewblog.php?blogId=<?php echo $value1['blog_id']; ?>">
                        <img src="upload/<?php echo $value1['blog_images']; ?>" alt="no images">
                        <h4><?php echo $value1['blog_title']; ?></h4>
                        <p>
                            <?php echo $value1['blog_sub_title']; ?>
                        </p>
                    </a>
                </div>
                <?php }
                            } else {
                                echo "user has no another blog";
                            }
                        }
                    } else {
                        echo "blog has no data";
                    }
                }


                ?>


            </div>
        </div>




        <?php

        $db = new DataBase();
        if ($_GET['blogId']) {
            $blogId = $_GET['blogId'];

            $query = "SELECT * FROM blogs
    LEFT JOIN user_reg ON blogs.u_id = user_reg.id
    LEFT JOIN profile_pic ON blogs.u_id = profile_pic.u_id
    LEFT JOIN user_profile ON blogs.u_id = user_profile.u_id
     WHERE blog_id = '$blogId'";
            $data = $db->select($query);
            if ($data) {
                foreach ($data ?: [] as $value) {
                    $date = $value['added_time'];
                    $dateTime = date_create($date);
                    $dateFormat = date_format($dateTime, 'd M , y');
                    $timeFormat = date_format($dateTime, 'h:i a');
                }
            } else {
                echo "blog has no data";
            }
        }

        ?>

        <div class="col-lg-9">
            <div class="user_blog_info_block">
                <div class="user_blog_read_panel">
                    <div class="user_blog_user_info">
                        <div class="user_info_image">
                            <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                        </div>

                        <div class="user_info_head">
                            <h2>
                                <a href="userview.php?u_id=<?php echo $value['u_id']; ?>">
                                    <?php echo $value['firstname'] . " " . $value['lastname']; ?>
                                </a>
                            </h2>
                            <p>
                                Posted On : <span><?php echo $dateFormat; ?></span>
                            </p>
                            <h6><i class="fa fa-map-marker" aria-hidden="true"></i>
                                <?php echo strtoupper($value['district']); ?>
                            </h6>
                        </div>
                    </div>

                    <hr>

                    <div class="full_blog_read">

                        <div class="read_blog_style">
                            <h1 class="blogHead">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                <?php echo $value['blog_title']; ?>
                            </h1>
                        </div>

                        <div class="read_blog_images">
                            <figure>
                                <img src="upload/<?php echo $value['blog_images']; ?>" alt="no images">
                                <figcaption>
                                    <?php
                                    $cap = $value['img_caption'];
                                    if ($cap == '') {
                                        echo "This image uploaded by user";
                                    } else {
                                        echo $cap;
                                    }
                                    ?>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="read_blog_paragraph">
                            <p>
                                <?php echo $value['blog_paragraph']; ?>
                            </p>
                        </div>

                        <div class="read_blog_images">
                            <figure>
                                <img src="upload1/<?php echo $value['blog_images1']; ?>" alt="no images">
                                <figcaption>
                                    <?php

                                    $cap1 = $value['img_caption1'];

                                    if ($cap1 == '') {
                                        echo "This image uploaded by user";
                                    } else {
                                        echo $cap1;
                                    }

                                    ?>
                                </figcaption>
                            </figure>
                        </div>


                        <div class="read_blog_paragraph">
                            <p>
                                <?php echo $value['blog_conclusion']; ?>
                            </p>
                        </div>

                        <hr>

                        <div class="share_with_blog">
                            <span>Share with : </span>
                            <a href="" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            <a href="" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
                            <a href="" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>

                        <div class="blog_comment">


                            <h6>Write your comment : </h6>




                            <form action="" method="post">
                                <p id="alertmsg" style="display: none;" class="alertMsg"> Please write something...</p>
                                <input style="display: none;" type="text" value="<?php echo $_SESSION['id']; ?>"
                                    name="uid" id="userId">
                                <input style="display: none;" type="text" value="<?php echo $value['blog_id']; ?>"
                                    name="blogid" id="blogId">
                                <input type="text" name="blogComment" id="blogComment"> <br>
                                <button type="button" id="blogButton">Post</button>
                            </form>


                            <div id="successTune" class="successTune">

                            </div>


                        </div>

                        <hr>

                        <div class="view_blog_comment">
                            <h5 style="padding: 6px 8px 10px;">Comment's</h5>


                            <?php

                            $db = new DataBase();
                            if (isset($_GET['blogId'])) {
                                $blid = $_GET['blogId'];
                                $query = "SELECT * FROM blog_comment
                                LEFT JOIN user_reg ON blog_comment.uid = user_reg.id
                                WHERE blog_comment.blogid = '$blid' ORDER BY blog_comment.blog_cmnt_id DESC";
                                $data = $db->select($query);
                                if ($data) {
                                    foreach ($data ?: [] as $value) { ?>
                            <div class="blog_comment_panel">
                                <div class="blog_user_images">
                                    <img src="images/demo.png" alt="no images">
                                </div>
                                <div class="blog_user_det">
                                    <h4><?php echo $value['firstname'] . " " . $value['lastname']; ?></h4>
                                    <p>
                                        <?php echo $value['blog_cmnt']; ?>
                                    </p>
                                </div>
                            </div>
                            <?php }
                                } else {
                                    echo "Blog has no comment";
                                }
                            } else {
                                echo "Please get an id";
                            }


                            ?>



                        </div>


                        <hr>

                    </div>

                </div>
            </div>
        </div>


    </div>
</div>


<script>
var blogButton = document.getElementById("blogButton");
blogButton.addEventListener("click", function() {
    var userId = document.getElementById("userId").value;
    var blogId = document.getElementById("blogId").value;
    var blogComment = document.getElementById("blogComment").value;
    var alertmsg = document.getElementById("alertmsg");
    var msgBox = document.getElementById("successTune");


    var dataSet = "blogId1=" + userId + "&userId1=" + blogId + "&blogComment1=" + blogComment;

    if (blogComment == '') {
        alertmsg.style.display = "block";
    } else {
        $.ajax({
            type: "POST",
            url: 'ajax/blogcomment.php',
            data: dataSet,
            success: function(html) {
                msgBox.innerHTML = html;
            }
        })
    }


});
</script>




<script src="js/style.js"></script>
<?php include_once 'include/footer.php'; ?>