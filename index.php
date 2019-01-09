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
		      </li>
		      <li class="nav-item">
				<button type="button" class="btn btn-outline-info btn-sm"><a class = "nav-link" href = "addnew.php?username=<?php echo $_GET['username']; ?>" name="add_button"><i class="fa fa-plus"> Create new contact</i></a></button>
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
			<div class="col-sm-12">
			<?php 
				if(isset($_GET['username'])){
					$username = $_GET['username'];
					$results = mysqli_query($db, "SELECT * FROM users, account WHERE users.username = '$username' AND account.username = '$username'"); 
			?>
				
				<table class = "table table-info">
				<thead>
					<tr class="success">
						<th>Name</th>
						<th>Phone number</th>
						<th>Email</th>
						<th>Address</th>
						<th>Action</th>
					</tr>		
				</thead>
				<?php while ($row = mysqli_fetch_array($results)){ ?>
				  <tbody>
				    <tr>
				        <td><?php echo $row['name']?></td>
				        <td><?php echo $row['phone']?></td>
				        <td><?php echo $row['email']?></td>
				        <td><?php echo $row['address']?></td>
				        <td>
							<button type="button" class="btn btn-outline-info btn-sm fa fa-pencil"><a href="edit_contact.php?edit=<?php echo $row['contact_id']; ?>">Edit</a></button>
						</td>
						<td>
							<button type="button" class="btn btn-outline-danger btn-sm fa fa-trash"><a href="server.php?del=<?php echo $row['contact_id']; ?>">Delete</a></button>
						</td>
				    </tr>
  				  </tbody>
  				  <?php } } ?>
  				  </table>
			</div>
		</div>
	</div>
</body>
</html>
