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
if (isset($_GET["Item_Code"])) {


  $Item_Code = $_GET["Item_Code"];
  $query = "SELECT * FROM item WHERE Item_Code = $Item_Code" ;
  $Update =$crud->readQuery($query);

  if (isset($_GET['Update_Item'])){
    $table_name="item";
    $Nickname = $_GET['Item_Code'];
    $id_Name = "Item_Code";
    $data = [
      "Title" => $_GET['Title'],
      "Author_Name" => $_GET['Author_Name'],
      "Duration" => $_GET['Duration'],
      "Edition_Date" => $_GET['Edition_Date'],
      "Purchase_Date" => $_GET['Purchase_Date'],
      "Cover_Image" => $_GET['Cover_Image'],
      "State" => $_GET['State'],
      "Status" => $_GET['Status'],
      "Category_Code" => $_GET['Category_Code'],
    ];
  
    // dd($crud->update($table_name, $Nickname, $id_Name, $data));
    if($crud->update($table_name, $Nickname, $id_Name, $data)){

      // header("location : home.php");
      header("Location: home.php");

    }
     
  }








}
?>
<section class="container mx-auto mt-5">
  <form method="GET">
       <?php
       if (isset($_GET["Item_Code"])){

       foreach($Update as $key => $array): ?>
    <input type="hidden" name="Item_Code" value="<?php if (isset($_GET["Item_Code"])) echo $_GET["Item_Code"]?>">
    <div class="modal-body">
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Title :</label>
        <div class="w-75">
          <input id="Title" type="Title" class="form-control" name="Title" placeholder="Enter Item Title ..." value="<?php if (isset($_GET["Item_Code"])) {  echo $array["Title"]; } ?>" autofocus>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Author :</label>
        <div class="w-75">
          <input id="Author" type="text" class="form-control" name="Author_Name" value="<?php if (isset($_GET["Item_Code"])) {
            echo $array["Author_Name"];
          } ?>" placeholder="Enter Author Name ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Duration :</label>
        <div class="w-75">
          <input id="Duration" type="number" class="form-control" name="Duration" value="<?php if (isset($_GET["Item_Code"])) {
            echo $array["Duration"];
          } ?>" placeholder="Enter Duration ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Edition Date :</label>
        <div class="w-75">
          <input id="Edition_Date" type="date" class="form-control" name="Edition_Date" value="<?php if (isset($_GET["Item_Code"])) {
            echo $array["Edition_Date"];
          } ?>" placeholder="Enter your Edition Date ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Purchase Date :</label>
        <div class="w-75">
          <input id="Puchase_Date" type="date" class="form-control" name="Purchase_Date" value="<?php if (isset($_GET["Item_Code"])) {
            echo $array["Purchase_Date"];
          } ?>" placeholder="Enter your Puchase Date ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Image :</label>
        <div class="w-75">
          <input class="form-control" type="file"  value="<?php if (isset($_GET["Item_Code"])) {echo $array["Cover_Image"];} ?>" name="Cover_Image">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Status :</label>
        <div class="w-75">
          <select name="Status" class="form-select" id="Status">
            <option value="Available" <?php if (isset($_GET["Item_Code"]) && $array["Status"] == "Available") { echo "selected"; } ?>>Available</option>
            <option value="Borrowed" <?php if (isset($_GET["Item_Code"]) && $array["Status"] == "Borrowed") { echo "selected"; } ?>>Borrowed</option>
            <option value="Reserved" <?php if (isset($_GET["Item_Code"]) && $array["Status"] == "Reserved") { echo "selected"; } ?>>Reserved</option>
            <option value="Unavailable" <?php if (isset($_GET["Item_Code"]) && $array["Status"] == "Unavailable") { echo "selected"; } ?>>Unavailable</option>
          </select>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">State :</label>
        <div class="w-75">
          <select name="State" class="form-select" id="State">
              <option value="" disabled> <-- Choose a state --> </option>
              <option value="New" <?php if (isset($_GET["Item_Code"]) && $array["State"] === "New") { echo "selected"; } ?>>New</option>
              <option value="Used" <?php if (isset($_GET["Item_Code"]) && $array["State"] === "Used") { echo "selected"; } ?>>Used</option>
              <option value="Broken" <?php if (isset($_GET["Item_Code"]) && $array["State"] === "Broken") { echo "selected"; } ?>>Broken</option>
              <option value="Used - like new" <?php if (isset($_GET["Item_Code"]) && $array["State"] === "Used - like new") { echo "selected"; } ?>>Used - like new</option>
              <option value="Used - like old" <?php if (isset($_GET["Item_Code"]) && $array["State"] === "Used - like old") { echo "selected"; } ?>>Used - like old</option>
          </select>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap  ">
        <label class="mb-2 text-muted">Category :</label>
        <div class="w-75 d-flex flex-column">
          <select class="form-select" name="Category_Code" id="select">
            <option disabled selected><-- Choose a Category Code --></option>
            <?php foreach ($category as $key => $val) { ?>
              <option value="<?php echo $val['Category_Code']; ?>" <?php if (isset($_GET["Item_Code"]) && $array["Category_Code"] == $val['Category_Code']) { echo "selected"; } ?>><?php echo $val['Category_Name']; ?></option>
            <?php } ?>
          </select>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="align-items-center d-flex">
        <input type="submit" value="<?php if (isset($_GET["action"])) {
          echo $_GET["action"];
        } ?>" name="Update_Item" class="btn btn-primary ms-auto">
      </div>
    </div>
    </div>
    <?php endforeach;}else{

     ?>
    <div class="modal-body">
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Title :</label>
        <div class="w-75">
          <input id="Title" type="Title" class="form-control" name="Title" placeholder="Enter Item Title ..."  autofocus>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Author :</label>
        <div class="w-75">
          <input id="Author" type="text" class="form-control" name="Author"  placeholder="Enter Author Name ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Duration :</label>
        <div class="w-75">
          <input id="Duration" type="number" class="form-control" name="Duration"  placeholder="Enter Duration ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Edition Date :</label>
        <div class="w-75">
          <input id="Edition_Date" type="date" class="form-control" name="Edition_Date"  placeholder="Enter your Edition Date ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Purchase Date :</label>
        <div class="w-75">
          <input id="Puchase_Date" type="date" class="form-control" name="Purchase_Date"   placeholder="Enter your Puchase Date ...">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Image :</label>
        <div class="w-75">
          <input class="form-control" type="file" id="formFileMultiple" name="Cover_Image">
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">Status :</label>
        <div class="w-75">
          <select name="Status" class="form-select" id="Status">
            <option value="Available" >Available</option>
            <option value="Borrowed" >Borrowed</option>
            <option value="Reserved" >Reserved</option>
            <option value="Unavailable" >Unavailable</option>
          </select>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
        <label class="mb-2 text-muted">State :</label>
        <div class="w-75">
          <select name="State" class="form-select" id="State">
              <option value="" disabled> <-- Choose a state --> </option>
              <option value="New" >New</option>
              <option value="Used" >Used</option>
              <option value="Broken" >Broken</option>
              <option value="Used - like new" >Used - like new</option>
              <option value="Used - like old" >Used - like old</option>
          </select>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="mb-2 d-flex flex-row justify-content-between flex-wrap  ">
        <label class="mb-2 text-muted">Category :</label>
        <div class="w-75 d-flex flex-column">
          <select class="form-select" name="Category_Code" id="select">
            <option disabled selected><-- Choose a Category Code --></option>
            <?php foreach ($category as $key => $val) { ?>
              <option value="<?php echo $val['Category_Code']; ?>" <?php if (isset($_GET["Item_Code"]) && $array["Category_Code"] == $val['Category_Code']) { echo "selected"; } ?>><?php echo $val['Category_Name']; ?></option>
            <?php } ?>
          </select>
          <div class="error text-danger"></div>
        </div>
      </div>
      <div class="align-items-center d-flex">
        <input type="submit" value="ADD ITEM" name="ADD_ITEM" class="btn btn-primary ms-auto">
      </div>
    </div>
    </div>

    <?php } ?>
  </form>
</section>
</body>

</html>