<?php


class DataBase
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "safe";

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection Error" . $this->link->connect_error;
            return false;
        }
    }

    public function registration($query)
    {
        $insert_data = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($insert_data) {
            header("Location: login.php");
            exit();
        } else {
            die("Error : (" . $this->link->errno . ")" . $this->link->error);
        }
    }

    public function insert($query)
    {
        $insert_data = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($insert_data) {
            return $insert_data;
        } else {
            return false;
        }
    }

    public function select($query)
    {
        $data = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($data->num_rows > 0) {
            return $data;
        } else {
            return false;
        }
    }

    public function update($query)
    {
        $data = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($data) {
            return $data;
        } else {
            die("Error : (" . $this->link->errno . ")" . $this->link->error);
        }
    }
}