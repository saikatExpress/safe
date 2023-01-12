<?php include_once 'include/header.php'; ?>


<div class="admin_create_panel">
    <h1 style="font-size: 25px;">Admin management | <span style="color: grey; font-size:18px;">Admin</span></h1>
    <button type="button" id="createAdmin">Create Super Admin + </button>
</div>


<div class="create_admin_form">
    <div style="display: none;" id="my_form_style" class="my_form_style">
        <form action="" method="post">
            <label for="firstname">Admin Firstname : </label> <br>
            <input type="text" name="firstname" id="firstname" required="1"> <br>
            <label for="lastname">Admin Lastname : </label> <br>
            <input type="text" name="lastname" id="lastname" required="1"> <br>
            <label for="email">Admin email : </label> <br>
            <input type="email" name="email" id="email" required="1"> <br>
            <label for="password">Admin password : </label> <br>
            <input type="password" name="a_password" id="aPassword" required="1"> <br>
            <label for="confirmPassword">Confirm Password : </label> <br>
            <input type="password" name="c_password" id="cPassword" required="1"> <br>
            <label for="submit">Click to Save : </label> <br>
            <button>Save</button>
        </form>
    </div>
</div>



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

<script>
var createAdmin = document.getElementById("createAdmin");
createAdmin.addEventListener('click', function() {
    var my_form_style = document.getElementById("my_form_style");
    if (my_form_style.style.display === 'none') {
        my_form_style.style.display = 'block';
    } else {
        my_form_style.style.display = 'none';
    }
})
</script>


<?php include_once 'include/footer.php'; ?>