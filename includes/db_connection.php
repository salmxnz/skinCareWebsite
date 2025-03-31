<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "root"; // Default MAMP password
$dbname = "skincare_db";
$port = 8889; // MAMP default MySQL port

// First connect without selecting a database
$conn = new mysqli($servername, $username, $password, "", $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Database created successfully or already exists
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);
?>
