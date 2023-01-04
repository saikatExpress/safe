<?php include_once 'library/database.php'; ?>
<?php

$w = $_REQUEST['w'];
$db = new DataBase();
$w = $_REQUEST['w'];
$query = "SELECT * FROM hospital WHERE d_id = '$w'";
$data = $db->select($query);
foreach ($data ?: [] as $value) { ?>
<div class="hospital_block">
    <div class="hospital_list_var">
        <h6><?php echo $value['h_name']; ?></h6>
        <span><i class="fa fa-star fav_icon" aria-hidden="true"></i> <i class="fa fa-star fav_icon"
                aria-hidden="true"></i>
            <i class="fa fa-star fav_icon" aria-hidden="true"></i><i class="fa fa-star fav_icon"
                aria-hidden="true"></i></span>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $value['address']; ?>
        </p>
        <p>
            <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $value['contact_num']; ?>
        </p>
        <a href="<?php $value['website_url']; ?>"><i class="fa fa-globe" aria-hidden="true"></i>Visit website</a>
    </div>

    <div class="hospital_query">
        <a href="hospital_mail.php?h_id=<?php echo $value['id']; ?>">
            <i class="fa fa-envelope-o" aria-hidden="true"></i> Send Mail
        </a>
    </div>
</div>
<?php }


?>