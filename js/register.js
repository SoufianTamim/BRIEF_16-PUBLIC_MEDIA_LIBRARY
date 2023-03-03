const form = document.getElementById("form");
const nickname = document.getElementById("NickName");
const Fullname = document.getElementById("name");
const Email = document.getElementById("email");
const Phone = document.getElementById("phone");
const Address = document.getElementById("address");
const CIN = document.getElementById("CIN");
const Occupation = document.getElementById("Occupation");
const BirthDate = document.getElementById("date");
const password1 = document.getElementById("password1");
const password2 = document.getElementById("password2");



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
  const nicknameValue = nickname.value;
  const FullnameValue = Fullname.value;
  const password1Value = password1.value;
  const password2Value = password2.value;
  const EmailValue = Email.value;
  const PhoneValue = Phone.value;
  const AddressValue = Address.value;
  const CINValue = CIN.value;
  const OccupationValue = Occupation.value;
  const BirthDateValue = BirthDate.value;


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

  if (FullnameValue === "") {
    setError(Fullname, " name is required");
    arr.push(false);
  } else if (FullnameValue.length > 50) {
    setError(Fullname, " name is too long");
    arr.push(false);
  } else if (myRegex.test(FullnameValue) === false) {
    setError(Fullname, " name cannot be long");
    arr.push(false);
  } else {
    setSuccess(Fullname);
  }




















































  if (password1Value === "") {
    setError(password1, "password is required, cannot be empty");
    arr.push(false);
  } else if (password1Value.length > 50) {
    setError(password1, "password is too long");
    arr.push(false);
  } else if (passRe.test(password1Value) === false) {
    setError(password1, "password is invalid");
    arr.push(false);
  } else {
    setSuccess(password1);
  }

  if(password1Value === password2Value){
    if (password2Value === "") {
      setError(password2, "password is required, cannot be empty");
      arr.push(false);
    } else if (password2Value.length > 50) {
      setError(password2, "password is too long");
      arr.push(false);
    } else if (passRe.test(password2Value) === false) {
      setError(password2, "password is invalid");
      arr.push(false);
    } else {
      setSuccess(password2);
    }
  }else if(password1Value !== password2Value) {
    setError(password2, "passwords doesn't match");
    arr.push(false);
  }else{
    setSuccess(password2);
  }


  if (arr.length === 0) {
    form.submit();
  }
};
