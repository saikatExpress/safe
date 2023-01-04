<?php include_once 'format/loginformat.php'; ?>
<?php
$login = new loginpannel();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $logincheck = $login->login($email, $pass);
}

if (isset($logincheck)) {
    echo $logincheck;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Log in</title>
    <link rel="shortcut icon" type="image/png" href="images/key.png" />
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
    <link rel="stylesheet" href="css/log.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="log_center">
                <div class="log_center_block">
                    <div class="log_all">
                        <div class="log_block">
                            <img src="images/key.png" alt="no images">
                        </div>

                        <div class="log_title">
                            <h4>Log in administrator</h4>
                        </div>
                    </div>

                    <form action="" method="post">
                        <div class="log_input">
                            <input type="text" name="email" id="email" placeholder="your email" autocomplete="off">
                        </div>

                        <div class="log_input">
                            <input type="password" name="password" id="password" placeholder="your password"
                                autocomplete="off">
                        </div>

                        <div class="log_input">
                            <input type="submit" name="submit" value="Log in">
                        </div>
                    </form>
                    <p class="log_bottom">Developed by <b style="color: darkblue;">TS group</b></p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>