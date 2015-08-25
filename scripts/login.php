<?php
	include "/var/www/crowdsort/include/top.php";

	$alias = rens($_POST['username']);
	$pass = encrypt($_POST['password']);

	$q = @mysqli_query($con, "SELECT * FROM Users WHERE (alias='$alias' OR email='$alias') AND pass='$pass' AND activated='1'");
	if(mysqli_num_rows($q) == 1){
		$r = mysqli_fetch_array($q);
		$_SESSION['alias'] = $r['alias'];
		$_SESSION['userID'] = $r['userID'];
		$_SESSION['score'] = $r['score'];
		header("Location: /home");
	}
	else{
		$_SESSION['errors'] = "Incorrect username or password.<br/>";
		header("Location: /login");
	}
?>