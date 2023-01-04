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
                            <img src="logos/74519147-911-icon-isolated-with-shadow-alert-symbol.webp" alt="no images">
                            <figcaption>Fire Service</figcaption>
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
                            $cat = "fireservice";
                            $complain = $_POST['complain'];
                            $location = $_POST['location'];
                            $lat = $_POST['lat'];
                            $lng = $_POST['lng'];
                            $id = $_SESSION['id'];

                            $query = "INSERT INTO complains(category,problems,locations,latitude,longitude,u_id)VALUES('$cat','$complain','$location','$lat','$lng','$id')";
                            $data = $db->insert($query);
                            if ($data) { ?>
                        <p class="success_msg" id="success_msg">
                            <?php echo "Complain send successfully"; ?><span id="close" class="msg_bar">&times;</span>
                        </p>

                        <?php }
                        }

                        ?>



                        <script>
                        var close = document.getElementById("close");
                        close.addEventListener("click", function() {
                            var success_msg = document.getElementById("success_msg");
                            success_msg.style.display = "none";
                        });
                        </script>

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