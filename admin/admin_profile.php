<?php include_once 'include/header.php'; ?>

<?php

$db = new DataBase();

if ($_GET['uid']) {
    $uid = $_GET['uid'];

    $query1 = "SELECT * FROM admin_profile
    LEFT JOIN admin_reg ON admin_profile.u_id = admin_reg.id
     WHERE u_id = '$uid'";

    $data1 = $db->select($query1);

    if ($data1) {

        foreach ($data1 ?: [] as $value1) { ?>
<div class="profile_admin_section">
    <h2 class="headingTitle">Update your profile</h2>


    <div class="admin_profile_style_area">


        <?php

                    $db = new DataBase();

                    if (isset($_POST['updateSubmit'])) {
                        $firstname = $_POST['firstname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $mobile = $_POST['mobile'];
                        $branch = $_POST['branch'];
                        $district = $_POST['district'];
                        $division = $_POST['division'];

                        $query = "UPDATE admin_reg,admin_profile SET admin_reg.firstname = '$firstname', admin_reg.email = '$email' , admin_reg.a_password = '$password', admin_reg.a_conpass = '$password', admin_profile.admin_contact = '$mobile',admin_profile.branch_area = '$branch',admin_profile.admin_contact = '$mobile',admin_profile.admin_district = '$district' , admin_profile.admin_division = '$division' WHERE admin_reg.id = '$uid' and admin_profile.u_id = '$uid'";

                        $data = $db->update($query);

                        if ($data) { ?>
        <div class="msg_div">
            <h6>Successfully Updated</h6>
            <a href="dashboard.php">Click to back</a>
            <?= exit() ?>
        </div>
        <?php } else {
                            echo "What's the problem";
                        }
                    }


                    ?>


        <form action="" method="POST" enctype="multipart/form-data">

            <div class="admin_form_style">
                <label for="firstname">Update your name : </label> <br>
                <input type="text" name="firstname" id="firstname" value="<?= $value1['firstname'] ?>">
            </div>

            <div class="admin_form_style">
                <label for="firstname">Update your email : </label> <br>
                <input type="email" name="email" id="email" value="<?= $value1['email'] ?>">
            </div>

            <div class="admin_form_style">
                <label for="password">Update your password : </label> <br>
                <input type="text" name="password" id="password" value="<?= $value1['a_password'] ?>">
            </div>

            <div class="admin_form_style">
                <label for="mobile">Update your Contact number : </label> <br>
                <input type="text" name="mobile" id="mobile" value="<?= $value1['admin_contact'] ?>"> <br>
            </div>



            <div class="admin_form_style">
                <label for="branch">Update your Posting Branch area : </label> <br>
                <input type="text" name="branch" id="branch" value="<?= $value1['branch_area'] ?>"> <br>
            </div>

            <div class="admin_form_style">
                <label for="district">Update your District : </label> <br>
                <input type="text" name="district" id="district" value="<?= $value1['admin_district'] ?>">
                <br>
            </div>

            <div class="admin_form_style">
                <label for="division">Update your Division : </label> <br>
                <input type="text" name="division" id="division" value="<?= $value1['admin_division'] ?>">
                <br>
            </div>

            <div class="admin_form_style">
                <label for="submit">Click to Save : </label> <br>
                <input type="submit" name="updateSubmit" id="updateSubmit" value="Save"> <br>
            </div>

        </form>

    </div>

</div>
<?php }
    } else { ?>

<!--This form is working,when the user first time updated his/her profile-->

<div class="profile_admin_section">
    <h2 class="headingTitle">Set your profile</h2>


    <div class="admin_profile_style_area">

        <?php

                $db = new DataBase();



                if (isset($_POST['submit'])) {

                    $image = $_FILES['image']['name'];
                    $image_size = $_FILES['image']['size'];
                    $image_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $image);
                    $file_text = strtolower(end($div));
                    $unique_pic = substr(md5(time()), 0, 10) . '.' . $file_text;
                    $uploaded_pic = "upload/" . $unique_pic;

                    $mobile = $_POST['mobile'];
                    $designation = $_POST['designation'];
                    $branch = $_POST['branch'];
                    $district = $_POST['district'];
                    $division = $_POST['division'];

                    $id = $_SESSION['id'];

                    if ($unique_pic == '' || $mobile == '' || $designation == '' || $branch == '' || $district == '' || $division == '') {
                        echo "Please fill up all field";
                    } else {
                        move_uploaded_file($image_temp, $uploaded_pic);
                        $query = "INSERT INTO admin_profile(admin_image,admin_contact,admin_designation,branch_area,admin_district,admin_division,u_id)VALUES('$unique_pic','$mobile','$designation','$branch','$district','$division','$id')";

                        $data = $db->insert($query);

                        if ($data) { ?>
        <div class="msg_div">
            <h6>Successfully Updated</h6>
            <a href="dashboard.php">Click to back</a>
            <?= exit() ?>
        </div>
        <?php } else {
                            echo "Something Wrong";
                        }
                    }
                }


                ?>


        <form action="" method="post" enctype="multipart/form-data">
            <div class="admin_form_style">

                <img src="images/user-demo.png" alt="no images"> <br>

                <label for="profileImage">Set your image : </label> <br>
                <input type="file" name="image" id="image" required="1"> <br>
            </div>

            <div class="admin_form_style">
                <label for="mobile">Your Contact number : </label> <br>
                <input type="text" name="mobile" id="mobile" required="1"> <br>
            </div>

            <div class="admin_form_style">
                <label for="designation">Your Designation : </label> <br>
                <select name="designation" id="designation">
                    <option value="">Select</option>
                    <option value="admin">Admin</option>
                    <option value="superadmin">Super Admin</option>
                    <option value="subadmin">Sub Admin</option>
                    <option value="reporter">Reporter</option>
                </select>
            </div>

            <div class="admin_form_style">
                <label for="branch">Your Posting Branch area : </label> <br>
                <input type="text" name="branch" id="branch" required="1"> <br>
            </div>

            <div class="admin_form_style">
                <label for="district">Your District : </label> <br>
                <input type="text" name="district" id="district" required="1"> <br>
            </div>

            <div class="admin_form_style">
                <label for="division">Your Division : </label> <br>
                <input type="text" name="division" id="division" required="1"> <br>
            </div>

            <div class="admin_form_style">
                <label for="submit">Click to Save : </label> <br>
                <input type="submit" name="submit" id="submit" value="Save"> <br>
            </div>

        </form>

    </div>

</div>
<?php }
}




?>








<?php include_once 'include/footer.php'; ?>