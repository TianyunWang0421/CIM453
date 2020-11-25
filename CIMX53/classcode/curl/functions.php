<?php

  //$news = getData("https://news.miami.edu/feeds/all-news.xml","xml");

 function getData($url,$dataType) {
      // create curl resource
       $ch = curl_init();
       // set url
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
       curl_setopt($ch, CURLOPT_TIMEOUT, 20);

       //return the transfer as a string
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

       // $output contains the output string
       $output = curl_exec($ch);
       // close curl resource to free up system resources
       curl_close($ch);
       //echo $output;
       if($dataType == "xml") {
       $data = simplexml_load_string($output);
     } elseif($dataType == "json") {
       
       $data = json_decode($output);
     } else {
       $data = ["missing datatype"];
     }
     return $data;

} //end of function

?>
