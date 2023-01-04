<?php include_once '../library/database.php'; ?>

<?php

$db = new DataBase();
if (isset($_POST['upazila1'])) {
    $upazila1 = $_POST['upazila1'];
    $query = "SELECT * FROM b_upazila WHERE district_id = '$upazila1'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) { ?>
<option value="<?php echo $value['uz_id']; ?>"><?php echo $value['upazila_name']; ?></option>
<?php }
}

?>