<?php

session_start();


// echo $_SESSION['cart_id'];
// echo "<br>";
// echo $_GET['id'];

$user = $_SESSION['cart_id'];
$proId = $_GET['id'];


include_once('../connection.php');

$check = "SELECT quantity FROM cart WHERE product_id = '$proId' AND user_id = '$user'";
$res = $connection->query($check);

// echo "<pre>";
// print_r($res);


// die();
if ($res->num_rows == 1 ) {
    $update = "UPDATE cart SET quantity = quantity + 1 WHERE product_id = '$proId' AND user_id = '$user'";
    $query = $connection->query($update);
  
    if ($query) {
        $_SESSION['update-cart'] = "
        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
            Product quantity updated successfully!
        </div>";
        header('Location: ../../cart.php');
        exit();
    } else {
        $connection->error;
    }
} else {
    $insert = "INSERT INTO `cart`(`product_id`, `user_id`, `quantity`) VALUES ('$proId', '$user', 1)";
    $query = $connection->query($insert);

    if ($query) {
        $_SESSION['add-cart'] = "
        <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
            Product added successfully!
        </div>";
        header('Location: ../../cart.php');
        exit();
    } else {
        $connection->error;
    }
}
