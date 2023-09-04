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
 <?php
 include("header.php")
    ?>
    <section>
    <form method="post">
        <div>
            <p>name:</p> <input type="text" name="name" id="">
        </div>
        <div>
            <p>Nick Name:</p> <input type="text" name="Nname" id="">
        </div>
        <div>
            <p>phone:</p> <input type="text" name="phone" id="">
        </div>
        <div>
            <p>your store name:</p> <input type="text" name="store" id="">
        </div>
        <div>
            <p>city:</p> <input type="text" name="city" id="">
        </div>
        <div>
            <p>email:</p> <input type="text" name="email" id="">
        </div>
        <div>
            <p>password:</p> <input type="text" name="password" id="">
        </div>
        <input type="submit" value="submit">
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $db = new mysqli("localhost" ,"root","","ecom") ;
            $email =html_entities($_POST['email']);
            $name =html_entities($_POST["name"]) ;
            $Nname = html_entities($_POST['Nname']);
            $phone =html_entities($_POST['phone']);
            $store = html_entities($_POST['store']);
            $city = html_entities($_POST['city']);
            $email = html_entities($_POST['email']);
            $pswd = html_entities($_POST['password']);
            $result = $db->query("select * from seller where email like '$email' or 
            name like $name' or nickname like '$Nname' or phone like '$phone'
             or store like '$store' ") ;
              if ($result->num_rows >0)
              {
                 echo "sorry we already have a seller with the same informations";
                 }else{
                     $DataInsertfb = $db->query("insert into seller
             (name , nickname , email , phone , ville , password ,date) values
             ('$name' , '$nickname' , '$email' , '$phone', '$city' , '$pswd' , curdate())        
                     ");
                     echo 1 ;
            }
        }
    ?>
    </form>
    </section>
</body>

</html>