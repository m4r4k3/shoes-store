<?php
 $id =$_GET['id'] ;
 $db = new mysqli('localhost',"root","","ecom");
 $query ="
 select products.id ,
 label,
 price,
 dateT,
 rating,
 description,
 brand,
 discount,
 size,
 categorie,
 sellerId,
 store
 from products 
 inner join  seller on sellerId = seller.id
 where products.id = $id ";
 $img = [];
 header("Content-Type:application/json") ;
if( $data = $db->query($query)->fetch_all(MYSQLI_ASSOC)){
    foreach($db->query("select img from images where pId= $id")->fetch_all(MYSQLI_ASSOC) as $row){
        array_push($img , array_values($row)[0]) ;
    };
    $data[0]["img"]=$img ;
    $json = json_encode($data) ;
    echo $json ;
}
