<?php
use PHPMailer\PHPMailer\PHPMailer ;
use PHPMailer\PHPMailer\Exception ;
require "/opt/lampp/htdocs/p/my shop/.ignore/PHPMailer/src/Exception.php";
require "/opt/lampp/htdocs/p/my shop/.ignore/PHPMailer/src/PHPMailer.php";
require "/opt/lampp/htdocs/p/my shop/.ignore//PHPMailer/src/SMTP.php" ;
require '/opt/lampp/htdocs/p/my shop/.ignore//vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("/opt/lampp/htdocs/p/my shop/.ignore/");
$dotenv->load();

$email = $_ENV["email"];
$pswd = $_ENV["pswd"] ;
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = "smtp.gmail.com" ;
$mail->SMTPAuth = true ; 
$mail->Username=$email ;
$mail->Password = $pswd;
$mail->SMTPSecure = "ssl";
$mail->Port = 465 ;
$mail->setFrom ($email) ;
$mail->addAddress("akmarwane@gmail.com") ;
$mail->isHTML(true) ;
$mail->Subject = "email verification :"  ;
$mail->Body = "testest";
$mail->send() ;
    ?>