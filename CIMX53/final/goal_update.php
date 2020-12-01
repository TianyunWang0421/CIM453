<?php
include('include/login_check.php');
$goal_id = $_SESSION['goal_id'];
// Here we will handle the pizza order form
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//Set default values up here
$hasErrors = false;
$errorMsg = "";
$goalname = "";


if ( isset($_POST['goalname']) && ($_POST['goalname'] != "") ) {
  $goalname = $_POST['goalname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Goal Name is required</p>";
}

// Final step
if($hasErrors) {
  //die("You have errors.");
  header('location: goal.php');
} else {

include('include/db.php');
  $sql = "UPDATE `midtermgoal` SET `goalname` = '$goalname' WHERE `midtermgoal`.`id` = '$goal_id'";

//echo $sql;
// Perform the query
mysqli_query($con, $sql);

//echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);

//header("location: /");
header("location: goal.php?message=Goal+Updated");


}



?>
