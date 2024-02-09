<?php
session_start();
include "connection.php";

$name = $_POST["name"];
$phone = $_POST["phone"];
$description =$_POST["description"];
$price = $_POST["price"];

if(empty($name)){
    echo "Please Enter Your Name.";
} else if(empty($phone)){
    echo "Please Enter Your Phone Number.";
} else if(empty($description)){
    echo "Please Enter a Description.";
} else if(empty($price)){
    echo "Please Enter Your Donation.";
} else{

    $_SESSION["suwasarana"]["name"] = $name;
    $_SESSION["suwasarana"]["mobile"] = $phone;
    $_SESSION["suwasarana"]["description"] = $description;
    $_SESSION["suwasarana"]["price"] = $price;

    echo "success";

}

?>