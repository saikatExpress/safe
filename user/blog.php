<?php include_once 'include/header.php'; ?>



<div class="container">
    <div class="row">


        <div class="col-lg-3">
            <div class="user_side_blog">
                <div class="blog_list_blk">

                    <div class="blog_list_bio">
                        <p>
                            <a href="blog_list.php">Blog List</a>
                        </p>
                    </div>

                    <div class="blog_list_bio">
                        <p>
                            <a href="manage_blog.php">Manage your blog</a>
                        </p>
                    </div>

                    <div class="blog_list_bio">
                        <p>
                            <a href="approve_blog.php">Approved blog</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-lg-9">
            <div class="blog_form_blck">
                <div class="blog_form_blk_style">
                    <div class="create_blog_head">
                        <h4 id="s">Create Your Blog</h4>
                    </div>



                    <?php

                    $db = new DataBase();

                    if (isset($_POST['blogBtn'])) {


                        $title = $_POST['title'];
                        $subtitle = $_POST['subtitle'];

                        //For first image Code
                        $permitted = array('jpg', 'jpeg', 'png', 'gif');
                        $images = $_FILES['images']['name'];
                        $ima_size = $_FILES['images']['size'];
                        $img_temp = $_FILES['images']['tmp_name'];

                        $div = explode('.', $images);
                        $file_text = strtolower(end($div));
                        $unique_pic = substr(md5(time()), 0, 10) . '.' . $file_text;
                        $uploaded_pic = "upload/" . $unique_pic;

                        $caption = $_POST['caption'];

                        //For second image code
                        $permitted = array('jpg', 'jpeg', 'png', 'gif');
                        $image2 = $_FILES['image2']['name'];
                        $image2_size = $_FILES['image2']['size'];
                        $img1_temp = $_FILES['image2']['tmp_name'];

                        $div1 = explode('.', $image2);
                        $file_text1 = strtolower(end($div1));
                        $unique_pic1 = substr(md5(time()), 0, 10) . '.' . $file_text1;
                        $uploaded_pic1 = "upload1/" . $unique_pic1;

                        $caption1 = $_POST['caption1'];

                        $blogpara = $_POST['blogpara'];
                        $blogend = $_POST['blogend'];
                        $uId = $_SESSION['id'];

                        if ($unique_pic == '') {
                            echo "Please select an image";
                        }

                        if ($unique_pic1 == '') {
                            $unique_pic1;
                        } else {
                            $unique_pic1;
                        }

                        move_uploaded_file($img_temp, $uploaded_pic);
                        move_uploaded_file($img1_temp, $uploaded_pic1);
                        $query = "INSERT INTO blogs(blog_title,blog_sub_title,blog_images,img_caption,blog_images1,img_caption1,blog_paragraph,blog_conclusion,u_id)VALUES('$title','$subtitle','$unique_pic','$caption','$unique_pic1','$caption1','$blogpara','$blogend','$uId')";
                        $data = $db->insert($query);
                        if ($data) { ?>
                    <p class="success_msg" id="success_msg">
                        <?php echo "blog successfully posted"; ?> <span id="close" class="msg_bar">&times;</span>
                    </p>
                    <?php }
                    }

                    ?>

                    <div style="display: none;" id="blogContent" class="blog_content_form">
                        <form autocomplete="off" action="" method="post" enctype="multipart/form-data">

                            <div class="blog_blk">
                                <label for="title">Blog title : </label> <br>
                                <input type="text" name="title" id="title"> <br>
                            </div>

                            <div class="blog_blk">
                                <label for="subtitle">Add Sub Tilte : </label> <br>
                                <input type="text" name="subtitle" id="subtitle"> <br>
                            </div>



                            <div class="blog_blk">
                                <label for="image">Add Photos : </label> <br>
                                <input type="file" name="images" id="images"> <br>
                            </div>

                            <div class="blog_blk">
                                <label for="caption">Add Photos Caption : </label> <br>
                                <input type="text" name="caption" id="caption"> <br>
                            </div>




                            <div class="add_more_img">
                                <label for="addMore">Add more image(Max 3) : </label> <br>
                                <button type="button" name="addMore" id="addMore">Add <i class="fa fa-plus"
                                        aria-hidden="true"></i>
                                </button>

                                <div class="add_more_class" id="addMoreImg" style="display: none;">
                                    <label for="image2">Add photos : </label> <br>
                                    <input type="file" name="image2" id="image2">

                                    <div class="blog_blk">
                                        <label for="caption1">Add Photos Caption : </label> <br>
                                        <input type="text" name="caption1" id="caption1"> <br>
                                    </div>

                                </div>



                            </div>




                            <div class="blog_blk">
                                <label for="blogpara">Add blog paragraph : </label> <br>
                                <textarea name="blogpara" id="blogpara" cols="30" rows="10"
                                    placeholder="Write here"></textarea>
                            </div>

                            <div class="blog_blk">
                                <label for="blogend">Add blog Conclusion : </label> <br>
                                <textarea name="blogend" id="blogend" cols="30" rows="5"
                                    placeholder="Write here"></textarea>
                            </div>

                            <div class="blog_blk">
                                <label for="submit">Click for post : </label> <br>
                                <input type="submit" name="blogBtn" id="blogBtn" value="Save">
                            </div>


                        </form>
                    </div>

                </div>

            </div>

            <div>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur numquam provident
                    debitis, alias quo rerum voluptatibus deserunt et error non incidunt ut nemo earum
                    accusantium quia praesentium illo doloremque blanditiis sint dolores amet velit dicta. Odit
                    perspiciatis consequuntur soluta, consequatur quam voluptates voluptatem tempora deserunt
                    voluptatibus obcaecati iure quis libero quaerat suscipit ad reiciendis incidunt, numquam,
                    vitae modi eligendi eum sequi exercitationem facilis. Laborum, rem omnis non, libero
                    repellendus porro corrupti impedit amet obcaecati iusto, labore enim nisi! Consectetur nemo
                    facere, doloremque dolorem error architecto, in eos unde, id cumque quod quaerat nobis
                    sapiente repudiandae similique odit ipsam molestias odio?
                </p>
            </div>

        </div>

    </div>
</div>

<script type="text/javascript" src="js/style.js"></script>
<?php include_once 'include/footer.php'; ?>

<script>
var s = document.getElementById("s");
s.addEventListener("click", function() {
    var blogContent = document.getElementById("blogContent");
    if (blogContent.style.display === 'none') {
        blogContent.style.display = 'block';
    } else {
        blogContent.style.display = 'none';
    }
})
</script>

<script>
var addMore = document.getElementById("addMore");
addMore.addEventListener('click', function() {
    var addMoreImg = document.getElementById("addMoreImg");
    if (addMoreImg.style.display === 'none') {
        addMoreImg.style.display = "block";
    } else {
        addMoreImg.style.display = 'none';
    }
})
</script>

<script>
var close = document.getElementById("close");
close.addEventListener("click", function() {
    var success_msg = document.getElementById("success_msg");
    success_msg.style.display = "none";
});
</script>