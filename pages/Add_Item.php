<?php
include '../includes/navbar.php';

if (isset($_GET['ADD_ITEM'])) {
  
  $table_name = 'Item';
  $data = [
    "Title" => $_GET['Title'],
    "Author_Name" => $_GET['Author'],
    "Duration" => $_GET['Duration'],
    "Status" => $_GET['Status'],
    "State" => $_GET['State'],
    "Edition_Date" => $_GET['Edition_Date'],
    "Purchase_Date" => $_GET['Purchase_Date'],
    "Cover_Image" => "/Item_Images/" . $_GET['Cover_Image'],
    "Category_Code" => $_GET['Category_Code']
  ];


  if ($crud->create($table_name, $data)) {

    header("Location: profile.php");
    exit;
  } else {
    echo "Error adding item.";
  }
}


if (isset($_GET["id"])) {
  $ID = $_GET["id"];
  $table_Name = "item";
  $where = "`Item_Code` = '$ID'";


  $array = $crud->Read($table_Name , $where);
  print_r($array);
}


?>
<section class="container mx-auto mt-5">
  <form method="GET" enctype="multipart/form-data" id="moda-Add-item">
    <div class="modal-body">
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Title :</label>
        <div class="w-75">
          <input id="Title" type="Title" class="form-control" name="Title" placeholder="Enter Item Title ..." value="<?php if (isset($_GET["id"])) {  echo $array["Title"]; } ?>" autofocus>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Author :</label>
        <div class="w-75">
          <input id="Author" type="text" class="form-control" name="Author"  value="<?php if (isset($_GET["id"])) { echo $array["Author_Name"]; } ?>" placeholder="Enter Author Name ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Duration :</label>
        <div class="w-75">
          <input id="Duration" type="number" class="form-control" name="Duration"  value="<?php if (isset($_GET["id"])) {  echo $array["Duration"]; } ?>" placeholder="Enter Duration ...">
          <div class="error text-danger"></div>
        </div>
      </div>

      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Edition Date :</label>
        <div class="w-75">
          <input id="Edition_Date" type="date" class="form-control" name="Edition_Date"  value="<?php if (isset($_GET["id"])) { echo $array["Edition_Date"];  } ?>" placeholder="Enter your Edition Date ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Purchase Date :</label>
        <div class="w-75">
          <input id="Puchase_Date" type="date" class="form-control" name="Purchase_Date"  value="<?php if (isset($_GET["id"])) {  echo $array["Purchase_Date"]; } ?>" placeholder="Enter your Puchase Date ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Image :</label>
        <div class="w-75">
          <input class="form-control" type="file" id="formFileMultiple"  value="<?php if (isset($_GET["id"])) {  echo $array["Cover_Image"];  } ?>" name="Cover_Image">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Status :</label>
        <div class="w-75">
          <select name="Status" class="form-select" id="Status"  value="<?php if (isset($_GET["id"])) {  echo $array["Status"]; } ?>">
            <option value="Available" selected>Available</option>
            <option value="Borrowed">Borrowed</option>
            <option value="Reserved">Reserved</option>
            <option value="Unavailable">Unavailable</option>
          </select>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">State :</label>
        <div class="w-75">
          <select name="State" class="form-select" id="State"  value="<?php if (isset($_GET["id"])) {  echo $array["State"]; } ?>">
            <option value="" selected disabled> <-- Choose a state --> </option>
            <option value="New">New</option>
            <option value="Used">Used</option>
            <option value="Broken">Broken</option>
            <option value="Used - like new">Used - like new</option>
            <option value="Used - like old">Used - like old</option>
          </select>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap  ">
        <label class="mb-2 text-muted">Category :</label>
        <div class="w-75 d-flex flex-column">
          <select class="form-select" name="Category_Code" id="select" value="<?php if (isset($_GET["id"])) {  echo $array["Category_Name"]; } ?>">
            <option disabled selected value=""><-- Choose a Category Code --> </option>
            <?php foreach ($category as $key => $val) { ?>
              <option value="<?php echo $val['Category_Code']; ?>"><?php echo $val['Category_Name']; ?></option>
            <?php } ?>
          </select>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="align-items-center d-flex">
        <input type="submit" value="<?php if (isset($_GET["action"])) {  echo $_GET["action"];  } ?>" name="ADD_ITEM" class="btn btn-primary ms-auto">
      </div>

    </div>
    </div>
  </form>
</section>
</body>

</html>