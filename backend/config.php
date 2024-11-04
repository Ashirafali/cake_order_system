<?php
$url = "localhost";
$database = "";
$user = "root";
$password = "";


    $connect= mysqli_connect($url,$database,$user,$password);
    if($connect){
        echo "Database Connected successfully";
    }
    else{
        echo "Not Connected";
    }


?>