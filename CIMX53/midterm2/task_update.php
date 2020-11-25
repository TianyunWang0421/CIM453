<?php
include('include/login_check.php');
$task_id = $_SESSION['task_id'];

//Set default values up here
$hasErrors = false;
$errorMsg = "";
$starttime = "";
$endtime = "";

if( isset($_POST['starttime']) && ($_POST['starttime'] != "") ) {
  $starttime = $_POST['starttime'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Start Time is required</p>";
}

if( isset($_POST['endtime']) && ($_POST['endtime'] != "") ) {
  $endtime = $_POST['endtime'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>End Time is required</p>";
}


if($hasErrors) {
  //die("You have errors.");
  header('location: task.php');
} else {

include('include/db.php');
  $sql = "UPDATE `midtermtiming` SET  `starttime` = '$starttime', `endtime` = '$endtime' WHERE `midtermtiming`.`id` = '$task_id'";

//echo $sql;
// Perform the query
mysqli_query($con, $sql);

//echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);

//header("location: /");
header("location: task.php?message=Task+Updated");

}

?>
