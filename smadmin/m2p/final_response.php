<?php
echo "This is M2p Response created by DK";
// $results=$_POST;
// echo "<pre>"; print_r($results);

$post_data_expected = file_get_contents("php://input");
$decoded_data = json_decode($post_data_expected, true);
include("connection.php");
$query1 = "INSERT INTO `m_payout`( `client_ip`, `payout_all`, `payout_aar`) VALUES ( '1', '$decoded_data','$decoded_data')";
mysqli_query($link,$query1);
echo "<pre>"; print_r($decoded_data);


?>