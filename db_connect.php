<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wearvibe_db"; // Database name updated to wearvibe_db

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // If connection fails, show error message
    die("Connection failed: " . $conn->connect_error);
}
?>