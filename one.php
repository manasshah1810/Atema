<?php
//Code to delete all records from table
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "law"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM `contact`";
if ($conn->query($sql) === TRUE) {
    echo "Records deleted successfully.";
} else {
    echo "Error deleting records: " . $conn->error;
}
$conn->close();
?>