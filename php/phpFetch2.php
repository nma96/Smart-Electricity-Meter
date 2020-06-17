<?php
$servername = "localhost";
$username = "id1064989_shreyas";
$password = "project123";
$dbname = "id1064989_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$id=$_POST['userID'];

$sql = mysqli_query($conn, "Select MIN(Watt) as MinWatt from (SELECT * FROM UsageDetails WHERE (MONTH(DATE) = MONTH(CURRENT_DATE()) AND userID='{$id}')) AS T;");

$row = mysqli_fetch_array($sql);
$minimum = $row[0];

$sql = mysqli_query($conn, "Select MAX(Watt) as MinWatt from (SELECT * FROM UsageDetails WHERE (MONTH(DATE) = MONTH(CURRENT_DATE()) AND userID='{$id}')) AS T;");

$row = mysqli_fetch_array($sql);
$maximum = $row[0];

$data = $maximum - $minimum;

if($data){	
	echo $data;
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 