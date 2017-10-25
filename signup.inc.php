<?php 

if (isset($_POST['submit'])) {
	
	include_once 'dbh.php';
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	// error handler
	// check for empty field
	if (empty($first) || empty($last) || empty($email) || empty($uname) || empty($pwd)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		if (preg_match("/^[a-zA-Z]*$", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../signup.php?signup=Invalid");
			exit();
		} else {
			// check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=Invalidemail");
				exit();
			} else {

				// check if username already  exist in the database 
				$sql = "SELECT * FROM users WHERE user_uname = '$uname'";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);

				if ($resultcheck > 0) {
					header("Location: ../signup.php?signup=Already exist");
					exit();
				} else {
					// Hashing the password
					$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
					// Insert the user into the data base
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uname, user_pwd) VALUES ('$first', '$last', '$email', '$uname', '$hashedpwd');";
					mysqli_query($conn, $sql);
					header("Location: ../signup.php?signup=Sucess");
					exit();
				}
			}
		}
	}

} else {
	header("Location: ../signup.php");
	exit();
}

 ?>