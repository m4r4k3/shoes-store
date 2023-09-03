<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    session_start();
    if (isset($_SESSION["user_id"])) {
        $Pid = file_get_contents("php://input");
        $db = new mysqli("localhost", "root", "", "ecom");
        if ($db->query("select * from cart where userId ={$_SESSION["user_id"]} and productId = $Pid")->num_rows == 0) {
            if ($db->query("insert into cart (userId , productId) values ({$_SESSION["user_id"]} ,$Pid )")) {
                print true;
            }
        } else {
            if ($db->query("delete from cart where userId ={$_SESSION["user_id"]} and productId = $Pid")) {
                print false;
            }
        }
    }
} else {
    print "this is unallowed request.";
}
?>