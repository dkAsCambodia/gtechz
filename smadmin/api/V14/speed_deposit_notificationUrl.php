<?php
$input = file_get_contents('php://input');
$results = json_decode($input, true);
if(!empty($results)){
    // Decode JSON data
    $payin_all=json_encode($results, true);
    $payin_request_id=$results['RefID'];
    date_default_timezone_set('Asia/Phnom_Penh');
    $pt_timestamp=date("Y-m-d h:i:sA");
    $orderstatus=$results['Status'];
    $Type=$results['Type'];
    if($Type=='Deposit'){
        // Code for update Deposit Transaction status START
        include("../../connection.php");
        $query1 = "UPDATE `m_payin` SET `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payin_all`='$payin_all' WHERE payin_request_id='$payin_request_id' ";
        mysqli_query($link,$query1);
        // Code for update Deposit Transaction status END
    }else{
        // Code for update Payout Transaction status END
        // include("../../connection.php");
        // $query2 = "UPDATE `m_payout` SET `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payout_all`='$payin_all' WHERE payout_request_id='$payin_request_id' ";
        // $res=mysqli_query($link,$query2);
        // Code for update Payout Transaction status END
    }
    echo "Transaction updated Successfully!";
       

}else{
    echo "No Data Available or Invalid Request!";
}
?>

