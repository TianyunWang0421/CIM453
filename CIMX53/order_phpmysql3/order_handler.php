<?php
date_default_timezone_set('America/New_York');
include('include/login_check.php');
$user_id = $_SESSION['user_id'];
// Here we will handle the pizza order form
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//Set default values up here
$hasErrors = false;
$priceList = array();
$priceList["small"] = 10;
$priceList["medium"] = 15;
$priceList["large"] = 20;

$errorMsg = "";

$toppingPrice = 1.50;

$totalToppings = 0;

$orderTotal = 0;

$priceList = array(
  'small' => 10,
  'medium' => 15,
  'large' => 20
);

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
//echo "Initial ".$orderTotal."<br>";

if( isset($_POST['size']) && ($_POST['size'] != "") ) {
  $size = $_POST['size'];
  $orderTotal += $priceList[$size];
} else {
  $hasErrors = true;
}

// echo "After size ".$orderTotal."<br>";
$toppings = "";
if( isset($_POST['topping']) ){
  //$toppingPrice
  // Counting items in array count($array)
  $totalToppings = $toppingPrice * count($_POST['topping']);
  foreach($_POST['topping'] as $topping){
    $toppings .= $topping . ", ";
  }
}
$orderTotal += $totalToppings;
// echo "This is after toppings ".$orderTotal."<br>";

// Final step
if($hasErrors) {
  //die("You have errors.");
  include('order.php');
} else {


  $today = date("Y-m-d H:i:s");   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
  //echo $today;
$comments = $_POST['comments'];
  include('include/db.php');
  $sql = "INSERT INTO `pizza_order` (`id`,`user_id`, `size`, `toppings`, `comments`, `order_total`,`created_date`) VALUES (NULL,'$user_id', '$size', '$toppings', '$comments', '$orderTotal','$today')";
// Perform the query
mysqli_query($con, $sql);
echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);

  //echo "No errors<br>";

  include('thankyou.php');
}



?>
