<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join us</title>
    <link rel="stylesheet" href="./style/repeat.css">
    <link rel="stylesheet" href="./style/join.css">
</head>
<body>
    <?php  error_reporting(1) ;require("header.php")?>
    <form method="post">
    <div><p>name:</p> <input type="text" name="name" id=""></div>
    <div><p>Nick Name:</p> <input type="text" name="Nname" id=""></div>
    <div><p>phone:</p> <input type="text" name="phone" id=""></div>
    <div><p>your store name:</p> <input type="text" name="store" id=""></div>
    <div><p>city:</p> <input type="text" name="city" id=""></div>
    <div><p>email:</p> <input type="text" name="email" id=""></div>
    <div><p>password:</p> <input type="password" name="password" id=""></div>
    <input type="submit" value="submit">
    <?php
        if( $_SERVER["REQUEST_METHOD"] == "POST" && filter_var($_POST["email"] ,FILTER_VALIDATE_EMAIL) && preg_match("/\b\d{7,15}\b/" , $_POST["phone"]) ){
            $db = new mysqli("localhost" ,"root","","ecom") ;
            $email =htmlentities($_POST['email']);
            $name =htmlentities($_POST["name"]) ;
            $Nname = htmlentities($_POST['Nname']);
            $phone =htmlentities($_POST['phone']);
            $store = htmlentities($_POST['store']);
            $city = htmlentities($_POST['city']);
            $pswd = password_hash(htmlentities($_POST['password']) , PASSWORD_DEFAULT);
     
            $result = $db->query("select * from seller where email like '$email' or 
             phone like '$phone'
             or store like '$store' ") ;
        
              if ($result->num_rows >0)
              {
                 echo "<p style='color:red;'>sorry we already have a seller with the same informations</p>";
            }else{
           $DataInsertfb = $db->query("insert into seller
             (name , nickname , email , phone , ville , password ,date,confirmed) values
             ('$name' , '$nickname' , '$email' , '$phone', '$city' , '$pswd' , curdate(),false);
             ");
            session_start();
            $_SESSION["seller_id"]=$db->query("select id from seller where email like '$email'")->fetch_all(MYSQLI_ASSOC)[0]["id"];
            define("REQUIRED",true);
            require("./content/rest api/send email.php");
            session_set_cookie_params(120) ;
            $_SESSION["conf_r"]=true ;
            header("Location:./confirmSeller.php");
            }
        }
    ?>
</form>
    </body>
</html>