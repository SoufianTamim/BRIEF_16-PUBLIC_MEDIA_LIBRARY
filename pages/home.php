  <?php
  // require("../php/database.php");
  require("../php/CRUD.php");

  $crud = new Crud();
  // $crud->getConnection();


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
          <li><a class="dropdown-item" href="./pages/profile.php">Profile</a></li>
          <li><a class="dropdown-item text-danger" href="#">Log out</a></li>
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

      <form action="" method="GET">
      <div class="form row">
        <div class="col-lg-3">
          <div class="input-icon-wrap">
            <input type="text" class="form-control" name="Title" placeholder="Item Title ...">
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-icon-wrap">
            <input type="text" class="form-control" name="Author_Name" placeholder="Author Name ...">
          </div>
        </div>
        <div class="col-lg-3">
          <div>
            <select class="form-select" name="Category">
              <option  disabled selected value=""><-- Choose a Category --> </option>
              <?php foreach ($category as $key => $val) { ?>
                  <option value="<?php echo $val['Category_Name']; ?>"><?php echo $val['Category_Name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-lg-3">
              <button class="btn btn-primary btn-block w-100" name="find">Find </button>
        </div>
      </div>
    </form>
          <div class = "d-flex flex-row flex-wrap justify-content-center mt-5">
          <?php 
         if (!isset($_GET['find'])) {
              foreach($All_Data as $key => $val) {  ?>
            <div class="d-flex flex-wrap  bg-dark p-2 rounded-2 m-1" id="card">
              <div class = "product-img cont image " >
                  <img src = "../<?php echo $val['Cover_Image'] ?>" id="image" class = "image img-fluid d-block mx-auto" height="400px !important">
                  <div class="overlay w-100">
                     <div class="middle">
                      <div class="text w-100">
                        <p><?php echo $val['Author_Name'] ?></p>
                        <p><?php echo $val['State'] ?></p>
                        <p><?php echo $val['Edition_Date'] ?></p>
                        <p><?php echo $val['Category_Name'] ?></p>
                        <p><?php echo $val['Category_Type'] ?></p>
                      </div>
                    </div>
                  </div>
              </div>
              <div class = "product-content text-center d-flex flex-column d-block m-auto mb-3">
                  <span class = " m-1 text-uppercase"><?php echo $val['Title'] ?></span>
                  <span class = " m-1 text-success"><?php echo $val['Status'] ?></span>
                  <button type="button" <?php if(!isset($val['Status']) || $val['Status'] !== "Available") { echo "hidden"; } ?> class="btn btn-outline-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">reserve</button>
              </div>
            </div>
           <?php 
           }
            
          } else if (isset($_GET['find'])) { //check if the method is po  st
              foreach($Filters as $key => $val) { //loops in the table of announce with filterd data and display the in cards 
                      ?>
            <div class="d-flex flex-wrap  bg-dark p-2 rounded-2 m-1" id="card">
              <div class = "product-img cont image " >
                  <img src = "../<?php echo $val['Cover_Image'] ?>" id="image" class = "image img-fluid d-block mx-auto" height="400px !important">
                  <div class="overlay w-100">
                     <div class="middle">
                      <div class="text w-100">
                        <p><?php echo $val['Author_Name'] ?></p>
                        <p><?php echo $val['State'] ?></p>
                        <p><?php echo $val['Edition_Date'] ?></p>
                        <p><?php echo $val['Category_Name'] ?></p>
                        <p><?php echo $val['Category_Type'] ?></p>
                      </div>
                    </div>
                  </div>
              </div>
              <div class = "product-content text-center d-flex flex-column d-block m-auto mb-3">
                  <span class = " m-1 text-uppercase"><?php echo $val['Title'] ?></span>
                  <span class = " m-1 text-success"><?php echo $val['Status'] ?></span>
                  <button type="button" <?php if(!isset($val['Status']) || $val['Status'] !== "Available") { echo "hidden"; } ?> class="btn btn-outline-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">reserve</button>

              </div>
            </div>
           <?php  } } ?>



        </div>

  </section>


  <footer class="mt-auto text-center bg-dark">
    <p class="mb-0">© 2023 by Soufian Tamim. </p>
  </footer>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
