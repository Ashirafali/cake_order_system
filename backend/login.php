<?php
session_start();
include 'config.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cake_odering_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);}
$errors = array();
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);}

//        if (mysqli_num_rows($results) == 1) {
//            $_SESSION['user_name'] = $username;
//            $_SESSION['success'] = "You are now logged in";}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log-in ! welcome</title>
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

    </header>
    <section id="log-in">
        <div class="container">
            <div id="log-in">
                <h1> Log In Form </h1>
            </div>

            <form action="login.php" method="post">
                <label for="user_name">User Name:</label>
                <input type="text" id="user_name" name="user_name" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="submit" value="login">Submit</button>
                <button type="button" onclick="window.location.href='reset_password.php'">Reset Password</button>
                <button type="button" onclick="window.location.href='../frontend/registrationForm.php'">Sign Up</button>
            </form>
        </div>
    </section>
</body>
</html>

