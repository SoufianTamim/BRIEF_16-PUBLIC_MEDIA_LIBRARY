<?php include '../includes/navbar.php'; ?>

<section>
<?php require '../includes/filter.php';?>
<?php require '../includes/modals.php';?>
</section>
<!-- items reserved  -->
<section>
        <div class = "product-item m-2 bg-dark p-2 d-flex flex-row w-25 card">
          <div class = "product-img cont image w-50 ">
              <img src = "/images/product_img_8.jpg" class="image" >
              <div class="overlay">
                 <div class="middle">
                  <div class="text">
                    <p>Author</p>
                    <p>State</p>
                    <p>Category</p>
                    <p>Edition Date</p>
                    <p>Duration</p>
                  </div>
                </div>
              </div>
          </div>
          <div class = "product-content text-center d-flex flex-column ">
              <span class = "d-block text-uppercase  m-1 fw-bold">Title</span>
              <p>Nick Name : Name</p>
              <p>Full Name : Name</p>
              <p>Reserved : Hour</p>
              <button class="btn btn-outline-primary m-1  text-white" data-bs-toggle="modal" data-bs-target="#reservation">Confirm reservation </button>
          </div>
      </div>
</section>
<?php require '../includes/modals.php';?>
<?php require '../includes/footer.php';?>
<script src="/js/Add-Item.js"></script>
</body>
</html>