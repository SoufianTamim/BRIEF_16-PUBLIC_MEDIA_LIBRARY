<?php

  include '../includes/navbar.php';

  $nickname = $_SESSION['user_id'];
  $table_name = "members";
  $where = "Nickname = '$nickname'";
  $member = $crud->read($table_name , $where);

  if(isset($_GET['submit'])) {
    $data = [ 
      "Nickname" => $_GET['Nickname'],
      "Email" => $_GET['Email'],
      "Phone" => $_GET['Phone'],
      "CIN" => $_GET['CIN'],
      "Address" => $_GET['Address']
    ];
    $Nickname = 'Nickname';
    $table_name = 'members';
    
    if($profile = $crud->update($table_name, $Nickname, $data)) {
      
      header("Location: profile.php");
      exit; 
    }
  }
  include '../includes/modals.php';


  if (isset($_GET['add'])) {
      $data = [
      "Title" => $_GET['Title'],
      "Author" => $_GET['Author'],
      "Duration" => $_GET['Duration'],
      "Status" => $_GET['Status'],
      "State" => $_GET['State'],
      "Edition_Date" => $_GET['Edition_Date'],
      "Puchase_Date" => $_GET['Puchase_Date'],
      "Image" => $_GET['Image'],
      "Category" => $_GET['Category']
    ]; 
    
    
    $table_name = "Item";

    if ($Add = $crud->create($table_name, $data)) {

      header("Location: profile.php");
      echo "Item added successfully!";
      
    } else {
      echo "Error adding item.";
    }
  }

?>


<?php foreach ($member as $key => $val) { ?>
        <section style="background-color: #eee;">
        <form method="GET" >
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
                    <hr>
                    <button type="submit" name="submit" class="btn btn-primary my-2">Save</button>
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
