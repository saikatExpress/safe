<?php include_once 'include/header.php'; ?>


<?php

$db = new DataBase();

if (isset($_GET['c_id'])) {
    $cId = $_GET['c_id'];

    $query = "SELECT * FROM complains
LEFT JOIN action_complain ON complains.c_id = action_complain.complainId
LEFT JOIN profile_pic ON complains.u_id = profile_pic.u_id
LEFT JOIN complain_feedback ON complains.c_id = complain_feedback.com_id
LEFT JOIN user_reg ON complains.u_id = user_reg.id
WHERE complains.c_id = '$cId'";

    $data = $db->select($query);

    foreach ($data ?: [] as $value) {
        $policeId = $value['police_station_id'];
        $comFeed = $value['com_id'];
        $comId = $value['complainId'];
        $query1 = "SELECT * FROM police_station WHERE p_id = '$policeId'";
        $data1 = $db->select($query1);
        foreach ($data1 ?: [] as $value1) {
        }
    }
}

?>

<div class="com_status">
    <h2 style="font-family: 'Itim', cursive;">Complain Status</h2>
    <hr>
    <div class="action_view_panel">
        <div class="com_user_img">
            <img src="../user/upload/<?= $value['images'] ?>" alt="">
        </div>



        <div class="com_state">
            <h4>
                <?= $value['firstname'] . " " . $value['lastname'] ?>
            </h4>

            <?php

            if ($comId == $comFeed) { ?>
            <mark><?= $value['complain_status'] ?></mark>
            <?php } else { ?>
            <mark>Pending</mark>
            <?php }


            ?>


            <p>
                <span>Operation by : </span> <?php
                                                if ($value['complain_comment'] == '') {
                                                    echo "Operation running";
                                                } else {
                                                    echo $value['complain_comment'];
                                                }
                                                ?>
            </p>


            <p>
                Complain No : <?= $value['c_id'] ?>
            </p>

            <p>
                <span>Action on : </span> <?= $value1['p_name'] ?>
            </p>

            <p>
                <span>Category : </span> <?= $value['category'] ?>
            </p>


            <Label>Give Feedback : </Label>
            <form action="" method="POST">

                <div style="display: none;">
                    <input type="text" name="complainId" id="complainId" value="<?= $cId ?>"> <br>
                    <input type="text" name="policeStationId" id="policeStationId" value="<?= $policeId ?>"> <br>
                    <input type="text" name="userId" id="userId" value="<?= $value['id'] ?>"> <br>
                    <input type="text" name="adminId" id="adminid" value="<?= $_SESSION['id'] ?>"> <br>
                </div>

                <textarea name="admin_feed" id="adminFeed" cols="30" rows="5"
                    placeholder="Write your message..."></textarea>
                <br>
                <button type="button" id="adminRep">Send</button>
            </form>


            <div id="div1">

            </div>

        </div>

    </div>

</div>



<script>
var adminRep = document.getElementById("adminRep");
adminRep.addEventListener('click', function() {
    var complainId = document.getElementById('complainId').value;
    var policeStationId = document.getElementById("policeStationId").value;
    var userId = document.getElementById("userId").value;
    var adminid = document.getElementById("adminid").value;
    var adminFeed = document.getElementById('adminFeed').value;
    var div1 = document.getElementById("div1");

    var dataString = "complainId1=" + complainId + "&policeStationId1=" + policeStationId + "&userId1=" +
        userId + "&adminid1=" + adminid + "&adminFeed1=" + adminFeed;

    if (adminFeed == '') {
        alert("Please write something");
    } else {
        $.ajax({
            type: "POST",
            data: dataString,
            url: 'ajax/admin_complain_msg.php',
            success: function(html) {
                div1.innerHTML = html;
            }
        })
    }

})
</script>




<?php include_once 'include/footer.php'; ?>