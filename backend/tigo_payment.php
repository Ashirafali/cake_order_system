<?php
session_start();
include 'config.php';


<form method="POST" action="tigo_payment.php">
    <label>Phone Number:</label>
    <input type="text" name="phone_number" placeholder="e.g. 254700000000" required>
    <button type="submit">Pay with tigo pesa</button>
</form>
?>