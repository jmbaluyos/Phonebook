<?php 
session_start();
$username = "";
$email = "";
$errors = array();
//connect to the database
$db = mysqli_connect('localhost','root','','phonebook');
//if the register button is clicked
if (isset($_POST['register'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	//ensure that form fields are filled properly
	if ($password_1 != $password_2){
		array_push($errors, "Password do not match");
	}
	//check if the username is already exist
	$user_check_query = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($db, $user_check_query);
		if(mysqli_num_rows($result) > 0){
			array_push($errors, "Username already exist");
		}


	//if there are no errors, save user to database
	if (count($errors) == 0){
		$password = md5($password_1); //encrypt password before storing in database (security)
		$sql = "INSERT INTO users (username, email, password)
				VALUES ('$username', '$email', '$password')";
		mysqli_query($db, $sql);
		$_SESSION['username'] = $username;
		header('location: login.php'); //redirect to homepage
	}
}
	//log in user
if (isset($_POST['login'])){
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

	if (empty($username)){
		array_push($errors, "Username is required");
	}
		if (empty($password_1)){
		array_push($errors, "Password is required");
	}
	if (count($errors) == 0){
		$password_1 = md5($password_1);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password_1'";
		$results = mysqli_query($db, $sql);
		$num_count = mysqli_num_rows($results);
		if ($num_count == 1){
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Welcome";
		header('location: index.php?username='.$username);
	}
	else{
		array_push($errors, "Invalid username or Password");
		}
	}
}

	//add contact
		$username="";
		$name="";
		$phone="";
		$emal="";
		$address="";
		$contact_id=0;
		$update = false;
	if(isset($_POST['save'],$_GET['username'])){
		$username = $_GET['username'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

		$sql = "INSERT INTO account (name, phone, email, address,username)
			VALUES ('$name','$phone','$email', '$address','$username')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "successfully saved";
			header('location: index.php?username=' .$username); //redirect to homepage
		}

	//edit contact
	if (isset($_GET['edit'])) {
		$contact_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM account WHERE contact_id=$contact_id");
		
	
			$n = mysqli_fetch_array($record);
			$name = $n["name"];
			$phone = $n["phone"];
			$email = $n["email"];
			$address = $n["address"];
		
	}	

	if (isset($_POST['update'])) {
	$contact_id = $_POST['contact_id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$query = "SELECT username FROM account WHERE contact_id = $contact_id";
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result)==1){
		while ($row = mysqli_fetch_assoc($result)) {
			mysqli_query($db, "UPDATE account SET name='$name', phone='$phone', email='$email', address='$address' WHERE contact_id=$contact_id");
			$_SESSION['message'] = "Successfully updated!"; 
			header('location: index.php?username='.$row['username']);
		}
	}
}
//delete contact

if (isset($_GET['del'])) {
	$contact_id = $_GET['del'];

	$query = "SELECT username FROM account WHERE contact_id=$contact_id";
	$result = mysqli_query($db, $query);
	if (mysqli_num_rows($result)==1){

		while ($row = mysqli_fetch_assoc($result)) {
			mysqli_query($db, "DELETE FROM account WHERE contact_id=$contact_id");
			$_SESSION['message'] = "Contact deleted!"; 
			header('location: index.php?username='.$row['username']);
		}
	}
	
}

?>
