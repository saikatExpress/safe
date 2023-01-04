<?php include_once '../library/database.php'; ?>



<?php

$db = new DataBase();
if (isset($_POST['name1'])) {
    $name = $_POST['name1'];
    $query = "SELECT * FROM all_doctor WHERE doctor_name = '$name'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) { ?>


<?php
        $did = $value['d_division'];
        $dsid = $value['d_district'];
        $uzid = $value['d_upazila'];

        $query1 = "SELECT * FROM b_division WHERE id = '$did'";
        $data1 = $db->select($query);
        foreach ($data1 ?: [] as $value1) {
        }

        $query2 = "SELECT * FROM b_district WHERE dt_id = '$dsid'";
        $data2 = $db->select($query2);
        foreach ($data2 ?: [] as $value2) {
        }

        $query3 = "SELECT * FROM b_upazila WHERE uz_id = '$uzid'";
        $data3 = $db->select($query3);
        foreach ($data3 ?: [] as $value3) {
        }


        ?>
<div class="search_result_blck">
    <div class="search_result_blck_style">
        <img src="../admin/upload/<?php echo $value['doctor_image']; ?>" alt="no images">
    </div>
    <div class="search_result_blck_style">
        <h2>
            <a href="view_doctor.php?dcId=<?php echo $value['doc_id']; ?>"><i class="fa fa-user" aria-hidden="true"></i>
                <?php echo $value['doctor_name']; ?></a>
        </h2>
        <h3>
            <i class="fa fa-h-square" aria-hidden="true"></i> <?php echo $value['institute_name']; ?>
        </h3>
        <h4>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <?php echo $value3['upazila_name'] . "," . $value2['district_name']; ?>
            </button>


        </h4>
        <h5>
            <i class="fa fa-flask" aria-hidden="true"></i> <?php echo $value['doctor_speciality']; ?>
        </h5>
        <h6>
            <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $value['appoint_number']; ?>
        </h6>
    </div>
</div>

<?php  }
}

?>