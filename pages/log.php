<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/style.css">
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
							<form method="" id="form" >
								<div class="mb-3">
									<label class="mb-2 text-muted">NickName</label>
									<input id="NickName" type="text" class="form-control " name="NickName"  placeholder="Enter Your Nick Name ..."  autofocus>
									<div class="error text-danger"></div>
								</div>
								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted">Password</label>
									</div>
									<input id="password" type="password" class="form-control" name="password" placeholder="Enter Your Password ... " >
									<div class="error text-danger"></div>
								</div>
								<div class="d-flex align-items-center">
									<button type="submit" class="btn btn-primary ms-auto"> Login </button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center"> Don't have an account? <a href="register.php" >Create One</a> </div>
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
