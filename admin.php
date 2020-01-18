<?php
require_once("../admin/component.php");
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    </head>
    <body>
<div class="container text-center">
    <h1 class="py-4 bg-dark text-light rounded"><i class="far fa-address-book mr-3"></i>Add Details</h1>
    <div class="d-flex justify-content-center">
        <form action="action.php" method="post" class="w-50">
          <div class="pt-3">
		  <?php inputelement("text","<i class='fas fa-users'></i>","NAME","name","","");?>
          </div>
          <div class="pt-3">
		  <?php inputelement("text","<i class='fas fa-envelope-square'></i>","gmail","gmail","","");?>
		  </div>
		  <div class="pt-3">
		  <?php inputelement("password","<i class='fas fa-key'></i>","Password","password","","");?>
		  </div>
		  <div class="pt-3">
		  <div class="input-group mb-2">
                <div class="input-group-prepend">
                     <div class="input-group-text"><i class='fas fa-phone-square'></i></div>
                </div>
                <input type="text" name="phone" pattern="[7-9]{1}[0-9]{9}" value=""  autocomplete="off" class="form-control " id="inlineFormInputGroup" placeholder="Phone number" required>
             </div>
		  
		  </div>
		  <div class="form-group m-0 pt-3 required">
           <label style="font-size:20px;">Gender:</label>
			<label class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="gender" value="M" required>Male</input>
		  </label>
		  <label class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="gender" value="F"  required>Female</input>
          </label>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="O"  required>other</input>
            </label>
            <div class="col-auto px-0 pt-2 ">
             <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
             <select  required name="user" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
			  <option value="" >select user type</option>
              <option value="admin"  required>admin</option>
              <option  value="guard"  required>guard</option>
             </select>
            </div>
			<div class=" form-group pt-3 required">
			<input type="file" name="image" value="fileupload" required >
			 <label for="fileupload" > Select a file to upload</label>
			 </div>
			<button type="submit" name="create" class="btn btn-dark mt-4">Sign up</button>
        </form>   
    </div>
</div>
    </body>
</html>