<form action="" method="GET">
      <div class="form row">
        <div class="col-lg-3">
          <div class="input-icon-wrap">
            <input type="text" class="form-control" name="Title" placeholder="Item Title ...">
          </div>
        </div>
        <div class="col-lg-3">
          <div class="input-icon-wrap">
            <input type="text" class="form-control" name="Author_Name" placeholder="Author Name ...">
          </div>
        </div>


<div class="col-lg-3">
     <div>
       <select class="form-select" name="Category">
         <option  disabled selected value=""><-- Choose a Category --> </option>
         <?php foreach ($category as $key => $val) { ?>
             <option value="<?php echo $val['Category_Name']; ?>"><?php echo $val['Category_Name']; ?></option>
         <?php } ?>
       </select>
     </div>
</div>

<div class="col-lg-3">
    <button class="btn btn-primary btn-block w-100" name="find">Find </button>
</div>
</form>