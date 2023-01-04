<?php include_once 'include/header.php'; ?>


<div class="doctor_page_menu">
    <div class="page_menu_block">
        <a href="add_doctor.php">Add Doctor</a>
        <a href="update_doctor.php">Update Doctor List</a>
        <a href="update_area.php">Upadate Area</a>
    </div>
</div>

<div class="all_doctor_list">
    <div class="doctor_list_table">
        <h2>All Doctor List</h2>
        <table style="width: 100%; border:2px ridge grey;">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Hospital</th>
                <th>Category</th>
                <th>Action</th>
            </tr>

            <?php

            $db = new DataBase();
            $sl = 0;
            $query = "SELECT * FROM all_doctor ORDER BY doc_id DESC";
            $data = $db->select($query);
            foreach ($data ?: [] as $value) { ?>
            <?php
                $sl++;
                ?>
            <tr>
                <td><?php echo $sl; ?></td>
                <td>
                    <a href="doctor_view.php?docId=<?php echo $value['doc_id']; ?>"><?php echo $value['doctor_name']; ?>
                    </a>
                </td>
                <td><?php echo $value['institute_name']; ?></td>
                <td><?php echo $value['doctor_speciality']; ?></td>
                <td><button value="<?php echo $value['doc_id']; ?>" type="button" name="update"
                        id="update">Update</button></td>
            </tr>
            <?php }

            ?>
        </table>
    </div>
</div>


<?php include_once 'include/footer.php'; ?>