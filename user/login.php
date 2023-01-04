<?php include_once 'format/loginformat.php'; ?>
<?php
$login = new loginpannel();
if (isset($_POST['submit'])) {
    $number = $_POST['number'];
    $password = $_POST['pass'];

    $loginCheck = $login->login($number, $password);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Help Line</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Kanit:wght@300&family=Libre+Baskerville&family=Lobster&family=Oswald:wght@500&family=Pacifico&family=Satisfy&family=Source+Sans+Pro:wght@300&family=Source+Serif+Pro:wght@300&family=Space+Mono:ital,wght@1,400;1,700&family=Vollkorn:ital@1&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="images/help-line.png" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />



</head>

<body>
    <div class="login_page">

        <div class="login_box">
            <img src="logos/emergency-symbol-new-reflection-white-background-41040034.jpg" alt="no images">
            <div class="login_form">

                <?php

                if (isset($loginCheck)) {
                    echo "<h4 style='color:red;'>$loginCheck</h4>";
                }

                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="login_form">
                        <label for="number"></label>
                        <input type="text" placeholder="Number or email" name="number" id="number" autocomplete="off">
                    </div>

                    <div class="login_form">
                        <label for="password"></label>
                        <input type="password" placeholder="Password" name="pass" id="password" autocomplete="off">
                    </div>

                    <div class="login_form">
                        <label for="submit"></label>
                        <input type="submit" name="submit" value="Log In" autocomplete="off">
                    </div>
                </form>
            </div>

            <p>
                Not a member ? <a href="signup.php">Signup</a>
            </p>
        </div>
    </div>
</body>

</html>