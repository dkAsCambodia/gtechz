<?php 
echo "This is Acurateco Wenhook Response created by DK";
$xml_data = file_get_contents("php://input");

        $xml = json_encode($xml_data, true);
        
        // Parse the XML string
        parse_str($xml, $results);
        // echo "<pre>"; print_r($results['Status']);
        $payout_aar=json_encode($results, true);



$payout_all = 'webhook response hai';
include("../connection.php");
$query1 = "INSERT INTO `m_payout`( `client_ip`, `payout_all`, `payout_aar`) VALUES ( '1', '$payout_all','$payout_aar')";
mysqli_query($link,$query1);
?>