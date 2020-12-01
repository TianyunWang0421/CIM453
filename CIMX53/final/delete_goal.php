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
    $sql = "DELETE FROM `midtermgoals` WHERE id = ".$_GET['goal_id'];
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

      <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">Are you sure?</h4>
        <hr>
        <a href="allgoals.php" class="btn btn-success active" role="button" aria-pressed="true">No</a>
        <a href="delete_goal.php?goal_id=<?php echo $_GET['goal_id']; ?>&confirm=1" class="btn btn-danger active" role="button" aria-pressed="true">Yes</a>
      </div>
      <?
    }
    ?>

  </tbody>
</table>
  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
