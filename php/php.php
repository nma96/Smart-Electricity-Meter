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



$number=$_POST['number'];


$sql = "INSERT INTO test (number)
VALUES ('{$number}')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 