<?php



// print_r($_POST);




// die();


// echo'vflblb,';


// [id] => 3
// [na] => abdowwwwwwwwwwwwwwwwwwqwqw
// [em] => abdo@mail.comeeeee
// [ad] => bhout
// [pr] => 3



header('Content-Type: application/json');


$id = $_POST['id'];
$name = $_POST['na'];
$email = $_POST['em'];
$address = $_POST['ad'];
$priv = $_POST['pr'];




include('../connections.php');

$update = "UPDATE
    `users`
SET
    `username` = '$name',
    `email` = '$email',
    `address` = '$address',
    `priv_id` = '$priv'
WHERE
    id = $id";
$query = $connection->query($update);
// $res = $query->fetch_assoc();

if ($query) {

    $select = "SELECT * FROM `users` where id = $id";
    $queryAll = $connection->query($select);
    $res = $queryAll->fetch_assoc();

    echo json_encode($res);
}


////////////////////////////
// <?php
// header('Content-Type: application/json');

// $id = $_POST['id'];
// $name = $_POST['name'];
// $email = $_POST['email'];
// $address = $_POST['address'];
// $priv = $_POST['priv'];

// include('../connections.php');

// // إعداد الاستعلام
// $update = "UPDATE `users` SET `username` = '$name', `email` = '$email', `address` = '$address', `priv_id` = '$priv' WHERE id = $id";

// // تنفيذ الاستعلام والتحقق من نجاحه
// if ($connection->query($update) === TRUE) {
//     echo json_encode(["status" => "success", "message" => "User updated successfully"]);
// } else {
//     echo json_encode(["status" => "error", "message" => "Error updating user: " . $connection->error]);
// }
