<?php include_once 'include/header.php'; ?>



<div class="user_style_block">
    <div class="style_user_profile">

        <div class="image_radius">
            <div class="user_photo_cover">
                <?php
                $db = new DataBase();
                if (isset($_GET['u_id'])) {
                    $id = $_GET['u_id'];
                    $query = "SELECT images FROM profile_pic WHERE u_id = '$id' LIMIT 1";
                    $res = $db->select($query);
                    foreach ($res ?: [] as $value) { ?>
                <img src="../user/upload/<?php echo $value['images']; ?>" alt="no images">
                <?php }
                }

                ?>

            </div>
        </div>


        <div class="user_info">
            <div class="info_style_flex">


                <?php

                $db = new DataBase();
                if (isset($_GET['u_id'])) {
                    $id = $_GET['u_id'];
                    $query = "SELECT * FROM user_reg
LEFT JOIN user_profile ON user_reg.id = user_profile.u_id
WHERE user_reg.id = '$id'";
                    $data = $db->select($query);
                    if ($data) {
                        foreach ($data ?: [] as $value) { ?>
                <div class="user_info_block">
                    <h2>Personal Information : </h2>
                    <div class="info_card">
                        <h3><i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo $value['firstname'] . " " . $value['lastname']; ?></h3>
                        <h3><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $value['mobile']; ?></h3>
                        <h3><i class="fa fa-mars-stroke" aria-hidden="true"></i> <?php echo $value['gender']; ?></h3>
                        <p>
                            <a href="https://mail.google.com" target="_blank">
                                <i class="fa fa-google" aria-hidden="true"></i> <?php echo $value['email']; ?>
                            </a>
                        </p>
                    </div>
                </div>


                <div class="user_info_block">
                    <h2>Academic Information : </h2>
                    <div class="info_card">
                        <h3>
                            <img src="images/school.jpg" alt="no images">
                            <?php echo $value['school']; ?>
                        </h3>
                        <h3>
                            <img src="images/college.jpg" alt="no images">
                            <?php echo $value['college']; ?>
                        </h3>
                        <h3>
                            <img src="images/varsity.png" alt="no images">
                            <?php echo $value['university']; ?>
                        </h3>
                    </div>
                </div>


                <div class="user_info_block">
                    <h2>Address : </h2>
                    <div class="info_card">
                        <h3>
                            <img src="images/police.jpg" alt="no images">
                            <?php echo $value['police_station']; ?>
                        </h3>
                        <h3>
                            <img src="images/district.jpg" alt="no images">
                            <?php echo $value['district']; ?>
                        </h3>
                        <h3>
                            <img src="images/division.jpg" alt="no images">
                            <?php echo $value['division']; ?>
                        </h3>
                    </div>
                </div>
                <?php  }
                    } else { ?>
                <div class="no_data_block">
                    <p>
                        User have no data <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <br>
                        He/She not added any Information about him/her <br>
                        <a href="">Report to this user</a>
                    </p>
                </div>
                <?php  }
                }

                ?>




            </div>

        </div>

    </div>


    <div class="problem_details">
        <div class="problem_display_flex">
            <div class="details_style">
                <h4>
                    Complain's
                </h4>
                <p>6</p>
            </div>

            <div class="details_style">
                <h4>
                    Accepted
                </h4>
                <p>6</p>
            </div>

            <div class="details_style">
                <h4>
                    Rejected
                </h4>
                <p>6</p>
            </div>
        </div>
    </div>

    <div class="problem_list">
        <div class="problem_list_style">
            <h2 class="list_view_head">Complain's List</h2>


            <?php

            $db = new DataBase();
            $sl = 1;
            if (isset($_GET['u_id'])) {
                $uid = $_GET['u_id'];
                $query = "SELECT * FROM complains WHERE u_id = '$uid' ORDER BY c_id DESC";
                $data = $db->select($query);

                if ($data) {
                    foreach ($data ?: [] as $value) { ?>
            <div class="view_list">
                <p><?php echo $sl++; ?></p>
                <h2><?php echo $value['category']; ?></h2>
                <h3><?php echo $value['locations']; ?></h3>
                <h4><?php echo $value['problems']; ?></h4>
                <h6>
                    <a href="">View</a>
                </h6>
            </div>
            <?php }
                } else {
                    echo "user have no complains";
                }
            }





            ?>







        </div>
    </div>


</div>








<?php include_once 'include/footer.php'; ?>