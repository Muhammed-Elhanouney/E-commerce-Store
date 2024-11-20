<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
</head>

<body>
    <div class="row d-flex justify-content-center  align-items-center" style="margin-top: 100px;">
        <div class="col-xs-10 col-xs-offset-1 bg-secondary py-5 rounded-5 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <?php
                session_start();
                if (isset($_SESSION['unique'])) {
                    echo  $_SESSION['unique'];
                    unset($_SESSION['unique']);
                }
                ?>
                <h4 class="panel-heading d-flex justify-content-center ">Registration</h4>
                <hr>
                <div class="panel-body">
                    <form role="form" method="post" action="functions/users/check_reg.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="User_Name" name="username" type="text" autofocus="">
                            </div>
                            <?php
                            if (isset($_SESSION['error-user'])) {
                                echo   $_SESSION['error-user'];
                                unset($_SESSION['error-user']);
                            }
                            ?>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="text">
                            </div>
                            <?php
                            if (isset($_SESSION['error-email'])) {
                                echo   $_SESSION['error-email'];
                                unset($_SESSION['error-email']);
                            }
                            ?>
                            <div class="form-group">
                                <input class="form-control" placeholder="Addres" name="Address" type="text">
                            </div>
                            <?php
                            if (isset($_SESSION['error-Address'])) {
                                echo   $_SESSION['error-Address'];
                                unset($_SESSION['error-Address']);
                            }
                            ?>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <?php
                            if (isset($_SESSION['error-password'])) {
                                echo   $_SESSION['error-password'];
                                unset($_SESSION['error-password']);
                            }
                            ?>
                            <!-- <div class="form-group">
                                <label for="">Male</label>
                                <input placeholder="" name="gender" value="0" type="radio">
                                <label for="">Female</label>
                                <input placeholder="" name="gender" value="1" type="radio">
                            </div> -->
                            <div class="form-group">
                                <label for="">Male</label>
                                <input placeholder="" name="gender" value="0" type="radio" required>
                                <label for="">Female</label>
                                <input placeholder="" name="gender" value="1" type="radio" required>
                            </div>
                            <?php
                            if (isset($_SESSION['error-gender'])) {
                                echo   $_SESSION['error-gender'];
                                unset($_SESSION['error-gender']);
                            }
                            ?>
                            <button class="btn btn-primary" type="submit">submit</button>
                            <!-- <a class="btn btn-success" href="./regist.php">Regestiration</a> -->
                            <!-- <a href="index.html" class="btn btn-primary">Login</a></fieldset> -->
                    </form>
                </div>
            </div>
            <?php
            // if(isset($_SESSION['error-login'])){
            // 	echo $_SESSION['error-login'] ;
            // 	unset($_SESSION['error-login']);
            // }
            ?>
        </div><!-- /.col-->
    </div><!-- /.row -->
</body>

</html>