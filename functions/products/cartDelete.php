<?php

// session_start();
// echo "hello";
// echo"<pre>";
print_r($_POST);


$pro_id = $_POST['deleteId'];
include('../connection.php');
$delete = "DELETE FROM `cart` WHERE product_id = $pro_id";
$query = $connection->query($delete);

echo "kolkv";
// if ($query) {
//     $_SESSION['delete-cart'] = "
//     <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
//         Product deleted successfully!
//     </div>";
//     header('Location:../../cart.php');
//     exit();
// } else {
//     $connection->error;
// }
