<?php include_once 'include/header.php'; ?>
<section class="header_content">
    <div class="container">
        <div class="row" style="background: #fff; height:auto;border-radius:2px;">

            <!--Main body start from-->
            <div class="col-lg-9">
                <div class="notice_board">
                    <h4>সর্তকবাণী <i style="color: red;" class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    </h4>
                    <ul>
                        <li>কেউ অযথা অভিযোগ করবেন না ।</li>
                        <li>ঝুকিপূর্ণ এলাকা এড়িয়ে চলুন ।</li>
                        <li>মোবাইলে সবসময় ডাটা রাখার চেষ্টা করুন।</li>
                        <li>নিজেকে সব পরিস্থিতিতে শান্ত রাখার চেষ্টা করুন।</li>
                        <li>তাড়াহুড়া না করে অভিযোগ বক্সে অভিযোগ লিখে সাবমিট বাটন ক্লিক করুন।</li>
                    </ul>
                </div>

                <div class="news red">
                    <strong>খবর : </strong>
                    <ul>

                        <?php

                        $db = new DataBase();
                        $query = "SELECT * FROM news ORDER BY id DESC LIMIT 6";
                        $data = $db->select($query);
                        foreach ($data ?: [] as $value) { ?>
                        <li><a href="news.php?n_id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
                        </li>
                        <?php   }


                        ?>
                    </ul>
                    <span><a href="">সকল</a></span>
                </div>

                <div class="all-emergency-number">
                    <h4 class="hotline">হটলাইন</h4>
                    <div class="hotline-number">
                        <img src="images/police.jpg" alt="no-images">
                        <h4>Bangladesh Police</h4>
                        <h2>999</h2>
                        <h6><a href="https://www.police.gov.bd/" target="_blank">Visit Website</a></h6>
                    </div>

                    <div class="hotline-number">
                        <img src="images/fireService.png" alt="no-images">
                        <h4>Fire Service</h4>
                        <h2>102</h2>
                        <h6><a href="http://www.fireservice.gov.bd/" target="_blank">Visit Website</a></h6>
                    </div>

                    <div class="hotline-number">
                        <img src="images/Dudok.png" alt="no-images">
                        <h4>বাংলাদেশ দুদক</h4>
                        <h2>106</h2>
                        <h6><a href="http://acc.org.bd/" target="_blank">Visit Website</a></h6>
                    </div>


                    <div class="hotline-number">
                        <img src="images/Rapid_Action_Battalion_BD_Coat_of_arms.svg.png" alt="no-images">
                        <h4>Bangladesh Rab</h4>
                        <h2>100</h2>
                        <h6><a href="https://www.rab.gov.bd/" target="_blank">Visit Website</a></h6>
                    </div>

                    <div class="hotline-number">
                        <img src="images/SC_USA_Logo_RedBlack_Stacked-003.jpg" alt="no-images">
                        <h4>Save Children</h4>
                        <h2>109</h2>
                        <h6><a href="https://bangladesh.savethechildren.net/" target="blank">Visit Website</a></h6>
                    </div>


                    <div class="hotline-number">
                        <img src="images/election.png" alt="no-images">
                        <h4>Election Board</h4>
                        <h2>105</h2>
                        <h6><a href="http://www.ecs.gov.bd/" target="_blank">Visit Website</a></h6>
                    </div>

                    <div class="hotline-number">
                        <img src="images/abulance.jpg" alt="no-images">
                        <h4>Ambulance Service</h4>
                        <h2>999</h2>
                        <h6><a href="https://ambulanceservicebangladesh.com/" target="_blank">Visit Website</a></h6>
                    </div>

                    <div class="hotline-number">
                        <img src="images/Bangladesh_road_sign_A20.svg" alt="no-images">
                        <h4>Bangladesh Traffic</h4>
                        <h2>9575501</h2>
                        <h6><a href="https://dmp.gov.bd/contact-us/" target="_blank">Visit Website</a></h6>
                    </div>
                </div>


                <!--Recent Activities html code start from here-->
                <div class="recent_activities">
                    <div class="recent_area_code">
                        <h4>Recent Activities</h4>
                    </div>
                    <?php

                    $db = new DataBase();
                    $query = "SELECT * FROM activities ORDER BY id DESC LIMIT 6";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $value) { ?>

                    <?php

                        $date = date_create($value['a_date']);
                        $dateFormat = date_format($date, 'd M Y');

                        ?>

                    <div class="activities_details">
                        <h4 class="Para_head"><?php echo $value['title']; ?></h4>
                        <figure>
                            <img src="../admin/upload/<?php echo $value['photos']; ?>" alt="no images">
                            <figcaption>ঢাকা, <?php echo $dateFormat; ?></figcaption>
                        </figure>
                        <p class="para_text">
                            <?php echo $value['paragraph']; ?>
                        </p>
                        <a class="para_link" href="activity.php?a_id=<?php echo $value['id']; ?>">Details</a>
                    </div>
                    <?php   }

                    ?>
                </div>

                <!--Recent Activities html code end from here-->
            </div>
            <!--Main body end here-->




            <!--Side body HTML code here-->
            <div class="col-lg-3">
                <div class="image_card_box">
                    <h4>মাননীয় রাষ্ট্রপতি</h4>
                    <img src="images/Bangladesh-president-Abdul-Hamid.jpg" alt="no images">
                    <h3>Abdul Hamid Khan</h3>
                    <h5>President of Bangladesh</h5>
                    <p><a href="http://bdhcdelhi.org/president.html" target="_blank">বিস্তারিত</a></p>
                </div>

                <div class="image_card_box">
                    <h4>মাননীয় প্রধানমন্ত্রী</h4>
                    <img src="images/images.jpg" alt="no images">
                    <h3>Sheikh Hasina</h3>
                    <h5>Prime Minister of Bangladesh</h5>
                    <p><a href="https://en.wikipedia.org/wiki/Sheikh_Hasina" target="_blank">বিস্তারিত</a></p>
                </div>

                <div class="image_card_box">
                    <h4>মাননীয় তথ্যমন্ত্রী</h4>
                    <img src="images/Dr.Hasan-Mahmud.jpg" alt="no images">
                    <h3>Dr . Hasan Mahmud</h3>
                    <h5>Information Minister of Bangladesh</h5>
                    <p><a href="https://tritiyomatra.com/profile/92" target="_blank">বিস্তারিত</a></p>
                </div>

                <!--Animated sidebar html code start from here-->
                <div class="animated_sidebar">
                    <div class="project_activites_list">
                        <div class="list_item">
                            <a href="https://www.police.gov.bd/en/press_release" target="_blank">Press Release</a>
                            <img src="icon/btLkgP7ZYixPpI1jfFlYG1qBMVp7qBp57Vh2ovrI.png" alt="no images">
                        </div>

                        <div class="list_item">
                            <a href="">RAB Actions</a>
                            <img src="icon/police-info_file844111724.png" alt="no images">
                        </div>

                        <div class="list_item">
                            <a href="">MagaZine as</a>
                            <img src="icon/detective.png" alt="no images">
                        </div>

                        <div class="list_item">
                            <a href="">Crime Portal</a>
                            <img src="icon/crime.jpeg" alt="no images">
                        </div>
                    </div>
                </div>

                <!--Events HTML code start from here-->
                <div class="event_news">
                    <div class="event-block">
                        <h4 class="shadow-md event_head">
                            Event <i style="color: #3707e6; margin-left:95px" class="fa fa-calendar"
                                aria-hidden="true"></i>
                        </h4>


                        <?php

                        $db = new DataBase();

                        $query3 = "SELECT * FROM admin_event ORDER BY start_date DESC LIMIT 4";

                        $data3 = $db->select($query3);

                        if ($data3) {
                            foreach ($data3 ?: [] as $value3) { ?>
                        <?php

                                $startDate = date_create($value3['start_date']);
                                $startDayFormat = date_format($startDate, 'd');
                                $startMonthFormat = date_format($startDate, 'F');
                                $start_time = date_create($value3['start_time']);
                                $startTimeFormat = date_format($start_time, 'h.ia');

                                ?>


                        <div class="event_control">
                            <div class="event_date">
                                <h6><?= $startDayFormat ?></h6>
                                <h5><?= $startMonthFormat ?></h5>
                            </div>
                            <div class="event_title">
                                <h4><?= substr($value3['event_title'], 0, 15) ?></h4>
                                <p>
                                    This event starting at sharp <b
                                        style="font-size: 10px;color:blue;"><?= $startTimeFormat ?></b>.
                                </p>
                                <h6><a href="view_event.php?e_id=<?= $value3['event_id'] ?>">View</a></h6>
                            </div>
                        </div>

                        <?php  }
                        } else {
                            echo "No running event's yet";
                        }


                        ?>






                    </div>
                </div>
                <!--Events HTML code end from here-->


            </div>
            <!--Side body HTML code end here...-->

        </div>
</section>


<!--New blog HTML code start from here-->
<section>
    <div class="container">
        <div class="row blog">
            <div class="col-lg-6">
                <div class="blog_area">
                    <h4>Blog</h4>


                    <?php

                    $db = new DataBase();
                    $query = "SELECT * FROM approve_blog
                    LEFT JOIN user_reg ON approve_blog.uid = user_reg.id
                    LEFT JOIN blogs ON approve_blog.blogid = blogs.blog_id
                     ORDER BY approve_blog.sl DESC LIMIT 9";
                    $data = $db->select($query);
                    if ($data) {
                        foreach ($data ?: [] as $value) { ?>
                    <div class="blog_details_js">
                        <div class="blog_details">
                            <a href="viewblog.php?blogId=<?php echo $value['blog_id']; ?>">
                                <div class="blog_image">
                                    <img src="upload/<?php echo $value['blog_images']; ?>" alt="no images">
                                </div>
                                <div class="blog_info">
                                    <h6><?php echo $value['firstname'] . " " . $value['lastname']; ?></h6>
                                    <span>15 september , 2021</span>
                                    <p>
                                        <?php echo $value['blog_title'] ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php }
                    } else {
                        echo "No blog available";
                    }



                    ?>

                    <div class="more_read_button">
                        <button type="button" id="morebtn">Show More</button>
                    </div>


                    <script>
                    var morebtn = document.getElementById("morebtn");
                    const blog_details = document.getElementsByClassName("blog_details");
                    for (var i = 0; i < blog_details.length; i++) {
                        if (i >= 4) {
                            blog_details[i].style.display = "none";
                        } else {
                            morebtn.addEventListener("click", function() {
                                var blogLength = blog_details.length;
                                for (var i = 0; i < blogLength; i++) {
                                    blog_details[i].style.display = 'block';
                                    morebtn.innerHTML = '<a href="moreblog.php">Veiw More</a>';
                                }
                            })
                        }

                    }
                    </script>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="extra_div">
                    <h4 class="blogareahead">Photos</h4>
                    <div class="extra_div_final">

                        <div class="extra_blog_panel">

                            <?php

                            $db = new DataBase();
                            $query = "SELECT * FROM blogs
                            LEFT JOIN user_reg ON blogs.u_id = user_reg.id 
                             ORDER BY blogs.blog_id DESC LIMIT 6";
                            $data = $db->select($query);
                            if ($data) {
                                foreach ($data ?: [] as $value) { ?>
                            <div class="extra_image_panel">


                                <img src="upload/<?php echo $value['blog_images']; ?>" alt="no images">

                                <div class="image_overlay_text">
                                    <div class="text">
                                        <p>
                                            Blog Photos
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <?php }
                            } else {
                                echo "No photos available";
                            }

                            ?>



                        </div>


                    </div>
                    <div class="more_read_button">
                        <button type="button"><a href="morephotos.php">More Photo's</a></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="important_link">
                    <h4 class="importantlinkhead">Video's</h4>


                    <div class="video_gallary_block">

                        <div class="video_gallery">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/Anflx-Egj18"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                        <div class="video_gallery">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/WmW6aAWTnjw"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                        <div class="video_gallery">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/oVK5I7cgxR8"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                        <div class="video_gallery">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/AzVhuP2TiPA"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                        <div class="video_gallery">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/TZcskvEskXE"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                        <div class="video_gallery">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/POjcNQ2yJfQ"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>



                    </div>

                    <div class="more_read_button">
                        <button type="button"><a href="morevideos.php">More Video's</a></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--New blog HTML code end from here-->


<?php include_once 'include/footer.php'; ?>
<script type="text/javascript" src="js/style.js"></script>
</body>

</html>