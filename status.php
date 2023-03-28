<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
// Include the DB config & class files
require_once 'config.php';
require_once 'dbclass.php';

// If transaction ID is not empty 
if(!empty($_GET['tid'])){
    $transaction_id  = $_GET['tid'];

    $db = new DB;
    // Fetch the transaction details from DB using Transaction ID
    $db->query("SELECT * FROM `stripe_payment` WHERE transaction_id=:transaction_id");
    $db->bind(":transaction_id", $transaction_id);
    $row = $db->result();
    $db->close();
    if(!empty($row)){
        $fullname = $row['fullname'];
        $email = $row['email'];
        $item_description = $row['item_description'];
        $currency = $row['currency'];
        $amount = $row['amount'];
    }
}else{ 
    header("Location: index.php"); 
    exit(); 
} 
?>
<html>
<head>
<title>Demo Integrate Stripe Payment Gateway using PHP - AllPHPTricks.com</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>

<div style="width:700px; margin:50 auto;">
<h1>Demo Integrate Stripe Payment Gateway using PHP</h1>

<?php if(!empty($row)){ ?>
    <h2 style="color: #327e00;">Success! Your payment has been received successfully.</h2>
    <h3>Payment Receipt:</h3>
    <p><strong>Full Name:</strong> <?php echo $fullname; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Transaction ID:</strong> <?php echo $transaction_id; ?></p>
    <p><strong>Amount:</strong> <?php echo $amount.' '.$currency; ?></p>
    <p><strong>Item Description:</strong> <?php echo $item_description; ?></p>
<?php }else{ ?>
    <h1>Error! Your transaction has been failed.</h1>
<?php } ?>

<a href="https://www.allphptricks.com/integrate-stripe-payment-gateway-using-php/">Tutorial Link</a> <br /><br />
For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/">AllPHPTricks.com</a>

</div>
</body>
</html>