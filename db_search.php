<?php
require_once('db.php');

$searched_title = $_GET['searched_title'];
$browse = "SELECT id, title, author, publish_year, genre, img_src FROM books WHERE `title` LIKE '%{$searched_title}%' OR `author` LIKE  '%{$searched_title}%' ORDER BY `title`;";
$result = $conn->query($browse);
$final_ispis=array();
header('Content-Type: application/json');
while($row = $result->fetch_assoc()) {
	$final_ispis[] = $row;
}
echo json_encode($final_ispis);
?>