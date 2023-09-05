<?php
use PHPMailer\PHPMailer\PHPMailer ;
use PHPMailer\PHPMailer\Exception ;
if(defined("REQUIRED")  || 1 ){
require "/opt/lampp/htdocs/p/my shop/ignore/PHPMailer/src/Exception.php";
require "/opt/lampp/htdocs/p/my shop/ignore/PHPMailer/src/PHPMailer.php";
require "/opt/lampp/htdocs/p/my shop/ignore//PHPMailer/src/SMTP.php" ;
require '/opt/lampp/htdocs/p/my shop/ignore//vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("/opt/lampp/htdocs/p/my shop/ignore/");
$dotenv->load();
session_start(); 

$db = new mysqli("localhost" , "root","","ecom") ;
$result = $db->query("select email from seller where id = {$_SESSION['seller_id']}")->fetch_all(MYSQLI_ASSOC)[0]["email"] ;
$randnum = "";
foreach( range (0,6) as $num){
$randnum .= rand(0,9) ;
};
$db->query("update seller set cn= $randnum where id = {$_SESSION['seller_id']}") ;
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
$mail->addAddress($result) ;
$mail->isHTML(true) ;
$mail->Subject = "email verification :"  ;
$mail->Body = "<h1>this is your verification code :</h1><br>
     <h1><bold>$randnum</bold></h1>
   ";
$mail->send() ;
}else{
    header("Location:./not-found.php") ;
}
    ?>