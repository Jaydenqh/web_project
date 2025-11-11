<?php
// Define connection details
$servername = "localhost";  // XAMPP runs on localhost
$username = "root";         // default username in XAMPP
$password = "";             // default password is empty
$database = "minimart_db";  // the database you created in phpMyAdmin

// Create the connection
$conn = new mysqli($servername, $username, $password, $database);

//  Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// If no error, connection is successful
echo "Database connected successfully!";
?>
