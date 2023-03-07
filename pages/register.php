<?php
// include 'DB.php';
require '../php/User.php';
$conn = new Database('localhost', 'Library', 'root', '');
$user = new User($conn);

if (isset($_GET['submit'])) {
	$nickname = $_GET['nickname'];
	$name = $_GET['name'];
	$email = $_GET['email'];
	$CIN  = $_GET['CIN'];
	$Occupation = $_GET['Occupation'];
	$Phone = $_GET['Phone'];
	$Address  = $_GET['Address'];
	$BirthDate  = $_GET['birthdate'];
	$password = $_GET['password1'];

	if ($user->signup($nickname, $name, $CIN ,$Occupation, $email ,$Phone ,$Address ,$BirthDate ,$password)) {
		echo '<p>Registration successful!</p>';
		header("location: log.php");
	} else {
		echo '<p>Registration failed: user already exists.</p>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>register</title>
</head>
<body>
	<section class="h-100" >
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="w-75">
					<div class="card shadow-lg mt-3">
						<div class="card-body bg-light-50">
							<h1 class="fs-4 card-title fw-bold mb-4 text-center">REGISTER </h1>
							<form method="GET" action="" id="form">
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class=" text-muted" >name :</label>
									<div class="w-75 d-flex flex-row "> 
										<div class="w-50 me-3 ">
											<input id="nickname" type="text" class="form-control" name="nickname" placeholder="Enter your nickname ..."  autofocus>
											<div class="error text-danger"></div>
										</div> 
										<div class="w-50">
											<input id="name" type="text" class="form-control" name="name" placeholder="Enter your Full name ..."  autofocus>
											<div class="error text-danger"></div>
										</div>
									</div>
								</div>
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted">Informations:</label>
									<div class="d-flex flex-row w-75">
									<div class="w-50 me-3">
										<input id="CIN" type="text" class="form-control" name="CIN" placeholder="Enter your C.I.N  ..." >
										<div class="error text-danger"></div>
									</div>
									<div class="w-50">
										<input id="Occupation" type="text"  class="form-control" name="Occupation" placeholder="Enter your Occupation ..." >
										<div class="error text-danger"></div>
									</div>
									</div>
								</div>
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted" >email :</label>
								<div  class="w-75">
									<input id="email" type="email" class="form-control" name="email" placeholder="Enter your email ..."  autofocus>
									<div class="error text-danger"></div>
								</div>
								</div>
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted" >Phone :</label>
									<div class="w-75">
										<input id="Phone" type="Phone" class="form-control" name="Phone" placeholder="Enter your Phone Number ..."  autofocus>
										<div class="error text-danger"></div>
									</div>
								</div>
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted">Address :</label>
									<div class="w-75">
										<input id="address" type="text" class="form-control" name="address" placeholder="Enter your Address ..." >
										<div class="error text-danger"></div>
									</div>
								</div>
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted" for="password">BirthDate :</label>
								<div class="w-75">
									<input id="date" type="date" class="form-control" name="birthdate" >
									<div class="error text-danger"></div>
								</div>
								</div>
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted" for="password">Password :</label>
									<div class="w-75">
										<input id="password1" type="password" class="form-control" name="password1"placeholder="Enter a password ..."  >
										<div class="error text-danger"></div>
									</div>
								</div>
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted" for="password">Password :</label>
									<div class="w-75">
										<input id="password2" type="password" class="form-control" name="password2" placeholder="confirm Password ..."  >
										<div class="error text-danger"></div>
									</div>
								</div>
								<div class="col-12 d-flex justify-content-center ">
								<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
								<label class="form-check-label" for="invalidCheck">
									Agree to terms and conditions
								</label>
								<div class="invalid-feedback">
									You must agree before submitting.
								</div>
								</div>

								</div>
								<div class="d-flex justify-content-end">
									<input type="submit" name="submit"  class="btn btn-primary ms-auto" value="Register">
								</div>

							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="log.php">Login</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- <script src="../js/register.js"></script> -->
</body>
</html>