<?php include_once 'include/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="doctors_view_blk">

            <?php

            $db = new DataBase();
            if (isset($_GET['dcId'])) {
                $dcid = $_GET['dcId'];
                $query = "SELECT * FROM all_doctor WHERE doc_id = '$dcid'";
                $data = $db->select($query);
                if ($data) {
                    foreach ($data ?: [] as $value) {

                        $dvid = $value['d_division'];
                        $dsid = $value['d_district'];
                        $uzid = $value['d_upazila'];

                        $query1 = "SELECT * FROM b_division WHERE id = '$dvid'";
                        $data1 = $db->select($query1);
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
                    }
                } else {
                    echo "User have no data";
                }
            }

            ?>

            <div class="doctor_profile_blk">
                <img src="../admin/upload/<?php echo $value['doctor_image']; ?>" alt="no images">
            </div>

            <div class="doctor_profile_details">
                <h2><?php echo $value['doctor_name']; ?></h2>
                <h3><?php echo $value['doctor_title']; ?></h3>
                <h4><?php echo $value['institute_name']; ?></h4>
                <h5><?php echo $value3['upazila_name'] . "," . $value2['district_name'] . "," . $value1['division_name']; ?>
                </h5>
            </div>

            <div class="doctor_action_btn">
                <button type="button" id="addFav">Add Favourite</button>
                <button type="button" id="docMsg">Message</button>
            </div>

            <div class="doctor_view_map">
                <h2>Hospital Location in Map</h2>
                <?php echo $value['google_map']; ?>
            </div>

        </div>
    </div>
</div>

<?php include_once 'include/footer.php'; ?>