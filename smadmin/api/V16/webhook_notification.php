<?php
// echo "This is Xprizo deposit webhook response created by DK";
// {
//     "statusType": 3,
//     "status": "Rejected",
//     "description": "Reason for rejection",
//     "actionedById": 1,
//     "affectedContactIds": [],
//     "transaction": {
//       "id": 0,
//       "createdById": 2,
//       "type": "UCD",
//       "date": "2021-04-20T20:34:00.7606173+02:00",
//       "reference": 234234234,
//       "currencyCode": "USD",
//       "amount": 100.00
//     }
// }
  
$results= json_decode(file_get_contents('php://input'), true);
if(!empty($results)){

    // Decode JSON data
    $payin_all=json_encode($results, true);
    $payin_request_id=$results['transaction']['reference'];
    date_default_timezone_set('Asia/Phnom_Penh');
    $pt_timestamp=date("Y-m-d h:i:sA");
    $orderstatus=$results['status'];
       
    // Code for update Transaction status START
    include("../../connection.php");
    if($results['transaction']['type']== 'UCD'){
        $query1 = "UPDATE `m_payin` SET `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payin_all`='$payin_all' WHERE payin_request_id='$payin_request_id' ";
    }else{
        $query1 = "UPDATE `m_payout` SET `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payout_all`='$payin_all' WHERE payout_request_id='$payin_request_id' ";
    }
   
    mysqli_query($link,$query1);
    // Code for update Transaction status END

        // Set the response code to 200
        http_response_code(200);
        // Define the response body
        $response = [
            "status" => "success",
            "TransactionType" => $results['transaction']['type'],
            "message" => "Transaction Updated Successfully!"
        ];
        // Return the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);

    
}else{
    echo "No Data Available or Invalid Request!";
}
?>

