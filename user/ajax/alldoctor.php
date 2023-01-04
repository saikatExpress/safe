<?php include_once '../library/database.php'; ?>

<?php

$db = new DataBase();
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $query = "SELECT * FROM all_doctor WHERE doctor_name LIKE '%" . $name . "%'";
    $data = $db->select($query);
    $output = '<ul>';
    if ($data) {
        foreach ($data ?: [] as $value) {
            $output .= '<li>' . $value['doctor_name'] . '</li>';
        }
    } else {
        $output .= '<li>No result found</li>';
    }
    $output .= '</ul>';
    echo $output;
}




?>