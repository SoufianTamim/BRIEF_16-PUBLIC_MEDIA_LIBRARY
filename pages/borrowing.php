<?php 
include '../includes/navbar.php';

if ($user->isAdmin()) { 


 
  
include '../php/functions.php';



$table_name_1 = "Borrowings";
$Borrowings = $crud->read($table_name_1);

$Nickname = $_GET['Nickname'];
$table_name_2 = "members";
$where ="Nickname = '$Nickname'";
$row = 'Penalty_Count';

$members = $crud->read($table_name_2 , $where, $row);

if (isset($_GET['Confirm_Return'])) {
  $Nickname = $_GET['Borrowing_Code'];
  $id_Name = 'Borrowing_Code';
  $table_name='borrowings';
  $data = [
    "Borrowing_Return_Date" => now(),
];

  if ($crud->update($table_name, $Nickname, $id_Name, $data)) {
    $Nickname = $_GET['Item_Code'];
    $id_Name = 'Item_Code';
    $table_name='item';
    $data = [
      "Status" => 'Available',
  ];

  if ($crud->update($table_name, $Nickname, $id_Name, $data)) {

  $borrowing_date = $Borrowings[0]['Borrowing_Date'];
  $return_date = $Borrowings['Borrowing_Return_Date'];

  $diff = $return_date + $borrowing_date;
  
  if ($diff  > 15) {
    $penalty_count = $members[0]['Penalty_Count'] + 1;
    dd($penalty_count);
    $Nickname = $_SESSION['Nickname'];
    $id_Name = 'Nickname';
    $table_name='members';
    $data = [
      "Penalty_Count" => $penalty_count,
    ];
    if ($crud->update($table_name, $Nickname, $id_Name, $data)) {
      header("Location: home.php");
    }
  } else {
    header("Location: home.php");
  }
 } } }
?>
<!-- items reserved  -->
<section class = "d-flex flex-wrap container">
  <?php foreach ($Borrowings as $keye => $vale) { ?>
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
                        <p><?php echo $val['Category_Name'] ?></p>
                        <p><?php echo $val['Category_Type'] ?></p>

                      </div>
                    </div>
                  </div>
                </div>
                <div class = "product-content text-center d-flex flex-column d-block m-auto mb-3">
                <span class = " m-1 text-uppercase"><?php echo $vale['Borrowing_Date'] ?></span>
                  <span class = " m-1 text-danger"><?php echo $vale['Borrowing_Return_Date'] ?></span>
                  <span class = " m-1 text-success"><?php echo $vale['Reservation_Code'] ?></span>
                  <span class = " m-1 text-uppercase"><?php echo $val['Title'] ?></span>
                  <span class = " m-1 text-success"><?php echo $val['Status'] ?></span>
                  <form method="GET">
                    <input type="submit" <?php if(!isset($val['Status']) || $val['Status'] !== "Borrowed") { echo "hidden"; } ?> class="btn btn-outline-primary text-white" value="Confirm Return" name="Confirm_Return">
                    <input type="hidden" name="Borrowing_Code" value="<?php echo $vale['Borrowing_Code'];?>" >
                    <input type="hidden" name="Item_Code" value="<?php echo $vale['Item_Code'];?>" >
                    <input type="hidden" name="Nickname" value="<?php echo $vale['Nickname'];?>" >
                  </form>
              </div>
            </div>
       <?php }  }  }  ?>
</section>
<?php
    require '../includes/modals.php'; 
    require '../includes/footer.php'; 
    } else {
     header("Location: home.php");
    }

  
  ?>
<script src="/js/Add-Item.js"></script>
</body>
</html>