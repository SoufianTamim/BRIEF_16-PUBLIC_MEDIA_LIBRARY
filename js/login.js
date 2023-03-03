const form = document.getElementById("form");
const nickname = document.getElementById("NickName");
const password = document.getElementById("password");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  validateInputs();
});

const setError = (element, message) => {
  const errorDisplay = element.nextElementSibling;
  errorDisplay.innerText = message;

  element.classList.add("is-invalid");
  element.classList.remove("is-valid");
};

const setSuccess = (element) => {
  const errorDisplay = element.nextElementSibling;
  errorDisplay.innerText = "";

  element.classList.add("is-valid");
  element.classList.remove("is-invalid");
};

let myRegex = /(^[^0-9])([\w a-z A-Z 0-9][^@#])/;
let passRe = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/;

const validateInputs = () => {
  const nicknameValue = nickname.value.trim();
  const passwordValue = password.value;

  const arr = [];

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

  if (passwordValue === "") {
    setError(password, "password is required, cannot be empty");
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
