const form = document.getElementById("form");
const nickname = document.getElementById("nickname");
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
let phoneRe = /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
let emailRe = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;


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
    setError(nickname, "nick name is Invalid ");
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
    setError(Fullname, " name is Invalid ");
    arr.push(false);
  } else {
    setSuccess(Fullname);
  }


  if (EmailValue === "") {
    setError(Email, " Email is required");
    arr.push(false);
  } else if (EmailValue.length > 50) {
    setError(Email, " Email is too long");
    arr.push(false);
  } else if (emailRe.test(EmailValue) === false) {
    setError(Email, " Email is Invalid");
    arr.push(false);
  } else {
    setSuccess(Email);
  }


  if (PhoneValue === "") {
    setError(Phone, " Phone is required");
    arr.push(false);
  } else if (PhoneValue.length > 50) {
    setError(Phone, " Phone is too long");
    arr.push(false);
  } else if (phoneRe.test(PhoneValue) === false) {
    setError(Phone, " Phone is Invalid ");
    arr.push(false);
  } else {
    setSuccess(Phone);
  }


  if (AddressValue === "") {
    setError(Address, " Address is required");
    arr.push(false);
  } else if (AddressValue.length > 50) {
    setError(Address, " Address is too long");
    arr.push(false);
  } else if (myRegex.test(AddressValue) === false) {
    setError(Address, " Address is Invalid ");
    arr.push(false);
  } else {
    setSuccess(Address);
  }


  if (CINValue === "") {
    setError(CIN, " CIN is required");
    arr.push(false);
  } else if (CINValue.length > 50) {
    setError(CIN, " CIN is too long");
    arr.push(false);
  } else if (myRegex.test(CINValue) === false) {
    setError(CIN, " CIN is Invalid ");
    arr.push(false);
  } else {
    setSuccess(CIN);
  }
  

  if (OccupationValue === "") {
    setError(Occupation, " Occupation is required");
    arr.push(false);
  } else if (OccupationValue.length > 50) {
    setError(Occupation, " Occupation is too long");
    arr.push(false);
  } else if (myRegex.test(OccupationValue) === false) {
    setError(Occupation, " Occupation is Invalid ");
    arr.push(false);
  } else {
    setSuccess(Occupation);
  }


  if (BirthDateValue === "") {
    setError(BirthDate, " BirthDate is required");
    arr.push(false);
  } else if (BirthDateValue.length > 50) {
    setError(BirthDate, " BirthDate is too long");
    arr.push(false);
  } else {
    setSuccess(BirthDate);
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
