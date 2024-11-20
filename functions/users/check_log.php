
<?php
session_start();
// echo "<pre>";

// print_r($_POST);

include_once('../connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['user'] = $username;


$select = "SELECT * FROM `shop_users` WHERE 
username = '$username'
AND 
password = '$password'";

$query = $connection->query($select);

$fetch = $query->fetch_assoc();

$_SESSION['cart_id'] = $fetch['id'];


if ($query->num_rows > 0) {
    // echo "user found";
    // <a href="../index.php"></a>
    header('location:../../index.php');
} else {
    // echo "fail";
    header('location:../../login.php');
    $_SESSION['error-login'] = "<div class='alert alert-danger'>you are not exist</div>";
}
