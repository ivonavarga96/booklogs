<?php
require_once('db.php');

$deleteId = $_GET['id'];
$sql = "DELETE FROM books WHERE `id` = $deleteId";
$qry = mysqli_query($conn, $sql);
    
echo $deleteId;
?>