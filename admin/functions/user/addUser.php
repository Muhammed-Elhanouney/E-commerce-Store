<?php

header('Content-Type: application/json');

$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$priv = $_POST['priv'];
$gender = $_POST['gender'];

include('../connections.php');

$insert = "INSERT INTO `users`(
    `username`,
    `email`,
    `password`,
    `address`,
    `gender`,
    `priv_id`
) VALUES (
    '$username',
    '$email',
    '$password',
    '$address',
    '$gender',
    '$priv'
)";

$query = $connection->query($insert);

if ($query) {
    $last_id = $connection->insert_id;

    $result = $connection->query("SELECT * FROM `users` WHERE id = $last_id");
    $newUser = $result->fetch_assoc();

    echo json_encode($newUser);
} else {
    echo json_encode(["error" => "Failed to add user"]);
}
?>
