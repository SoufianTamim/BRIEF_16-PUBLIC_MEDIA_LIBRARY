<?php

?>

<?php include '../includes/navbar-home.php'; ?>
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