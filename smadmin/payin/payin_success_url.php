<?php
// print_r($_GET); die;
$pt_transactionId=base64_decode($_GET['pt_transactionId']);
$pt_email=base64_decode($_GET['pt_email']);
$pt_reference=base64_decode($_GET['pt_reference']);
$pt_amount=base64_decode($_GET['pt_amount']);
$pt_timestamp=base64_decode($_GET['pt_timestamp']);
$pt_status=base64_decode($_GET['pt_status']);
if(!empty($_GET)){

    $blogID = '8070105920543249955';
    $authToken = 'OAuth 2.0 token here';
    // The data to send to the API
    $postData = array(
        'pt_transactionId' => $pt_transactionId,
        'pt_email' => $pt_email,
        'pt_reference' => $pt_reference,
    	'pt_status' => $pt_status,
    	'pt_timestamp' => $pt_timestamp,
        'pt_amount' => $pt_amount
    );
    // Setup cURL
    $ch = curl_init('https://www.apiadminbetg.com/gwayz/success2');
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$authToken,
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));
    $response = curl_exec($ch);
    if($response === FALSE){
        die(curl_error($ch));
    }
    $responseData = json_decode($response, TRUE);
    curl_close($ch);
    echo "Transaction Information as follows".'<br/>'.
    "TransactionId : ".$pt_transactionId.'<br/>'.
    "Email : ".$pt_email.'<br/>'.
    "ReferenceNo : ".$pt_reference.'<br/>'.
    "Amount : ".$pt_amount.'<br/>'.
    "Datetime : ".$pt_timestamp.'<br/>'.
    "Status : ".$pt_status;
    die;
}else{
    echo "No Data Available or Invalid Request";
}
?>