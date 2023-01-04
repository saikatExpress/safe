<?php include_once 'include/header.php'; ?>
<?php
$db = new DataBase();
if (isset($_POST['upload'])) {


    $permitted = array('jpg', 'jpeg', 'png', 'gif');
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];
    $div = explode('.', $image);
    $file_text = strtolower(end($div));
    $unique_pic = substr(md5(time()), 0, 10) . '.' . $file_text;
    $uploaded_pic = "upload/" . $unique_pic;


    $uid = $_SESSION['id'];
    if ($unique_pic == '') {
        echo "Please select an image";
    } else {
        move_uploaded_file($image_temp, $uploaded_pic);
        $query = "INSERT INTO profile_pic(images,u_id)VALUES('$unique_pic','$uid')";
        $data = $db->insert($query);
    }
}

?>


<?php

$db = new DataBase();
if (isset($_POST['coverPhoto'])) {
    $permitted = array('jpg', 'jpeg', 'png', 'gif');
    $coverimage = $_FILES['coverimage']['name'];
    $image_size = $_FILES['coverimage']['size'];
    $image_temp = $_FILES['coverimage']['tmp_name'];
    $div = explode('.', $coverimage);
    $file_text = strtolower(end($div));
    $unique_pic = substr(md5(time()), 0, 10) . '.' . $file_text;
    $uploaded_pic = "upload/" . $unique_pic;
    $id = $_SESSION['id'];

    if ($unique_pic == '') {
        echo "Please select an images";
    } else {
        move_uploaded_file($image_temp, $uploaded_pic);
        $query = "INSERT INTO cover_photo(images,u_id)VALUES('$unique_pic','$id')";
        $data = $db->insert($query);
        if ($data) {
            echo "Uploaded successfully";
        }
    }
}


?>



<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="user_menu">
                <div class="user_activity">
                    <h4>Intro</h4>

                    <?php
                    $db = new DataBase();
                    $id = $_SESSION['id'];
                    $query = "SELECT * FROM workplace WHERE u_id = '$id' LIMIT 3";
                    $res = $db->select($query);
                    if (empty($res)) {
                        echo "Add your work" . "<br>";
                    } else {
                        foreach ($res ?: [] as $value) { ?>
                    <p>
                        <img style="width: 15px;" src="logos/suitcase1.png" alt="no images">
                        <span>Worked as </span> <strong><?php echo $value['designation']; ?> at </strong>
                        <b><?php echo $value['institute']; ?></b>
                    </p>
                    <?php }
                    }

                    ?>

                    <?php

                    $db = new DataBase();
                    $id = $_SESSION['id'];
                    $query = "SELECT * FROM user_profile WHERE u_id = '$id' LIMIT 1";
                    $result = $db->select($query);
                    if (!empty($result)) {
                        foreach ($result ?: [] as $value) { ?>

                    <p>
                        <img style="width: 20px;" src="logos/242_F_65773487_wDUWQVCMxVmZUpOE8yaowzleunUZo0ea.jpg"
                            alt="no images">
                        <span>Studied at </span> <b><?php echo $value['school']; ?></b>
                    </p>
                    <p>
                        <img style="width: 20px;" src="logos/240_C_117862465_LRM0WbZSOMtmOTj69ebyz2wssEmWW85i.jpg"
                            alt="no images">
                        <span>Studied at </span> <b><?php echo $value['college']; ?></b>
                    </p>

                    <p>
                        <img style="width: 20px;" src="logos/1000_F_200844990_Il7MdpZyiJWMHNg3NAxUDAQ1EcPNnEJw.jpg"
                            alt="no images">
                        <span>Studied at </span> <b><?php echo $value['university']; ?></b>
                    </p>

                    <p>
                        <img style="width: 20px;" src="logos/240_P_232743887_LCGRn6WFJxMzW5GixUsnYYVKOrFcXeti.jpg"
                            alt="no images">
                        <span>Police station at </span> <b><?php echo $value['police_station']; ?></b>
                    </p>

                    <p>
                        <img style="width: 20px;" src="logos/240_F_97000769_R4zepLTgmf8G22W7G2o8JA1HeiVK2CkK.jpg"
                            alt="no images">
                        <span>Lives in </span> <b><?php echo $value['district']; ?></b>
                    </p>

                    <p>
                        <img style="width: 20px;" src="logos/240_D_272896745_tlTivOH81qWIVzz34KqFGm8LO3N9hMYQ.jpg"
                            alt="no images">
                        <span>Division </span> <b><?php echo $value['division']; ?></b>
                    </p>
                    <?php   }
                    } else { ?>
                    <a href="editprofile.php">Add your details</a>
                    <?php }


                    ?>




                </div>
            </div>



        </div>


        <div class="col-lg-9 flip">
            <div class="user_profile">
                <div class="cover-photo">
                    <?php

                    $query = "SELECT * FROM cover_photo WHERE u_id = '$id' ORDER BY id DESC LIMIT 1";
                    $res = $db->select($query);
                    if (empty($res)) {
                        echo "Update cover photo";
                    } else {
                        foreach ($res ?: [] as $value) { ?>
                    <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                    <?php  }
                    }

                    ?>

                    <div class="update_button">
                        <button id="upbtn">Update</button>
                    </div>
                    <div id="myModal1" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <h4>Cover Photo</h4>
                            <span class="close1">&times;</span>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>
                                            <input type="file" name="coverimage" id="coverimage">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="submit" value="Upload" name="coverPhoto">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="user">
                    <div class="profile">
                        <?php

                        $db = new DataBase();
                        $id = $_SESSION['id'];
                        $query = "SELECT images FROM profile_pic WHERE u_id = '$id' ORDER BY id DESC LIMIT 1";
                        $res = $db->select($query);
                        if (!empty($res)) {
                            foreach ($res ?: [] as $value) { ?>
                        <img src="upload/<?php echo $value['images']; ?>">
                        <?php  }
                        } else {
                            echo "<img src='images/demo.png' alt='no images'>";
                        }


                        ?>


                    </div>

                    <div class="modal_button">

                        <button id="myBtn"><img src="logos/upload.jpg" alt="no images"></button>
                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <h4>Profile Photo</h4>
                                <span class="close">&times;</span>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <table>
                                        <tr>
                                            <td>
                                                <input type="file" name="image" id="image">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="submit" value="Upload" name="upload">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="user_desc">
                <h4><?php echo Session::get("firtsname") . " " . Session::get("lastname"); ?></h4>
                <?php

                $db = new DataBase();
                $id = $_SESSION['id'];
                $query = "SELECT * FROM user_profile WHERE u_id = '$id' LIMIT 1";
                $result = $db->select($query);
                if (!empty($result)) {
                    foreach ($result ?: [] as $value) { ?>
                <h6 style="text-transform: capitalize;"><?php echo $value['district']; ?></h6>
                <?php  }
                } else {
                    echo "<h6>Welcome!</h6>";
                }


                ?>

                <a href="editprofile.php?uid=<?php echo Session::get('id'); ?>">Edit Profile</a>
            </div>

            <div class="complain-card">
                <div class="complain">
                    <h4>Complain's</h4>
                    <h6>20</h6>
                </div>

                <div class="complain">
                    <h4>Accepted</h4>
                    <h6>12</h6>
                </div>

                <div class="complain">
                    <h4>Rejected</h4>
                    <h6>8</h6>
                </div>
            </div>

            <div class="user_activity">
                <div class="activity_items">
                    <button onclick="worktoggle()">Add Work <i class="fa fa-plus" aria-hidden="true"></i></button>
                    <a href="photos.php">Photos</a>
                </div>
                <div class="user_items" id="user_items">

                    <?php

                    $db = new DataBase();
                    if (isset($_POST['workForm'])) {
                        $designation = $_POST['designation'];
                        $institute = $_POST['institute'];
                        $startyear = $_POST['startyear'];
                        $id = $_SESSION['id'];

                        $query = "INSERT INTO workplace(designation,institute,startyear,u_id)VALUES('$designation','$institute','$startyear','$id')";
                        $data = $db->insert($query);
                        if ($data) {
                            echo "Data insert successfully";
                        } else {
                            echo "Something went wrong";
                        }
                    }

                    ?>

                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td>Designation : </td>
                                <td>
                                    <input type="text" name="designation" id="designation">
                                </td>
                            </tr>

                            <tr>
                                <td>Institution name : </td>
                                <td>
                                    <input type="text" name="institute" id="institute">
                                </td>
                            </tr>

                            <tr>
                                <td>Started year : </td>
                                <td>
                                    <input type="text" name="startyear" id="startyear">
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="workForm" value="Save">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once 'include/footer.php'; ?>
<script type="text/javascript" src="js/style.js"></script>