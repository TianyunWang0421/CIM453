<?php
// Here we will handle the pizza order form
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//set default values up here
$hasErrors = false;

$errorMsg = "";
$password = "";
$password2 = "";


//test if the user submited a first name
if ( isset($_POST['firstname']) && ($_POST['firstname'] != "") ) {
  $firstName = $_POST['firstname'];
} else{
  $hasErrors = true;
  $errorMsg .= "<p>First name is required</p>";
}

if ( isset($_POST['lastname']) && ($_POST['lastname'] != "") ) {
  $lastName = $_POST['lastname'];
} else{
  $hasErrors = true;
  $errorMsg .= "<p>Last name is required</p>";
}

if ( isset($_POST['email']) && ($_POST['email'] != "") ) {
  $email = $_POST['email'];
  include('include/db.php');
  $checkEmail = "SELECT * FROM users WHERE email = '$email'";
  // Perform the query
  $query = mysqli_query($con, $checkEmail);
  //var_dump($query);
  $totalresults = mysqli_num_rows($query);

  if($totalresults != 0){
    $hasErrors = true;
    $errorMsg .= "<p>Email is registered.</p>";
  }
} else{
  $hasErrors = true;
  $errorMsg .= "<p>Email is required</p>";
}

if ( isset($_POST['password']) && ($_POST['password'] != "") ) {
  $password = $_POST['password'];
} else{
  $hasErrors = true;
  $errorMsg .= "<p>Password is required</p>";
}

if ( isset($_POST['password2']) && ($_POST['password2'] != "") ) {
  $password2 = $_POST['password2'];
  //nested if statement
  if($password != $password2){
    $hasErrors = true;
    $errorMsg .= "<p>Password dont't match</p>";
  }
} else{
  $hasErrors = true;
  $errorMsg .= "<p>Confirm Password is required</p>";
}

if ( isset($_POST['address']) && ($_POST['address'] != "") ) {
  $address = $_POST['address'];
  $address_2 = $_POST['address_2'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $phone = $_POST['phone_number'];

} else{
  $hasErrors = true;
  $errorMsg .= "<p>Address is required</p>";
}

//final step
if ($hasErrors) {
  //die("You have errors.");
  include('register.php');
}else {
  include('include/db.php');
  $sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `address_2`, `city`, `state`, `zip`, `phone_number`, `order_total`)
  VALUES (NULL, '$firstName', '$lastName', '$email', '$password', '$address', '$address_2', '$city', '$state', '$zip', '$phone')";

// perform the query
mysqli_query($con, $sql);
//echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);;
// echo "No errors. User created. <br>";

//header("location: /");
header("location: index.php");
}

?>
