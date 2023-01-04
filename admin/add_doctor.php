<?php include_once 'include/header.php'; ?>


<?php

$db = new DataBase();
if (isset($_POST['doctorSave'])) {
    $division = $_POST['division'];
    $district = $_POST['district'];
    $upazila = $_POST['upazila'];
    $doctorName = $_POST['doctorName'];
    $doctorTitle = $_POST['doctorTitle'];
    $doctorSpeciality = $_POST['doctorSpeciality'];

    $permitted = array('jpg', 'jpeg', 'png', 'gif');
    $doctorImage = $_FILES['doctorImage']['name'];
    $imageSize = $_FILES['doctorImage']['size'];
    $imageTemp = $_FILES['doctorImage']['tmp_name'];

    $div = explode('.', $doctorImage);
    $file_text = strtolower(end($div));
    $unique_pic = substr(md5(time()), 0, 10) . '.' . $file_text;
    $uploaded_pic = "upload/" . $unique_pic;

    $institute = $_POST['institute'];
    $visitingHour = $_POST['visitingHour'];
    $appoinment = $_POST['appoinment'];
    $maplink = $_POST['maplink'];
    $id = $_SESSION['id'];

    if ($unique_pic == '') {
        echo "Please Select an images";
    } else {
        move_uploaded_file($imageTemp, $uploaded_pic);
        $query = "INSERT INTO all_doctor(d_division,d_district,d_upazila,doctor_name,doctor_title,doctor_speciality,doctor_image,institute_name,visiting_hour,appoint_number,google_map,u_id)VALUES('$division','$district','$upazila','$doctorName','$doctorTitle','$doctorSpeciality','$unique_pic','$institute','$visitingHour','$appoinment','$maplink','$id')";
        $data = $db->insert($query);

        if ($data) {
            echo "Data insert successfully";
        } else {
            echo "Something Wrong";
        }
    }
}

?>


<div class="add_page_doctor_blk">
    <div class="doctor_management">


        <p class="doctor_title_name">Here, add the full description of a doctor</p>

        <div class="doctor_form_blk">
            <div class="doctor_form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form_style_doctor">
                        <label for="division">Select division : </label> <br>
                        <select name="division" id="division" onclick="showDistrict(this.value)">
                            <option value="0">Select</option>
                            <option value="1">ঢাকা</option>
                            <option value="2">রাজশাহী</option>
                            <option value="3">খুলনা</option>
                            <option value="4">রংপুর</option>
                            <option value="5">বরিশাল</option>
                            <option value="6">চট্রগ্রাম</option>
                            <option value="7">সিলেট</option>
                            <option value="8">ময়মনসিংহ</option>
                        </select>
                    </div>


                    <div class="form_style_doctor">
                        <label for="district">Select district : </label> <br>
                        <select name="district" id="district" onclick="showUpazila(this.value)">
                            <option value="0">Select</option>
                        </select>
                    </div>


                    <div class="form_style_doctor">
                        <label for="upazila">Select upazila : </label> <br>
                        <select name="upazila" id="upazila">
                            <option value="0">Select</option>
                        </select>
                    </div>

                    <div class="form_style_doctor">
                        <label for="doctor">Doctor name : </label> <br>
                        <input type="text" name="doctorName" id="doctorName" placeholder="Type here">
                    </div>

                    <div class="form_style_doctor">
                        <label for="doctorTitle">Doctor title : </label> <br>
                        <input type="text" name="doctorTitle" id="doctorTitle" placeholder="Type here">
                    </div>

                    <div class="form_style_doctor">
                        <label for="doctorSpeciality">Doctor Speciality : </label> <br>
                        <input type="text" name="doctorSpeciality" id="doctorSpeciality" placeholder="Type here">
                    </div>

                    <div class="form_style_doctor">
                        <label for="doctorImage">Doctor Image : </label> <br>
                        <input type="file" name="doctorImage" id="doctorImage" placeholder="Type here">
                    </div>

                    <div class="form_style_doctor">
                        <label for="institute">Institute name : </label> <br>
                        <input type="text" name="institute" id="institute" placeholder="Type here">
                    </div>

                    <div class="form_style_doctor">
                        <label for="visitingHour">Visiting Hour : </label> <br>
                        <input type="text" name="visitingHour" id="visitingHour" placeholder="Type here">
                    </div>

                    <div class="form_style_doctor">
                        <label for="appoinment">Appointment Number : </label> <br>
                        <input type="text" name="appoinment" id="appoinment" placeholder="Type here">
                    </div>


                    <div class="form_style_doctor">
                        <label for="maplink">Google Map : </label> <br>
                        <input type="text" name="maplink" id="maplink" placeholder="Paste here">
                    </div>

                    <div class="form_style_dctr_btn">
                        <input type="submit" value="Save" name="doctorSave" id="doctorSave">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<?php include_once 'include/footer.php'; ?>

<!--Doctor page division,district ajax,js code start from here-->
<script type="text/javascript">
function showDistrict() {
    var division = document.getElementById('division').value;
    var district = document.getElementById('district');
    if (division == 0) {} else {
        dataString = "division1=" + division;
        $.ajax({
            type: 'POST',
            data: dataString,
            url: 'ajax/doctor.php',
            success: function(html) {
                district.innerHTML = html;
            }
        })
    }
}
</script>

<script>
function showUpazila() {
    var district = document.getElementById("district").value;
    var upazila = document.getElementById("upazila");
    if (district == 0) {} else {
        dataQuery = "upazila1=" + district;
        $.ajax({
            type: "POST",
            data: dataQuery,
            url: 'ajax/upazila.php',
            success: function(html) {
                upazila.innerHTML = html;
            }
        })
    }

}
</script>
<!--Doctor page division,district ajax,js code end from here-->









<script src="js/admin.js"></script>
<?php include_once 'include/footer.php'; ?>