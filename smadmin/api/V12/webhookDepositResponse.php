<?php 
echo "This is Acurateco Wenhook Response created by DK";
$xml_data = file_get_contents("php://input");

    if(!empty($xml_data)){
        $xml = json_encode($xml_data, true);
        // Parse the XML string
        parse_str($xml, $results);
        // echo "<pre>"; print_r($results['Status']);
        $transactionId=$results['"id'];
        $payin_request_id=$results['order_number'];
        $orderstatus=$results['status'];
        $payin_all='Type='.$results['type'];
        $payin_aar=json_encode($results, true);
        include("../../connection.php");
        $query1 = "UPDATE `m_payin` SET `orderid`='$transactionId', `orderstatus`='$orderstatus', `status`='1', `payin_all`='$payin_all', `payin_aar`='$payin_aar' WHERE payin_request_id='$payin_request_id' ";
        mysqli_query($link,$query1);
    }else{
        include("../../connection.php");
        $query2 = "INSERT INTO `m_payin`( `payin_all`, `payin_aar`) VALUES ('webhook working','datanot found')";
        mysqli_query($link, $query2);
    }
?>