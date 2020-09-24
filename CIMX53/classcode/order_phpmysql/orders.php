<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Events</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Orders</h1>
    <?php
    include('include/db.php');
    $sql = "SELECT * FROM `pizza_order`";
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      echo "Total Orders: " . mysqli_num_rows($result) . '<br>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo $row['first_name'] . ' ' . $row['last_name'] . '<br>';
      }

      // Free result set
      mysqli_free_result($result);
    } else {
      echo "No results";
    }

    mysqli_close($con);

    ?>
  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
