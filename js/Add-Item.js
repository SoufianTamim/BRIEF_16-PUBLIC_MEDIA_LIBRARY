const form = document.getElementById("moda-Add-item");
const Title = document.getElementById("Title");
const Author = document.getElementById("Author");
const Image = document.getElementById("Image");
const Edition_Date = document.getElementById("Edition_Date");
const Puchase_Date = document.getElementById("Puchase_Date");
const select = document.getElementById("select").selectedOptions;



// const Occupation = document.getElementById("Occupation");
// const BirthDate = document.getElementById("date");


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

const validateInputs = () => {
  const TitleValue = Title.value;
  const AuthorValue = Author.value;
  const ImageValue = Image.value;
  const Edition_DateValue = Edition_Date.value;
  const Puchase_DateValue = Puchase_Date.value;

  const arr = [];

  if (TitleValue === "") {
    setError(Title, "nick name is required");
    arr.push(false);
  } else if (TitleValue.length > 50) {
    setError(Title, "nick name is too long");
    arr.push(false);
  } else if (myRegex.test(TitleValue) === false) {
    setError(Title, "nick name is Invalid ");
    arr.push(false);
  } else {
    setSuccess(Title);
  }

  if (AuthorValue === "") {
    setError(Author, " name is required");
    arr.push(false);
  } else if (AuthorValue.length > 50) {
    setError(Author, " name is too long");
    arr.push(false);
  } else if (myRegex.test(AuthorValue) === false) {
    setError(Author, " name is Invalid ");
    arr.push(false);
  } else {
    setSuccess(Author);
  }

  if (ImageValue === "") {
    setError(Image, " Image is required");
    arr.push(false);
  } else if (ImageValue.length > 50) {
    setError(Image, " Image is too long");
    arr.push(false);
  } else if (ImageRe.test(ImageValue) === false) {
    setError(Image, " Image is Invalid");
    arr.push(false);
  } else {
    setSuccess(Image);
  }

  if (Edition_DateValue === "") {
    setError(Edition_Date, "Edition Date is required");
    arr.push(false);
  } else {
    setSuccess(Edition_Date);
  }

  if (Puchase_DateValue === "") {
    setError(Puchase_Date, "Puchase Date is required");
    arr.push(false);
  } else {
    setSuccess(Puchase_Date);
  }

  if (select.length === 0) {
    setError(select, "you have to selecty a category , can't be empty ");
    arr.push(false);
  } else {
    setSuccess(select);
  }


  if (arr.length === 0) {
    form.submit();
  }
};
