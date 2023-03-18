<?php 
include '../includes/navbar.php';
if ($user->isAdmin()) {
  include '../php/functions.php';
  $table_name_1 = "Borrowings";
  $where = 'Borrowing_Return_Date IS NULL';
  $Borrowings = $crud->read($table_name_1);

  if (isset($_GET['Confirm_Return'])) {
    $Nickname = $_GET['Borrowing_Code'];
    $id_Name = 'Borrowing_Code';
    $table_name = 'borrowings';
    $data = [
      "Borrowing_Return_Date" => now(),
    ];
    if ($crud->update($table_name, $Nickname, $id_Name, $data)) {
      $Nickname = $_GET['Item_Code'];
      $id_Name = 'Item_Code';
      $table_name = 'item';
      $data = [
        "Status" => 'Available',
      ];
      if ($crud->update($table_name, $Nickname, $id_Name, $data)) {
        $borrowing_date = $Borrowings[0]['Borrowing_Date'];
        $return_date = $Borrowings[0]['Borrowing_Return_Date'];
        $borrowing_date_obj = new DateTime($borrowing_date);
        $return_date_obj = new DateTime($return_date);
        $diff = $return_date_obj->diff($borrowing_date_obj)->days;
        
        if ($diff > 15) {
          $Nickname = $_GET['Nickname'];
          $table_name_2 = "members";
          $where = "Nickname = '$Nickname'";
          $row = 'Penalty_Count';
          $members = $crud->read($table_name_2, $where, $row);
          $penalty_count = $members[0]['Penalty_Count'] + 1;

          $id_Name = 'Nickname';
          $table_name = 'members';
          $data = [
            "Penalty_Count" => $penalty_count,
          ];
          if ($crud->update($table_name, $Nickname, $id_Name, $data)) {
                $id = $_GET['Borrowing_Code'];
                $column = 'Borrowing_Code';
                $table_name = 'borrowings';
            if ($crud->delete($table_name, $column, $id)){
              header("Location: home.php");
            }
          }
        } else {
          echo 'an error has occured';
        }
      }

    }
  }
  if (isset($_GET['Search_B'])) {
    $Borrowing_Filter = $crud->filter('Nickname', 'Borrowing_Code', 'Title', 'borrowings', 'item', $_GET['Nickname'], $_GET['Borrowing_Code'], $_GET['Title']);
  }
  ?>
<!-- items reserved  -->
<section class="container mx-auto mt-4 mb-4 ">
 <form action="" method="GET">
      <div class="form row">
        <div class="col-lg-3">
          <div class="input-icon-wrap">
            <input type="text" class="form-control" name="Nickname" placeholder="Nickname ...">
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-icon-wrap">
            <input type="text" class="form-control" name="Borrowing_Code" placeholder="Borrowing Code  ...">
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-icon-wrap">
            <input type="text" class="form-control" name="Title" placeholder=" Item Title  ...">
          </div>
        </div>
<div class="col-lg-3">
    <button class="btn btn-primary btn-block w-100" name="Search_B">Search </button>
</div>
</form>
</section>




<section class="container">
  <div class="row row-cols-4 g-3">
  <?php
    if (!isset($_GET['Search_B'])) {
   foreach ($Borrowings as $keye => $vale) { ?>
  <?php foreach ($All_Data as $key => $val) { ?>
      <?php if ($vale['Item_Code'] === $val['Item_Code'] &&  $val['Status'] == "Borrowed") { ?>
        <div class="d-flex flex-wrap  bg-dark p-2 rounded-2 m-1" id="card">
              <div class = "product-img cont image " >
                  <img src = "../<?php echo $val['Cover_Image'] ?>" id="image" class = "image img-fluid d-block mx-auto" height="400px !important">
                  <div class="overlay w-100">
                     <div class="middle">
                      <div class="text w-100">
                        <p><?php echo $val['Author_Name'] ?></p>
                        <p><?php echo $val['State'] ?></p>
                        <p><?php echo $val['Edition_Date'] ?></p>
                        <p><?php echo $vale['Borrowing_Code'] ?></p>
                        <p><?php echo $vale['Item_Code'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class = "product-content text-center d-flex flex-column d-block m-auto mb-3">
                  <span class = " m-1 text-uppercase"><?php echo $val['Title'] ?></span>
                  <span class = " m-1 text-success"><?php echo $val['Status'] ?></span>
                  <span class = " m-1 text-warning">To : <?php echo $vale['Nickname'] ?></span>
                  <form method="GET">
                    <input type="submit" <?php if(!isset($val['Status']) || $val['Status'] !== "Borrowed") { echo "hidden"; } ?> class="btn btn-outline-primary text-white" value="Confirm Return" name="Confirm_Return">
                    <input type="hidden" name="Borrowing_Code" value="<?php echo $vale['Borrowing_Code'];?>" >
                    <input type="hidden" name="Item_Code" value="<?php echo $vale['Item_Code'];?>" >
                    <input type="hidden" name="Nickname" value="<?php echo $vale['Nickname'];?>" >
                  </form>
              </div>
            </div>
       <?php }  }  } }  
        if (isset($_GET['Search_B'])) {
        foreach ($Borrowing_Filter as $key => $val) { ?>
      <?php if ($val['Item_Code'] === $val['Item_Code'] &&  $val['Status'] == "Borrowed") { ?>
        <div class="d-flex flex-wrap  bg-dark p-2 rounded-2 m-1" id="card">
              <div class = "product-img cont image " >
                  <img src = "../<?php echo $val['Cover_Image'] ?>" id="image" class = "image img-fluid d-block mx-auto" height="400px !important">
                  <div class="overlay w-100">
                     <div class="middle">
                      <div class="text w-100">
                        <p><?php echo $val['Author_Name'] ?></p>
                        <p><?php echo $val['State'] ?></p>
                        <p><?php echo $val['Edition_Date'] ?></p>
                        <p><?php echo $val['Borrowing_Code'] ?></p>
                        <p><?php echo $val['Item_Code'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class = "product-content text-center d-flex flex-column d-block m-auto mb-3">
                  <span class = " m-1 text-uppercase"><?php echo $val['Title'] ?></span>
                  <span class = " m-1 text-success"><?php echo $val['Status'] ?></span>
                  <span class = " m-1 text-warning">To : <?php echo $val['Nickname'] ?></span>
                  <form method="GET">
                    <input type="submit" <?php if(!isset($val['Status']) || $val['Status'] !== "Borrowed") { echo "hidden"; } ?> class="btn btn-outline-primary text-white" value="Confirm Return" name="Confirm_Return">
                    <input type="hidden" name="Borrowing_Code" value="<?php echo $val['Borrowing_Code'];?>" >
                    <input type="hidden" name="Item_Code" value="<?php echo $val['Item_Code'];?>" >
                    <input type="hidden" name="Nickname" value="<?php echo $val['Nickname'];?>" >
                  </form>
              </div>
            </div>
       <?php }  }  }   ?>
      </div>

</section>
<?php
    require '../includes/footer.php'; 
    } else {
     header("Location: home.php");
    }
?>
<script src="/js/Add-Item.js"></script>
</body>
</html>