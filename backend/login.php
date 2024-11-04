<?php
session_start();
include 'config.php';
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
        <div class="container">
            <div id="log-in">
                <h1> Log In </h1>
            </div>
        </div>
    </header>
    <section id="log-in">
        <div class="container">
            <form action="/log-in" method="post">
                <label for="User Name">User Name:</label>
                <input type="text" id="User Name" name="User Name" required>
            
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
    
                <button type="submit">Submit</button>
                <button type="ForgetPassword">ResetPassword</button>
                <button type="SignUp"><a href="register.php">SingUp</a></button>
                <form action="backend/login.php" method="post"></form>
                
            </form>
        </div>
    </section>
</body>
</html>

