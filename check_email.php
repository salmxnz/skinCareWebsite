<?php
// Include database connection
require_once 'includes/db_connection.php';

// Check if email parameter exists
if(isset($_GET['email'])) {
    $email = $_GET['email'];
    
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        echo "<span style='color: red;'>Email already exists</span>";
    } else {
        echo "<span style='color: green;'>Email is available</span>";
    }
    
    $stmt->close();
}

$conn->close();
?>
