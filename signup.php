<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>PhoneBook</title>
	<link href = "css/stylesheet.css" rel = "stylesheet" type = "text/css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery-slim.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<link rel = "stylesheet" href = "font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class = "header">
		<h2>Sign up</h2>
	</div>
	<form method="post" action="signup.php">
		<?php include('errors.php');?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder = "Enter Username" value="<?php echo $username; ?>" required autofocus>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" placeholder = "Enter Email" value="<?php echo $email; ?>" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" placeholder = "Enter password" required>
		</div>
		<div class="input-group">
			<label>Re-type Password</label>
			<input type="password" name="password_2" placeholder = "Confirm password" required>
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
		<p>
			Already have an account? <a href="login.php">Sign in now!</a>
		</p>
	</form>
</body>
</html>