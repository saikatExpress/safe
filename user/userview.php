<?php include_once 'include/header.php'; ?>





<div class="container">
    <div class="row">

        <div class="col-lg-4">

            <div class="comment_user_info_block">
                <h2 class="comment_name">About</h2>
                <div class="comment_user_block_style">



                    <ul>
                        <?php

                        $db = new DataBase();
                        $var = 'not added yet..!';
                        $clg = 'not added yet..!';
                        $schl = 'not added yet..!';
                        $dst = 'not added yet..!';
                        $dvsn = '';
                        $id = $_SESSION['id'];
                        if (isset($_GET['u_id'])) {
                            $uid = $_GET['u_id'];
                            $query = "SELECT * FROM user_profile WHERE u_id = '$uid'";
                            $data = $db->select($query);
                            foreach ($data ?: [] as $value) {


                                if ($value['university'] == '') {
                                    $var;
                                } else {
                                    $var = $value['university'];
                                }

                                if ($value['college'] == '') {
                                    $clg;
                                } else {
                                    $clg = $value['college'];
                                }

                                if ($value['school'] == '') {
                                    $schl;
                                } else {
                                    $schl = $value['school'];
                                }

                                if ($value['district'] == '') {
                                    $dst;
                                } else {
                                    $dst = $value['district'];
                                }

                                if ($value['division'] == '') {
                                    $dst;
                                } else {
                                    $dst = $value['division'];
                                }
                            }
                        }

                        ?>
                        <li>
                            <div class="user_bio_block">
                                <a href="">
                                    <span>
                                        <i class="fa fa-university" aria-hidden="true"></i> Studied at
                                        <b><?php echo $var; ?></b>
                                    </span>
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="user_bio_block">
                                <a href="">
                                    <span>
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i> College at
                                        <b><?php echo $clg; ?></b>
                                    </span>
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="user_bio_block">
                                <a href="">
                                    <span>
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i> School at
                                        <b><?php echo $schl; ?></b>
                                    </span>
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="user_bio_block">
                                <a href="">
                                    <span> <i class="fa fa-globe" aria-hidden="true"></i> Lives in
                                        <b><?php echo $dst . "," . $dvsn; ?></b> </span>
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="comment_user_photos_block">
                <h1 class="comment_name">Photos</h1>
                <div class="comment_user_photos">

                    <?php

                    $db = new DataBase();
                    if (isset($_GET['u_id'])) {
                        $uid = $_GET['u_id'];
                        $query = "SELECT * FROM profile_pic WHERE u_id = '$uid' ORDER BY id DESC LIMIT 4";
                        $data = $db->select($query);

                        if ($data) {
                            foreach ($data ?: [] as $value) { ?>


                    <?php


                                $dateFormat = date_create($value['added_time']);
                                $date = date_format($dateFormat, 'd M , y');

                                $timeFormat = date_create($value['added_time']);
                                $time = date_format($timeFormat, 'h.i a');


                                ?>
                    <div class="comment_user_photos_style">
                        <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                        <div class="image_details">
                            <mark><i style="color: orangered;" class="fa fa-star" aria-hidden="true"></i>
                                Favourites</mark> <br>
                            <span><?php echo $date; ?></span> <br>
                            <b><?php echo $time; ?></b>
                        </div>
                    </div>

                    <?php   }
                        } else { ?>
                    <div class="no_image_block">
                        <div class="no_images_msg">
                            <p>
                                no photos add by user
                            </p>
                        </div>
                    </div>
                    <?php  }
                    }

                    ?>
                </div>
            </div>













            <div class="more_news">
                <div class="more_news_block">
                    <img src="" alt="">
                    <h4>More News</h4>
                </div>
                <div class="more_news_para">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis pariatur ut necessitatibus
                        numquam natus rem earum nulla, dolore at voluptates.
                    </p>
                </div>
            </div>

        </div>

        <div class="col-lg-8">





            <div class="comment_user">
                <?php

                $db = new DataBase();
                if (isset($_GET['u_id'])) {
                    $uid = $_GET['u_id'];
                    $query = "SELECT * FROM user_reg
LEFT JOIN profile_pic ON user_reg.id = profile_pic.u_id
WHERE user_reg.id = '$uid' ORDER BY profile_pic.id DESC LIMIT 1";
                    $data = $db->select($query);
                    if ($data) {
                        foreach ($data ?: [] as $value) {
                            $img = $value['images'];
                            if ($img == '') { ?>
                <div class="comment_user_image">
                    <img src="images/demo.png" alt="no images">
                </div>
                <?php  } else { ?>
                <div class="comment_user_image">
                    <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                </div>
                <?php }
                        }
                    }
                }


                ?>


                <div class="comment_user_full_block">
                    <div class="user_comment_name">
                        <h4><?php echo $value['firstname'] . " " . $value['lastname']; ?></h4>
                        <p>
                            Welcome
                        </p>
                    </div>

                    <div class="user_profile_act">

                        <div class="act_button">
                            <button onclick="mail()" type="button" class="btn btn-primary">Mail</button>
                            <div id="email1" class="email">
                                <form action="" method="post">
                                    <label for="to">To </label> <br>
                                    <input type="text" name="mail" value="<?php echo $value['email']; ?>"> <br>
                                    <label for="subject">Subject</label> <br>
                                    <input type="text" name="subject" id="subject"> <br>
                                    <label for="from">From</label> <br>
                                    <input type="text" name="uemail" id="uemail"
                                        value="<?php echo $_SESSION['email']; ?>">
                                    <br>
                                    <label for="send">Click to Send</label> <br>
                                    <input type="button" name="button" id="button" value="Send">
                                </form>
                            </div>
                        </div>


                        <div class="act_button_msg">
                            <button onclick="msg()" type="button" class="btn btn-primary">Message</button>
                            <div id="email2" class="email2">
                                <form action="" method="post">
                                    <label for="msg">Write a short message..</label> <br>
                                    <textarea name="message" id="message" cols="25" rows="2"></textarea> <br>
                                    <input type="button" name="msgbtn" id="msgbtn" value="Send">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!--Every Page more visit item div start from here-->
                <div class="more_visit">
                    <div class="more_visit_tile">
                        <h2>More Visit</h2>
                    </div>

                    <div class="visit_menu">
                        <div class="visit_menu_item">
                            <div class="visit_item_style">
                                <a href="hospital.php">
                                    <div class="visit_item_img">
                                        <img src="images/hospital2.webp" alt="no images">
                                    </div>
                                </a>
                                <div class="site_title">
                                    <h4>
                                        <a href="hospital.php">Hospital</a>
                                    </h4>
                                </div>
                            </div>

                            <div class="visit_item_style">
                                <a href="police.php">
                                    <div class="visit_item_img">
                                        <img src="images/police1.jpg" alt="no images">
                                    </div>
                                </a>

                                <div class="site_title">
                                    <h4>
                                        <a href="police.php">Police</a>
                                    </h4>
                                </div>

                            </div>

                            <div class="visit_item_style">
                                <a href="fireservice.php">
                                    <div class="visit_item_img">
                                        <img src="images/fire.jpeg" alt="no images">
                                    </div>
                                </a>


                                <div class="site_title">
                                    <h4>
                                        <a href="fireservice.php">Fire Service</a>
                                    </h4>
                                </div>

                            </div>

                            <div class="visit_item_style">
                                <a href="doctor.php">
                                    <div class="visit_item_img">
                                        <img src="images/Medicine_Doctor_Dhaka.jpg" alt="no images">
                                    </div>
                                </a>


                                <div class="site_title">
                                    <h4>
                                        <a href="doctor.php">Doctor's</a>
                                    </h4>
                                </div>

                            </div>



                            <div class="visit_item_style">
                                <a href="ambulance.php">
                                    <div class="visit_item_img">
                                        <img src="images/ambulance.png" alt="no images">
                                    </div>
                                </a>

                                <div class="site_title">
                                    <h4>
                                        <a href="ambulance.php">Ambulance</a>
                                    </h4>
                                </div>

                            </div>

                            <div class="visit_item_style">
                                <a href="highway.php">
                                    <div class="visit_item_img">
                                        <img src="images/highway.webp" alt="no images">
                                    </div>
                                </a>

                                <div class="site_title">
                                    <h4>
                                        <a href="highway.php">Highway <br> Police</a>
                                    </h4>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
                <!--Every Page more visit item div start from here-->
            </div>
        </div>

    </div>
</div>




<?php include_once 'include/footer.php'; ?>
<script type="text/javascript" src="js/style.js"></script>