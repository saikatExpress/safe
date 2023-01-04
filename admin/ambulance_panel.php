<?php include_once 'include/header.php'; ?>



<div class="ambulance_block_panel">
    <div class="create_button">
        <button type="button" id="policeButton">
            Create Ambulance Panel <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>

    <div style="display: none;" id="thanaDiv" class="create_thana_block">

        <div class="create_form_style">
            <h6>Create Ambulance Panel</h6>
            <div class="form_style_blck">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="create_thana_form">
                        <label for="ambulance">Ambulance Station Name : </label> <br>
                        <input type="text" name="ambulance" id="ambulance">
                    </div>

                    <div class="create_thana_form">
                        <label for="conNumber">Ambulance Station Number : </label> <br>
                        <input type="text" name="conNumber" id="conNumber">
                    </div>

                    <div class="create_thana_form">
                        <label for="divisions">Ambulance Station Division : </label> <br>
                        <input type="text" name="divisions" id="divisions">
                    </div>

                    <div class="create_thana_form">
                        <label for="districts">Ambulance Station District : </label> <br>
                        <input type="text" name="districts" id="districts">
                    </div>

                    <div class="create_thana_form">
                        <label for="latitude">Ambulance Station Latitude : </label> <br>
                        <input type="text" name="latitude" id="latitude">
                    </div>

                    <div class="create_thana_form">
                        <label for="longitude">Ambulance Station Longitude : </label> <br>
                        <input type="text" name="longitude" id="longitude">
                    </div>

                    <div class="create_thana_form">
                        <label for="locations">Ambulance Station Location : </label> <br>
                        <input type="text" name="locations" id="locations">
                    </div>

                    <div class="create_thana_form">
                        <label for="website">Ambulance Station Website : </label> <br>
                        <input type="text" name="website" id="website">
                    </div>

                    <div class="create_thana_form">
                        <label for="pmap">Ambulance Station Map : </label> <br>
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

<?php include_once 'include/footer.php'; ?>