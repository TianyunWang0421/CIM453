<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Order</title>

    <?php include("include/head.php"); ?>

  </head>
  <body>
  <?php include("include/navigation.php"); ?>
  <?php include("include/login_check.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Order</h1>

  </div>

  <div class="container">
  <div class="row">
  <div class="col-md-12"><hr></div>
  <div class="col-md-6">
    <?php
    if(isset($errorMsg)){
    echo $errorMsg; }
    ?>

<?php
  //Remember that user_id is in thession $_SESSION['user_id'];
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM users WHERE id = '$user_id'";
  include('include/db.php');
  $result = mysqli_query($con,$sql);

  $row = mysqli_fetch_assoc($result);
?>

  <form method="POST" action="order_handler.php">

  <div class="form-group">
    <label for="firstname">First Name</label>
    <input value="<?php echo $row['first_name'];?>" name="firstname" type="text" class="form-control" id="firstname" aria-describedby="firstnamehelp" required>
    <small id="firstnamehelp" class="form-text text-muted">Please enter ONLY your first name.</small>
  </div>

  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input value="<?php echo $row['last_name'];?>" name="lastname" type="text" class="form-control" id="lastname">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input value="<?php echo $row['address'];?>" name="address" type="text" class="form-control" id="address">
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
       <option value="<?php echo $row['state'];?>" selected>
         <?php echo $row['state'];?>
       </option>
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

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="cheese" name="topping[]" value="Cheese">
    <label class="form-check-label" for="cheese">Cheese </label>
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="mushrooms" name="topping[]" value="Mushrooms">
    <label class="form-check-label" for="mushrooms">Mushrooms </label>
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="pepperoni" name="topping[]" value="Pepperoni">
    <label class="form-check-label" for="pepperoni">Pepperoni </label>
  </div>

  <div class="form-group">
    <label for="size">Size</label>
    <select class="form-control" name="size">
      <option value="small">Small</option>
      <option value="medium">Medium</option>
      <option value="large">Large</option>
    </select>
  </div>

  <div class="form-group">
    <label for="comments">Comments</label>
    <textarea name="comments" class="form-control" id="comments" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>

  </div>
</div>

  <?php include("include/scripts.php"); ?>

  </body>
</html>
