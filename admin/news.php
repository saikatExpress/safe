<?php include_once 'include/header.php'; ?>

<?php

$db = new DataBase();
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $title = $_POST['title'];

    $permitted = array('jpg', 'jpeg', 'png', 'gif');
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $image);
    $file_text = strtolower(end($div));
    $unique_pic = substr(md5(time()), 0, 10) . '.' . $file_text;
    $uploaded_pic = "upload/" . $unique_pic;
    $paragraph = $_POST['paragraph'];
    $id = $_SESSION['id'];

    if ($date == '' || $title == '' || $unique_pic == '' || $paragraph == '') {
        echo "Please fill the input field";
    } else {
        move_uploaded_file($image_temp, $uploaded_pic);
        $query = "INSERT INTO news(n_date,title,photo,n_paragraph,u_id)VALUES('$date','$title','$unique_pic','$paragraph','$id')";
        $data = $db->insert($query);
        if ($data) { ?>
<p id="success_msg" class="success_msg">
    <strong> <?php echo "Data save Successfully"; ?> ! <b style="color: orange;">Thanks</b></strong>
    <span id="close">&times;</span>
</p>
<?php  }
    }
}

?>

<h4>Add news panel</h4>

<div class="add_news">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="activity_input">
            <label for="date">Date : </label> <br>
            <input type="date" name="date" id="date">
        </div>

        <div class="activity_input">
            <label for="title">Title : </label> <br>
            <input type="text" name="title" id="title">
        </div>


        <div class="activity_input">
            <label for="Image">Photo : </label> <br>
            <input type="file" name="image" id="image">
        </div>


        <div class="activity_input">
            <label for="paragraph">News Paragraph : </label> <br>
            <textarea name="paragraph" id="paragraph" cols="100" rows="15"></textarea>
        </div>


        <div class="activity_input">
            <label for="submit">Click submit to save : </label> <br>
            <input type="submit" name="submit" value="Submit">
        </div>



    </form>
</div>



<?php include_once 'include/footer.php'; ?>