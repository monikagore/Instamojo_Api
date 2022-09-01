<?php
try {
    $response = $api->paymentRequestPaymentStatus($_GET['payment_request_id'], $_GET['payment_id']);
    $buyer_name = $response['payment']['buyer_name'];
    $amount = $response['payment']['amount'];
    $payment_id = $response['payment']['payment_id'];
    $transaction_status = $response['payment']['status'];
    $payment_mode = $response['payment']['instrument_type'];
 
    if($response['payment']['status']=='Credit')
    {
        //echo 'Done';
        //insert the data in the database
        $sql="INSERT INTO `payment_details`(`name`, `purpose`, `email`, `phone_number`, `amount`) VALUES ('$buyer_name','$payment_id','$transaction_status','$payment_mode','$amount')";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
 
      if($stmt->rowCount()>0){
 
         echo '<strong>Success!</strong>Your Order has placed successfully';
         echo '<br>';
         echo 'Payment ID:' .$payment_id.'<br>';
         echo 'Buyer Name:' .$buyer_name.'<br>';
         echo 'Amount:' .$amount.'<br>';
         echo 'Transaction Status:' .$transaction_status;
      }
    }
    else{
 
        echo 'Failed';
    }
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>