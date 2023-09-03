<?php
session_start() ;
    $con = new PDO("mysql:host=127.0.0.1:3308;dbname=ecom" , "root","") ;
    $pId =htmlentities(file_get_contents("php://input")) ;
    if($con->query("insert into wishlist (pId , uId)
     values ($pId,{$_SESSION['user_id']})")){
                print true ;
        }

?>