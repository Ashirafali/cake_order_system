<?php
session_start();
$url ="localhost";
$user ="root";
$password ="";
$db = "cake_odering_db";

$connect= mysqli_connect($url,$user,$password,$db);

if(isset($_POST['submit'])){
    $user_name  = $_POST['user_name'];
    $password = $_POST['password'];
  
    $sql = "SELECT * FROM users WHERE user_name = '$user_name'  AND password= '$password'";
   
    $result = mysqli_query($connect,$sql);

    $user = mysqli_fetch_array($result,MYSQLI_ASSOC);


    if (password_verify($password, $user['password'])) {
        echo "Login fresh";
    } 
    else{
        echo "umefeli";
    }
}
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
            <form action="login.php" method="post">
                <label for="user_name">User Name:</label>
                <input type="text" id="user_name" name="user_name" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="submit">Submit</button>
                <button type="button" onclick="window.location.href='reset_password.php'">Reset Password</button>
                <button type="button" onclick="window.location.href='register.php'">Sign Up</button>
            </form>
        </div>
    </section>
</body>
</html>

