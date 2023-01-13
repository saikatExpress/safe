<?php include_once 'include/header.php'; ?>

<?php

$db = new DataBase();

if (isset($_POST['submit'])) {


    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $image);
    $file_text = strtolower(end($div));
    $unique_pic = substr(md5(time()), 0, 10) . '.' . $file_text;
    $uploaded_pic = "upload/" . $unique_pic;

    $eventTitle = $_POST['eventTitle'];
    $eventHost = $_POST['eventHost'];
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $endDate = $_POST['endDate'];
    $endTime = $_POST['endTime'];
    $description = $_POST['description'];
    $eventType = $_POST['eventType'];
    $eventRules = $_POST['eventRules'];
    $eventLocation = $_POST['eventLocation'];
    $locationMap = $_POST['locationMap'];
    $coHost = $_POST['coHost'];
    $sponsor = $_POST['sponsor'];
    $id = $_SESSION['id'];

    move_uploaded_file($image_temp, $uploaded_pic);
    $query = "INSERT INTO admin_event(event_cover_photo,event_title,event_host,start_date,start_time,end_date,end_time,event_description,event_type,event_status,event_location,location_map,event_co_host,event_sponsor,u_id)VALUES('$unique_pic','$eventTitle','$eventHost','$startDate','$startTime','$endDate','$endTime','$description','$eventType','$eventRules','$eventLocation','$locationMap','$coHost','$sponsor','$id')";

    $data = $db->insert($query);
}


?>

<div class="add_event">

    <div class="event_menu_header">
        <button type="button" id="eventButton">Create Event <i class="fa fa-plus" aria-hidden="true"></i></button>
    </div>


    <div class="event_form_block">

        <div style="display: none;" id="event_form_style_block" class="event_form_style_block">
            <h2>Event Form</h2>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="event_form">
                    <label for="image">Add Cover Photo : </label> <br>
                    <input type="file" name="image" id="image" required="1">
                </div>

                <div class="event_form">
                    <label for="eventTitle">Event title : </label> <br>
                    <input type="text" name="eventTitle" id="eventTitle" required="1">
                </div>

                <div class="event_form">
                    <label for="eventHost">Event Host : </label> <br>
                    <input type="text" name="eventHost" id="eventHost" required="1">
                </div>

                <div class="event_form">
                    <label for="startDate">Start Date : </label> <br>
                    <input type="date" name="startDate" id="startDate" required="1">
                </div>

                <div class="event_form">
                    <label for="startTime">Start Time : </label> <br>
                    <input type="time" name="startTime" id="startTime" required="1">
                </div>

                <div class="event_form">
                    <label for="endDate">End Date : </label> <br>
                    <input type="date" name="endDate" id="endDate" required="1">
                </div>

                <div class="event_form">
                    <label for="endTime">End Time : </label> <br>
                    <input type="time" name="endTime" id="endTime" required="1">
                </div>

                <div class="event_form">
                    <label for="description">Event Description : </label> <br>
                    <textarea name="description" id="description" cols="30" rows="5"></textarea>
                </div>

                <div class="event_form">
                    <label for="eventType">Event Type : </label> <br>
                    <select name="eventType" id="eventType" required="1">
                        <option value="">Select</option>
                        <option value="person">In Person</option>
                        <option value="virtual">Virtual</option>
                    </select>
                </div>

                <div class="event_form">
                    <label for="eventRules">How can See this: </label> <br>
                    <select name="eventRules" id="eventRules" required="1">
                        <option value="">Select</option>
                        <option value="open air">Open air</option>
                        <option value="with ticket">With ticket</option>
                        <option value="without ticket">Without Ticket</option>
                    </select>
                </div>

                <div class="event_form">
                    <label for="eventLocation">Add Event Location: </label> <br>
                    <input type="text" name="eventLocation" id="eventLocation" required="1">
                </div>

                <div class="event_form">
                    <label for="locationMap">Add Event Location Map: </label> <br>
                    <input type="text" name="locationMap" id="locationMap" required="1">
                </div>

                <div class="event_form">
                    <label for="coHost">Add Co Host : </label> <br>
                    <input type="text" name="coHost" id="coHost" required="1">
                </div>

                <div class="event_form">
                    <label for="sponsor">Add Sponsor : </label> <br>
                    <input type="text" name="sponsor" id="sponsor" required="1">
                </div>

                <div class="event_form">
                    <label for="submit">Click to submit : </label> <br>
                    <input type="submit" name="submit" id="submit" value="Submit">
                </div>

            </form>
        </div>
    </div>

</div>


<div class="event_card_block">
    <h2>Event's</h2>
    <div class="event_card">
        <?php

        $db = new DataBase();

        $query = "SELECT * FROM admin_event";
        $data = $db->select($query);
        foreach ($data ?: [] as $value) { ?>


        <?php

            $start_date = date_create($value['start_date']);
            $dateFormat = date_format($start_date, 'd M');
            $end_date = date_create($value['end_date']);
            $dateFormat1 = date_format($end_date, 'd M,Y');


            ?>

        <div class="card cardStyle" style="width: 18rem;">
            <img class="card-img-top" src="upload/<?= $value['event_cover_photo'] ?>" alt="no images">
            <div class="card-body">
                <h5 style="color:#000;" class="card-title"><?= $value['event_title'] ?></h5>
                <p style="color:#000;" class="card-text"><?= substr($value['event_description'], 0, 95) . "..." ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li style="color:#000;" class="list-group-item"><span style="font-weight: bold; color:#000;">From :
                    </span><?= $dateFormat ?> <span> -
                    </span><?= $dateFormat1 ?></li>
                <li style="color:#000;" class="list-group-item"><span style="font-weight: bold; color:#000;">Sponsored
                        by :
                    </span><?= $value['event_sponsor'] ?></li>
                <li style="color:#000;" class="list-group-item"><span style="font-weight: bold; color:#000;">Starting
                        time :
                    </span><?= $value['start_time'] ?></li>
            </ul>

        </div>
        <?php }

        ?>


    </div>
</div>


<script>
var eventButton = document.getElementById("eventButton");
eventButton.addEventListener('click', function() {
    var event_form_style_block = document.getElementById("event_form_style_block");
    if (event_form_style_block.style.display === 'none') {
        event_form_style_block.style.display = 'block';
    } else {
        event_form_style_block.style.display = 'none';
    }
})
</script>

<?php include_once 'include/footer.php'; ?>