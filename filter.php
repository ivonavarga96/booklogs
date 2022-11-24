<?php
require_once('db.php');

$genre = $_GET['genre'];
$browse = "SELECT id, title, author, publish_year, genre, img_src FROM books WHERE `genre` LIKE '%{$genre}%'";
$result = $conn->query($browse);
$final_ispis=array();
header('Content-Type: application/json');
while($row = $result->fetch_assoc()) {
	$final_ispis[] = $row;
}
echo json_encode($final_ispis);
?>