<?php include_once 'include/header.php'; ?>




<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="side_tab">
                <div style="display: inline-grid;" class="tab_button">
                    <button onclick="opencity('allphotos')"> All photos</button>
                    <button onclick="opencity('profile')">Profile Picture's</button>
                    <button onclick="opencity('cover')">Cover Picture's</button>
                    <button onclick="opencity('album')">Album's</button>
                </div>
            </div>
        </div>
        <div class="col-lg-9 photo">
            <div id="allphotos" class="picture_style_active">
                <h4>All Photos</h4>
                <?php

                $db = new DataBase();
                $query = "SELECT * FROM profile_pic WHERE u_id = '$id' ORDER BY added_time DESC ";
                $data = $db->select($query);
                foreach ($data ?: [] as $value) { ?>
                <div class="gallery">
                    <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                    <div class="desc">Add a description of the image here</div>
                </div>
                <?php  }

                ?>

                <?php

                $db = new DataBase();
                $query = "SELECT * FROM cover_photo WHERE u_id = '$id'";
                $data = $db->select($query);
                foreach ($data ?: [] as $value) { ?>
                <div class="gallery">
                    <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                    <div class="desc">Add a description of the image here</div>
                </div>
                <?php  }

                ?>


            </div>

            <div id="profile" class="picture_style">
                <h4>Profile Picture's</h4>
                <?php

                $db = new DataBase();
                $id = $_SESSION['id'];
                $query = "SELECT * FROM profile_pic WHERE u_id = '$id'";
                $res = $db->select($query);
                foreach ($res ?: [] as $value) {  ?>
                <div class="images_desc_card">
                    <div class="photos_action">
                        <b>...</b>
                    </div>
                    <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                    <div class="photos_title">
                        <h6>Profile Picture</h6>
                        <span>15 sep,2022</span> <br>
                        <i>10.12 pm</i>
                    </div>
                </div>
                <?php  }
                ?>

            </div>


            <div id="cover" class="picture_style">
                <h4>Cover Picture's</h4>
                <?php

                $db = new DataBase();
                $id = $_SESSION['id'];
                $query = "SELECT * FROM cover_photo WHERE u_id = '$id'";
                $res = $db->select($query);
                foreach ($res ?: [] as $value) {  ?>
                <div class="images_desc_card">
                    <div class="photos_action">
                        <b>...</b>
                    </div>
                    <img src="upload/<?php echo $value['images']; ?>" alt="no images">
                    <div class="photos_title">
                        <h6>Profile Picture</h6>
                        <span>15 sep,2022</span> <br>
                        <i>10.12 pm</i>
                    </div>
                </div>
                <?php  }
                ?>
            </div>


            <div id="album" class="picture_style">
                <h4>Album's</h4>
                <img src="images/41f0d4041175d8634c7acc92f9d23877.jpg" alt="no images">
            </div>

        </div>
    </div>
</div>

<?php include_once 'include/footer.php'; ?>
<script type="text/javascript" src="js/style.js"></script>