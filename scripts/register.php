<?php
	include "/var/www/crowdsort/include/top.php";

	$alias = rens($_POST['username']);
	$email = rens($_POST['email']);
	$pass1 = encrypt($_POST['password1']);
	$pass2 = encrypt($_POST['password2']);
	$error = false;
	$_SESSION['errors'] = "";

	if($pass1 != $pass2){
		$error = true;
		$_SESSION['errors'] .= "The passwords doen't match.<br/>";
	}
	else{
		$pass = $pass1;
	}

	if(empty($alias) || empty($email) || empty($pass)){
		$error = true;
		$_SESSION['errors'] .= "All fields has to be filled.<br/>";
	}

	if(!preg_match("/^[a-zA-Z0-9]*$/",$alias)){
		$error = true;
  		$_SESSION['errors'] .= "Only letters and numbers allowed as alias.<br/>"; 
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
 		$_SESSION['errors'] .= "Invalid email format.<br/>"; 
	}

	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM Users WHERE alias='$alias'")) != 0){
		$error = true;
		$_SESSION['errors'] .= "Username is already taken.<br/>";
	}

	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM Users WHERE email='$email'")) != 0){
		$error = true;
		$_SESSION['errors'] .= "Email is already in use.<br/>";
	}

	if(!$error){
		if(mysqli_query($con,"INSERT INTO Users (alias, email, pass) VALUES ('$alias', '$email', '$pass')")){
			//Send email til /activate/$alias/$pass
			header("Location: /activate");
		}
		else{
			$_SESSION['errors'] = "SQL-error.";
			header("Location: /Register");
		}
	}
	else{
		header("Location: /register");
	}
?>