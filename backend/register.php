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
            <form action="/Register" method="post">
                <label for="fname">First Name </label>
                <input type="text" id="name" name="First Name " required>

                <label for="mname">Midal Name </label>
                <input type="text" id="name" name="Midal Name " >

                <label for="lname">Last Name </label>
                <input type="text" id="name" name="Last Name " required>
    
                <label for="Nationality">Nationality </label>
                <input type="text" id="nationality" name="Nationality " required>
    
                <label for="Email">Email </label>
                <input type="text" id="email" name="Email " required>         
        
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
    
                <label for="password">Confim Password:</label>
                <input type="password" id="password" name="Confim Password" required>
    
                <button type="submit">Submit</button>
               
                <form action="Register.php" method="post"></form>
                
            </form>
        </div>
    </div>

</body>
</html>