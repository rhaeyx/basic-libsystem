<?php 
$host = "localhost";  // Replace with your MySQL server host
$username = "root";  // Replace with your MySQL username
$password = "";  // Replace with your MySQL password
$database = "library";  // Replace with your MySQL database name

// Create a new MySQLi object
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}