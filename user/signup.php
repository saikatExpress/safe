<?php include_once 'library/database.php'; ?>
<?php include_once 'helper/format.php'; ?>


<?php

$db = new DataBase();
$fm = new Format();

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $firstname = $fm->validation($firstname);
    $lastname = $fm->validation($lastname);
    $mobile = $fm->validation($mobile);
    $email = $fm->validation($email);

    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $gender = "";
    }
    $password = $_POST['password'];
    $conpass = $_POST['conpass'];

    if ($firstname == '' || $lastname == '' || $mobile == '' || $password == '' || $conpass == '') {
        echo "Please fill the field";
    } else {
        $query = "INSERT INTO user_reg(firstname,lastname,mobile,email,gender,password,conpass) VALUES('$firstname','$lastname','$mobile','$email','$gender','$password','$conpass')";
        $data = $db->registration($query);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Help Line</title>
    <link rel="shortcut icon" type="image/png" href="images/help-line.png" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />

    <style>
    body {

        background-color: #fff;

    }

    .stylish_form input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 10px;
        margin: 10px;
        background: transparent;
        border-top: transparent;
        border-left: transparent;
        border-right: transparent;
        color: white;
        outline-width: medium;
        font-weight: bold;
        outline: none;
        width: 95%;
    }
    </style>
</head>

<body>



    <div class="signup">
        <div style="display: flex;" class="signup_form">
            <div class="stylish_form">
                <h4>Registration Info</h4>
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return Validate();">
                    <div class="form">
                        <label for="firstname"></label>
                        <input type="text" id="fname" name="firstname" placeholder="First Name" autocomplete="off">
                        <span id="fnameErr"></span>
                    </div>
                    <div class="form">
                        <label for="lastname"></label>
                        <input type="text" id="lname" name="lastname" placeholder="Last Name" autocomplete="off">
                        <span id="lnameErr"></span>
                    </div>

                    <div class="form">
                        <label for="mobile"></label>
                        <input type="text" id="mble" name="mobile" placeholder="Mobile" autocomplete="off">
                        <span id="mobileErr"></span>
                    </div>

                    <div class="form">
                        <label for="email"></label>
                        <input type="email" id="email" name="email" placeholder="Email" autocomplete="off">
                        <span id="emailErr"></span>
                    </div>

                    <div class="form" style="margin-top: 10px;">
                        <label for="gender"></label>
                        <input type="radio" id="gender" name="gender" value="male"> Male
                        <input type="radio" id="gender" name="gender" value="female"> Female
                        <span id="genderErr"></span>
                    </div>

                    <div class="form">
                        <label for="password"></label>
                        <input type="password" id="pass" name="password" placeholder="Password" autocomplete="off">
                        <span id="passErr"></span>
                    </div>

                    <div class="form">
                        <label for="conpass"></label>
                        <input type="password" id="conpass" name="conpass" placeholder="Confirm Password"
                            autocomplete="off">
                        <span id="conpassErr"></span>
                    </div>

                    <div class="form" style="margin-top: 10px;">
                        <label for="submit"></label>
                        <input type="submit" value="Submit" name="submit">
                    </div>


                    <div class="login_account" style="margin-top: 10px;">
                        <a href="login.php">Already hava an account...?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>










    <script type="text/javascript" src="js/style.js"></script>
</body>

</html>