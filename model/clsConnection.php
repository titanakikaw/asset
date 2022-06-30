<?php

class dbConnection
{
    // private $servername = "192.168.16.63";
    // private $username = "sa";
    // private $password = "donterase";
    // private $database = "EHELPDESK";
    private $servername = "(local)";
    private $username = "private";
    private $password = "123";
    private $database = "DRISM_ASSET_MONITORING ";

    function conn()
    {
        try {
            $conn = new PDO("mysql:Server=$this->servername;dbname=monitoringsys", $this->username, $this->password, [True]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
}
