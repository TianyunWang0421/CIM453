<?php
include('include/login_check.php');
$user_id = $_SESSION['user_id'];

//Set default values up here
$hasErrors = false;
$errorMsg = "";
$starttime = "";
$endtime = "";

if( isset($_POST['taskrecord_id']) && ($_POST['taskrecord_id'] != "") ) {
  $task_id = $_POST['taskrecord_id'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Taskrecord_id is required</p>";
}

if( isset($_POST['taskname']) && ($_POST['taskname'] != "") ) {
  $taskname = $_POST['taskname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Task Name is required</p>";
}

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
  header('location: mytask.php?error=there+was+an+error');
} else {

include('include/db.php');
  $sql = "UPDATE `midtermtiming` SET `taskrecord_id` = '$task_id', `taskname` = '$taskname', `starttime` = '$starttime', `endtime` = '$endtime' WHERE `midtermtiming`.`id` = '$task_id'";

//echo $sql;
// Perform the query
mysqli_query($con, $sql);

//echo("Error description: " . mysqli_error($con));
//die();

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);

//header("location: /");
header("location: mytask.php?message=Task+Updated&taskrecord_id=".$task_id);

}

?>
