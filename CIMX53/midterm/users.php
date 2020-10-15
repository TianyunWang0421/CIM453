<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Users</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Users</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Tasks In Progress</th>
      <th scope="col">Total Tasks Completed</th>
      <th scope="col">Total Time Completed</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $total_orders = 0;
    include('include/db.php');
    $sql = "SELECT * FROM `pizza_order`";
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      $total_orders = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['first_name']."</td>";
        echo "<td>".$row['last_name']."</td>";
        echo "<td>".$row['size']."</td>";
        echo "<td>".$row['toppings']."</td>";
        echo "<td>".$row['order_total']."</td>";
        echo '<td><a href="order_details.php?order_id='.$row['id'].'">View Order</a></td>';
        echo '<td><a href="delete_order.php?order_id='.$row['id'].'">Delete Order</a></td>';
        echo "</tr>";
      }
      // Free result set
      mysqli_free_result($result);
    } else {
      echo "No results";
    }

    mysqli_close($con);

    ?>
  </tbody>
</table>
<h3>Total Time: <?php echo $total_orders;?> </h3>
  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
