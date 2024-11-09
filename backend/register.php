<?php
session_start();
include 'config.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cake_odering_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $middleName = $_POST['middle_name'];
    $lastName = $_POST['last_name'];
    $nationality = $_POST['nationality'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    
    $error =array();
    if ($password !== $confirmPassword) {
        array_push($error,"Passwords do not match");
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO register (first_name, middle_name, last_name, nationality, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $middleName, $lastName, $nationality, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registration data saved!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign-up ! register</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
    margin: 50px;
}

.container {
    max-width: 400px;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
}

button {
    background-color: lightslategray;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

a {
text-decoration: none;
color: white;
}
</style>
<body>
    <header>
        <div class="container">
                <h1>Fill Form Below </h1>
            </div>
    </header>
        <div class="container">
            <div id="text">
            <form action="register.php" method="post">
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" required>

    <label for="middle_name">Middle Name</label>
    <input type="text" id="middle_name" name="middle_name">

    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="nationality">Nationality</label>
    <input type="text" id="nationality" name="nationality" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <button type="submit">Submit</button>
</form>
        </div>
    </div>

</body>
</html>