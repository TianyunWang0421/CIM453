<?php
include('include/login_check.php');
$user_id = $_SESSION['user_id'];
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//Set default values up here
$hasErrors = false;
$errorMsg = "";
$password = "";
$password2 = "";


// Test if the user submited a first name
if ( isset($_POST['firstname']) && ($_POST['firstname'] != "") ) {
  $firstName = $_POST['firstname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>First name is required</p>";
}

if( isset($_POST['lastname']) && ($_POST['lastname'] != "") ) {
  $lastName = $_POST['lastname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Last name is required</p>";
}

if( isset($_POST['password']) && ($_POST['password'] != "") ) {
  $password = $_POST['password'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Password is required</p>";
}
if( isset($_POST['password2']) && ($_POST['password2'] != "") ) {
  $password2 = $_POST['password2'];
  //nested if statement
  if($password != $password2){
    $hasErrors = true;
    $errorMsg .= "<p>Password don't match</p>";
  }
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Confirm Password is required</p>";
}

if( isset($_POST['address']) && ($_POST['address'] != "") ) {
  $address = $_POST['address'];
  $address_2 = $_POST['address_2'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $phone = $_POST['phone_number'];

} else {
  $hasErrors = true;
  $errorMsg .= "<p>Address is required</p>";
}

// Final step
if($hasErrors) {
  //die("You have errors.");
  header('location: profile.php?error=there+was+an+error');
} else {

include('include/db.php');
  $sql = "UPDATE `users` SET `first_name` = '$firstName', `last_name` = '$lastName', `password` = '$password', `address` = '$address', `address_2` = '$address_2', `city` = '$city', `state` = '$state', `zip` = '$zip', `phone_number` = '$phone' WHERE `users`.`id` = '$user_id'";

//echo $sql;
// Perform the query
mysqli_query($con, $sql);

//echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);

//header("location: /");
header("location: profile.php?message=Profile+Updated");

}

?>
