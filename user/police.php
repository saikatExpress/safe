<?php include_once 'include/header.php'; ?>

<?php

$db = new DataBase();
$id = $_SESSION['id'];
$query = "SELECT * FROM user_reg
LEFT JOIN profile_pic ON user_reg.id = profile_pic.u_id WHERE user_reg.id = '$id'";
$data = $db->select($query);
foreach ($data ?: [] as $value) {
}

?>

<body onload="getLocation();">
    <section>
        <!--Police page html code start from here-->
        <div class="container">
            <div class="row police">
                <div class="police_complain">
                    <div class="user_page_title">
                        <figure>
                            <img src="logos/112-emergency-call-number-400-229498974.jpg" alt="no images">
                            <figcaption>Bangladesh Police</figcaption>
                            <figcaption>Dhaka Division</figcaption>
                        </figure>


                        <div class="user_title_image">
                            <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                            <h4><?php echo $value['firstname'] . " " . $value['lastname']; ?></h4>
                            <b style="padding: 75px;"><?php echo $value['mobile']; ?></b>
                        </div>
                    </div>
                    <div class="complain_form">

                        <?php

                        $db = new DataBase();
                        if (isset($_POST['submit'])) {
                            $cat = "police";
                            $complain = $_POST['complain'];
                            $location = $_POST['location'];
                            $lat = $_POST['lat'];
                            $lng = $_POST['lng'];
                            $id = $_SESSION['id'];

                            $query = "INSERT INTO complains(category,problems,locations,latitude,longitude,u_id)VALUES('$cat','$complain','$location','$lat','$lng','$id')";
                            $data = $db->insert($query);
                            if ($data) {
                                echo "Complain send successfully";
                            }
                        }

                        ?>
                        <form class="myForm" action="" method="POST" enctype="multipart/form-data">
                            <table style="margin: 0 auto;">
                                <tr>
                                    <td>
                                        <input type="text" name="complain" id="complain" placeholder="Complain">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="text" name="location" id="location" placeholder="Location">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="text" name="lat">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="text" name="lng">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="submit" name="submit" value="Send">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Police page html code end from here-->
    </section>


</body>
<?php include_once 'include/footer.php'; ?>

<script type="text/javascript" src="js/style.js"></script>