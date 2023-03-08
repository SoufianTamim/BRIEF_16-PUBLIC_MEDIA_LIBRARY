<?php
include '../includes/navbar.php';


$nickname = $_SESSION['user_id'];
$table_name = "members";
$where = "Nickname = '$nickname'";
$member = $crud->read($table_name , $where);




// $_SESSION['user_id'] = $nickname;




// Get the form data
$data = array(
    'Nickname' => $_GET['Nickname'],
    'Email' => $_GET['Email'],
    'Phone' => $_GET['Phone'],
    'CIN' => $_GET['CIN'],
    'Address' => $_GET['Address']
);
$id = 'Nickname';

// Call the update() function
if($database->update('members', $id, $data)) {
    // Redirect the user to the page where the updated data is displayed
    header('Location: display_data.php');
    exit();
} else {
    echo "Error updating data.";
}



?>


<?php foreach ($member as $key => $val) { ?>
        <section style="background-color: #eee;">
        <form method="GET">
          <div class="container py-5 text-black">
            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-body text-center">
                    <img src="../images/product_img_8.jpg" alt="avatar"
                      class="rounded-circle img-fluid" style="width: 150px;">
                      <h5 type="text"class=" text-black text-center  my-2"><?php echo $val['Full_Name']; ?></h5>
                      <p type="text"class=" text-black text-center  my-2"><?php echo $val['Occupation']; ?></p>
                      <p type="text"class=" text-black text-center  my-2"><?php echo $val['Birth_Date']; ?></p>

                    <div class="d-flex justify-content-center mb-2">
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
                    <input type="text" class=" text-black text-center form-control w-75" name="Nickname"  value="<?php echo $val['Nickname']; ?>">

                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                      </div>
                      <div class="col-sm-9">
                    <input type="text" class=" text-black text-center form-control w-75" name="Email" value="<?php echo $val['Email']; ?>">

                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                      </div>
                      <div class="col-sm-9">
                    <input type="text" class=" text-black text-center form-control w-75" name="Phone" value="<?php echo $val['Phone']; ?>">

                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">C.I.N</p>
                      </div>
                      <div class="col-sm-9">
                    <input type="text " class=" text-black text-center form-control w-75" name="CIN" value="<?php echo $val['CIN']; ?>">

                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                      </div>
                      <div class="col-sm-9">
                    <input type="text" class=" text-black text-center form-control w-75" name="Address" value="<?php echo $val['Address']; ?>">

                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-2">Save</button>
                  </div>
                </div>
                
                </form>

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
        <?php } ?>
    <?php require '../includes/footer.php';?>
    </div>

</html>
