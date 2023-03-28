<?php 
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
require_once 'stripe_header.php';

$payment_intent_id = !empty($jsonObj->payment_intent_id)?$jsonObj->payment_intent_id:''; 
$fullname = !empty($jsonObj->fullname)?$jsonObj->fullname:''; 
$email = !empty($jsonObj->email)?$jsonObj->email:''; 
    
// Add new customer fullname and email to stripe 
try {   
    $customer = \Stripe\Customer::create(array(  
        'name' => $fullname,  
        'email' => $email 
    ));  
}catch(Exception $e) {   
    $error = $e->getMessage();
} 
    
if(empty($error) && !empty($customer)){
    try {
        // Attach Customer Data with PaymentIntent using customer ID
        \Stripe\PaymentIntent::update($payment_intent_id, [
            'customer' => $customer->id 
        ]);
    } catch (Exception $e) {  
        $error = $e->getMessage();
    }
    $output = [
        'customer_id' => $customer->id 
    ];
    echo json_encode($output); 

}else{ 
    http_response_code(500);
    echo json_encode(['error' => $error]); 
} 
?>