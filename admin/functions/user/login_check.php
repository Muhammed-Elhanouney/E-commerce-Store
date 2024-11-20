<?php

session_start();
// echo "clpdlpe";

// echo "<pre>";
// print_r($_POST);
$user_name = $_POST['username'];
$password = $_POST['password'];

include_once('../connections.php');


$select = "SELECT * FROM `users` WHERE username = '$user_name' AND password = '$password' ";
$query = $connection->query($select);

$_SESSION['user_name'] = $user_name;


// echo "<pre>";
// print_r($query);

if($query->num_rows == 1){
// <a href=""></a>
    header('location: ../../index.php');
        // echo "success";
}else{
    // echo "fail";
    // <a href="../../login.php"></a>
    header('location: ../../login.php');
}
