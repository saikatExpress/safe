<?php
include_once 'library/session.php';
Session::checkLogin();
?>
<?php include_once 'library/database.php'; ?>
<?php include_once 'helper/format.php'; ?>

<?php

class loginpannel
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new DataBase();
        $this->fm = new Format();
    }

    public function login($number, $pass)
    {
        $pass = $this->fm->validation($pass);

        if (empty($number) || empty($pass)) {
            echo "Fields were empty";
        } else {
            $query = "SELECT * FROM user_reg WHERE mobile = '$number' AND password='$pass'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("user_login", true);
                Session::set("msg", "invalid code");
                Session::set("id", $value['id']);
                Session::set("firtsname", $value['firstname']);
                Session::set("lastname", $value['lastname']);
                Session::set("mobile", $value['mobile']);
                Session::set("email", $value['email']);
                header("Location: index.php");
            } else {
                $msg = "Number and password does not match";
                return $msg;
            }
        }
    }
}

?>
