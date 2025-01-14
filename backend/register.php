<?php
session_start();
include 'config.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cake_odering_db";

// Create connection

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("ERROR: Could not connect. " . $conn->connect_error);
    header("../frontend/database_error.php");
}

// Validate the inputs
$firstname = isset($_POST['first_name']) ? $conn->real_escape_string($_POST['first_name']) : '';
$middle_name = isset($_POST['middle_name']) ? $conn->real_escape_string($_POST['middle_name']) : '';
$lastname = isset($_POST['last_name']) ? $conn->real_escape_string($_POST['last_name']) : '';
$email = isset($_POST['user_name']) ? $conn->real_escape_string($_POST['user_name']) : '';
$password = isset($_POST['password']) ? $conn->real_escape_string($_POST['password']) : '';
$confirm_password = isset($_POST['confirm_password']) ? $conn->real_escape_string($_POST['confirm_password']) : '';
$full_address = isset($_POST['full_address']) ? $conn->real_escape_string($_POST['full_address']) : '';

// Ina hakikisha required filled zimejazwa
if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)) {
    die("Error: Required fields are missing");
}

// Angalia kama password zina fanana
if ($password !== $confirm_password) {
    die("Error: Passwords do not match");
}

// Hash the password before storing it
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Andaa query ya ku insert data kwenye table
$sql = "INSERT INTO users (first_name, middle_name, last_name, user_name, password, full_address,role) 
        VALUES (?, ?, ?, ?, ?, ?,'NORMAL_USER')";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("ssssss", $firstname, $middle_name, $lastname, $email, $hashed_password, $full_address);
    if ($stmt->execute()) {
        echo "User Created Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}
$conn->close();

?>
