<?php
    $host = "localhost"; // Your database host
    $username = "root"; // Your database username
    $password = ""; // Your database password
    $database = "banking"; 

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: ");
    }else{
        echo "Connection success";
    }

?>
