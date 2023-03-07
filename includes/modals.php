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
          <form action="" id="moda-Add-item">
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
								<label class="mb-2 text-muted" >Image :</label>
								<div class="w-75">
									<input id="Image" type="file" class="form-control" name="Image" placeholder="Enter your Image Number ..."  autofocus>
									<div class="error text-danger"></div>
								</div>
								</div>
								<div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted">Edition Date :</label>
									<div class="w-75">
										<input id="Edition_Date" type="text" class="form-control" name="Edition_Date" placeholder="Enter your Edition Date ..." >
										<div class="error text-danger"></div>
									</div>
								</div>
                <div class="mb-2 d-flex flex-row justify-content-between flex-wrap">
									<label class="mb-2 text-muted">Purchase Date :</label>
									<div class="w-75">
										<input id="Puchase_Date" type="text" class="form-control" name="Puchase_Date" placeholder="Enter your Puchase Date ..." >
										<div class="error text-danger"></div>
									</div>
								</div>
                 <div class="mb-2 d-flex flex-row justify-content-between flex-wrap  ">
                    <label class="mb-2 text-muted" >State :</label>
                    <div class="w-75 d-flex flex-column">
                      <select  class="form-select w-100" id="select" required>
                      <option disabled selected value="">choose a Category</option>
                      <option value="">1</option>
                      <option value="">1</option>
                    </select>
										<div class="error text-danger"></div>
                    </div>
                  </div>
              <div class="align-items-center d-flex">
									<button type="submit"  class="btn btn-primary ms-auto">
										Add Item	
									</button>
							</div>

            </div>
          </div>
          </form>
        </div>
      </div>
