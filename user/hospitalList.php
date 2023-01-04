<?php include_once 'include/header.php'; ?>

<?php

$db = new DataBase();
if (isset($_GET['hosId'])) {
    $hosId = $_GET['hosId'];
    $query = "SELECT * FROM add_hospital WHERE hos_id = '$hosId'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) {
    }
}

?>

<div class="container">
    <div class="row">


        <div class="col-lg-3">
            <h4>Hospital Side bar</h4>
        </div>


        <div class="col-lg-9">

            <div class="header_hospital">


                <div class="header_hos_style">
                    <img src="../admin/hoslogo/<?php echo $value['hos_logo']; ?>" alt="no images">
                    <h4><?php echo $value['hos_name']; ?></h4>
                </div>

                <div class="header_hos_img">
                    <img src="../admin/upload/<?php echo $value['hos_profile']; ?>" alt="">
                </div>

                <div class="hos_service_panel">
                    <div class="hos_service_blk">
                        <p>
                            To get servie , Please Call : <span><?php echo $value['hos_contact']; ?></span>
                        </p>

                        <div class="hos_address">
                            <h4>Address : </h4>
                            <h6><?php echo $value['hos_location']; ?></h6>
                        </div>

                        <div class="hos_careLine">
                            <h1>
                                Care Line <span><i style="color: purple;" class="fa fa-phone-square"
                                        aria-hidden="true"></i></span>
                                <b>10161</b>
                            </h1>
                        </div>

                        <div class="website_visit">
                            <dt>
                                <a href="<?php echo $value['hos_website']; ?>" target="_blank">Visit our website</a>
                            </dt>
                        </div>

                    </div>
                </div>

                <div class="hos_info_full">
                    <div class="hos_info_block">

                        <div class="hos_info_style">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <h4><?php echo $value['hos_room']; ?></h4>
                            <h6>Consultation Rooms</h6>
                        </div>

                        <div class="hos_info_style">
                            <i class="fa fa-user-md" aria-hidden="true"></i>
                            <h4><?php echo $value['hos_total_doctor']; ?></h4>
                            <h6>Doctor's <i class="fa fa-plus" aria-hidden="true"></i> </h6>
                        </div>

                        <div class="hos_info_style">
                            <i class="fa fa-bed" aria-hidden="true"></i>
                            <h4><?php echo $value['hos_patient_room']; ?></h4>
                            <h6>Pateint's Room <i class="fa fa-plus" aria-hidden="true"></i></h6>
                        </div>

                    </div>
                </div>

            </div>

        </div>


    </div>
</div>



<script src="js/style.js"></script>
<?php include_once 'include/footer.php'; ?>