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
$amount=$_POST['amount'];


$d = date('Y-m-d');

$sql = "INSERT INTO PaymentDetails (userID,PaidAmount,DatePaid) VALUES ('{$id}','{$amount}',CAST('". $d."' AS DATE))";

if ($conn->query($sql) === TRUE) {
    echo "Payment details updated";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 