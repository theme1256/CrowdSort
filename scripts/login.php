<?php
	include "/var/www/crowdsort/include/top.php";

	$alias = rens($_POST['username']);
	$pass = rens($_POST['password']);

	$q = @mysqli_query($con, "SELECT * FROM Logins WHERE (alias='$alias' OR email='$alias') AND activated='1'");
	if(mysqli_num_rows($q) == 1){
		$r = mysqli_fetch_array($q);
		if(password_verify($pass, $r['pass']) == $r['pass']){
			$_SESSION['alias'] = $r['alias'];
			$_SESSION['userID'] = $r['userID'];
			$_SESSION['score'] = $r['score'];
			header("Location: /home");
		}
		else{
			$_SESSION['errors'] = "Incorrect username or password.<br/>";
			header("Location: /login");
		}
	}
	else{
		$_SESSION['errors'] = "Incorrect username or password.<br/>";
		header("Location: /login");
	}
?>