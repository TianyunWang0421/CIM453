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
    <h1>Delete Task</h1>

    <?php
    if(isset($_GET['confirm'])){
    include('include/db.php');
    $sql = "DELETE FROM `midtermtiming` WHERE id = ".$_GET['taskrecord_id'];
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {

    } else {
      echo "No results";
    }
    mysqli_close($con);
    //Redirect the user to another page
    header("location: alltasks.php");
    }
    else {
      ?>
      <h2>Are you sure?</h2>
      <a href="alltasks.php">No</a>
      <a href="delete_task.php?taskrecord_id=<?php echo $_GET['taskrecord_id']; ?>&confirm=1">Yes</a>
      <?
    }
    ?>
  </tbody>
</table>
  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
