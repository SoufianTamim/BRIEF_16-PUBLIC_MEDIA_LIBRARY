 <div class = "d-flex flex-row flex-wrap justify-content-center mt-5">
          <?php 
         if (!isset($_GET['find'])) {
              foreach($All_Data as $key => $val) {  
                  ?>
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
                  <span class = " m-1 text-uppercase"><?php echo $val['Title'] ?></span>
                  <span class = " m-1 text-success"><?php echo $val['Status'] ?></span>
                     <?php   if ($user->isAdmin()) {  ?>
                      <div class = "product-content text-center d-flex justify-content-center d-block ">
                        <form method="GET" >
                        <!-- <input type="submit"  class="btn btn-primary text-white w-100 m-1" name="delete" value="Edit"> -->
                        <a href="Add_Item.php?Item_Code=<?php echo $val['Item_Code'] . '&action=update'; ?>" class="btn btn-primary text-white w-100 m-1">Edit</a>
                        <input type="submit" <?php if(!isset($val['Status']) || $val['Status'] !== "Available" && $val['Status'] !== "Unavailable") { echo "hidden"; } ?> class="btn btn-danger text-white w-100 m-1" name="delete"  value="delete">
                        <input type="hidden" name="Item_Code" value="<?php echo $val['Item_Code'] ?>">   
                        </form>
                      </div>
                    <?php } else {  ?>
                      <form action="">
                        <input type="submit" name="Reserve" <?php if(!isset($val['Status']) || $val['Status'] !== "Available") { echo "hidden"; } ?> class="btn btn-outline-primary text-white" Value="Reserve">
                        <input type="hidden" name="Item_Code" value="<?php echo $val['Item_Code'] ?>" >
                        <input type="hidden" name="Nickname" value="<?php echo $_SESSION['user_id'] ?>">
                      </form>
                    <?php }  ?></div>
            </div>
           <?php } } else if (isset($_GET['find'])) {
                      foreach($Filters as $key => $val) { ?>
            <div class="d-flex flex-wrap  bg-dark p-2 rounded-2 m-1" id="card">
              <div class = "product-img cont image " >
                  <img src = "../Item_Images/<?php echo $val['Cover_Image'] ?>" id="image" class = "image img-fluid d-block mx-auto" height="400px !important">
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
                  <span class = " m-1 text-uppercase"><?php echo $val['Title'] ?></span>
                  <span class = " m-1 text-success"><?php echo $val['Status'] ?></span>
                  <?php   if ($user->isAdmin()) {  ?>
                        <a href="Add_Item.php?Item_Code=<?php echo $val['Item_Code'] . '&action=update'; ?>" class="btn btn-primary text-white">Edit</a>
                        <button type="button" class="btn btn-danger text-white">Delete</button>                    
                    <?php } else {  ?>
                <button type="button" <?php if(!isset($val['Status']) || $val['Status'] !== "Available") { echo "hidden"; } ?> class="btn btn-outline-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">reserve</button>
                <?php } ?>
              </div>
            </div>
           <?php  } } ?>
        </div>