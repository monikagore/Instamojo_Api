<!-- <?php
include("config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Currency Converter in Javascript</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <h1>Your Payment was successful please check your confirmation payment email</h1>
    </body>
</html> -->


<?php
session_start();
require('./instamojo.php');
//create the API object
$api = new Instamojo\Instamojo('test_e3574b79601e4738061919e742c', 'test_2fc07cf9f5dc135531d31997f39', 'https://test.instamojo.com/api/1.1/');
//Get the status of the payment related to your payment request
try {
    $response = $api->paymentRequestPaymentStatus($_GET['payment_request_id'], $_GET['payment_id']);
    $buyer_name = $response['payment']['buyer_name'];
    $purpose =$_SESSION["purpose"];
    $email = $response['payment']['buyer_email'];
    $phone = $response['payment']['buyer_phone'];
    $amount = $response['payment']['amount'];   
    $transaction_status = $response['payment']['status'];
 
    if($response['payment']['status']=='Credit')
    {
        //insert the data in the database
        $sql="INSERT INTO `payment_details`(`name`, `purpose`, `email`, `phone_number`, `amount`,`status`) VALUES ('$buyer_name','$purpose','$email','$phone','$amount','$transaction_status')";
            $stmt=$con->prepare($sql);
            $stmt->execute();
 
      if($stmt->rowCount()>0){
 
         echo '<strong>Success!</strong>Your Order has placed successfully';
         echo '<br>';
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