<?php include_once 'include/header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="blog_history">
                <h4 class="blog_head_tit">Your blog list</h4>
                <div class="all_blog_list">


                    <div class="month_blog_list">
                        <button type="button" id="january">January</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="february">February</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="march">March</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="april">April</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="may">May</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="june">June</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="july">July</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="august">August</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="september">September</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="october">October</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="november">November</button>
                    </div>

                    <div class="month_blog_list">
                        <button type="button" id="december">December</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="total_blck_area">
                <div class="blog_history_panel">
                    <h2>Blog history</h2>
                </div>
                <div class="today_blog_area">
                    <h2 class="blog_btn">Your Blog</h2>
                    <div class="blog_demo">

                        <?php

                        $db = new DataBase();
                        $uid = $_SESSION['id'];
                        $query = "SELECT * FROM blogs WHERE u_id = '$uid' ORDER BY blog_id DESC";
                        $data = $db->select($query);
                        if ($data) {
                            foreach ($data ?: [] as $value) { ?>
                        <?php

                                $date = $value['added_time'];
                                $fullDate = date_create($date);
                                $dateFormat = date_format($fullDate, 'M d, y');
                                $timeFormat = date_format($fullDate, 'h.i a');

                                ?>
                        <div class="blog_demo_blck">
                            <p>
                                <a href="blog_view.php?blg_id=<?php echo $value['blog_id']; ?>">You Create a Post on
                                    <span><?php echo $dateFormat; ?> at
                                        <?php echo $timeFormat; ?>
                                    </span>
                                </a>



                                <a onclick="return confirm('are you sure..?')" style="margin-left: 270px;"
                                    href="delete_blog.php?blgId=<?php echo $value['blog_id']; ?>">Delete</a>



                            </p>
                        </div>
                        <?php }
                        } else {
                            echo "You have no blogs";
                        }

                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="js/style.js"></script>
<?php include_once 'include/footer.php'; ?>