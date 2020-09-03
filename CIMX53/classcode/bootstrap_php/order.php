<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
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
  <form method="POST" action="order_handler.php">

  <div class="form-group">
    <label for="firstname">First Name</label>
    <input name="firstname" type="text" class="form-control" id="firstname" aria-describedby="firstnamehelp" required>
    <small id="firstnamehelp" class="form-text text-muted">Please enter ONLY your first name.</small>
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
    <label for="comments">Comments</label>
    <textarea name="comments" class="form-control" id="comments" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>

  </div>
</div>




  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  </body>
</html>
