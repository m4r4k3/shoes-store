<?php
// sort=${sort}&min_p=${minP}&max_p=${maxP}&categorie=${categorie}&rcheck=${rcheck}&schec${scheck}&dcheck=${dcheck}&brand${brand}
$sortg = $_GET['sort'];
$min_pg = $_GET['min_p'] == "" ? 0 : $_GET['min_p'];
$max_pg = $_GET['max_p'];
$categorieg = strtolower(html_entity_decode($_GET["categorie"]));
$rcheckg = json_decode($_GET["rcheck"]);
$scheckg = json_decode($_GET["scheck"]);
$dcheckg = json_decode($_GET["dcheck"]);
$brandg = strtolower(html_entity_decode($_GET["brand"]));
// sort
switch ($sortg) {
    case 1:
        $sort = "order by label asc";
        break;
    case 2:
        $sort = "order  by label desc";
        break;
    case 3:
        $sort = "order   by price asc";
        break;
    case 4:
        $sort = "order   by price desc";
        break;
    case 5:
        $sort = "order   by rating desc";
        break;
}
// filter
$fp = $max_pg == "" ? " $min_pg<=price " : "$min_pg<=price and price<=$max_pg";
$fc = $categorieg == "0" ? "" : "and categorie like '%$categorieg%' ";
$fb = $brandg == "0" ? "" : "and brand = '$brandg' ";

$fr = "";
foreach ($rcheckg as $k => $v) {
    $fr .= $k > 0 ? " or rating =$v" : "and rating =$v";
}
;

$fd = "";
foreach ($dcheckg as $k => $v) {
    $fd .= $k > 0 ? " or discount =$v" : "and discount =$v";
}
;

$fs = "";
foreach ($scheckg as $k => $v) {
    $fs .= $k > 0 ? " or size =$v" : "and size =$v";
}
;
if ($sortg == 0) {
    $requet = "select  products.id , label , price , dateT , rating , description , brand , discount ,size , categorie  from products 
        left join commands on products.id = commands.productId
        where TIMESTAMPDIFF(day ,  commands.date, curdate())<7 and  $fp $fs  $fd  $fr  $fc  $fb
        group by products.id 
        order by count(products.id ) desc";
   
} else {
    $requet = "select * from products where  $fp $fs  $fd  $fr  $fc  $fb $sort";
}
;
// working with mysql
$id = [];
$sql = new mysqli("localhost", "root", "", "ecom");
$query = $sql->query($requet)->fetch_all(MYSQLI_ASSOC);
$counter = 0;
foreach ($query as $a) {
    $idd = $a["id"];
    $img = $sql->query(("select img from images where pId = $idd"))->fetch_all(MYSQLI_ASSOC);
    $query[$counter]["imgs"] = $img[0]["img"];
    $counter++;
}
$data = json_encode($query);
header("Content-Type:application/json");
print_r($data);
?>