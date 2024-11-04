<?php
$url = "localhost";
$database = "";
$user = "root";
$password = "";

try {
    $pdo = new PDO("mysqli:host=$url;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}

?>