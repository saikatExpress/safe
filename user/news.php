<?php include_once 'include/header.php'; ?>

<?php

$db = new DataBase();
if (isset($_GET['n_id'])) {
    $nid = $_GET['n_id'];
    $query = "SELECT * FROM news WHERE id = '$nid'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) {
        $date = date_create($value['n_date']);
        $formateDate = date_format($date, 'd,M-y');

        $time = date_create($value['added_time']);
        $timeFormat = date_format($time, 'h:i a');
    }
}

?>


<div class="container">
    <div class="row">



        <!--Main news body panel start from here--->
        <div class="col-lg-9">
            <div class="main_news_panel">

                <h1 class="news_head">News</h1>

                <div class="news_title">
                    <h4><?php echo $value['title']; ?></h4>
                </div>

                <h3 class="news_desk_panel">
                    <b style="font-size: 15px;">News Desk | </b> <span>Admin | dhaka</span>
                </h3>

                <div class="news_box_icon">
                    <div class="news_time">
                        <span>Release : <i><?php echo $formateDate; ?></i></span> <br>
                        <i><?php echo $timeFormat; ?></i>
                    </div>


                    <div class="social_share">
                        <span>Share with</span>
                        <div class="news_share_icon">
                            <p><a href="https://www.google.com/" target="_blank"><i class="fa fa-google"
                                        aria-hidden="true"></i></a></p>
                            <p><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-official"
                                        aria-hidden="true"></i></a></p>
                            <p><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter-square"
                                        aria-hidden="true"></i></a></p>
                            <p><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"
                                        aria-hidden="true"></i></a></p>
                        </div>
                    </div>
                </div>

                <hr>


                <div class="news_image_block">
                    <div class="images_block_style">
                        <img src="../admin/upload/<?php echo $value['photo']; ?>" alt="no images">
                        <h6>Bhala Khatun</h6>
                    </div>
                </div>

                <div class="news_paragraph">
                    <p>
                        <?php echo $value['n_paragraph']; ?>
                    </p>
                </div>

                <hr>

                <div class="user_comment_news">
                    <div class="comment_form">

                        <!--Comment form HTML code start from here-->
                        <form action="" method="post">
                            <input style="display: none;" type="text" name="u_id" id="u_id"
                                value="<?php echo $_SESSION['id']; ?>">
                            <input style="display: none;" type="text" name="n_id" id="n_id"
                                value="<?php echo $value['id']; ?>">
                            <input type="text" name="comment" id="comment" placeholder="Write your comment...">
                            <input onclick="userComment()" type="button" name="submit" value="Post">
                        </form>
                        <!--Comment form HTML code end from here-->
                        <p id="retrunMsg"></p>

                    </div>


                </div>

                <hr>

                <div class="user_show_comment">

                    <h2 style="font-size: 16px;">All Comment's</h2>

                    <?php

                    $db = new DataBase();
                    if (isset($_GET['n_id'])) {
                        $nid = $_GET['n_id'];
                        $query = "SELECT * FROM news_comment
                        INNER JOIN user_reg ON news_comment.u_id = user_reg.id
                         WHERE n_id = '$nid' ORDER BY cmnt_id DESC";
                        $data = $db->select($query);
                        foreach ($data ?: [] as $value) { ?>
                    <?php

                            ?>
                    <div class="comment_box_style">
                        <div class="comment_user_block">
                            <img src="images/demo.png" alt="no images">
                            <h4>
                                <a
                                    href="userview.php?u_id=<?php echo $value['u_id']; ?>"><?php echo $value['firstname'] . " " . $value['lastname']; ?></a>
                            </h4>
                        </div>
                        <div class="full_comments">
                            <p>
                                <?php echo $value['comment']; ?>
                            </p>
                        </div>
                    </div>
                    <?php }
                    }

                    ?>
                </div>

            </div>
        </div>
        <!--Main news body panel start from here--->

        <!--Right side bar news page start from here-->
        <div class="col-lg-3">
            <div class="right_side_news">

                <div class="advertisement_block">
                    <div class="news_add_block">
                        <a href="">
                            <img src="advertise/ad1.png" alt="no images">
                        </a>
                    </div>

                    <div class="news_add_block">
                        <a href="">
                            <img src="advertise/ad2.jpeg" alt="no images">
                        </a>
                    </div>

                    <div class="news_add_block">
                        <a href="">
                            <img src="advertise/ad3.png" alt="no images">
                        </a>
                    </div>
                </div>


                <div class="read_more_news">
                    <h4>Read More news </h4>
                </div>


            </div>
        </div>
        <!--Right side bar news page end from here-->

    </div>
</div>








<script type="text/javascript" src="js/style.js"></script>
<?php include_once 'include/footer.php'; ?>