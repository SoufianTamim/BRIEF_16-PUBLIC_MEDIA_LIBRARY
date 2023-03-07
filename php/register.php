<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
</head>
<body>
	<h1>User Registration</h1>

	<?php
	// include 'DB.php';
  require 'User.php';

  $conn = new Database('localhost', 'Library', 'root', '');
  $user = new User($conn);

	// $user = new User(new Database());

	if (isset($_POST['submit'])) {
		$nickname = $_POST['nickname'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if ($user->signup($nickname, $password, $email)) {
			echo '<p>Registration successful!</p>';
		} else {
			echo '<p>Registration failed: user already exists.</p>';
		}
	}
	?>

	<form method="post" action="">
		<label for="nickname">Nickname:</label>
		<input type="text" name="nickname" required><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br>

		<label for="email">Email:</label>
		<input type="email" name="email" required><br>

		<input type="submit" name="submit" value="Register">
	</form>
</body>
</html>
