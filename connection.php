<?php

class Database{

    public static $connection;

    public static function setUpConnection(){
        if(!isset(Database::$connection)){
            Database::$connection = 
            new mysqli("localhost","YOUR_DB_USENAME","YOUR_DB_PASSWORD","suwasara_suwasarana","3306");
        }
    }

    public static function iud($q){
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q){
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }

}

$conn = mysqli_connect("localhost","YOUR_DB_USENAME","YOUR_DB_PASSWORD","suwasara_suwasarana","3306");

?>
