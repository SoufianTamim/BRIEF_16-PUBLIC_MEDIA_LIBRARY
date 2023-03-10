<?php
include '../includes/navbar-home.php';
include '../php/functions.php';

$nickname = $_SESSION['user_id'];


$Nickname = $_SESSION['user_id'];
$penalties = $crud->readQuery("SELECT Penalty_Count FROM members WHERE Nickname = '$nickname'");
$Penalty_Count = $penalties[0]['Penalty_Count'];


if(isset($_GET['Item_Code'])){ 
$item_code= $_GET['Item_Code'];

$query = "SELECT COUNT(*) FROM (
  SELECT Nickname, Item_Code FROM reservation
  UNION ALL
  SELECT nickname, Item_Code FROM borrowings WHERE Borrowing_Return_Date IS NULL
) as combined_tables
INNER JOIN item ON combined_tables.Item_Code = item.Item_Code
WHERE combined_tables.Nickname = '$nickname' AND item.Status <> 'Available'  AND item.Item_Code <> '$item_code';
";
$result = $crud->readQuery($query);
$count = $result[0]['COUNT(*)'];



if ($count < 3 && $Penalty_Count <= 3) {
  if (isset($_GET['Reserve']) ) {
    $table_name = 'reservation';
    $data = [
      "Item_Code" => $_GET['Item_Code'],
      "Nickname" => $_GET['Nickname'],
      "Reservation_Date" => now(),
      "Reservation_Expiration_Date" => nowPlus24h(),
    ];

    if ($crud->create($table_name, $data)) {
      $Nickname = $_GET['Item_Code'];
      $id_Name = 'Item_Code';
      $table_name = 'item';
      $data = [
        "Item_Code" => $_GET['Item_Code'],
        "Status" => 'Reserved',
      ];
      if ($crud->update($table_name, $Nickname, $id_Name, $data)) {
        header("Location: home.php");
      } else {
        echo "Error adding item.";
      }
      exit;
    } else {
      echo "Error adding item.";
    }
  }else{
  }
} else {
  $error = "you have reserved tooo much";
  $user->logout();
}
}
?>
<section id="sec-2">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h1 class="fs-2 text-danger mt-3">Trending Item</h1>
        <?php if(isset($error)){  ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $error; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  } ?>
        <div class="underline mx-auto mt-3"></div>
      </div>
    </div>
    <div>
       <?php echo $Penalty_Count; ?>
    </div>
    <!-- //=========== display cards ===========// -->
    <?php require '../includes/Category.php'; ?>
  </div>
  <!-- //=========== display cards ===========// -->
  <?php require '../includes/Cards.php'; ?>
</section>
<!-- //=========== display footer ===========// -->
<?php require '../includes/footer.php'; ?>
</div>
</body>

</html>