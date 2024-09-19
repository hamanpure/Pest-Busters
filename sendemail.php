<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $msg = $_POST['msg'];


  //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
require 'PHPMailer\Exception.php';
require 'PHPMailer\PHPMailer.php';
require 'PHPMailer\SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pestbusterservices123@gmail.com';                     //SMTP username
    $mail->Password   = 'mwzhzemcqxnbyrjc';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pestbusterservices123@gmail.com', 'contact form');
    $mail->addAddress('pestbusterservices123@gmail.com', 'shiva kumar');     //Add a recipient
  

    //Attachments
    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'test contact form';
    $mail->Body    = "Sender Name -$name <br> Sender Email -$email <br> message -$msg";
    
    $mail->send();
    echo "<div id='Success'>Messege Has Been Sent!</div>";
} catch (Exception $e) {
    echo "<div id='Alert'>Messege couldn't Sent!</div>";
}
}
?>