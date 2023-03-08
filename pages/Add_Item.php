<?php

  include '../includes/navbar.php';


  if (isset($_GET['add'])) {
    $table_name = 'Item';
    $data = [
      "Title" => $_GET['Title'],
      "Author_Name" => $_GET['Author'],
      "Duration" => $_GET['Duration'],
      "Status" => $_GET['Status'],
      "State" => $_GET['State'],
      "Edition_Date" => $_GET['Edition_Date'],
      "Purchase_Date" => $_GET['Puchase_Date'],
      "Cover_Image" => $_GET['Cover_Image'],
      "Category_Code" => $_GET['Category_Code']
    ]; 


    // dump($_GET);
    // dump($data);


    // dd($crud->create($table_name, $data));


    if ($sudo = $crud->create($table_name, $data)) {

      header("Location: profile.php");
      exit; 
    } else {
      echo "Error adding item.";
    }
  }






// include '../includes/navbar.php';

// if (isset($_GET['add'])) {
//     $table_name = 'Item';
//     $data = [
//         "Title" => $_GET['Title'],
//         "Author_Name" => $_GET['Author'],
//         "Duration" => $_GET['Duration'],
//         "Status" => $_GET['Status'],
//         "State" => $_GET['State'],
//         "Edition_Date" => $_GET['Edition_Date'],
//         "Purchase_Date" => $_GET['Purchase_Date'],
//         // "Cover_Image" => $_GET['Cover_Image'],  // this field should be handled differently
//         "Category_Code" => $_GET['Category_Code']
//     ];

//     if (isset($_FILES['Cover_Image'])) {
//         $upload_dir = '/path/to/upload/directory/';  // change to the actual path
//         $tmp_name = $_FILES['Cover_Image']['tmp_name'];
//         $filename = $_FILES['Cover_Image']['name'];
//         $path = $upload_dir . $filename;
//         move_uploaded_file($tmp_name, $path);
//         $data['Cover_Image'] = $path;
//     }

//     if ($crud->create($table_name, $data)) {
//         $url = "http://{$_SERVER['HTTP_HOST']}/profile.php";
//         header("Location: $url");
//         exit;
//     } else {
//         echo "Error adding item.";
//     }
// }

?>

          <section class="container mx-auto mt-5">
            <form method="GET"   id="moda-Add-item">
          <div class="modal-body">
            <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted" >Title :</label>
								<div class="w-75">
									<input id="Title" type="Title" class="form-control" name="Title" placeholder="Enter your Title Number ..."  autofocus>
									<div class="error text-danger"></div>
								</div>
							</div>
							<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted">Author :</label>
								<div class="w-75">
									<input id="Author" type="text" class="form-control" name="Author" placeholder="Enter your Author ..." >
									<div class="error text-danger"></div>
								</div>
							</div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted">Duration :</label>
								<div class="w-75">
									<input id="Duration" type="text" class="form-control" name="Duration" placeholder="Enter your Duration ..." >
									<div class="error text-danger"></div>
								</div>
							</div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted">Status :</label>
								<div class="w-75">
									<input id="Status" type="text" class="form-control" name="Status" placeholder="Enter your Status ..." >
									<div class="error text-danger"></div>
								</div>
							</div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
								<label class="mb-2 text-muted">State :</label>
								<div class="w-75">
									<input id="State" type="text" class="form-control" name="State" placeholder="Enter your State ..." >
									<div class="error text-danger"></div>
								</div>
							</div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
                <label class="mb-2 text-muted">Edition Date :</label>
                <div class="w-75">
                  <input id="Edition_Date" type="date" class="form-control" name="Edition_Date" placeholder="Enter your Edition Date ..." >
                  <div class="error text-danger"></div>
                </div>
              </div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
                <label class="mb-2 text-muted">Purchase Date :</label>
                <div class="w-75">
                  <input id="Puchase_Date" type="date" class="form-control" name="Puchase_Date" placeholder="Enter your Puchase Date ..." >
                  <div class="error text-danger"></div>
                </div>
              </div>
              <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
               <label class="mb-2 text-muted" >Image :</label>
               <div class="w-75">
                 <input class="form-control" type="file" id="formFileMultiple" name="Cover_Image" >
                 <div class="error text-danger"></div>
               </div>
               </div>
                 <div class="mb-2 d-flex flex-row justify-content-between flex-wrap  ">
                    <label class="mb-2 text-muted" >Category :</label>
                    <div class="w-75 d-flex flex-column">
                    <select class="form-select" name="Category_Code" id="select">
                            <option  disabled selected value=""><-- Choose a Category Code --> </option>
                            <?php foreach ($category as $key => $val) { ?>
                                <option value="<?php echo $val['Category_Code']; ?>"><?php echo $val['Category_Code']; ?></option>
                            <?php } ?>
                          </select>
										<div class="error text-danger"></div>
                    </div>
                  </div>
              <div class="align-items-center d-flex"> 
                <input type="submit" value="ADD ITEM" name="add" class="btn btn-primary ms-auto"> 
            </div>

            </div>
          </div>
          </form>
          </section>
</body>
</html>