<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","root","gova");

$sqlQuery = "SELECT points FROM flot";

$result = mysqli_query($conn,$sqlQuery);

$totalPoints= array();
foreach ($result as $row) {
	$totalPoints[] = $row;
}
mysqli_close($conn);

echo json_encode($totalPoints);
?>
