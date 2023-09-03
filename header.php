<header>
        <div class="brand">
            <a href="./index.php"> <img id="logo"
        
                src="https://media.discordapp.net/attachments/775448139938922540/1125093144480981002/brand.png"
                alt="" /></a>
        </div>
        <ul>
            <li><a href="./index.php">Store</a></li>
            <li><a href="./mycart.php">Mycart</a></li>
            <li>Wish List</li>
            <li><a href="./join-us.php">Join Us</a></li>
            <li>
            <?php
            session_start() ;
              if(isset($_SESSION["user_id"])){
                $id = $_SESSION['user_id'] ;
                $db = new mysqli("localhost","root","","ecom") ;
                $img = str_replace("C:/xampp/htdocs/p/my shop" ,"." ,$db->query("select profileImg from user where id = $id")->fetch_all()[0][0]) ;
                echo <<<HERE
                        <a href='./user.php' id="userImg" style="background-image :url('$img')"></a>
                     HERE;
              }else{
                  echo '<a href="./log-in.php">log-in</a>';
              }
            ?>
            </li>
        </ul>
    </header>