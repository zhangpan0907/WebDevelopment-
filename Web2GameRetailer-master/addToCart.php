<?php

require_once "include/head.inc.php";

if(isset($_POST["add_amount"]) && isset($_POST["product_id"])){
    $id = $_POST["product_id"];
    $quantity = $_POST["add_amount"];
    if($quantity > 0){
        // add appropriate cookie
        echo "<body onload=\"addToCartRedirect(" . $id . "," . $quantity . ")\">";
    } else{
        // default to adding 1
        echo "<body onload=\"addToCartRedirect(" . $id . ",1)\">";
    }


}
