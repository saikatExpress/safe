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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Kanit:wght@300&family=Libre+Baskerville&family=Lobster&family=Oswald:wght@500&family=Pacifico&family=Satisfy&family=Source+Sans+Pro:wght@300&family=Source+Serif+Pro:wght@300&family=Space+Mono:ital,wght@1,400;1,700&family=Vollkorn:ital@1&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="images/help-line.png" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />

    <style media="screen">
    *,
    *:before,
    *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #080710;
    }

    .background {
        width: 430px;
        height: 520px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
    }

    .background .shape {
        height: 200px;
        width: 200px;
        position: absolute;
        border-radius: 50%;
    }

    .shape:first-child {
        background: linear-gradient(#1845ad,
                #23a2f6);
        left: -80px;
        top: -80px;
    }

    .shape:last-child {
        background: linear-gradient(to right,
                #ff512f,
                #f09819);
        right: -30px;
        bottom: -80px;
    }

    form {
        height: 565px;
        width: 400px;
        background-color: rgba(255, 255, 255, 0.13);
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
    }

    form * {
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
    }

    form h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
    }

    label {
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
    }

    input {
        display: block;
        height: 50px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
    }

    ::placeholder {
        color: #e5e5e5;
    }

    button {
        margin-top: 50px;
        width: 100%;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
    }

    .social {
        margin-top: 30px;
        display: flex;
    }

    .social div {
        background: red;
        width: 150px;
        border-radius: 3px;
        padding: 5px 10px 10px 5px;
        background-color: rgba(255, 255, 255, 0.27);
        color: #eaf0fb;
        text-align: center;
    }

    .social div:hover {
        background-color: rgba(255, 255, 255, 0.47);
    }

    .social .fb {
        margin-left: 25px;
    }

    .social i {
        margin-right: 4px;
    }

    .alertHead {
        color: darkred;
        background-color: beige;
        text-align: center;
        padding: 5px;
        border-radius: 4px;
    }
    </style>

</head>

<body>
    <div class="login_page">

        <div class="login_box">
            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">
                <?php

                if (isset($loginCheck)) { ?>
                <h4 class="alertHead"><?= $loginCheck ?></h4>
                <?php  }

                ?>
                <h3>Login Here</h3>

                <label for="username">Username</label>
                <input type="text" name="number" id="number" autocomplete="off" placeholder="Email or Phone"
                    id="username" required="1">

                <label for="password">Password</label>
                <input class="ppp" type="password" placeholder="Password" name="pass" id="password" autocomplete="off"
                    required="1">

                <button type="submit" name="submit">Log In</button>
                <div class="social">
                    <div class="go"><i class="fab fa-google"></i> Google</div>
                    <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
                </div>

                <p>
                    Not a member ? <a href="signup.php">Signup</a>
                </p>

            </form>




        </div>
    </div>


    <div>


        <body>

        </body>

</html>

</div>



</body>

</html>