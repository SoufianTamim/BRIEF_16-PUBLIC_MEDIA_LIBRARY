<?php
include '../includes/navbar.php';



$table_name = "members";
$where = "";
$members = $crud->read($table_name);

print_r($members);



?>


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
                      <!-- <button type="button" class="btn btn-danger ms-1">Delete Account</button> -->
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

        
    <?php require '../includes/footer.php';?>
    </div>

</html>
