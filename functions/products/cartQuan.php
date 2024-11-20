<?php

// print_r($_POST);

// $num = $_POST['num'];
// [num] => 1
// [id] => 8

// die();
session_start();

$userId = $_SESSION['cart_id'];
$num = $_POST['num'];
$proId = $_POST['id'];


include('../connection.php');
$update = "UPDATE cart SET quantity = $num  WHERE product_id = '$proId' AND user_id = '$userId'";
$query = $connection->query($update);


$selectCart = "SELECT * FROM `cart` WHERE product_id = '$proId' AND user_id = '$userId'";
$queryCart = $connection->query($selectCart);
$resUp = $queryCart->fetch_assoc();
$quan = $resUp['quantity'];

// echo $res['quantity'];
// print_r($res['quantity']);

if($query){
    $select = "SELECT * FROM `products` where id = '$proId'";
    $querySel = $connection->query($select);
    $res = $querySel->fetch_assoc();
    $price = $res['price'];

    $quantity = $quan * $price;

    echo "$quantity";
}

