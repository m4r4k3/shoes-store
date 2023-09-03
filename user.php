<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/repeat.css">
    <link rel="stylesheet" href="./style/user.css">
</head>

<body>
<?php
     require('header.php')  ;
    ?>
    <form method="post" enctype="multipart/form-data">
        <div class="info1">
            <div class="imgdiv"><img src=<?php
            $id = $_SESSION['user_id'];
            $db = new mysqli("localhost", "root", "", "ecom");
            $img = str_replace("C:/xampp/htdocs/p/my shop", ".", $db->query("select profileImg from user where id = $id")->fetch_all()[0][0]);
            echo <<<HERE
                         '$img'
                        HERE;
            ?> id="img" alt=""></div>
            <div class="fileinput">
                <label for="imgInput">Change Image</label>
                <input value="" accept="image/png, image/gif, image/jpeg" type="file" name="imgInput" id="imgInput">
            </div>
            <div class="bio">
                bio: <br>
                <textarea id="bioText" name ="bio" placeholder=<?php print "'" . $db->query("select bio from user where id = $id")->fetch_all()[0][0] . "'" ?> cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="info2">
            <div> <label for="name">Name:</label>
                <input autocomplete="off" placeholder=<?php
                echo $db->query("select name from user where id = $id")->fetch_all()[0][0]
                    ?> type="text" name="name" id="name">
            </div>
            <div> <label for="nickname">Nickname</label>
                <input autocomplete="off" placeholder=<?php
                echo $db->query("select nickname from user where id = $id")->fetch_all()[0][0]
                    ?> type="text" name="nickname" id="nickname">
            </div>
            <div><label for="phone">Phone Number:</label>
                <input autocomplete="off" placeholder=<?php
                echo $db->query("select phone from user where id = $id")->fetch_all()[0][0]
                    ?> type="text" name="phone" id="phone">
            </div>
            <div> <label for="joinDate">Joining Date</label>
                <?php
                echo $db->query("select date from user where id = $id")->fetch_all()[0][0]
                    ?>
            </div>
            <div> <label for="email">Email:</label>
                <input autocomplete="off" placeholder=<?php
                echo $db->query("select email from user where id = $id")->fetch_all()[0][0]
                    ?> type="text" name="email" id="email">
            </div>
            <div> <label for="password">Password:</label>
                <input autocomplete="off" placeholder="*************" type="text" name="password" id="password">
            </div>
        </div>
        <div class="buttons">
            <input type="reset" id="cancel" value="cancel">
            <input type="submit" id="edit" value="edit">
        </div>
        <?php
        if (isset($_SESSION["user_id"])) {
            function randomAlph()
            {
                $db = new mysqli("localhost", "root", "", "ecom");
                $name = "";
                $imgarray = $db->query("select profileImg from user where profileImg='$name'");
                while ($name == "" and $imgarray->num_rows == 0) {
                    for ($i = 0; $i < 20; $i++) {
                        $name .= chr(rand(97, 122));
                    }
                    ;
                }
                return $name;
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // $password =htmlentities( $_POST["password"]);
                $name = htmlentities($_POST["name"]);
                $nickname = htmlentities($_POST["nickname"]);
                $phone = htmlentities($_POST["phone"]);
                $email = htmlentities($_POST["email"]);
                $bio = htmlentities($_POST["bio"]);
            if ( file_exists($_FILES["imgInput"]["tmp_name"])){
                $img = $_FILES["imgInput"];
                $tmp = $_FILES["imgInput"]["tmp_name"];
                $size = $_FILES["imgInput"]["size"];
                $ext = pathinfo($_FILES["imgInput"]["name"],   PATHINFO_EXTENSION);
                $save_file = "./content/profileImages/" . randomAlph() . '.' . $ext;
                if (getimagesize($img["tmp_name"])) {
                    if ($size < 5000000) {
                        if ($ext == "jpg" or $ext == "png" or $ext == "jpeg") {
                            if (move_uploaded_file($tmp, $save_file)) {
                                unlink($db->query("select profileImg from user where id=$id")->fetch_all()[0][0]);
                                if ($db->query("update user set profileImg='$save_file' where id =$id")) {
                                    echo "img uploaded";
                                } else {
                                    echo "error in uploading";
                                }
                            }
                        } else {
                            print "only images allowed. Not " . $ext;
                        }
                    } else {
                        print "you depassed the maximum allowed size.";
                    }
                } else {
                    print 'its not an image.';
                }
               };
                 
                
                if ($_POST["name"] != "") {
                    if ($db->query("update user set name ='$name' where id=$id")) {
                        echo "name setting is successful.";
                    }
                    ;
                }
                ;
                if (($_POST["nickname"]) != "") {
                    if ($db->query("update user set nickname ='$nickname' where id=$id")) {
                        echo "nickname setting is successful.";
                    }
                    ;
                }
                if (($_POST["phone"]) != "") {
                    if ($db->query("update user set phone ='$phone' where id=$id")) {
                        echo "phone setting is successful.";
                    }
                    ;
                }
                if (($_POST["email"]) != "") {
                    if ($db->query("update user set email ='$email' where id=$id")) {
                        echo "email setting is successful.";
                    }
                    ;
                }
                if (($_POST["bio"]) != "") {
                    if ($db->query("update user set bio ='$bio' where id=$id")) {
                        echo "bio setting is successful.";
                    }
                    ;
                }
                // if(isset($_POST["password"])){
                //     if($db->query("update user set email ='$email' where id=$id") ){
                //         echo "email setting is successful." ;
                //     };
                // }
                header("Location:./user.php");
            }
        }
        ?>
    </form>
    </header>
</body>

</html>