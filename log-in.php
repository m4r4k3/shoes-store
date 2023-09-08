<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/repeat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Teko:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./style/login.css">
    <script src="https://kit.fontawesome.com/d4341dfe2d.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
     require('header.php')  ;
    ?>
    <section>
        <article>
            <p class="title">Login</p>
            <i class="fa-solid fa-user"></i>
            <form method="post">
                <div><label for="email">Email:</label> <input autocomplete="off" type="email" name="email" id="email">

                </div>
                <div> <label for="password">Password:</label> <input type="password" name="password" id="password">
                </div>
                <div class="seller">
                    <label for="seller">seller:</label>
                    <div class="safter" ><input type="checkbox" name="seller" id="seller"></div>
                </div>
                <button type="submit" id="submit">Log-in</button>
            </form>
            <?php
     if($_SERVER["REQUEST_METHOD"] =="POST") {      
         $password = $_POST['password'];
         $db= new mysqli("localhost","root","","ecom") ;
         $email = htmlentities(strtolower($_POST['email'])) ;
        if(!isset($_POST["seller"])){
            $query = "select * from user where email = '$email'" ;
                if($data = ($db->query($query))->fetch_all(MYSQLI_ASSOC)){
                     $hashedPassword = $data[0]["password"];
                    if(password_verify($password , $hashedPassword)) {
                       session_start() ;
                       $_SESSION["user_id"] = $data[0]["id"] ;
                       header("Location:./index.php") ;
                    }
                }
        }else{
            $query = "select * from seller where email like '$email'" ;
            if($data = ($db->query($query))->fetch_all(MYSQLI_ASSOC)){
                $hashedpass = $data[0]["password"] ;
                if (password_verify($password , $hashedpass) && $data[0]["confirmed"] )
                {
                    $_SESSION["seller_id"]=$data[0]["id"];
                    header("Location:./seller.php") ;
                } ;
            }
        }
        }
        ?>
            <div class="subform">
                <a id="sign" href="./create.php">Create your account</a>
                <a href="">Can't login?</a>
            </div>
        </article>
    </section>
</body>
<script>
    document.querySelector("#seller").onclick = (e)=>{
      document.querySelector(".safter").classList.toggle("safterC") 
    }
</script>
</html>