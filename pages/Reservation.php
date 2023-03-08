<?php 

include '../includes/navbar.php';
$table_name = "Reservation";

  $Reservations = $crud->read($table_name);
  // print_r($Reservations);




?>

<section>
<?php require '../includes/filter.php';?>

</section>
<!-- items reserved  -->
<section class = "d-flex flex-wrap container">
  <?php foreach ($Reservations as $keye => $vale) { ?>
  <?php foreach ($All_Data as $key => $val) { ?>
      <?php if ($vale['Item_Code'] === $val['Item_Code']) { ?>
                    
                           
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
                <p><?php echo $val['Item_Code'] ?></p>
                <p><?php echo $vale['Item_Code'] ?></p>
                  <span class = " m-1 text-uppercase"><?php echo $val['Title'] ?></span>
                  <span class = " m-1 text-success"><?php echo $val['Status'] ?></span>
                  <button type="button" <?php if(!isset($val['Status']) || $val['Status'] !== "Reserved") { echo "hidden"; } ?> class="btn btn-outline-primary text-white">Active Reservation</button>

              </div>
            </div>
       <?php }  } }?>
</section>
<?php require '../includes/modals.php';?>
<?php require '../includes/footer.php';?>
<script src="/js/Add-Item.js"></script>
</body>
</html>