<?php

class dbConnection
{
    // private $servername = "(local)";
    // private $username = "private";
    // private $password = "123";
    // private $database = "drism_asset_monitoring";
    private $servername = "(local)";
    private $username = "marvin";
    private $password = "K@t3Orsua166";
    private $database = "asset";

    function conn()
    {
        try {
            $conn = new PDO("mysql:Server=$this->servername;dbname=$this->database", $this->username, $this->password, [True]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
}
