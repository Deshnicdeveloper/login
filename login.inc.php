<?php 

session_start();

if (isset($_POST['submit'])) {
	
	include_once 'dbh.php';
	$uname = mysqli_real_escape_string($conn, $_POST['$uname']);
	$pwd = mysqli_real_escape_string($conn, $_POST['$pwd']);
	// erroe checking
	// checking if inputs are incorrect
	if (empty($uname) || empty($pwd)) {
		header("Location: ../index.php?empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_uname = '$uname' OR user_email = '$uname'";
		$result =mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck < 1) {
			header("Location: ../index.php?Login=Error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				// deshashing the password
				$hashedpwdcheck = password_verify($pwd, $row['user_pwd']);

				if ($hashedpwdcheck == false) {
					header("Location: ../index.php?Login=Error");
					exit();
				} elseif ($hashedpwdcheck == true) {
					// log in the user
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uname'] = $row['user_uname'];
					header("Location: ../index.php?Login=sucess");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?Login=Error");
	exit();
}

?>