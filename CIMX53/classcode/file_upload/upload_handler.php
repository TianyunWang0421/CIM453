<?php
var_dump($_POST);
var_dump($_FILES);

$upload_directory = "uploads/";

$target_filename = $_FILES['userfile']['name'];

$fileType =  $_FILES['userfile']['type'];

if($fileType == "image/jpeg") {

$new_name = $upload_directory . $target_filename;

if(move_uploaded_file($_FILES['userfile']['tmp_name'] , $new_name)) {
  echo "File uploaded";
} else {
  echo "Some error";
}

} else {
  die("not an image");
}


?>
