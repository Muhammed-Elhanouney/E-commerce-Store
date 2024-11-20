<?php
session_start();
?>
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
				if (isset($_SESSION['log'])) {
					echo $_SESSION['log'];
					unset($_SESSION['log']);
				}
				?>
				<h4 class="panel-heading d-flex justify-content-center ">Log in</h4>
				<hr>
				<div class="panel-body">
					<form role="form" method="post" action="functions/users/check_log.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="User_Name..." name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<?php
							if (isset($_SESSION['error-login'])) {
								echo $_SESSION['error-login'];
								unset($_SESSION['error-login']);
							}
							?>
							<button class="btn btn-primary" type="submit">login</button>
							<a class="btn btn-success" href="register.php">Regestiration</a>
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