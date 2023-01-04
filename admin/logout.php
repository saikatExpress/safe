<?php
include 'library/session.php';
Session::checkSession();
?>

<?php

Session::destroy();
header("Location: login.php");
?>