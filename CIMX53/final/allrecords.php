<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Completion Records</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/login_check.php"); ?>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Completion Records</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Task / Goal Name</th>
      <th scope="col">Level of Concentration</th>
      <th scope="col">Repeate or Not</th>
      <th scope="col">Notes for Myself</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $total_records = 0;
    include('include/db.php');
    ///$sql = "SELECT * FROM `midtermrecord`";
    $sql = "SELECT midtermrecord.id AS 'recordrecord_id',midtermrecord.recordname AS 'recordname',midtermrecord.score AS 'score',midtermrecord.repeatit AS 'repeatit',midtermrecord.notes AS 'notes' FROM `midtermrecord`";
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      $total_records = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['recordrecord_id']."</td>";
        echo "<td>".$row['recordname']."</td>";
        echo "<td>".$row['score']."</td>";
        echo "<td>".$row['repeatit']."</td>";
        echo "<td>".$row['notes']."</td>";
        echo '<td><a href="record_details.php?recordrecord_id='.$row['recordrecord_id'].'">View Record</a></td>';
        echo '<td><a href="myrecord.php?recordrecord_id='.$row['recordrecord_id'].'">Update Record</a></td>';
        echo '<td><a href="delete_record.php?recordrecord_id='.$row['recordrecord_id'].'">Delete Record</a></td>';
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

<br><br><br><br>

<table class="table table-dark" width=auto>
  <thead>
    <tr>
      <th scope="col">Dashboard</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Total Record</th>
    </tr>
    <tr>
      <th scope="row"><?php echo $total_records;?></th>
    </tr>
  </tbody>
</table>

  </div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
