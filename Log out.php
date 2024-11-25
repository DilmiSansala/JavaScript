<?php
require_once 'connection.php'; // Include the database connection file
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // If the user is logged in, destroy the session to log them out
    session_destroy();
    
    // Redirect to a login page or any other appropriate page after logout
    header("Location: login.php"); // Replace "login.php" with the actual login page URL
    exit();
} else {
    // If the user is not logged in, you can handle this case accordingly
    echo "You are not logged in."; // Display a message or take any other action
}
?>
