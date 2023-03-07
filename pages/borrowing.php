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
              <a class="float-md-start mb-0 "  href="/index.php" ><img src="../images/logo.png"  alt="logo" width="150"></a>
            </div>
            <div class="d-flex flex-row" >
              <a class="nav-link text-white" aria-current="page" href="/index.php">HOME</a>
              <a class="nav-link text-white" aria-current="page" data-bs-toggle="modal"   data-bs-target="#Add-item" href="#">ADD-ITEM</a>
              
            </div>
            <div class="btn-group">
              <a type="button" class=" me-5 my-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <img src="../images/user.png" alt="profile logo" width="35">  
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                <li><a class="dropdown-item" href="profile.php">PROFILE</a></li>
                <li><a class="dropdown-item" href="./pages/Reservation.php">RESERVATION</a></li>
                <li><a class="dropdown-item" href="./pages/borrowing.php">BORROWING</a></li>
                <li><a class="dropdown-item text-danger" href="#">Log out</a></li>
              </ul>
            </div>
          </nav>
      </header>





      <section>
      <?php require '../includes/Category.php';?>
      </section>
<!-- items reserved  -->
      <section>
      
      <?php require '../includes/Cards.php';?>
              <!-- <div class = "product-item m-2 bg-dark p-2 d-flex flex-row w-25 card">
                <div class = "product-img cont image w-50 ">
                    <img src = "/images/product_img_8.jpg" class="image card-img img-fluid " >
                    <div class="overlay">
                       <div class="middle">
                        <div class="text">
                          <p>Author</p>
                          <p>State</p>
                          <p>Category</p>
                          <p>Edition Date</p>
                          <p>Duration</p>
                        </div>
                      </div>
                    </div>
                </div>
                <div class = "product-content text-center d-flex flex-column  text-uppercase ">
                    <span class = "fw-bold">Title</span>
                    <p>Nick Name : Name</p>
                    <p>Full Name : Name</p>
                    <p>Reserved : Hour</p>

                    <button class="btn btn-outline-primary m-2 text-white" data-bs-toggle="modal" data-bs-target="#return">Confirm Item return</button>
                </div>
            </div> -->
      </section>
    <?php require '../includes/modals.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/js/Add-Item.js"></script>
</body>
</html>