<?php
session_start();
require('./instamojo.php');
include('config.php');
const API_KEY ="test_e3574b79601e4738061919e742c";
const AUTH_TOKEN = "test_2fc07cf9f5dc135531d31997f39";

$name=$_POST['name'];
$purpose=$_POST['purpose'];
$_SESSION["purpose"]=$purpose;
$email=$_POST['email'];
$phone_number=$_POST['number'];
$amount=$_POST['amount'];
if(isset($_POST['purpose']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount']))
{
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN,'https://test.instamojo.com/api/1.1/');
    // $sql=mysqli_query($conn,"INSERT INTO `payment_details`(`name`, `purpose`, `email`, `phone_number`, `amount`) VALUES ('$name','$purpose','$email','$phone_number','$amount')");
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $_POST['purpose'],
            "buyer_name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "send_email" => true,
            "email" => $_POST['email'],
            "redirect_url" => "http://monika.tectignis.in/success.php"
            ));
            echo
        header('Location:'. $response['longurl']);
         
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
}
?>