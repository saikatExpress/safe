<?php

use FontLib\Table\Type\head;

include_once 'library/database.php'; ?>


<?php

$db = new DataBase();
if (isset($_POST['signup_submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpass = $_POST['password2'];

    if ($firstname == '' || $lastname == '' || $email == '' || $password == '') {
        echo "Please fill out the input field";
    } elseif ($password != $conpass) {
        echo "Password does not match";
    } else {
        $query = "INSERT INTO admin_reg(firstname,lastname,email,a_password,a_conpass)
        VALUES('$firstname','$lastname','$email','$password','$conpass')";
        $data = $db->insert($query);
        if ($data == true) {
            header("Location: login.php");
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel | Sign Up</title>

    <link rel="shortcut icon" type="image/png" href="images/signup.png" />
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
    <link rel="stylesheet" href="css/admin.css" />

    <style>
    body {
        background-image: linear-gradient(to right, #2193b0, #6dd5ed);
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="registration_div_form">
                <h4>Registration form</h4>
            </div>


            <div class="sign_form">
                <div id="login-box">
                    <div class="left">
                        <h1>Sign up</h1>

                        <form action="" method="post" autocomplete="off" id="signform">
                            <div class="input_form">
                                <input type="text" name="firstname" id="firstname" placeholder="Frist name" />
                                <p>
                                    <small></small>
                                </p>
                            </div>

                            <div class="input_form">
                                <input type="text" name="lastname" id="lastname" placeholder="Last Name" />
                                <p>
                                    <small></small>
                                </p>
                            </div>

                            <div class="input_form">
                                <input type="text" name="email" id="email" placeholder="E-mail" />
                                <p>
                                    <small></small>
                                </p>
                            </div>


                            <div class="input_form">
                                <input type="password" name="password" id="password" placeholder="Password" />
                                <p>
                                    <small></small>
                                </p>
                            </div>


                            <div class="input_form">
                                <input type="password" name="password2" id="password2" placeholder="Retype password" />
                                <p>
                                    <small></small>
                                </p>
                            </div>

                            <input type="submit" name="signup_submit" value="Sign up" />
                        </form>
                    </div>

                    <div class="right">
                        <span class="loginwith">Sign in with<br />social network</span>

                        <button class="social-signin facebook">Log in with facebook</button>
                        <button class="social-signin twitter">Log in with Twitter</button>
                        <button class="social-signin google">Log in with Google+</button>
                    </div>
                    <div class="or">OR</div>
                </div>
                <div class="form_footer">
                    <p>
                        <a href="login.php">Already have an account...?</a>
                    </p>
                </div>
            </div>
        </div>
    </div>








    <script type="text/javascript" src="js/admin.js"></script>
</body>

</html>