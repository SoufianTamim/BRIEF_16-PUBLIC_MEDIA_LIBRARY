      <section>
        <!-- Modal -->
        <div class="modal fade" id="return" tabindex="-1" aria-labelledby="Add-itemLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="Add-itemLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


                <!-- Modal -->
        <div class="modal fade " id="reservation" tabindex="-1" aria-labelledby="Add-itemLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="Add-itemLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>


          
    <div class="modal fade modal-lg " id="Add-item" tabindex="-1" aria-labelledby="Add-itemLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" class="text-dark" >Add an Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="GET"  id="moda-Add-item">
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
                 <input class="form-control" type="file" id="formFileMultiple"name="Image" >
                 <div class="error text-danger"></div>
               </div>
               </div>
                 <div class="mb-2 d-flex flex-row justify-content-between flex-wrap  ">
                    <label class="mb-2 text-muted" >State :</label>
                    <div class="w-75 d-flex flex-column">
                    <select class="form-select" name="Category" id="select">
                            <option  disabled selected value=""><-- Choose a Category --> </option>
                            <?php foreach ($category as $key => $val) { ?>
                                <option value="<?php echo $val['Category_Name']; ?>"><?php echo $val['Category_Name']; ?></option>
                            <?php } ?>
                          </select>
										<div class="error text-danger"></div>
                    </div>
                  </div>
              <div class="align-items-center d-flex">
									<input type="submit" value="add" name="add" class="btn btn-primary ms-auto">
							</div>

            </div>
          </div>
          </form>
        </div>
      </div>
      </div>

