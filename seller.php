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
    if(!isset($_SESSION["seller_id"])  ){
    header("Location:./not-found.html") ;
}
    if(!$db->query("select confirmed from seller where id = {$_SESSION['seller_id']}")->fetch_all(MYSQLI_ASSOC)[0]["confirmed"]
) {header("Location:./not-found.html") ;}
    ?>
    <header>
        <ul>
            <li>
                Dashboard
            </li>
            <li>
                Stats
            </li>
            <li>
                Profile
            </li>
        </ul>
    </header>
    <div class="dashboard">
        <div class="top">
            <input type="search" id="search">
        </div>
        <div class="images">
        </div>
        <div class="price">

        </div>
    </div>
</body>

</html>