<?php include_once 'include/header.php'; ?>


<?php

$db = new DataBase();

if (isset($_GET['tId'])) {
    $tId = $_GET['tId'];

    $query = "SELECT * FROM police_station WHERE p_id = '$tId'";

    $data = $db->select($query);

    foreach ($data ?: [] as $value) {
    }
}

?>

<div class="view_thana_div">
    <h2><?php echo $value['p_name']; ?></h2>
    <h3><?= $value['p_location'] ?></h3>
    <h4><?php echo $value['p_districts'] . "," . $value['p_divisions']; ?></h4>
</div>

<div class="view_thana_form">

    <h1 class="thana_h1">Set Thana Admin</h1>

    <div class="view_thana_form_style">

        <span style="color: red;" id="Err1"></span>


        <form autocomplete="off" action="" method="post">

            <label style="display: none;" for="policeSationId">Police Station ID :</label>
            <input style="display: none;" type="text" name="policeSationId" id="policeSationId"
                value="<?= $value['p_id'] ?>">

            <label for="policeStationKey">Set Police Station Key : </label>
            <input type="text" name="policeStationKey" id="policeStationKey"> <br>
            <span style="color: red;" id="Err"></span> <br>

            <label for="policeStationPassword">Set Police Station Password : </label> <br>
            <input type="text" name="passWord" id="passWord"> <br>



            <label style="display: none;" for="adminId">Admin ID : </label>
            <input style="display: none;" type="text" name="adminId" id="adminId" value="<?= $_SESSION['id'] ?>">

            <button type="button" id="thanaForm">Save</button>
        </form>
    </div>

</div>







<script>
var thanaForm = document.getElementById("thanaForm");
thanaForm.addEventListener('click', function() {
    var policeSationId = document.getElementById("policeSationId").value;
    var policeStationKey = document.getElementById("policeStationKey").value;
    var passWord = document.getElementById("passWord").value;
    var adminId = document.getElementById("adminId").value;

    var Err = document.getElementById("Err");
    var Err1 = document.getElementById("Err1");

    var dataSet = "policeSationId1=" + policeSationId + "&policeStationKey1=" + policeStationKey +
        "&passWord1=" + passWord + "&adminId1=" + adminId;

    if (policeStationKey == '' || passWord == '') {
        Err.innerHTML = "Please fill first";
    } else {
        $.ajax({
            type: 'POST',
            data: dataSet,
            url: 'ajax/thana_save.php',
            success: function(html) {
                Err1.innerHTML = html;
            }
        })
    }
})
</script>


<?php include_once 'include/footer.php'; ?>