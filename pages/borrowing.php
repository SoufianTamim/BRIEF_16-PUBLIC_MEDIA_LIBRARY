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
              <a class="float-md-start mb-0 "  href="/index.html" ><img src="/images/logo.png"  alt="logo" width="150"></a>
            </div>
            <div class="d-flex flex-row" >
              <a class="nav-link text-white" aria-current="page" href="/index.html">HOME</a>
              <a class="nav-link text-white" aria-current="page" href="/pages/Reservation.html">RESERVATION</a>
              <a class="nav-link text-white" aria-current="page" href="/pages/borrowing.html">BORROWING</a>
              <a class="nav-link text-white" aria-current="page" data-bs-toggle="modal"   data-bs-target="#Add-item" href="#">ADD-ITEM</a>
              
            </div>
            <div class="btn-group">
              <a type="button" class=" me-5 my-1" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <img src="/images/user.png" alt="profile logo" width="35">  
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                <li><a class="dropdown-item" href="/pages/profile.html">Profile</a></li>
                <li><a class="dropdown-item text-danger" href="#">Log out</a></li>
              </ul>
            </div>
          </nav>
      </header>

      <section>
        <div class="form row container mx-auto m-5" >
          <div class="col-lg-3">
            <div class="input-icon-wrap">
              <input type="text" class="form-control" placeholder="NickName ..." />
            </div>
          </div>
          <div class="col-lg-3">
            <div class="input-icon-wrap">
              <input type="text" class="form-control" placeholder="Item tittle ..." />
            </div>
          </div>
          <div class="col-lg-3">
            <div class="">
              <select name=""  class="form-select">
                <option value="" disabled selected>Category</option>
                <option value="">1</option>
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <button class="btn btn-primary btn-block w-100">Find</button>
          </div>
        </div>

    <div class="modal fade modal-lg " id="Add-item" tabindex="-1" aria-labelledby="Add-itemLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" class="text-dark" >Add an Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" id="moda-Add-item">
          <div class="modal-body">
            <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted" >Title :</label>
								<div class="w-75">
									<input id="Title" type="Title" class="form-control" name="Title" placeholder="Enter your Title Number ..."  autofocus>
									<div class="error text-danger"></div>
								</div>
							</div>
							<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted">Author :</label>
								<div class="w-75">
									<input id="Author" type="text" class="form-control" name="Author" placeholder="Enter your Author ..." >
									<div class="error text-danger"></div>
								</div>
							</div>
               <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted" >Image :</label>
								<div class="w-75">
									<input id="Image" type="text" class="form-control" name="Image" placeholder="Enter your Image Number ..."  autofocus>
									<div class="error text-danger"></div>
								</div>
								</div>
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted">Edition Date :</label>
									<div class="w-75">
										<input id="Edition_Date" type="text" class="form-control" name="Edition_Date" placeholder="Enter your Edition Date ..." >
										<div class="error text-danger"></div>
									</div>
								</div>
                <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted">Purchase Date :</label>
									<div class="w-75">
										<input id="Puchase_Date" type="text" class="form-control" name="Puchase_Date" placeholder="Enter your Puchase Date ..." >
										<div class="error text-danger"></div>
									</div>
								</div>
                 <div class="mb-2 d-flex flex-row justify-content-between flex-wrap  ">
                    <label class="mb-2 text-muted" >State :</label>
                    <div class="w-75 d-flex flex-column">
                      <select  class="form-select w-100" id="select" required>
                      <option disabled selected value="">choose a Category</option>
                      <option value="">1</option>
                      <option value="">1</option>
                    </select>
										<div class="error text-danger"></div>
                    </div>
                  </div>
              <div class="align-items-center d-flex">
									<button type="submit"  class="btn btn-primary ms-auto">
										Add Item	
									</button>
							</div>

            </div>
          </div>
          </form>
        </div>
      </div>
      </section>
<!-- items reserved  -->
      <section>
              <div class = "product-item m-2 bg-dark p-2 d-flex flex-row w-25 card">
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
            </div>


            
      </section>



      <section>
        <!-- Modal -->
        <div class="modal fade" id="return" tabindex="-1" aria-labelledby="Add-itemLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="Add-itemLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

      </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/js/Add-Item.js"></script>
</body>
</html>