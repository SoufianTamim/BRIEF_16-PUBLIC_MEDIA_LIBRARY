<?php
  session_start();


  include '../php/CRUD.php';
  include '../php/User.php';


  $conn = new Database('localhost', 'Library', 'root', '');
  $user = new User($conn);
  $crud = new Crud();

  $table_name = "Category";
  $where = "";
  $category = $crud->read($table_name);


if (isset($_GET['find'])) {

  $table_name = "item";
  $Column_1 = $_GET['Title'];
  $Column_2 =  $_GET['Author_Name'];
  $Column_3 = isset($_GET['Category']) ? $_GET['Category'] : null;
  
  if ($Column_1 || $Column_2 || $Column_3) {
    $Filters = $crud->filterItems($table_name, $Column_1, $Column_2, $Column_3);
    
    // print_r($Filters);
  }
} else {

  $table1_name="Item";
  $table2_name="Category";
  $table1_id = "Category_Code";
  $table2_id = "Category_Code";

  $All_Data = $crud-> join($table1_name, $table2_name, $table1_id, $table2_id);

}

$isAuthenticated = $user->isAuthenticated();
$userData = $isAuthenticated ? $user->getUser() : null;

if (isset($_GET['logout'])) {
    $user->logout();
    header('Location:../index.php'); 
    exit;
}


if (!$isAuthenticated) : header('Location: ../index.php'); 

else : 
  
  if ($user->isAdmin()) {
    echo "<p class='bg-dark'>You are an admin!</p>";
} else {
    echo "<p class='bg-dark'>You are not an admin.</p>";
}
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Header</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/stylecards.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="h-100 text-center text-white">
  <header>
    <nav class="nav nav-masthead d-flex justify-content-around p-3 mb-auto">
      <a class="float-md-start mb-0" href="./home.php">
        <img src="../images/logo.png" alt="logo" width="150">
      </a>
      <a class="nav-link text-white" href="./home.php" aria-current="page">HOME</a>
      <div class="btn-group">
        <a class="me-5 my-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" type="button">
          <img src="../images/user.png" alt="profile logo" width="35">
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item text-danger" href="?logout">Log out</a></li>
        </ul>
      </div>
    </nav>
    <div class="container search">
      <div class="input-group rounded mx-auto w-50">
        <input type="text" class="form-control rounded" placeholder="Search...">
        <button class="input-group-text border-0" id="search-addon">search</button>
      </div>
    </div>
    <a href="#sec-2">
      <div class="scroll-down">
        <p class="text-white">see listings</p>
      </div>
    </a>
  </header>




  <section id="sec-2">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h1 class="fs-2 text-danger mt-3">Trending Item</h1>
          <div class="underline mx-auto mt-3"></div>
        </div>
      </div>
        <!-- //=========== display cards ===========// -->
        <?php require '../includes/Category.php'; ?>
      </div>
    <!-- //=========== display cards ===========// -->
    <?php require '../includes/Cards.php'; ?>
  </section>
    <!-- //=========== display footer ===========// -->
  <?php require '../includes/footer.php'; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
<?php endif ?>