<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Register</h1>

  </div>

  <div class="container">
  <div class="row">
  <div class="col-md-12"><hr></div>
  <div class="col-md-6">
  <?php
  if(isset($errorMsg)){
  echo $errorMsg;
}
  ?>

  <form method="POST" action="registration_handler.php">

  <div class="form-group">
    <label for="firstname">First Name</label>
      <?php if ( isset($_POST['firstname']) && ($_POST['firstname'] != "") ) {$firstName = $_POST['firstname'];} else {$firstName = "";}?>
    <input name="firstname" type="text" class="form-control" id="firstname" aria-describedby="firstnamehelp" value="<?php echo $firstName;?>" required>
    <small id="firstnamehelp" class="form-text text-muted">Please enter ONLY your first name.</small>
  </div>

  <div class="form-group">
    <label for="lastname">Last Name</label>
      <?php if( isset($_POST['lastname']) && ($_POST['lastname'] != "") ) {$lastName = $_POST['lastname'];} else {$lastName = "";}?>
    <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $lastName;?>">
  </div>

    <div class="form-group">
      <label for="email">Email</label>
      <?php
      if( isset($_POST['email']) && ($_POST['email'] != "") ) {
        $email = $_POST['email'];
      } else {
        $email = "";
      }
      ?>
      <input name="email" type="email" class="form-control" id="email" value="<?php echo $email; ?>" required>
    </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="text" class="form-control" id="password">
      </div>

      <div class="form-group">
        <label for="password2">Confirm Password</label>
        <input name="password2" type="text" class="form-control" id="password2">
      </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input name="address" type="text" class="form-control" id="address">
  </div>

  <div class="form-group">
    <label for="address_2">Address 2</label>
    <input name="address_2" type="text" class="form-control" id="address_2">
  </div>

  <div class="form-group">
    <label for="city">City</label>
    <input name="city" type="text" class="form-control" id="city">
  </div>

  <div class="form-group">
     <label for="state">State</label>
     <select class="form-control" name="state">
       <option value="FL">FL</option>
       <option value="GA">GA</option>
       <option value="CA">CA</option>
     </select>
   </div>

   <div class="form-group">
     <label for="zip">Zip</label>
     <input name="zip" type="text" class="form-control" id="zip">
   </div>

   <div class="form-group">
     <label for="phone_number">Phone</label>
     <input name="phone_number" type="phone" class="form-control" id="phone_number">
   </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form>
  </div>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
