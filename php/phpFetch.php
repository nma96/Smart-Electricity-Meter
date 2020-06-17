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



$sql = mysqli_query($conn, "select * from test");

$row = mysqli_fetch_array($sql);
$data = $row[0];

if($data){	
	echo $data;
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 