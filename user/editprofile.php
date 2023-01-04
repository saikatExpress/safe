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
    if ($data) {
        header("Location: profile.php");
    } else {
        echo "Something wrong";
    }
}

?>

<div class="container">
    <div class="row">
        <div class="profile_edit">
            <form style="display: inline-grid;" action="" method="POST" onsubmit="return formValidate();">
                <label id="ferror" for="father">Add your father name</label>
                <input type="text" name="father" id="father">

                <label id="merror" for="mother">Add your mother name</label>
                <input type="text" name="mother" id="mother">

                <label id="erschool" for="school">Add your school</label>
                <input type="text" name="school" id="school">

                <label id="ercollege" for="college">Add your college</label>
                <input type="text" name="college" id="college">

                <label id="errvarsity" for="university">Add your university</label>
                <input type="text" name="varsity" id="varsity">

                <label for="division">Add your division</label>
                <select name="division" id="division">
                    <option value="dhaka">Dhaka</option>
                    <option value="mymensingh">Mymensingh</option>
                    <option value="rajshahi">Rajshahi</option>
                    <option value="sylhet">Sylhet</option>
                    <option value="rangpur">Rangpur</option>
                    <option value="khulna">Khulna</option>
                    <option value="chattogram">Chattogram</option>
                    <option value="barishal">Barishal</option>
                </select>

                <label id="errdistrict" for="district">Add your district</label>
                <input type="text" name="district" id="district">

                <label id="errpoliceStation" for="policeStation">Add your police station</label>
                <input type="text" name="policestation" id="policestation">

                <label id="errvillage" for="village">Add your village/road/area</label>
                <input type="text" name="village" id="area">

                <label for="check">Click here to save</label>
                <input type="submit" name="submit" value="Save">
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/style.js"></script>
<?php include_once 'include/footer.php'; ?>