<?php
require_once 'connection.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['Email'];
    $password = $_POST['password'];
   

    // Database connection (replace with your database credentials)
    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'banking';

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Insert data into a user table (replace with your table name)
    $sql = "INSERT INTO SignUp (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error in SQL statement: ' . $conn->error);
    }

    // Bind parameters and execute the query
    $stmt->bind_param('ss', $email, $password);
    if ($stmt->execute())
    {
        echo 'Registration successful!';
    } 
    else 
    {
        echo 'Error: ' . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
