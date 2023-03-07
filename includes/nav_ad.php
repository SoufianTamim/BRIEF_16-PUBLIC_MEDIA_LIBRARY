<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <title>Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylecards.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="h-100 text-center text-white">
    <div class=" d-flex flex-column ">
      <header class="mb-auto bg-dark">
          <nav class="nav nav-masthead d-flex justify-content-around p-3" >
            <div>
              <a class="float-md-start mb-0 "  href="/index.html" ><img src="../images/logo.png"  alt="logo" width="150"></a>
            </div>
            <div class="d-flex flex-row" >
              <a class="nav-link text-white" aria-current="page" href="/index.html">HOME</a>
              <a class="nav-link text-white" aria-current="page" data-bs-toggle="modal"   data-bs-target="#Add-item" href="#">ADD-ITEM</a>
              
            </div>
            <div class="btn-group">
              <a type="button" class=" me-5 my-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <img src="../images/user.png" alt="profile logo" width="35">  
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                <li><a class="dropdown-item" href="/pages/profile.html">PROFILE</a></li>
                <li><a class="dropdown-item" href="./pages/Reservation.html">RESERVATION</a></li>
                <li><a class="dropdown-item" href="./pages/borrowing.html">BORROWING</a></li>
                <li><a class="dropdown-item text-danger" href="#">Log out</a></li>
              </ul>
            </div>
          </nav>
      </header>