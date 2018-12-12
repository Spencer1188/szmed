<?php

$servername = "localhost";
$username = "szmed";
$password = 'szM3d$pr';
$dbname = "szmed";


	
$conn = new mysqli($servername, $username, $password, $dbname);
$link = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysqli_query($link,"SET NAMES 'utf8'");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
?>
