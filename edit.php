<?php
require_once('db.php');

$username = $_GET['username'];
$newPassword = $_GET['newPassword'];
$sql = "UPDATE accounts SET password = '$newPassword' WHERE username = '$username'";
$qry = mysqli_query($conn, $sql);
?>