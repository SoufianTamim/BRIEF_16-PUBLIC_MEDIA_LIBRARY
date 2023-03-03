# SoufianTamim-BRIEF_16-PUBLIC_MEDIA_LIBRARY


link Figma : 




link trello:


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
									<input id="NickName" type="text" class="form-control" name="NickName"  placeholder="Enter Your Nick Name ..."  autofocus>
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
							<div class="text-center"> Don't have an account? <a href="register.html" >Create One</a> </div>
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

// ============================ create variables =================================================== //
const form = document.getElementById("form");
const nickname = document.getElementById("NickName");
const password = document.getElementById("password");
const formControl = document.getElementById("form-control");




form.addEventListener("submit", (e) => {
  e.preventDefault();
  validateInputs();
});

// ============================ set Errors function=================================================== //
const setError = (element, message) => {
  const formControl = element.parentElement;
  const errorDisplay = formControl.querySelector(".error");
  errorDisplay.innerText = message;

  formControl.classList.add("is-invalid");
  formControl.classList.remove("is-valid");
};
// ============================ set Success function ================================================== //
const setSuccess = (element) => {
  const formControl = element.parentElement;
  const errorDisplay = formControl.querySelector(".error");

  errorDisplay.innerText = "";
  formControl.classList.add("is-valid");
  formControl.classList.remove("is-invalid");
};
//======================= REGEX FORMS =============================//
let myRegex = /(^[^0-9])([\w a-z A-Z 0-9][^@#])/;
let passRe = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/;
// ================================== onclick function =============================================== //
const validateInputs = () => {
  // ======================= variables Values  ======================//
  const nicknameValue = nickname.value.trim();
  const passwordValue = password.value;

  const arr = [];
  //======================= nick name validaton ====================//
  if (nicknameValue === "") {
    setError(nickname, "nick name is required");
    arr.push(false);
  } else if (nicknameValue.length > 50) {
    setError(nickname, "nick name is too long");
    arr.push(false);
  } else if (myRegex.test(nicknameValue) === false) {
    setError(nickname, "nick name cannot be long");
    arr.push(false);
  } else {
    setSuccess(nickname);
  }

  //======================= group Validation =============================//
  if (passwordValue === "") {
    setError(password, "password is required , cannot be empty ");
    arr.push(false);
  } else if (passwordValue.length > 50) {
    setError(password, "password is too long");
    arr.push(false);
  } else if (passRe.test(passwordValue) === false) {
    setError(password, "password is invalid");
    arr.push(false);
  } else {
    setSuccess(password);
  }

  
  if (arr.length === 0) {
    form.submit();
  }
};