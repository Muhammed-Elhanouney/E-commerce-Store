<!-- 



session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$Address = $_POST['Address'];
$gender = $_POST['gender'];

$error = [];

if (empty($username)) {
    $error[$username] = "user name is empty";
    $_SESSION['error-user'] = "<div class='alert alert-danger'>$error[$username]</div>";
    header("location:../../register.php ");
} elseif (empty($email)) {
    $error[$email] = "email is empty";
    $_SESSION['error-email'] = "<div class='alert alert-danger'>$error[$email]</div>";
    header("location:../../register.php ");
} elseif (empty($password)) {
    $error[$password] = "password is empty";
    $_SESSION['error-password'] = "<div class='alert alert-danger'>$error[$password]</div>";
    header("location:../../register.php ");
} elseif (empty($Address)) {
    $error[$Address] = "Address is empty";
    $_SESSION['error-Address'] = "<div class='alert alert-danger'>$error[$Address]</div>";
    header("location:../../register.php ");
} elseif (empty($gender)) {
    $error[$gender] = "gender is empty";
    $_SESSION['error-gender'] = "<div class='alert alert-danger'>$error[$gender]</div>";
    header("location:../../register.php ");
} else {
    include_once("../connection.php");

    $select = "SELECT `email` FROM `shop_users` WHERE email = '$email'";
    $query = $connection->query($select);

    if ($query->num_rows == 1) {
        header('location:../../register.php');
        $_SESSION['unique'] = "<div class='alert alert-danger'>sorry E-mail is not unique</div>";
    }else{

    $insert = "INSERT INTO `shop_users`(
    `username`,
    `email`,
    `password`,
    `address`,
    `gender`
)
VALUES(
    '$username',
    '$email',
    '$password',
    '$Address',
    '$gender'
)";

    $queryShop = $connection->query($insert);

    if($queryShop){
        header('location:../../index.php');
    }

    }

}
 -->

 <?php

 session_start();
 
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $Address = $_POST['Address'];
 $gender = $_POST['gender'];
 
 $error = [];
 
 if (empty($username)) {
     $error['username'] = "User name is empty";
     $_SESSION['error-user'] = "<div class='alert alert-danger'>{$error['username']}</div>";
     header("location:../../register.php");
     exit;
 } elseif (empty($email)) {
     $error['email'] = "Email is empty";
     $_SESSION['error-email'] = "<div class='alert alert-danger'>{$error['email']}</div>";
     header("location:../../register.php");
     exit;
 } elseif (empty($password)) {
     $error['password'] = "Password is empty";
     $_SESSION['error-password'] = "<div class='alert alert-danger'>{$error['password']}</div>";
     header("location:../../register.php");
     exit;
 } elseif (empty($Address)) {
     $error['Address'] = "Address is empty";
     $_SESSION['error-Address'] = "<div class='alert alert-danger'>{$error['Address']}</div>";
     header("location:../../register.php");
     exit;
 } elseif (empty($gender)) {
     $error['gender'] = "Gender is empty";
     $_SESSION['error-gender'] = "<div class='alert alert-danger'>{$error['gender']}</div>";
     header("location:../../register.php");
     exit;
 } else {
     include_once("../connection.php");
 
     $select = "SELECT `email` FROM `shop_users` WHERE email = '$email'";
     $query = $connection->query($select);
 
     if ($query->num_rows == 1) {
         $_SESSION['unique'] = "<div class='alert alert-danger'>Sorry, email is not unique</div>";
         header('location:../../register.php');
         exit;
     } else {
         // تشفير كلمة المرور
         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
 
         $insert = "INSERT INTO `shop_users`(
             `username`,
             `email`,
             `password`,
             `address`,
             `gender`
         )
         VALUES(
             '$username',
             '$email',
             '$hashedPassword',
             '$Address',
             '$gender'
         )";
 
         $queryShop = $connection->query($insert);
 
         if ($queryShop) {
             header('location:../../index.php');
             exit;
         } else {
             $_SESSION['db-error'] = "<div class='alert alert-danger'>Error: Could not insert data</div>";
             header('location:../../register.php');
             exit;
         }
     }
 }
 