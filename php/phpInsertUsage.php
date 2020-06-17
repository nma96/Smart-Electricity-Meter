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

$id=$_POST['id'];
$count=$_POST['count'];

$units = $count * 3.125;
$d = date('Y-m-d');

$sql = "INSERT INTO UsageDetails (userID,pulseCount,Watt,DATE) VALUES ('{$id}','{$count}','{$units}',CAST('". $d."' AS DATE))";

if ($conn->query($sql) === TRUE) {
    echo "Usage details updated";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 