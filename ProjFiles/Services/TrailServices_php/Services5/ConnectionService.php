<?php

class GetConnectionService
{
    function getConnection()
    {
        $servername = "mysql3.gear.host";
        $username = "webhostdb";
        $password = "siva_123456";
        $dbName = "webhostdb";
        $host = 3306;
        
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    }
}

?>