<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>PhoneBook</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="bootstrap/js/jquery-slim.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<link rel = "stylesheet" href = "font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
		<link href = "css/STYLE.css" rel = "stylesheet" type = "text/css" >
</head>
<body>
	<!-- Header Area -->
	<div class="container text-center">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <a class="navbar-brand" href="#">Welcome to Phonebook</a>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <button type="button" class="btn btn-outline-primary btn-sm"><a class="nav-link" href="index.php"><i class = "fa fa-home">Home </i><span class="sr-only">(current)</span></a></button>
		      </li>
		    </ul>
		    	<div class="btn-group">
							<button type="button" class=" dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="login.php"><i class ="fa fa-sign-out">Sign Out</i></a>
					 	</div>
				</div>
		  </div>
		</nav>
	</div>
	<br /><br />
	<!-- Show Data -->
	<div class="container text-center">
		<div class="row">
			<div class="head_page col-md-12">
				<h4>Edit Contact</h4>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<form action="" method="post" class="col-md-12"  enctype="multipart/form-data">
				<input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>">
				<div class="input-group col-md-12">
					<label class="col-md-3">Name: </label>
					<input class="col-md-8" type="text" name="name" value="<?php echo $name; ?>" required>
				</div>
				<br />
				<div class="input-group col-md-12">
					<label class="col-md-3">Phone No: </label>
					<input class="col-md-8" type="text" name="phone" value="<?php echo $phone; ?>" required>
				</div>
				<br />
				<div class="input-group col-md-12">
					<label class="col-md-3">Email: </label>
					<input class="col-md-8" type="text" name="email" value="<?php echo $email; ?>">
				</div>
				<br />
				<div class="input-group col-md-12">
					<label class="col-md-3">Address: </label>
					<input class="col-md-8" type="text" name="address" value="<?php echo $address; ?>">
				</div>
				<br />
				<div class="sigle-input col-md-12 text-center submit-data">
					<?php if ($update == true): ?>
						<button class="btn" type="submit" name="update" style="background: red;" >update</button>
					<?php else: ?>
						<button class="btn" type="submit" name="save" >Save</button>
					<?php endif ?>
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>
