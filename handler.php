<?php

require "connection.php";

require "email/Exception.php";
require "email/PHPMailer.php";
require "email/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["email"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $comment = $_POST["comments"];


        if (empty($email)) {
            echo "Sorry. Unable to send the email. Email is not available.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address.";
        } else {

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'thebatman202011@gmail.com';
            $mail->Password = 'svavweaiyuaqdrmi';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('thebatman202011@gmail.com', 'SuwaSarana');
            $mail->addReplyTo($email, 'SuwaSarana');
            $mail->addAddress('simpleidealk@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $bodyContent = '<h2>Name : '.$name.'</h2></br><h2>Email : '.$email.'</h2></br><h2>Subject : '.$subject.'</h2></br><h2>Comment : '.$comment.'</h2>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {

                echo 'Invitation sending failed';
            } else {

                Database::iud("INSERT INTO `user` (`name`,`email`) VALUES ('".$name."','".$email."') ");

                $rs = Database::search("SELECT * FROM `user` WHERE `name` = '".$name."' AND `email` = '".$email."' ");
                $data = $rs -> fetch_assoc();
                $id = $data["id"];

                Database::iud("INSERT INTO `mail` (`subject`,`comment`,`user_id`) VALUES ('".$subject."','".$comment."','".$id."') ");

                echo 'Success';
            }
        }
    } else {
        echo "Email Address not found";
    }

