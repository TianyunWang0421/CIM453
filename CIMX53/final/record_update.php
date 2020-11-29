<?php
$record_id = $_SESSION['record_id'];
// Here we will handle the pizza order form
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//Set default values up here
$hasErrors = false;
$errorMsg = "";
$recordname = "";
$spenttime = "";


if ( isset($_POST['recordname']) && ($_POST['recordname'] != "") ) {
  $recordname = $_POST['recordname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Task / Goal Name is required</p>";
}

if( isset($_POST['spenttime']) && ($_POST['spenttime'] != "") ) {
  $spenttime = $_POST['spenttime'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Spent Time is required</p>";
}

// Final step
if($hasErrors) {
  //die("You have errors.");
  header('location: record.php');
} else {

include('include/db.php');
  $sql = "UPDATE `midtermrecord` SET `recordname` = '$recordname', `spenttime` = '$spenttime' WHERE `midtermrecord`.`id` = '$record_id'";

//echo $sql;
// Perform the query
mysqli_query($con, $sql);

//echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);

//header("location: /");
header("location: record.php?message=Record+Updated");


}



?>
