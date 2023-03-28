<?php 
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
// Include the Stripe configuration file 
require_once 'config.php'; 
 
// Include the Stripe PHP SDK library 
require_once 'vendor/autoload.php'; 

// Set API key 
\Stripe\Stripe::setApiKey(STRIPE_SECRET_API_KEY); 

// Set content type to JSON 
header('Content-Type: application/json'); 

// Retrieve JSON from POST body 
$jsonStr = file_get_contents('php://input'); 
$jsonObj = json_decode($jsonStr); 
?>