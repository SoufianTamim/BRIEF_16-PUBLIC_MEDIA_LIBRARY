<?php
include '../includes/navbar-home.php';
include '../php/functions.php';

$nickname = $_SESSION['user_id'];
// $query = "SELECT COUNT(*) FROM ( SELECT nickname FROM reservation UNION ALL SELECT nickname FROM borrowings ) as combined_tables WHERE nickname = '$nickname' ";
// $query = "SELECT COUNT(*) FROM ( SELECT Nickname FROM reservation  UNION ALL  SELECT nickname FROM borrowings WHERE Borrowing_Return_Date IS NULL ) as combined_tables WHERE nickname = '$nickname'";
$query = "SELECT COUNT(*) FROM (
  SELECT Nickname, Item_Code FROM reservation
  UNION ALL
  SELECT nickname, Item_Code FROM borrowings WHERE Borrowing_Return_Date IS NULL
) as combined_tables
INNER JOIN item ON combined_tables.Item_Code = item.Item_Code
WHERE combined_tables.Nickname = '$nickname' AND item.Status <> 'Available' LIMIT 0, 25;
 ";


$result = $crud->readQuery($query);

$count = $result[0]['COUNT(*)'];
// echo $count;

if ($count <= 3) {
  if (isset($_GET['Reserve'])) {
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
  }
} else {
  echo "you have reserved tooo much";
}

?>
<section id="sec-2">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h1 class="fs-2 text-danger mt-3">Trending Item</h1>
        <div class="underline mx-auto mt-3"></div>
      </div>
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