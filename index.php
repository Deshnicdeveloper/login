<?php

    session_start();

?> 
<!DOCTYPE html>
<html>
<head>
	<title>login system</title>
</head>
<body>
	<h1 style="text-align: center; margin-top: 50px;">this is my first ever login page</h1>

 		<?php 
  			if (isset($_SESSION['u_id'])) {
  			# code...
  				echo '
  				<form action="include/logout.inc.php" method="POST">
 					<button type="submit" name="submit">Logout</button>
 				</form>';
  			} else {
  					echo '
  				<form action="include/login.inc.php" method="POST">
				<br><br><br>
					username: <input type="text" name="uname">  
					<br><br>
					password: <input type="password" name="pwd">
					<br><br>
					<button type="submit" name="submit">Login</button>
				</form>';

  			}
 		?>
	<a href="signup.php" target="_blank">Submt</a>

</body>
</html>