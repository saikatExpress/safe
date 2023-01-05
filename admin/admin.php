<?php include_once 'include/header.php'; ?>


<h1 style="font-size: 25px;">Admin management | <span style="color: grey; font-size:18px;">Admin</span></h1>



<div class="all_admin">
    <div class="admin_name">
        <h2>Police</h2>

        <table class="admintable">

            <tr>
                <th>Name</th>
                <th>Key</th>
                <th>Password</th>
            </tr>

            <?php

            $db = new DataBase();

            $query = "SELECT * FROM police_station
            LEFT JOIN thana_admin ON police_station.p_id = thana_admin.police_station_id
             WHERE admin_category = 'police'";

            $data = $db->select($query);

            foreach ($data ?: [] as $value) { ?>
            <tr>
                <td><?= $value['p_name'] ?></td>
                <td><?= $value['police_station_key'] ?></td>
                <td><?= $value['police_station_password'] ?></td>
            </tr>
            <?php }

            ?>




        </table>

    </div>

    <div class="admin_name">
        <h2>Fire Service</h2>
        <table class="admintable">

            <tr>
                <th>Name</th>
                <th>Key</th>
                <th>Password</th>
            </tr>

            <?php

            $db = new DataBase();

            $query = "SELECT * FROM police_station
            LEFT JOIN thana_admin ON police_station.p_id = thana_admin.police_station_id
             WHERE admin_category = 'fireservice'";

            $data = $db->select($query);

            foreach ($data ?: [] as $value) { ?>
            <tr>
                <td><?= $value['p_name'] ?></td>
                <td><?= $value['police_station_key'] ?></td>
                <td><?= $value['police_station_password'] ?></td>
            </tr>
            <?php }

            ?>




        </table>
    </div>

    <div class="admin_name">
        <h2>Ambulance</h2>
        <table class="admintable">

            <tr>
                <th>Name</th>
                <th>Key</th>
                <th>Password</th>
            </tr>

            <?php

            $db = new DataBase();

            $query = "SELECT * FROM police_station
            LEFT JOIN thana_admin ON police_station.p_id = thana_admin.police_station_id
             WHERE admin_category = 'ambulance'";

            $data = $db->select($query);

            foreach ($data ?: [] as $value) { ?>
            <tr>
                <td><?= $value['p_name'] ?></td>
                <td><?= $value['police_station_key'] ?></td>
                <td><?= $value['police_station_password'] ?></td>
            </tr>
            <?php }

            ?>




        </table>
    </div>
</div>


<?php include_once 'include/footer.php'; ?>