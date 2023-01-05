<?php include_once 'include/header.php'; ?>




<h1>All Complain</h1>

<div class="admin_name">
    <h2>Police</h2>

    <table class="admintable">

        <tr>
            <th>Com ID</th>
            <th>Name</th>
            <th>Problem</th>
            <th>Location</th>
            <th>Status</th>
        </tr>

        <?php

        $db = new DataBase();

        $query = "SELECT * FROM complains
            LEFT JOIN user_reg ON complains.u_id = user_reg.id
            LEFT JOIN complain_feedback ON complains.c_id = complain_feedback.com_id
             WHERE complains.category = 'police'";

        $data = $db->select($query);

        foreach ($data ?: [] as $value) { ?>
        <tr>
            <td><?= $value['c_id'] ?></td>
            <td><?= $value['firstname'] . " " . $value['lastname'] ?></td>
            <td><?= $value['problems'] ?></td>
            <td><?= $value['locations'] ?></td>
            <td><?php
                    if ($value['complain_status'] == '') {
                        echo "Pending";
                    } else {
                        echo $value['complain_status'];
                    }
                    ?></td>
        </tr>
        <?php }

        ?>




    </table>

</div>





<div class="admin_name">
    <h2>Fire Service</h2>

    <table class="admintable">

        <tr>
            <th>Com ID</th>
            <th>Name</th>
            <th>Problem</th>
            <th>Location</th>
            <th>Status</th>
        </tr>

        <?php

        $db = new DataBase();

        $query = "SELECT * FROM complains
            LEFT JOIN user_reg ON complains.u_id = user_reg.id
            LEFT JOIN complain_feedback ON complains.c_id = complain_feedback.com_id
             WHERE complains.category = 'ambulance'";

        $data = $db->select($query);

        foreach ($data ?: [] as $value) { ?>
        <tr>
            <td><?= $value['c_id'] ?></td>
            <td><?= $value['firstname'] . " " . $value['lastname'] ?></td>
            <td><?= $value['problems'] ?></td>
            <td><?= $value['locations'] ?></td>
            <td><?php
                    if ($value['complain_status'] == '') {
                        echo "Pending";
                    } else {
                        echo $value['complain_status'];
                    }
                    ?></td>
        </tr>
        <?php }

        ?>




    </table>

</div>


<div class="admin_name">
    <h2>Ambulance</h2>

    <table class="admintable">

        <tr>
            <th>Com ID</th>
            <th>Name</th>
            <th>Problem</th>
            <th>Location</th>
            <th>Status</th>
        </tr>

        <?php

        $db = new DataBase();

        $query = "SELECT * FROM complains
            LEFT JOIN user_reg ON complains.u_id = user_reg.id
            LEFT JOIN complain_feedback ON complains.c_id = complain_feedback.com_id
             WHERE complains.category = 'fireservice'";

        $data = $db->select($query);

        foreach ($data ?: [] as $value) { ?>
        <tr>
            <td><?= $value['c_id'] ?></td>
            <td><?= $value['firstname'] . " " . $value['lastname'] ?></td>
            <td><?= $value['problems'] ?></td>
            <td><?= $value['locations'] ?></td>
            <td><?php
                    if ($value['complain_status'] == '') {
                        echo "Pending";
                    } else {
                        echo $value['complain_status'];
                    }
                    ?></td>
        </tr>
        <?php }

        ?>




    </table>

</div>










<?php include_once 'include/footer.php'; ?>