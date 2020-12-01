<?php

$today = date("Y-m-d H:i:s");   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
echo $today."<br>";
//We need to set the timezone first
date_default_timezone_set('America/New_York');

$today = date("Y-m-d H:i:s");   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
echo $today;

?>
