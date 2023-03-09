<?php

include '../includes/navbar.php';
$table_name = "Reservation";

$Reservations = $crud->read($table_name);

if (isset($_GET['Active_Reservation'])) {
  $table_name = 'borrowings';
  $data = [
    "Item_Code" => $_GET['Item_Code'],
    "Nickname" => $_GET['Nickname'],
    "Reservation_Code" => $_GET['Reservation_Code'],
  ];


  if ($crud->create($table_name, $data)) {
    $Nickname = $_GET['Item_Code'];
    $id_Name = 'Item_Code';
    $table_name = 'item';
    $data = [
      // "Item_Code" => $_GET['Item_Code'],
      "Status" => 'Borrowed',
    ];
    // dd($data);

    if ($crud->update($table_name, $Nickname, $id_Name, $data)) {
      header("Location: reservation.php");
      echo "addded";
    } else {
      echo "Error adding item.";
    }
  } else {
    echo "Error adding item.";
  }
}
?>

<section>
  <?php require '../includes/filter.php'; ?>

</section>
<section class="container d-flex flex-wrap ">

  <!-- items reserved  -->
  <?php foreach ($All_Data as $key => $val) { ?>
    <?php if ($val['Item_Code'] === $val['Item_Code'] && $val['Status'] == "Reserved") { ?>


      <div class="d-flex flex-wrap  bg-dark p-2 rounded-2 m-1" id="card">
        <div class="product-img cont image ">
          <img src="../<?php echo $val['Cover_Image'] ?>" id="image" class="image img-fluid d-block mx-auto" height="400px !important">
          <div class="overlay w-100">
            <div class="middle">
              <div class="text w-100">
                <p>
                  <?php echo $val['Author_Name'] ?>
                </p>
                <p>
                  <?php echo $val['State'] ?>
                </p>
                <p>
                  <?php echo $val['Edition_Date'] ?>
                </p>
                <p>
                  <?php echo $val['Category_Name'] ?>
                </p>
                <p>
                  <?php echo $val['Category_Type'] ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <?php foreach ($Reservations as $keye => $vale) { ?>
          <?php if ($vale['Item_Code'] == $val['Item_Code']) { ?>
            <div class="product-content text-center d-flex flex-column d-block m-auto mb-3">
              <span class=" m-1 text-uppercase">
                <?php echo $vale['Reservation_Date'] ?>
              </span>
              <span class=" m-1 text-success">
                <?php echo $vale['Reservation_Expiration_Date'] ?>
              </span>
              <span class=" m-1 text-uppercase">
                <?php echo $val['Title'] ?>
              </span>
              <span class=" m-1 text-success">
                <?php echo $val['Status'] ?>
              </span>
              <form action="" method="GET">
                <input type="submit" <?php if (!isset($val['Status']) || $val['Status'] !== "Reserved") {
                  echo "hidden";
                } ?> class="btn btn-outline-primary text-white" value="Active Reservation" name="Active_Reservation">
                <input type="hidden" name="Item_Code" value="<?php echo $val['Item_Code'] ?>">
                <input type="hidden" name="Nickname" value="<?php echo $vale['Nickname'] ?>">
                <input type="hidden" name="Reservation_Code" value="<?php echo $vale['Reservation_Code'] ?>">

                <?php break;
          }
        } ?>
          </form>

        </div>
      </div>
    <?php }
  } ?>
</section>
<?php require '../includes/modals.php'; ?>
<?php require '../includes/footer.php'; ?>
<script src="/js/Add-Item.js"></script>
</body>

</html>