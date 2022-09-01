<?php
require('./instamojo.php');
const API_KEY ="test_e3574b79601e4738061919e742c";
const AUTH_TOKEN = "test_2fc07cf9f5dc135531d31997f39";


if(isset($_POST['purpose']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount']))
{
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN,'https://test.instamojo.com/api/1.1/');
    
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $_POST['purpose'],
            "buyer_name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "send_email" => true,
            "email" => $_POST['email'],
            "redirect_url" => "http://monika.tectignis.in/success.php",
            "webhook" => "http://monika.tectignis.in/instamojo_api/webhook.php"
            ));
        header('Location:'. $response['longurl']);
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
}
?>