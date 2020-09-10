<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Order</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Thank You <?php echo $firstName; ?> <?php echo $lastName; ?></h1>

  </div>

  <div class="container">
  <div class="row">
  <div class="col-md-12"><hr></div>
  <div class="col-md-6">
  <h2>Your order will be delivered to:<br> <?php echo $address; ?> </h2>
  <p>Your total is: $<?php echo $orderTotal; ?></p>
  </div>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
