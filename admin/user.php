<?php include_once 'include/header.php'; ?>





<div class="user_list">
    <h4>User List | <span style="color: gray;">User's</span></h4>
    <div class="all-user">

        <?php

        $db = new DataBase();
        $query = "SELECT * FROM user_reg";
        $data = $db->select($query);
        foreach ($data ?: [] as $value) { ?>
        <div class="all_user_list">
            <div class="user_id">
                <h1><?php echo $value['id']; ?></h1>
            </div>
            <div class="user_name">
                <h2><?php echo $value['firstname'] . " " . $value['lastname']; ?></h2>
            </div>
            <div class="user_type">
                <h3><?php echo $value['gender']; ?></h3>
            </div>
            <div class="user_action">
                <button>Delete</button>
            </div>
            <div class="user_view">
                <a href="user_view.php?u_id=<?php echo $value['id']; ?>">View</a>
            </div>
        </div>
        <?php }

        ?>






    </div>
</div>













<?php include_once 'include/footer.php'; ?>