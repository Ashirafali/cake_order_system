<?php
session_start();
include 'config.php';

// M-Pesa API credentials
define("CONSUMER_KEY", "your_consumer_key");
define("CONSUMER_SECRET", "your_consumer_secret");
define("SHORTCODE", "your_shortcode");
define("PASSKEY", "your_passkey");
define("CALLBACK_URL", "https://yourdomain.com/callback.php");

// Get order details from session or database
$user_id = $_SESSION['user_id'];
$order_id = $_SESSION['order_id'];
$total_price = $_SESSION['total_price'];  

// M-Pesa endpoint URLs
define("TOKEN_URL", "");
define("STK_PUSH_URL", "");

// M-Pesa API access token
function getAccessToken() {
    $credentials = base64_encode(CONSUMER_KEY . ':' . CONSUMER_SECRET);
    $curl = curl_init(TOKEN_URL);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    
    $response = json_decode($response);
    return $response->access_token ?? null;
}

// Tuma STK Push request to M-Pesa
function initiateMpesaPayment($amount, $phone_number) {
    $accessToken = getAccessToken();
    if (!$accessToken) {
        die("Unable to obtain M-Pesa access token.");
    }

    $timestamp = date("YmdHis");
    $password = base64_encode(SHORTCODE . PASSKEY . $timestamp);

    $postData = array(
        "BusinessShortCode" => SHORTCODE,
        "Password" => $password,
        "Timestamp" => $timestamp,
        "TransactionType" => "CustomerPayBillOnline",
        "Amount" => $amount,
        "PartyA" => $phone_number,
        "PartyB" => SHORTCODE,
        "PhoneNumber" => $phone_number,
        "CallBackURL" => CALLBACK_URL,
        "AccountReference" => "Order" . $GLOBALS['order_id'],
        "TransactionDesc" => "Cake order payment"
    );

    $curl = curl_init(STK_PUSH_URL);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $accessToken, 'Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response);
}
// Trigger payment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['phone_number'])) {
    $phone_number = $_POST['phone_number'];
    
    // Initiate the payment request
    $response = initiateMpesaPayment($total_price, $phone_number);

    if (isset($response->ResponseCode) && $response->ResponseCode == "0") {
        // Payment initiated successfully, waiting for callback
        echo "Payment request sent. Please check your phone to complete payment.";
    } else {
        // Handle payment request error
        echo "Failed to initiate payment: " . $response->errorMessage;
    }
}
?>


<form method="POST" action="mpesa_payment.php">
    <label>Phone Number:</label>
    <input type="text" name="phone_number" placeholder="e.g. 254700000000" required>
    <button type="submit">Pay with M-Pesa</button>
</form>

?>