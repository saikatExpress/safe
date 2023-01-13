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

    $notice = $_POST['notice'];
    $date = $_POST['date'];
    $noticeDescription = $_POST['noticeDescription'];
    $id = $_SESSION['id'];

    move_uploaded_file($image_temp, $uploaded_pic);
    $query = "INSERT INTO admin_notice(notice_image,notice_title,notice_date,notice_description,u_id)VALUES('$unique_pic','$notice','$date','$noticeDescription','$id')";
    $data = $db->insert($query);
    if ($data) {
        echo "Successfully saved";
    } else {
        echo "Something wrong";
    }
}

?>


<div class="notice_area">
    <button type="button" id="noticeButton" class="noticeButton">Add Notice <i class="fa fa-plus"
            aria-hidden="true"></i></button>
    <div style="display: none;" class="notice_form_style" id="notice_form_style">
        <h4>Notice Info : </h4>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="notice_form">
                <label for="image">Add Image : </label> <br>
                <input type="file" name="image" id="image" required="1">
            </div>

            <div class="notice_form">
                <label for="notice">Give notice title : </label> <br>
                <input type="text" name="notice" id="notice" required="1">
            </div>

            <div class="notice_form">
                <label for="date">Notice Date : </label> <br>
                <input type="date" name="date" id="date" required="1">
            </div>

            <div class="notice_form">
                <label for="noticeDescription">Give notice description : </label> <br>
                <textarea name="noticeDescription" id="noticeDescription" cols="30" rows="5"></textarea>
            </div>

            <div class="notice_form">
                <label for="submit">Click to submit : </label> <br>
                <input type="submit" name="submit" id="submit" value="Submit">
            </div>
        </form>
    </div>
</div>


<div class="news_block_area">

    <div class="notice_left_side_menu">

        <div class="notice_category">
            <h2>Notice categories</h2>

            <p>
                >> Category 2 (108)
            </p>

            <p>
                >> Category 3 (25)
            </p>
        </div>

        <div class="notice_category">
            <h2>Recent Notice</h2>

            <?php

            $db = new DataBase();

            $query = "SELECT * FROM admin_notice";

            $data = $db->select($query);

            if ($data) {
                foreach ($data ?: [] as $value) { ?>
            <div class="recent_notice_block">
                <div class="recent_notice_flex">
                    <img src="upload/<?= $value['notice_image'] ?>" alt="no images">
                    <p>
                        <?= $value['notice_title'] ?>
                    </p>
                </div>
                <h6>17 jan,2023</h6>
            </div>
            <?php }
            } else {
                echo "No notice yet";
            }

            ?>




        </div>

    </div>

    <div class="notice_right_side_menu">
        <h2>Recent Notice</h2>

        <div class="main_notice">

            <div class="main_notice_flex">
                <div class="main_notice_img">
                    <img src="images/admin.jpeg" alt="no images">
                </div>
                <div class="main_notice_info">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit eligendi voluptates eius
                        impedit
                        voluptas nulla minus molestias quia nam esse incidunt at in laborum iure nisi aut expedita,
                        laudantium
                    </p>
                    <span>
                        27 nov, 2023
                    </span> |
                    <button>Read More -></button>
                </div>
            </div>

        </div>
    </div>

</div>



<script>
var noticeButton = document.getElementById("noticeButton");
noticeButton.addEventListener('click', function() {
    var notice_form_style = document.getElementById("notice_form_style");
    if (notice_form_style.style.display === 'none') {
        notice_form_style.style.display = 'block';
    } else {
        notice_form_style.style.display = 'none';
    }
})
</script>




<?php include_once 'include/footer.php'; ?>