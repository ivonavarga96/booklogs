<?php
$servername = "localhost";
$uname = "root";
$password = "password123";
$db = "booklogs";

$conn = mysqli_connect($servername, $uname, $password, $db) or die("DB connection failed");
?>