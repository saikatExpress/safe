<?php include_once 'include/header.php'; ?>


<?php

$db = new DataBase();

if (isset($_POST['submit'])) {
    $cat = "police";
    $thana = $_POST['thana'];
    $conNumber = $_POST['conNumber'];
    $divisions = $_POST['divisions'];
    $districts = $_POST['districts'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $locations = $_POST['locations'];
    $website = $_POST['website'];
    $pmap = $_POST['pmap'];
    $id = $_SESSION['id'];

    $query = "INSERT INTO police_station(admin_category,p_name,p_contact,p_divisions,p_districts,p_latitude,p_longitutde,p_location,p_website,p_map,u_id)VALUES('$cat','$thana','$conNumber','$divisions','$districts','$latitude','$longitude','$locations','$website','$pmap','$id')";

    $data = $db->insert($query);

    if ($data) {
        echo "Succes";
    } else {
        echo "Something Wrong";
    }
}

?>

<div class="create_thana">

    <div class="create_button">
        <button type="button" id="policeButton">
            Create Police Station <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>

    <div style="display: none;" id="thanaDiv" class="create_thana_block">

        <div class="create_form_style">
            <h6>Create Police Station</h6>
            <div class="form_style_blck">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="create_thana_form">
                        <label for="thana">Police Station Name : </label> <br>
                        <input type="text" name="thana" id="thana">
                    </div>

                    <div class="create_thana_form">
                        <label for="conNumber">Police Station Number : </label> <br>
                        <input type="text" name="conNumber" id="conNumber">
                    </div>

                    <div class="create_thana_form">
                        <label for="divisions">Police Station Division : </label> <br>
                        <input type="text" name="divisions" id="divisions">
                    </div>

                    <div class="create_thana_form">
                        <label for="districts">Police Station District : </label> <br>
                        <input type="text" name="districts" id="districts">
                    </div>

                    <div class="create_thana_form">
                        <label for="latitude">Police Station Latitude : </label> <br>
                        <input type="text" name="latitude" id="latitude">
                    </div>

                    <div class="create_thana_form">
                        <label for="longitude">Police Station Longitude : </label> <br>
                        <input type="text" name="longitude" id="longitude">
                    </div>

                    <div class="create_thana_form">
                        <label for="locations">Police Station Location : </label> <br>
                        <input type="text" name="locations" id="locations">
                    </div>

                    <div class="create_thana_form">
                        <label for="website">Police Station Website : </label> <br>
                        <input type="text" name="website" id="website">
                    </div>

                    <div class="create_thana_form">
                        <label for="pmap">Police Station Map : </label> <br>
                        <input type="text" name="pmap" id="pmap">
                    </div>

                    <div class="create_form_btn">
                        <label for="click">Click for Save</label> <br>
                        <input type="submit" name="submit" value="Save">
                    </div>

                </form>
            </div>
        </div>

    </div>


    <div class="thana_list">
        <h2 class="thana_h2">Thana List</h2>

        <?php

        $db = new DataBase();

        $query = "SELECT * FROM police_station
        LEFT JOIN thana_admin ON police_station.p_id = thana_admin.police_station_id
        WHERE police_station.admin_category = 'police'
         ORDER BY police_station.p_name";

        $data = $db->select($query);

        foreach ($data ?: [] as $value) { ?>

        <?php

            $pid = $value['p_id'];
            $police_station_id = $value['police_station_id'];

            ?>

        <div class="thana_list_item">
            <a href="thana_view.php?tId=<?= $pid ?> ">
                <div class="thana_div_block1">


                    <?php

                        if ($pid == $police_station_id) { ?>
                    <h2><?php echo $value['p_name'] . " " . '<img style="width:15px;height:15px;border-radius:50%;" src="images/insddfdfdex.jpeg" alt="no images">'; ?>
                    </h2>
                    <?php } else { ?>
                    <h2><?= $value['p_name']; ?></h2>
                    <?php }

                        ?>
                </div>

                <div class="thana_div_block">
                    <h3><?= $value['p_contact'] ?></h3>
                </div>


                <div class="thana_div_block">
                    <h4><?= $value['p_divisions']; ?></h4>
                </div>

                <div class="thana_div_block">
                    <h4><?= $value['p_districts'] ?></h4>
                </div>

                <div class="thana_div_block">
                    <h5><?= $value['p_location']; ?></h5>
                </div>




            </a>
        </div>
        <?php }

        ?>


    </div>


</div>


<script>
var policeButton = document.getElementById("policeButton");
policeButton.addEventListener("click", function() {
    var thanaDiv = document.getElementById("thanaDiv");
    if (thanaDiv.style.display === 'none') {
        thanaDiv.style.display = 'block';
    } else {
        thanaDiv.style.display = 'none';
    }
})
</script>

<script src="js/admin.js"></script>
<?php include_once 'include/footer.php'; ?>