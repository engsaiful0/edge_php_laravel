<?php
include 'db_connection.php';

// SQL query to retrieve all data from the students table
$sql = "SELECT * FROM students";
$result = $connection->query($sql);

// Check if there are results and display them
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Created At</th> <!-- Adjust columns as per your table -->
                <th>Actions</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['created_at'] . "</td> <!-- Adjust according to your table structure -->
                <td>
                    <a href='edit_student.php?id=" . $row['id'] . "'>Edit</a> |
                    <a href='delete_student.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close the database connection
$connection->close();
?>
