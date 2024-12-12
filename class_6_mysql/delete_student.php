<?php
include 'db_connection.php';

// Get the student ID from the URL
$id = $_GET['id'];

// SQL query to delete the student record
$sql = "DELETE FROM students WHERE id = ?";

// Prepare and execute the SQL statement
$statement = $connection->prepare($sql);
$statement->bind_param("i", $id);
$statement->execute();
// mysqli_query($connection,"DELETE FROM students WHERE id = '$id'")

// Check if the record was successfully deleted
if ($statement->affected_rows > 0) {
    echo "Record deleted successfully!";
    // Redirect to the list of students
    header("Location: view.php");
} else {
    echo "Error deleting record: " . $connection->error;
}

// Close the database connection
$connection->close();
?>
