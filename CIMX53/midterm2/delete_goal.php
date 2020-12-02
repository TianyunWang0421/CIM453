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
    <h1>Delete Goal</h1>

    <?php
    if(isset($_GET['confirm'])){
    include('include/db.php');
    $sql = "DELETE FROM `midtermgoals` WHERE id = ".$_GET['goalrecord_id'];
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {

    } else {
      echo "No results";
    }
    mysqli_close($con);
    //Redirect the user to another page
    header("location: allgoals.php");
    }
    else {
      ?>
      <h2>Are you sure?</h2>
      <a href="allgoals.php">No</a>
      <a href="delete_goal.php?goalrecord_id=<?php echo $_GET['goalrecord_id']; ?>&confirm=1">Yes</a>
      <?
    }
    ?>
  </tbody>
</table>
  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
