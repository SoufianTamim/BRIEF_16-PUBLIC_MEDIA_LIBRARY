<?php
  include '../includes/navbar.php';
  if(isset($_GET['submit'])) {
    $data = [ 
      "Nickname" => $_GET['Nickname'],
      "Email" => $_GET['Email'],
      "Phone" => $_GET['Phone'],
      "CIN" => $_GET['CIN'],
      "Address" => $_GET['Address']
    ];
    $Nickname = 'Nickname';
    $id_Name = 'Nickname';
    $table_name = 'members';
    if($profile = $crud->update($table_name, $Nickname, $id_Name, $data) ){
      
      header("Location: profile.php");
      exit; 
    }
  }
  if(isset($_GET['cancel'])) {
    $Nickname = $_GET['Item_Code'];
    $id_Name = 'Item_Code';
    $table_name='item';
    $data = [
      "Status" => 'Available',
  ];
    if($crud->update($table_name, $Nickname, $id_Name, $data) ){
      $id = $_GET['Reservation_Code'];
      $column = 'Reservation_Code';
      $table_name = 'reservation';
      if ($crud->delete($table_name, $column, $id)) {
        header("Location: profile.php");
      } else {
        echo "Error deleting record.";
      }
      exit; 
    }
}
  include '../includes/modals.php';
  $user_id = $_SESSION['user_id'];


  $query_1 = "SELECT * FROM item INNER JOIN reservation ON item.Item_Code = reservation.Item_Code WHERE reservation.Nickname = '$user_id' AND item.Status = 'Reserved' AND ( reservation.Reservation_Expiration_Date > NOW() ) ";
  $query_2 = "SELECT * FROM item INNER JOIN borrowings ON item.Item_Code = borrowings.Item_Code  WHERE borrowings.Nickname = '$user_id'  AND item.Status = 'Borrowed' AND (borrowings.Borrowing_Return_Date > NOW() OR borrowings.Borrowing_Return_Date IS NULL);";

  $profile_R = $crud->readQuery($query_1);
  $profile_B = $crud->readQuery($query_2);
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
<section style="background-color: #eee;">
  <?php foreach ($member as $key => $val) { ?>
        <form method="GET" >
          <div class="container py-5 text-black">
            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-body text-center">
                    <img src="../images/profile.jpg" alt="avatar"
                      class="rounded-4 img-fluid" style="width: 150px;">
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
        <?php } 
        if(!$user->isAdmin()){
        ?>
                <div class="d-flex flex-row">
                  <div class="card w-50 me-2">
                    <p class="mb-4"><span class="text-primary font-italic me-1">Reaservations</p>
                    <div class="card-body d-flex flex-row flex-wrap justify-content-center">
                      <?php foreach ($profile_R as $key => $val) { ?>
                        <div class="m-2 w-50"> 
                          <div class="card bg-dark text-white">
                            <img class="card-img opacity-25" src="../<?php echo $val['Cover_Image']?>" alt="Card image" height="250px">
                            <div class="card-img-overlay">
                              <h5 class="card-title"><?php echo $val['Title']?></h5>
                              <p class="card-text"><?php echo $val['Author_Name']?></p>
                              <p class="card-text"><?php echo $val['State']?></p>
                              <p class="card-text"><?php echo $val['Edition_Date']?></p>
                              <form method="GET">
                                <input type="submit" value="Cancel" name="cancel" class="btn btn-warning text-white ">
                                <input type="hidden" value="<?php echo $val['Item_Code']?>" name="Item_Code" class="btn btn-warning text-white ">
                                <input type="hidden" value="<?php echo $val['Reservation_Code']?>" name="Reservation_Code" class="btn btn-warning text-white ">
                              </form>
                            </div>
                          </div>
                        </div>
                    <?php } ?>
                    </div>
                  </div>
                      <div class="card w-50 ml-2">
                        <p class="mb-4"><span class="text-primary font-italic me-1">Borrowings</p>
                        <div class="card-body d-flex flex-row flex-wrap justify-content-center">
                         <?php foreach ($profile_B as $key => $val) { ?>
                        <div class="m-2 w-50"> 
                          <div class="card bg-dark text-white">
                            <img class="card-img opacity-25" src="../<?php echo $val['Cover_Image']?>" alt="Card image" height="250px">
                            <div class="card-img-overlay">
                              <h5 class="card-title"><?php echo $val['Title']?></h5>
                              <p class="card-text"><?php echo $val['Author_Name']?></p>
                              <p class="card-text"><?php echo $val['State']?></p>
                              <p class="card-text"><?php echo $val['Edition_Date']?></p>
                              <form method="GET">

                                <input type="hidden" class="card-text" name="user_id" value="<?php echo $_SESSION['user_id']?>">
                              </form>

                            </div>

                          </div>
                        </div>
                    <?php }  } ?>
                        </div>
                      </div>
                    </div>
                </div>
        </section>
    <?php require '../includes/footer.php';?>
    </div>
</html>