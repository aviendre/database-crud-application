<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amazon";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("Database Connection failed" . mysqli_connect_errno());
}

echo "Database Connected Successfully";