<?php include_once 'library/database.php'; ?>
<?php

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $db = new DataBase();
    $query = "SELECT * FROM bangladesh WHERE division_name = '$q'";
    $data = $db->select($query);
    foreach ($data ?: [] as $value) { ?>
<option value="<?= $value['id'] ?>"><?= $value['district_name'] ?></option>


<?php }
}

?>