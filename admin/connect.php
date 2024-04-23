<?php

$servername = "localhost";
$username = "root";
$password = ""; // Assuming no password is set
$database = "manpower_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Close connection
$conn->close();

?>
