<!DOCTYPE html>
<html>
<head>
	<title>login system</title>
</head>
<body>
	<header>
		<h1 style="text-align: center;">SIGNUP HERE</h1>
	</header>
	<form style="text-align: center; margin-top: 100px;" action="include/signup.inc.php" method="POST">
		First name: <br>
		<input type="text" name="first">
		<br>
		last name <br>
		<input type="text" name="last">
		<br>
		email <br>
		<input type="email" name="email">
		<br>
		user Name <br>
		<input type="text" name="uname">
		<br>
		password <br>
		<input type="password" name="pwd">
		<br> <br>
		<button type="submit" name="submit">signup</button>
	</form>

</body>
</html>