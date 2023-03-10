<?php

require '../php/User.php';

Database::connect('localhost', 'Library', 'root', '');
$user = new User();
$crud = new Crud();




if (isset($_GET['login']) && isset($_GET['Nickname']) && isset($_GET['password'])) {
	
	$Nickname = $_GET['Nickname'];
	$password = $_GET['password'];
	
	if ($user->login($Nickname, $password)) {
		$nickname = $_SESSION['user_id'];
	
		if ($user->getPenalties($nickname) === 3){
			$user->logout();
			// $error = 'Your Account is Banned for security reasons';
		}else{
			header('Location: ../pages/home.php');
		}
	} else {
		$error = 'Invalid Nickname or password';
	}
}

if (isset($_GET['logout'])) {
	$user->logout();
	header('Location: index.php');
	exit;
}

$isAuthenticated = $user->isAuthenticated();
$userData = $isAuthenticated ? $user->getUser() : null;


if ($isAuthenticated):
	header('Location: ../pages/home.php');

else:
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css">
		<title>login</title>
	</head>

	<body>
		<section class="h-100" id="Login">
			<div class="container h-100">
				<div class="row justify-content-sm-center h-100">
					<div class="w-50">
						<div class="card shadow-lg mt-3">
							<div class="card-body p-5">
								<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
								<?php if(isset($error)){  ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<?php echo $error; ?>
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
									<?php  } ?>
								<form method="GET" id="form">
									<div class="mb-3">
										<label class="mb-2 text-muted">Nickname</label>
										<input id="Nickname" type="text" class="form-control " name="Nickname" placeholder="Enter Your Nick Name ..." autofocus>
										<div class="error text-danger"></div>
									</div>
									<div class="mb-3">
										<div class="mb-2 w-100">
											<label class="text-muted">password</label>
										</div>
										<input id="password" type="password" class="form-control" name="password" placeholder="Enter Your password ... ">
										<?php if (isset($error)): ?>
											<div class="error text-danger">
											</div>
										<?php endif ?>
									</div>
									<div class="d-flex align-items-center">
										<button type="submit" class="btn btn-primary ms-auto" name="login"> Login </button>
									</div>
								</form>

							</div>
							<div class="card-footer py-3 border-0">
								<div class="text-center"> Don't have an account? <a href="register.php">Create One</a> </div>
							</div>
						</div>
						<div class="text-center mt-5 text-muted">
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="/js/login.js"></script>
	</body>

	</html>

<?php endif ?>