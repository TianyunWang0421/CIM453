<?php
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//Set default values up here
$hasErrors = false;
$errorMsg = "";
$goalname = "";

if( isset($_POST['goalrecord_id']) && ($_POST['goalrecord_id'] != "") ) {
  $goal_id = $_POST['goalrecord_id'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Goalrecord_id is required</p>";
}

if ( isset($_POST['goalname']) && ($_POST['goalname'] != "") ) {
  $goalname = $_POST['goalname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Goal Name is required</p>";
}

// Final step
if($hasErrors) {
  //die("You have errors.");
  header('location: mygoal.php?error=there+was+an+error');
} else {

include('include/db.php');
  $sql = "UPDATE `midtermgoals` SET `goalrecord_id` = '$goal_id', `goalname` = '$goalname' WHERE `midtermgoals`.`id` = '$goal_id'";

//echo $sql;
// Perform the query
mysqli_query($con, $sql);

//echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);

//header("location: /");
header("location: mygoal.php?message=Goal+Updated&goalrecord_id=".$goal_id);


}



?>
