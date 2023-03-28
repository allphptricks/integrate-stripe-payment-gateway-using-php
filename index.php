<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
require_once 'config.php'; 
?>
<html>
<head>
<title>Demo Integrate Stripe Payment Gateway using PHP - AllPHPTricks.com</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>

<div style="width:700px; margin:50 auto;">
<h1>Demo Integrate Stripe Payment Gateway using PHP</h1>

<!-- Display status message -->
<div id="stripe-payment-message" class="hidden"></div>

<p><strong>Charge $10.00 with Stripe Demo Payment</strong></p>

<form id="stripe-payment-form" class="hidden">
	<input type='hidden' id='publishable_key' value='<?php echo STRIPE_PUBLISHABLE_KEY;?>'>
	<div class="form-group">
		<label><strong>Full Name</strong></label>
		<input type="text" id="fullname" class="form-control" maxlength="50" required autofocus>
	</div>
	<div class="form-group">
		<label><strong>E-Mail</strong></label>
		<input type="email" id="email" class="form-control" maxlength="50" required>
	</div>
	<h3>Enter Credit Card Information</h3>
	<div id="stripe-payment-element">
        <!--Stripe.js will inject the Payment Element here to get card details-->
	</div>

	<button id="submit-button" class="pay">
		<div class="spinner hidden" id="spinner"></div>
		<span id="submit-text">Pay Now</span>
	</button>
</form>

<!-- Display the payment processing -->
<div id="payment_processing" class="hidden">
	<span class="loader"></span> Please wait! Your payment is processing...
</div>

<!-- Display the payment reinitiate button -->
<div id="payment-reinitiate" class="hidden">
	<button class="btn btn-primary" onclick="reinitiateStripe()">Reinitiate Payment</button>
</div>

<br>
<div style="clear:both;"></div>
<p><strong>List of Testing Credit Cards Details</strong></p>
<p>Use the following Sandbox environment testing credit cards details to test the payment process.</p>
<p>
	<ul style="padding-left: 20px;">
		<li>Successful Payment Card VISA (Without 3D Secure) - 4242424242424242</li>
		<li>Requires Authentication Card VISA (With 3D Secure) - 4000002500003155</li>
		<li>Failed Payment Card VISA - 4000000000009995</li>	
	</ul>
</p>
<p>Select any future valid expiration date (month/year) & CVC is <strong>123</strong>.</p>

<a href="https://www.allphptricks.com/integrate-stripe-payment-gateway-using-php/">Tutorial Link</a> <br /><br />
For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/">AllPHPTricks.com</a>

</div>    
<script src="https://js.stripe.com/v3/"></script>
<script src="js/stripe-checkout.js" defer></script>
</body>
</html>