<?php
require_once('db.php');

$browse = "SELECT title, author, imgsrc FROM `newbooks` UNION SELECT title, author, imgsrc FROM `bookawards` UNION SELECT title, author, imgsrc FROM `upcomingbooks` ORDER BY `title`;";
$result = $conn->query($browse);
$final_ispis=array();

header('Content-Type: application/json');
while($row = $result->fetch_assoc()) {
	$final_ispis[] = $row;
}
echo json_encode($final_ispis);
?>