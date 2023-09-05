<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start() ;
    $db = new mysqli("localhost" ,"root" ,"","ecom") ;

        if(isset($_SESSION["seller_id"]) && $db->query("select cn from seller where id = {$_SESSION["seller_id"]}")->fetch_all(MYSQLI_ASSOC)[0]["cn"]){
            echo 1 ;
        }else{
            header("Location:./not-found.html") ;
        }
    ?>
</body>
</html>