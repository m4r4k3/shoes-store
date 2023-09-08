<?php

session_start();
if (isset($_SESSION["user_id"]) and ($_SERVER["REQUEST_METHOD"] == "POST" or $_SERVER["REQUEST_METHOD"]=='DELETE')) {
    $db = new mysqli("localhost", "root", "", "ecom");
    if($_SERVER["REQUEST_METHOD"]=='DELETE'){
      $body = file_get_contents("php://input");
      $jk->query("delete from cart where id={$body}") ;
    }
    $data = $db->query("select cart.id as cId , products.id ,label, price ,img from products inner join cart on products.id = cart.productId inner join images on images.pId =products.id where userId= {$_SESSION["user_id"]} group by (images.pId) ")->fetch_all(MYSQLI_ASSOC) ;
    header("content-type:application/json");

    print_r(json_encode((object)["isEmpty"=>  false  , "data"=>$data]));
    }elseif(!isset($_SESSION["user_id"])){
    print_r(json_encode((object)["isEmpty"=>  true  , "data"=>[]]));
    }


?>