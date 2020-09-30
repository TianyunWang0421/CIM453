<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete</title>

    <?php include("include/head.php"); ?>

  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Delete Order</h1>

  <tbody>

    <?php
    if(isset($_GET['confirm'])){
      include('include/db.php');
      $sql = "DELETE FROM 'pizza_order' WHERE id = ".$_GET['order_id'];
      //$result = mysql_query($con, $sql);

      // Perform query
      if ($result = mysqli_query($con, $sql)) {

      }else{
        echo "No results";
      }
      mysqli_close($con);

      //redirect the user to another page
      header("location: orders.php");
      }
    else{
      ?>
      <h2>Are you sure? </h2>
      <a href="orders.php">NO</a>
      <a href="delete_order.php?order_id=<?php echo $_GET['order_id']; ?> &confirm=1">YES</a>
      <?
    }


    ?>

  </tbody>
</table>

  </div>


    <?php include("include/scripts.php"); ?>

  </body>
</html>
