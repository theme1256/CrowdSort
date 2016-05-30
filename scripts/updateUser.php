<?php
	include "/var/www/crowdsort/include/top.php";

	$uID = $_SESSION['userID'];
	$alias = rens($_POST['username']);
	$email = rens($_POST['email']);
	$pass1 = rens($_POST['password1']);
	$pass2 = rens($_POST['password2']);
	$pass3 = rens($_POST['password3']);
	$error = false;
	$s = "";
	$_SESSION['errors'] = "";

	$old = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM Logins WHERE userID=$uID"));

	if(!empty($_POST['password1'])){
		if(password_verify($pass1, $old['pass']) == $old['pass']){
			if($pass2 == $pass3){
				$pass = haash($pass2);
				$s = ", pass='$pass'";
			}
			else{
				$_SESSION['errors'] .= "The new passwords do not match.<br/>";
			}
		}
		else{
			$_SESSION['errors'] .= "Old password does not match.<br/>";
		}
	}

	if(empty($alias) || empty($email)){
		$error = true;
		$_SESSION['errors'] .= "Email and username has to be filled.<br/>";
	}

	if(!preg_match("/^[a-zA-Z0-9]*$/",$alias)){
		$error = true;
  		$_SESSION['errors'] .= "Only letters and numbers allowed as alias.<br/>"; 
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
 		$_SESSION['errors'] .= "Invalid email format.<br/>"; 
	}

	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM Logins WHERE alias='$alias'")) != 0 && $old['alias'] != $alias){
		$error = true;
		$_SESSION['errors'] .= "Username is already taken.<br/>";
	}

	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM Logins WHERE email='$email'")) != 0 && $old['email'] != $email){
		$error = true;
		$_SESSION['errors'] .= "Email is already in use.<br/>";
	}

	if(!$error){
		if(mysqli_query($con,"UPDATE Logins SET alias='$alias', email='$email'$s WHERE userID=$uID")){
			$_SESSION['success'] = true;
			header("Location: /user");
		}
		else{
			$_SESSION['errors'] = "SQL-error.";
			header("Location: /user");
		}
	}
	else{
		header("Location: /user");
	}
?>