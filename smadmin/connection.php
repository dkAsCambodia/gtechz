<?php

// $host     = "localhost";
// $user     = "root";
// $password = "";
// $database = "acuteinf_gtechz";

$host     = "localhost";
$user     = "implogix";
$password = "password";
$database = "acuteinf_gtechz";

$link   = mysqli_connect($host, $user, $password, $database);
//if (mysqli_connect_errno($link)) {
if (!$link) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>