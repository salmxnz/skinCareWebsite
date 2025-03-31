<?php
// Start session
session_start();

// Include database connection
require_once 'includes/db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);
    
    // Execute statement
    if ($stmt->execute()) {
        // Get the user ID
        $user_id = $conn->insert_id;
        
        // Set session variables
        $_SESSION['user_id'] = $user_id;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['email'] = $email;
        $_SESSION['logged_in'] = true;
        
        // Redirect to home page
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
