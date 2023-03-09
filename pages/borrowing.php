<?php include '../includes/navbar.php';


$table_name = "Borrowings";
$Borrowings = $crud->read($table_name);



?>

<section>
  <?php require '../includes/filter.php'; ?>
</section>
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
                  <button type="button" <?php if(!isset($val['Status']) || $val['Status'] !== "Borrowed") { echo "hidden"; } ?> class="btn btn-outline-primary text-white">Confirm Return</button>
              </div>
            </div>
       <?php }  }  }?>
</section>
<?php require '../includes/modals.php'; ?>
<?php require '../includes/footer.php'; ?>
<script src="/js/Add-Item.js"></script>
</body>
</html>