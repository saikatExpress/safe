<?php include_once 'library/database.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Help Line</title>

    <!--Font famile of google font link--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Kanit:wght@300&family=Libre+Baskerville&family=Lobster&family=Oswald:wght@500&family=Pacifico&family=Satisfy&family=Space+Mono:ital,wght@1,400;1,700&family=Vollkorn:ital@1&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali&display=swap" rel="stylesheet">
    <!--Font famile of google font link--->

    <link rel="shortcut icon" type="image/png" href="images/help-line.png" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>


    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/slick-theme.css" />


    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>


    <header>

        <div class="password_header">
            <div class="pass_header_section">

                <div class="pass_header_title">
                    <h2>Emergency Help Service</h2>
                </div>

                <div class="pass_header_left">
                    <a href="logout.php">Log out</a>
                </div>

            </div>
        </div>
    </header>

    <div class="password_form">
        <div class="password_form_block">
            <form action="" method="post">

                <?php

                $db = new DataBase();

                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];

                    $query = "SELECT * FROM user_reg WHERE email = '$email'";

                    $data = $db->select($query);

                    if ($data) {
                        foreach ($data ?: [] as $value) {
                            $id = $value['id'];
                            $query1 = "SELECT * FROM profile_pic WHERE u_id = '$id' ORDER BY id DESC LIMIT 1";
                            $data1 = $db->select($query1);
                            foreach ($data1 ?: [] as $value1) { ?>
                <div class="pass_info">
                    <div class="pass_user">

                        <div class="pass_user_block">
                            <img src="upload/<?= $value1['images'] ?>" alt="no image">
                            <h4><?= $value['firstname'] . " " . $value['lastname'] ?></h4>
                        </div>

                        <div class="reset_pass">
                            <a href="reset_password.php?u_id=<?= $value['id'] ?>">Set your new password</a>
                        </div>

                    </div>
                </div>
                <?= exit() ?>
                <?php }
                        }
                    } else { ?>
                <p class="pass_P">Email not found</p>
                <?php }
                }

                ?>

                <label for="email">Enter your E-mail</label> <br>
                <input type="email" name="email" required="1"> <br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>


    </div>



</body>

</html>