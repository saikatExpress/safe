<?php include_once 'library/database.php';  ?>

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

    <section>



        <div class="reset_password">
            <div class="reset_pass_block">


                <?php

                $db = new DataBase();

                if (isset($_GET['u_id'])) {
                    $uid = $_GET['u_id'];
                }

                if (isset($_POST['submit'])) {
                    $pass = $_POST['pass'];
                    $confirmPass = $_POST['confirmPass'];

                    if ($pass != $confirmPass) {
                        echo "password does not match";
                    } else {
                        $query = "UPDATE user_reg SET password = '$pass' , conpass = '$confirmPass' WHERE id = '$uid'";
                        $data = $db->update($query);
                        if ($data) { ?>
                <div class="reset_msg">
                    <p>Password reset Successfully</p>
                    <a href="login.php">Back to login</a>
                    <?= exit() ?>
                </div>
                <?php }
                    }
                }

                ?>



                <form action="" method="post">
                    <label for="password">Set your new password : </label> <br>
                    <input type="password" name="pass" id="pass" required="1"> <br>
                    <label for="confirmPass">Re-type your password : </label> <br>
                    <input type="password" name="confirmPass" id="confirmPass" required="1"> <br>
                    <input type="submit" name="submit" value="Update">
                </form>
            </div>
        </div>
    </section>
</body>

</html>