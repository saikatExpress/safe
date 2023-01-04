<?php include_once 'include/header.php'; ?>




<div class="user_rqst_blog">
    <div class="rqst_blog_blck">


        <div class="blog_panel_head">
            <h2>User Blog</h2>
        </div>


        <?php

        $db = new DataBase();
        $query = "SELECT * FROM blogs
        LEFT JOIN user_reg ON blogs.u_id = user_reg.id
        LEFT JOIN approve_blog ON blogs.blog_id = approve_blog.blogid
         ORDER BY blogs.blog_id DESC";
        $data = $db->select($query);
        if ($data) {
            foreach ($data ?: [] as $value) { ?>

        <?php

                $blgid = $value['blogid'];
                $blid = $value['blog_id'];
                $date = $value['added_time'];
                $dateTime = date_create($date);
                $dateFormat = date_format($dateTime, 'd M,y');
                $timeFormat = date_format($dateTime, 'h.i a');

                $text = $value['blog_sub_title'];
                $textFromat = substr($text, 0, 400);

                ?>
        <div class="rqst_blog_panel">


            <div class="rqst_panel_block_img">
                <img src="../user/upload/<?php echo $value['blog_images']; ?>" alt="no image">
            </div>

            <div class="rqst_panel_block_info">
                <h2>
                    <a href="blog_view.php?blogId=<?php echo $value['blog_id']; ?>"><?php echo $value['blog_title']; ?>
                    </a>
                </h2>
                <span>Posted by <?php echo $value['firstname'] . " " . $value['lastname']; ?></span> <br>
                <b><?php echo $dateFormat; ?> - <?php echo $timeFormat; ?></b>
                <p>
                    <?php echo $textFromat . "..."; ?>
                </p>


                <div class="blog_button">
                    <button type="button" id="approved">
                        <?php

                                if ($blgid == $blid) {
                                    echo "Approved";
                                } else {
                                    echo "Pending";
                                }

                                ?>
                    </button>
                    <button>
                        <a href="blog_view.php?blogId=<?php echo $value['blog_id']; ?>">View</a>
                    </button>
                </div>

            </div>

        </div>

        <?php  }
        } else {
            echo "No blogs available";
        }

        ?>








    </div>
</div>



<script src="js/admin.js"></script>
<?php include_once 'include/footer.php'; ?>