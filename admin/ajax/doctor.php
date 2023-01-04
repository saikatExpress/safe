<?php include_once '../library/database.php' ?>

<?php

$db = new DataBase();

if (isset($_POST['division1'])) {
    $division1 = $_POST['division1'];
    $query = "SELECT * FROM b_district WHERE dv_id = '$division1'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) { ?>
<option value="<?php echo $value['dt_id']; ?>"><?php echo $value['district_name']; ?></option>
<?php }
}

?>