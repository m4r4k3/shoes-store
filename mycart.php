<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/repeat.css">
    <link rel="stylesheet" href="./style/mycart.css">
    <script src="https://kit.fontawesome.com/d4341dfe2d.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    require("header.php");
    if(!isset($_SESSION["user_id"])){
        header("Location:./not-found.html");
    };
        ?>
    <section>
        <input type="button" value="" disabled>
    </section>
    <script src='./scripts/cart.js'></script>
</body>
</html>