<?php

class Database
{

    public PDO $conn;
    public string $password;
    public string $username;
    public string $dbname;
    public string $hostname;

    function __construct()
    {
        $this->hostname = "localhost";
        $this->dbname = "books";
        $this->username = "root";
        $this->password = "";
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            return json_encode($e);
        }
    }
}