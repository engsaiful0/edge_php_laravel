<?php
// Database credentials
$servername = "localhost"; // Change if your server is different
$username_db = "root"; // Your MySQL username
$password_db = ""; // Your MySQL password
$dbname = "edge_php_laravel"; // Your MySQL database name

// Create a connection
$connection = new mysqli($servername, $username_db, $password_db, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>