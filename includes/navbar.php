<?php
require __DIR__.'/../vendor/autoload.php';

include '../php/USER.php';

Database::connect('localhost', 'Library', 'root', '');
$crud = new Crud();
$user = new User();


$table_name = "Category";
$where = "";
$category = $crud->read($table_name);

if (isset($_GET['find'])) {
  $table_name = "item";
  $Column_1 = $_GET['Title'];
  $Column_2 = $_GET['Author_Name'];
  $Column_3 = isset($_GET['Category']) ? $_GET['Category'] : null;
  
  if ($Column_1 || $Column_2 || $Column_3) {
    $Filters = $crud->filterItems($table_name, $Column_1, $Column_2, $Column_3);

  }
  
} else {

  $table1_name = "Item";
  $table2_name = "Category";
  $table1_id = "Category_Code";
  $table2_id = "Category_Code";

  $All_Data = $crud->join($table1_name, $table2_name, $table1_id, $table2_id);
}
$isAuthenticated = $user->isAuthenticated();
$userData = $isAuthenticated ? $user->getUser() : null;





if (isset($_GET['logout'])) {
  $user->logout();
  header('Location: ../index.php');
  exit;
}

if (!$isAuthenticated):
  header('Location: ../index.php');
else:


  $nickname = $_SESSION['user_id'];
  $table_name = "members";
  $where = "Nickname = '$nickname'";
  $member = $crud->read($table_name , $where);



  // if ($user->isAdmin()) {
  //   echo "<p>You are an admin!</p>";
  // } else {
  //   echo "<p>You are not an admin.</p>";
  // }




?>



<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <title>Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylecards.css">
    <!-- <script src="../js/Add-Item.js" defer></script> -->




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="h-100 text-center text-white">
    <div class=" d-flex flex-column ">
      <header class="mb-auto bg-dark">
          <nav class="nav nav-masthead d-flex justify-content-around p-3" >
            <div>
              <a class="float-md-start mb-0 "  href="/index.php" ><img src="../images/logo.png"  alt="logo" width="150"></a>
            </div>
            <div class="d-flex flex-row" >
            <?php   if ($user->isAdmin()) {  ?>
              <a class="nav-link text-white" aria-current="page" href="home.php">HOME</a>
              <a class="nav-link text-white" aria-current="page" href="Add_Item.php">ADD-ITEM</a>
              <?php } else {  ?>
              <a class="nav-link text-white" aria-current="page" href="home.php">HOME</a>
                <?php } ?>
            </div>
            <div class="btn-group">
              <a type="button" class=" me-5 my-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <img src="../images/user.png" alt="profile logo" width="35">  
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                <?php   if ($user->isAdmin()) {  ?>
                <li><a class="dropdown-item" href="profile.php">PROFILE</a></li>
                <li><a class="dropdown-item" href="Reservation.php">RESERVATION</a></li>
                <li><a class="dropdown-item" href="borrowing.php">BORROWING</a></li>
                <li><a class="dropdown-item text-danger" href="?logout">LOGOUT</a></li>
                <?php } else {  ?>
                  <li><a class="dropdown-item" href="profile.php">PROFILE</a></li>
                  <li><a class="dropdown-item text-danger" href="?logout">LOGOUT</a></li>
                <?php } ?>
              </ul>
            </div>
          </nav>
      </header>
<?php endif; ?>
