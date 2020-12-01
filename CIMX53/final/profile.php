<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
    <?php include("include/navigation.php"); ?>
    <?php include("include/login_check.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>My Profile</h1>
  </div>


  <div class="container">
  <?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> <?php echo $_GET['error']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php endif; ?>

  <?php if(isset($_GET['message'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Yeaaaah!</strong> <?php echo $_GET['message']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php endif; ?>

  <div class="row">
  <div class="col-md-12"><hr></div>
  <div class="col-md-6">
  <?php
  if(isset($errorMsg)){
  echo $errorMsg;
}
  ?>

  <?php
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM users WHERE id = '$user_id'"; //LIMIT 1
  include('include/db.php');
  $result = mysqli_query($con,$sql);
  //mysqli_num_rows gives the number of items in the query
  $totalresults = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  ?>

  <form method="POST" action="profile_update.php">

  <div class="form-group">
    <label for="firstname">First Name</label>
    <input name="firstname" type="text" class="form-control" id="firstname" aria-describedby="firstnamehelp" value="<?php echo $row['first_name'];?>" required>
    <small id="firstnamehelp" class="form-text text-muted">Please enter ONLY your first name.</small>
  </div>

  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $row['last_name'];?>">
  </div>


      <div class="form-group">
        <label for="password">Password</label>
        <input value="<?php echo $row['password']; ?>" name="password" type="text" class="form-control" id="password">
      </div>

      <div class="form-group">
        <label for="password2">Confirm Password</label>
        <input value="<?php echo $row['password']; ?>" name="password2" type="text" class="form-control" id="password2">
      </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input name="address" type="text" class="form-control" id="address" value="<?php echo $row['address'];?>">
  </div>

  <div class="form-group">
    <label for="address_2">Address 2</label>
    <input value="<?php echo $row['address_2'];?>" name="address_2" type="text" class="form-control" id="address_2">
  </div>

  <div class="form-group">
    <label for="city">City</label>
    <input value="<?php echo $row['city'];?>" name="city" type="text" class="form-control" id="city">
  </div>

  <div class="form-group">
     <label for="state">State</label>
     <select class="form-control" name="state">
       <option value="value="<?php echo $row['state'];?>"" selected><?php echo $row['state'];?></option>
       <option value="FL">FL</option>
       <option value="GA">GA</option>
       <option value="CA">CA</option>
     </select>
   </div>

   <div class="form-group">
     <label for="zip">Zip</label>
     <input value="<?php echo $row['zip'];?>" name="zip" type="text" class="form-control" id="zip">
   </div>

   <div class="form-group">
     <label for="phone_number">Phone</label>
     <input value="<?php echo $row['phone_number'];?>" name="phone_number" type="phone" class="form-control" id="phone_number">
   </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
  </div>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
