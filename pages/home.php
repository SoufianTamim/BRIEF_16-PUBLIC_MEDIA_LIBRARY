<?php
include '../includes/navbar-home.php';


if (isset($_GET['Reserve'])) {
  $table_name = 'reservation';
  $data = [
      "Item_Code" => $_GET['Item_Code'],
      "Nickname" => $_GET['Nickname'],
  ];

  if ($crud->create($table_name, $data)) {
        $Nickname = $_GET['Item_Code'];
        $id_Name = 'Item_Code';
        $table_name='item';
        $data = [
          "Item_Code" => $_GET['Item_Code'],
          "Status" => 'Reserved',
      ];
      // dd($data);

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