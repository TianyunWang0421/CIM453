<?php
// Here we will handle the pizza order form
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//set default values up here
$hasErrors = false;
$priceList = array();

$priceList ["small"] = 10;
$priceList ["medium"] = 15;
$priceList ["large"] = 20;

$errorMsg = "";

$toppingPrice = 1.50;

$totalToppings = 0;

$orderTotal = 0;

$priceList = array (
  'small' => 10,
  'medium' => 15,
  'large' => 20
);

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

//echo "Initial".$orderTotal."<br>";

// $hasErrors //true 1
// ($hasErrors == true) //true 1

//die();

if ( isset($_POST['size']) && ($_POST['size'] != "") ) {
  $size = $_POST['size'];
  $orderTotal += $priceList[$size];
} else{
  $hasErrors = true;
}

//echo "After size".$orderTotal."<br>";

$toppings = "";

if( isset($_POST['topping']) ){
  //$toppingPrice
  //counting items in array count($array)
  $totalToppings = $toppingPrice * count($_POST['topping']);
  foreach($toppings as $topping){
    $toppings $topping." , ";
  }
}
$orderTotal += $totalToppings;
//echo "This is after toppings".$orderTotal."<br>";

//final step
if ($hasErrors) {
  //die("You have errors.");
  include('order.php');
}else {
  $comments = $_POST['comments'];

  include('include/db.php');
  $sql = "INSERT INTO `pizza_order` (`id`, `first_name`, `last_name`, `address`, `address_2`, `city`, `state`, `zip`, `size`, `toppings`, `comments`, `phone_number`, `order_total`)
  VALUES (NULL, '$firstName', '$lastName', '$address', '$address_2', '$city', '$state', '$zip', '$size', '$toppings', '$comments', '$phone', '$orderTotal')";

// perform the query
mysqli_query($con, $sql);
//echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);;


  //echo "No errors <br>";
  include('thankyou.php');
}

// HW: if have errors, take to the order page; add the summary of toppings to thankyou page

?>
