<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Order</title>

    <?php includes("include/head.php"); ?>

  </head>
  <body>
    <?php include("include/navigation.php"); ?>

    <div class="container">
      <!-- Content here -->
      <h1>Order</h1>

    </div>


    <div class="container">
    <div class="row">
    <div class="col-md-12"><hr></div>
    <div class="col-md-6">
  <form method="GET" action="order_handler.php">

  <div class="form-group">
    <label for="firstname">First Name</label>
    <input name="firstname" type="text" class="form-control" id="firstnamehelp" aria-describedby="firstnamehelp" required>
    <small id="firstnamehelp" class="form-text text-muted">Please enter ONLY your first name. </small>
  </div>

  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input name="lastname" type="text" class="form-control" id="lastname">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input name="address" type="text" class="form-control" id="address">
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="cheese" name="topping[]" value="cheese">
    <label class="form-check-label" for="cheese">Cheese</label>
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="mushrooms" name="topping[]" value="Mushrooms">
    <label class="form-check-label" for="mushrooms">Mushrooms</label>
  </div>

  <!-- HW: add checkbox for pepperoni, link the order page to menu -->

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="pepperoni" name="topping[]" value="Pepperoni">
    <label class="form-check-label" for="pepperoni">Pepperoni</label>
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

<?php includes("include/scripts.php"); ?>

  </body>
</html>
