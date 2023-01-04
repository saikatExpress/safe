<?php include_once 'include/header.php'; ?>


<?php

$db = new DataBase();

if (isset($_POST['hosSubmit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $regnum = $_POST['regnum'];

    /**For image processing Code */

    $permitted = array('jpg', 'jpeg', 'png', 'gif');
    $hosimg = $_FILES['hosimg']['name'];
    $hosimgSize = $_FILES['hosimg']['size'];
    $hosimg_temp = $_FILES['hosimg']['tmp_name'];

    $div = explode('.', $hosimg);
    $file_text = strtolower(end($div));
    $unique_pic = substr(md5(time()), 0, 10) . '.' . $file_text;
    $uploaded_pic = "upload/" . $unique_pic;

    $permitted = array('jpg', 'jpeg', 'png', 'gif');
    $hosimg1 = $_FILES['hosimg1']['name'];
    $hosimg1Size = $_FILES['hosimg1']['size'];
    $hosimg1Temp = $_FILES['hosimg1']['tmp_name'];

    $div1 = explode('.', $hosimg1);
    $file_text1 = strtolower(end($div1));
    $unique_pic1 = substr(md5(time()), 0, 10) . '.' . $file_text1;
    $uploaded_pic1 = "upload1/" . $unique_pic1;

    $permitted = array('jpg', 'jpeg', 'png', 'gif');
    $hoslogo = $_FILES['hoslogo']['name'];
    $hoslogoSize = $_FILES['hoslogo']['size'];
    $hoslogoTemp = $_FILES['hoslogo']['tmp_name'];

    $div2 = explode('.', $hoslogo);
    $file_text2 = strtolower(end($div2));
    $unique_pic2 = substr(md5(time()), 0, 10) . '.' . $file_text2;
    $uploaded_pic2 = "hoslogo/" . $unique_pic2;

    /**For image processing Code */

    $doctor = $_POST['doctor'];
    $hosroom = $_POST['hosroom'];
    $patientroom = $_POST['patientroom'];
    $website = $_POST['website'];
    $hosslogan = $_POST['hosslogan'];
    $hoslocation = $_POST['hoslocation'];
    $googlemap = $_POST['googlemap'];
    $number = $_POST['number'];
    $servicetime = $_POST['servicetime'];
    $id = $_SESSION['id'];

    if ($name == '' || $email == '' || $regnum == '' || $unique_pic == '' || $unique_pic1 == '' || $unique_pic2 == '' || $doctor == '' || $hosroom == '' || $patientroom == '' || $website == '' || $hosslogan == '' || $hoslocation == '' || $googlemap == '' || $number == '' || $servicetime == '') { ?>
<div id="fillOut" class="fillOut">
    <p>
        Please fill up the all inputs..Thank you
        <span id="hosClose">
            <i class="fa fa-times" aria-hidden="true"></i>
        </span>
    </p>
</div>
<?php } else {
        move_uploaded_file($hosimg_temp, $uploaded_pic);
        move_uploaded_file($hosimg1Temp, $uploaded_pic1);
        move_uploaded_file($hoslogoTemp, $uploaded_pic2);
        $query = "INSERT INTO add_hospital(hos_name,hos_email,hos_reg_num,hos_images,hos_profile,hos_logo,hos_total_doctor,hos_room,hos_patient_room,hos_website,hos_slogan,hos_location,hos_map,hos_contact,service_time,u_id)
    VALUES('$name','$email','$regnum','$unique_pic','$unique_pic1','$unique_pic2','$doctor','$hosroom','$patientroom','$website','$hosslogan','$hoslocation','$googlemap','$number','$servicetime','$id')";

        $data = $db->insert($query);
        if ($data) { ?>
<div id="fillOut" class="fillOut">
    <p>
        <?php echo "Successfully added.!"; ?>
        <span id="hosClose">
            <i class="fa fa-times" aria-hidden="true"></i>
        </span>
    </p>
</div>
<?php }
    }
}

?>


<div class="hospital_blog">
    <button class="addhosBtn" type="button" id="hospitalAdd">Add Hospital <i class="fa fa-plus" aria-hidden="true"></i>
    </button>






    <div style="display: none;" id="addHosForm" class="add_hos_form">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="hospital_form">
                <label for="name">Hospital Name : </label> <br>
                <input type="text" name="name" id="name">
            </div>

            <div class="hospital_form">
                <label for="email">Hospital Email : </label> <br>
                <input type="email" name="email" id="email">
            </div>

            <div class="hospital_form">
                <label for="regnum">Hospital Registration Number : </label> <br>
                <input type="text" name="regnum" id="regnum">
            </div>


            <!--Hospital image add HTML code start from here-->

            <div class="hospital_form">
                <label for="hosimg">Hospital Image : </label> <br>
                <input type="file" name="hosimg" id="hosimg">
            </div>



            <div class="hospital_form">
                <label for="hosimg1">Hospital Profile Image : </label> <br>
                <input type="file" name="hosimg1" id="hosimg1">
            </div>

            <div class="hospital_form">
                <label for="hoslogo">Hospital Logo Image : </label> <br>
                <input type="file" name="hoslogo" id="hoslogo">
            </div>

            <!--Hospital image add HTML code end from here-->

            <div class="hospital_form">
                <label for="doctor">Hospital Total Doctor : </label> <br>
                <input type="text" name="doctor" id="doctor" placeholder=" in number eg. 10..">
            </div>

            <div class="hospital_form">
                <label for="hosroom">Hospital Consultation Room : </label> <br>
                <input type="text" name="hosroom" id="hosroom" placeholder=" in number eg. 10..">
            </div>

            <div class="hospital_form">
                <label for="patientroom">Hospital Patients Room : </label> <br>
                <input type="text" name="patientroom" id="patientroom" placeholder=" in number eg. 10..">
            </div>

            <div class="hospital_form">
                <label for="website">Hospital Website : </label> <br>
                <input type="text" name="website" id="website">
            </div>

            <div class="hospital_form">
                <label for="hosslogan">Hospital Slogan : </label> <br>
                <input type="text" name="hosslogan" id="hosslogan" placeholder=" Write your goal">
            </div>

            <div class="hospital_form">
                <label for="hospitallocation">Hospital Location : </label> <br>
                <input type="text" name="hoslocation" id="hoslocation" placeholder=" Also include district,division">
            </div>

            <div class="hospital_form">
                <label for="googlemap">Hospital Google Map : </label> <br>
                <input type="text" name="googlemap" id="googlemap" placeholder=" Embeded link">
            </div>

            <div class="hospital_form">
                <label for="number">Hospital Contact Number : </label> <br>
                <input type="text" name="number" id="number">
            </div>

            <div class="hospital_form">
                <label for="servicetime">Hospital Service Time : </label> <br>
                <input type="text" name="servicetime" id="servicetime">
            </div>

            <div class="hospital_form">
                <label for="servicetime">Hospital Service Time : </label> <br>
                <input type="submit" name="hosSubmit" id="hosSubmit" value="Save">
            </div>




        </form>
    </div>
</div>

<div class="hos_list_panel">
    <h2>Hospital List</h2>
    <div class="list_of_hos">
        <div class="hos_list_style">

            <?php

            $db = new DataBase();

            $query = "SELECT * FROM add_hospital ORDER BY hos_id DESC";
            $data = $db->select($query);

            if ($data) {
                foreach ($data ?: [] as $value) { ?>
            <div class="list_style_hos_block">
                <a href="">
                    <div class="hos_list_item">
                        <img src="hoslogo/<?php echo $value['hos_logo']; ?>" alt="no images">
                        <h3><?php echo $value['hos_name']; ?></h3>
                        <h4><?php echo $value['hos_location'] ?></h4>
                        <h5><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo $value['hos_contact']; ?>
                        </h5>
                        <h6><i class="fa fa-registered" aria-hidden="true"></i> <?php echo $value['hos_reg_num']; ?>
                        </h6>
                    </div>
                </a>
            </div>
            <?php }
            } else {
                echo "no hospital list avaiable";
            }

            ?>



        </div>
    </div>
</div>


<script>
var hospitalAdd = document.getElementById("hospitalAdd");
hospitalAdd.addEventListener('click', function() {
    var addHosForm = document.getElementById("addHosForm");
    if (addHosForm.style.display === 'none') {
        addHosForm.style.display = 'block';
    } else {
        addHosForm.style.display = 'none';
    }
})
</script>

<script>
var hosClose = document.getElementById("hosClose");
hosClose.addEventListener('click', function() {
    var fillOut = document.getElementById("fillOut");
    fillOut.style.display = 'none';
})
</script>

<script src="js/admin.js"></script>
<?php include_once 'include/footer.php'; ?>