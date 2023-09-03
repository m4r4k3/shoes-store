<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/repeat.css">
    <link rel="stylesheet" href="./style/create.css">
    
</head>
<body>
<?php
     require('header.php')  ;
    ?>
   <section> <form method="post">
        <div><label for="">Name :</label><input type="text" name="name" autocomplete ="off"  id=""></div>
        <div><label for="">Nickname :</label><input type="text" name="nickname" autocomplete ="off"  id=""></div>
        <div><label for="">Email :</label><input type="email" name="email" autocomplete ="off" id=""></div>
        <div><label for="">Phone number :</label><input type="phone" name="phone" autocomplete ="off" id=""></div>
        <div><label for="">City :</label><input type="texy" name="city" autocomplete ="off" id=""></div>
        <div><label for="">password :</label><input type="text" name="password" autocomplete ="off" id=""></div>
        <div class="btns">
            <button type="submit" id ="submit">Submit</button>
            <button type="reset" id ="cancel">Cancel</button> 
        </div>
        <?php
        error_reporting(0) ;
         if($_SERVER["REQUEST_METHOD"] =="POST"){
             if(preg_match("/\b\w{0,30}\b/",$_POST["name"]) and preg_match("/\b\w{0,30}\b/",$_POST["nickname"]) and preg_match("/\b\w.{0,255}@.{0,6}\.\w{2,63}\b/",$_POST["email"]) and preg_match("/\b\w{0,30}\b/",$_POST["city"])){
                $name = htmlentities($_POST["name"]) ;
                $nickname = htmlentities($_POST["nickname"] );
                $email =htmlentities( strtolower($_POST["email"])) ;
                $phone = htmlentities($_POST["phone"] );
                $city = htmlentities($_POST["city"]) ;
                $password =password_hash( htmlentities($_POST["password"]) , PASSWORD_DEFAULT) ;
                $db = new mysqli("localhost","root","","ecom") ;
                $query = "insert into user (name , nickname , email , phone , ville , password ,date,profileImg)values('$name' , '$nickname' ,'$email' , '$phone' , '$city' , '$password' , curdate(),'') " ;
                if($db->query($query)){
                    session_start() ;
                    $_SESSION["user_id"] = $db->query("select id where name = $name")->fetch_all(MYSQLI_ASSOC)[0]["id"] ;
                    header("Location:./index.php") ;
                }
            }else{
                echo preg_match("/\b\w{0,30}\b/",$_POST["name"]) ;
            }

         }
           
        ?>
    </form></section>
</body>
</html>