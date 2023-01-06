<?php include_once 'include/header.php'; ?>

<?php

$db = new DataBase();


if (isset($_POST['submit'])) {
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $school = $_POST['school'];
    $collge = $_POST['college'];
    $varsity = $_POST['varsity'];
    $division = $_POST['division'];
    $district = $_POST['district'];
    $policestation = $_POST['policestation'];
    $village = $_POST['village'];
    $id = $_SESSION['id'];

    $query = "INSERT INTO user_profile(father_name,mother_name,school,college,university,division,district,police_station,village,u_id)VALUES('$father','$mother','$school','$collge','$varsity','$division','$district','$policestation','$village','$id')";
    $data = $db->insert($query);
    if ($data) { ?>
<p>
    <?= "Added Successfully" ?>
</p>
<a href="profile.php">Back</a>
<?= exit() ?>
<?php } else {
        echo "Something wrong";
    }
}

?>


<?php
$id = $_SESSION['id'];
$query1 = "SELECT * FROM user_profile WHERE u_id = '$id'";
$data1 = $db->select($query1);
if ($data1) { ?>
<?php
    foreach ($data1 ?: [] as $value1) {
    }
    ?>

<div class="container">
    <div class="row">
        <div class="edit_profile_panel">
            <h2 style="text-align: center; padding:15px 20px 15px;">Edit your profile</h2>
            <div class="profile_edit">
                <form action="" method="POST">

                    <label id="ferror" for="father">Edit your father name</label><br>
                    <input type="text" name="father" id="father" value="<?= $value1['father_name'] ?>"> <br>

                    <label id="merror" for="mother">Edit your mother name</label> <br>
                    <input type="text" name="mother" id="mother" value="<?= $value1['mother_name'] ?>"> <br>

                    <label id="erschool" for="school">Edit your school</label> <br>
                    <input type="text" name="school" id="school" value="<?= $value1['school'] ?>"> <br>

                    <label id="ercollege" for="college">Edit your college</label> <br>
                    <input type="text" name="college" id="college" value="<?= $value1['college'] ?>"> <br>

                    <label id="errvarsity" for="university">Edit your university</label> <br>
                    <input type="text" name="varsity" id="varsity" value="<?= $value1['university'] ?>"> <br>

                    <label id="errdistrict" for="district">Edit your district</label> <br>
                    <input type="text" name="district" id="district" value="<?= $value1['district'] ?>"> <br>

                    <label id="errpoliceStation" for="policeStation">Edit your police station</label> <br>
                    <input type="text" name="policestation" id="policestation" value="<?= $value1['police_station'] ?>">
                    <br>

                    <label id="errvillage" for="village">Edit your village/road/area</label> <br>
                    <input type="text" name="village" id="area" value="<?= $value1['village'] ?>"> <br>

                    <input style="display: none;" type="text" name="userID" id="userID" value="<?= $id ?>">

                    <label for="check">Click here to save</label> <br>
                    <button type="button" id="updateBtn">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php } else { ?>
<div class="container">

    <div class="row">
        <div class="edit_profile_panel">
            <h2 style="text-align: center; padding:15px 20px 15px;">Update your profile</h2>
            <div class="profile_edit">
                <form action="" method="POST" onsubmit="return formValidate();">

                    <label id="ferror" for="father">Add your father name</label><br>
                    <input type="text" name="father" id="father"> <br>

                    <label id="merror" for="mother">Add your mother name</label> <br>
                    <input type="text" name="mother" id="mother"> <br>

                    <label id="erschool" for="school">Add your school</label> <br>
                    <input type="text" name="school" id="school"> <br>

                    <label id="ercollege" for="college">Add your college</label> <br>
                    <input type="text" name="college" id="college"> <br>

                    <label id="errvarsity" for="university">Add your university</label> <br>
                    <input type="text" name="varsity" id="varsity"> <br>

                    <label for="division">Add your division</label> <br>
                    <select name="division" id="division">
                        <option value="dhaka">Dhaka</option>
                        <option value="mymensingh">Mymensingh</option>
                        <option value="rajshahi">Rajshahi</option>
                        <option value="sylhet">Sylhet</option>
                        <option value="rangpur">Rangpur</option>
                        <option value="khulna">Khulna</option>
                        <option value="chattogram">Chattogram</option>
                        <option value="barishal">Barishal</option>
                    </select> <br>

                    <label id="errdistrict" for="district">Add your district</label> <br>
                    <input type="text" name="district" id="district"> <br>

                    <label id="errpoliceStation" for="policeStation">Add your police station</label> <br>
                    <input type="text" name="policestation" id="policestation"> <br>

                    <label id="errvillage" for="village">Add your village/road/area</label> <br>
                    <input type="text" name="village" id="area"> <br>

                    <label for="check">Click here to save</label> <br>
                    <input type="submit" name="submit" value="Save"> <br>
                </form>
            </div>
        </div>
    </div>
</div>

<?php }

?>

<script>
var updateBtn = document.getElementById("updateBtn");
updateBtn.addEventListener('click', function() {
    var father = document.getElementById("father").value;
    var mother = document.getElementById("mother").value;
    var school = document.getElementById("school").value;
    var college = document.getElementById("college").value;
    var varsity = document.getElementById("varsity").value;
    var district = document.getElementById("district").value;
    var policestation = document.getElementById("policestation").value;
    var area = document.getElementById("area").value;
    var userID = document.getElementById("userID").value;


    var dataString = "father1=" + father + "&mother1=" + mother + "&school1=" + school + "&college1=" +
        college + "&varsity1=" + varsity + "&district1=" + district + "&policestation1=" + policestation +
        "&area1=" + area + "&userID1=" + userID;

    $.ajax({
        type: "POST",
        data: dataString,
        url: "ajax/update_profile.php",
        success: function(html) {
            alert(html);
        }
    })
})
</script>

<script type="text/javascript" src="js/style.js"></script>
<?php include_once 'include/footer.php'; ?>