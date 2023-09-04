<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/repeat.css">
    <link rel="stylesheet" href="./style/confirm.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["conf_r"])) {
        header("Location:not-found.html") ;
    }
    ?>
    <form method="post">
        <div><h1>confirm your email address</h1></div>
        <div><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium similique, dolorem nisi cum, soluta,
            eligendi officia quos facere sapiente quis aperiam. Quaerat corporis ducimus voluptate, placeat perspiciatis
            porro magni odio.</p></div>
           <div> <input type="text" name="code"></div>
            <div><input type="submit" value="confirm"></div>
            <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $db = new mysqli("localhost","root","",'ecom') ;
                $code = $db->query("select cn from seller where id = {$_SESSION['seller_id']}")->fetch_all(MYSQLI_ASSOC);
                if($_POST["code"] == $code){
                    echo 1 ;
                }else{
                    echo 0;
                } ;

            }
            ?>
    </form>
</body>

</html>