<?php include_once 'include/header.php'; ?>


<?php

$db = new DataBase();
if (isset($_GET['docId'])) {
    $docId = $_GET['docId'];
    $query = "SELECT * FROM all_doctor WHERE doc_id = '$docId'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) {
        $did = $value['d_division'];
        $dstid = $value['d_district'];
        $upId = $value['d_upazila'];


        $query1 = "SELECT * FROM b_division WHERE id = '$did'";
        $data1 = $db->select($query1);
        foreach ($data1 ?: [] as $value1) {
        }


        $query2 = "SELECT * FROM b_district WHERE dt_id = '$dstid'";
        $data2 = $db->select($query2);
        foreach ($data2 ?: [] as $value2) {
        }

        $query3 = "SELECT * FROM b_upazila WHERE uz_id = '$upId'";
        $data3 = $db->select($query3);
        foreach ($data3 ?: [] as $value3) {
        }
    }
}


?>


<div class="view_doctor">
    <div class="view_doctor_blck">
        <div class="view_doctor_image">
            <img src="upload/<?php echo $value['doctor_image']; ?>" alt="no images">
        </div>
        <div class="view_doctor_title">
            <h2><?php echo $value['doctor_name']; ?></h2>
            <h5>
                <?php echo $value['institute_name']; ?> <br>
                <b
                    style="font-size: 13px; color:#641b1b"><?php echo $value3['upazila_name'] . "," . $value2['district_name'] . "," . $value1['division_name'] ?></b>
            </h5>
            <h6><?php echo $value['doctor_speciality']; ?></h6>
            <h3>
                <span>Contact : </span> <?php echo $value['appoint_number']; ?>
            </h3>
        </div>

        <div class="view_doctor_title">
            <h1>Map : </h1>
            <?php
            echo $value['google_map'];
            ?>
        </div>
    </div>
</div>

<!--upload/<?php // echo $value['doctor_image']; 
            ?>-->

<h4>Doctor View</h4>











<script src="js/admin.js"></script>
<?php include_once 'include/footer.php'; ?>