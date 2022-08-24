<?php

/*
Basic PHP script to handle Instamojo RAP webhook.
*/

$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.
$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];
if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}
// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without <>
$mac_calculated = hash_hmac("sha1", implode("|", $data), "<19268b56abc64888ac60bd480f87576d>");
if($mac_provided == $mac_calculated){
    if($data['status'] == "Credit"){
       include("config.php");

            $name=$_POST['buyer_name'];
            $purpose=$_POST['purpose'];
            $email=$_POST['buyer'];
            $phone_number=$_POST['buyer_phone'];
            $amount=$_POST['amount'];
          
            $sql=mysqli_query($conn,"INSERT INTO `payment_details`(`name`, `purpose`, `email`, `phone_number`, `amount`) VALUES ('$name','$purpose','$email','$phone_number','$amount')");
          
            if($sql==1){
              echo '<script>alert("Successfully submitted");</script>';
          }
          }
          
    }
    else{
        // Payment was unsuccessful, mark it as failed in your database.
        // You can acess payment_request_id, purpose etc here.
    }
else{
    echo "MAC mismatch";
}

?>