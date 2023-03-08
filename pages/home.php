<?php
// require __DIR__.'/../vendor/autoload.php';

// // include '../php/CRUD.php';
// include '../php/USER.php';

// $conn = new Database('localhost', 'Library', 'root', '');
// $user = new User($conn);

// $crud = new Crud($conn);

// $table_name = "Category";
// $where = "";
// $category = $crud->read($table_name);

// if (isset($_GET['find'])) {
//   $table_name = "item";
//   $Column_1 = $_GET['Title'];
//   $Column_2 = $_GET['Author_Name'];
//   $Column_3 = isset($_GET['Category']) ? $_GET['Category'] : null;
  
//   if ($Column_1 || $Column_2 || $Column_3) {
//     $Filters = $crud->filterItems($table_name, $Column_1, $Column_2, $Column_3);

//     // print_r($Filters);
//   }
// } else {

//   $table1_name = "Item";
//   $table2_name = "Category";
//   $table1_id = "Category_Code";
//   $table2_id = "Category_Code";

//   $All_Data = $crud->join($table1_name, $table2_name, $table1_id, $table2_id);
// }
// $isAuthenticated = $user->isAuthenticated();
// $userData = $isAuthenticated ? $user->getUser() : null;

// if (isset($_GET['logout'])) {
//   $user->logout();
//   header('Location: ../index.php');
//   exit;
// }

// if (!$isAuthenticated):
//   header('Location: ../index.php');
// else:

//   if ($user->isAdmin()) {
//     echo "<p>You are an admin!</p>";
//   } else {
//     echo "<p>You are not an admin.</p>";
//   }

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