<!doctype html>
<html lang="en" class="h-100">
  <head>
    <title>Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="h-100 text-center text-white">
    <div class=" d-flex flex-column ">
      <header class="mb-auto bg-dark">
          <nav class="nav nav-masthead d-flex justify-content-around p-3" >
            <div>
              <a class="float-md-start mb-0 "  href="/home.php" ><img src="../images/logo.png"  alt="logo" width="150"></a>
            </div>
            <div>
              <a class="nav-link text-white" aria-current="page" href="/home.php">HOME</a>
            </div>
            <div class="btn-group">
              <a type="button" class=" me-5 my-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <img src="../images/user.png" alt="profile logo" width="35">  
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                <li><a class="dropdown-item" href="/pages/profile.html">Profile</a></li>
                <li><a class="dropdown-item text-danger" href="#">Log out</a></li>
              </ul>
            </div>
          </nav>
      </header>
        <section style="background-color: #eee;">
          <div class="container py-5 text-black">
            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-body text-center">
                    <img src="../images/product_img_8.jpg" alt="avatar"
                      class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3 text-black">John Smith</h5>
                    <p class="text-muted mb-1">Occupation </p>
                    <p class="text-muted mb-1">birthdate dd/mm/yy </p>
                    <div class="d-flex justify-content-center mb-2">
                      <button type="button" class="btn btn-primary">Edit Profile</button>
                      <button type="button" class="btn btn-danger ms-1">Delete Account</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Nick Name</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">Johnatan Smith</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">example@example.com</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">(097) 234-5678</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">C.I.N</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">KB 2343443</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-row">
                  <div class="card w-50 me-2">
                    <div class="card-body">
                      <p class="mb-4"><span class="text-primary font-italic me-1">Reaservations</p>
                    </div>
                  </div>
                      <div class="card w-50 ml-2">
                        <div class="card-body">
                          <p class="mb-4"><span class="text-primary font-italic me-1">Borrowings</p>
                        </div>
                      </div>
                    </div>
                </div>
        </section>
    <footer class="mt-auto text-white-50 bg-dark ">
      <p>  © All Rights Are reserved Soufian </p>
    </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/c7a60e43cd.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
