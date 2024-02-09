<?php

class Database{

    public static $connection;

    public static function setUpConnection(){
        if(!isset(Database::$connection)){
            Database::$connection = 
            new mysqli("localhost","suwasara_sandaru","dilshan2000","suwasara_suwasarana","3306");
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

$conn = mysqli_connect("localhost","suwasara_sandaru","dilshan2000","suwasara_suwasarana","3306");

?>