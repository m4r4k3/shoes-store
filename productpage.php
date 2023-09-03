<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/styleproduct.css">
    <link rel="stylesheet" href="./style/repeat.css">
    
    <script src="https://kit.fontawesome.com/d4341dfe2d.js" crossorigin="anonymous"></script>
</head>

<body>
<?php
     require('header.php')  ;
    ?>
    <section>
        <div class="productMain">
            <div class="section">
                <div id="dis">
                    <p></p>
                </div>
                <input type="button" value=">" id="right">
                <input type="button" value="<" id="left">
                <div class="minislider">
                </div>
            </div>
            <div class="information">
                <div class="flexbox">
                <div class="flex">
                    <div class="title">
                        sneaker 1
                    </div>
                    <div class="rating">
                        <span></span>
                        
                    </div>
                    <div class="price">
                        200
                    </div>
                </div>
                <div class="details">
                    <p id="dtitle">Informations</p>
                    <ul>
                        <li><span>brand: </span></li>
                        <li><span>categorie: </span></li>
                        <li><span>date: </span></li>
                        <li><span>size: </span></li>
                        <li><span>store: </span></li>
                    </ul>
                </div></div>
                <div id="moredetails " class="">
                    <p id="moretitle">details <i class=" fa-sharp fa-solid fa-chevron-down"></i></p>
                    <p id="moredetailsp">
                    </p>
                </div>
                <div class="buttons">
                    <input type="button" id="addToWish" value="add to wish list">
                    <input type="button" id="addToCard" value="buy Now">
                </div>
            </div>
        </div>
    </section>
    <script src="./scripts/productScript.js"></script>
</body>

</html>