<?php
include 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $id = $_POST['id'];  // Assuming the `id` is passed as a hidden input field
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirmPassword = htmlspecialchars(trim($_POST['confirmPassword']));

    // Initialize an array to store validation errors
    $errors = [];

    // Validate Username
    if (empty($username)) {
        $errors['username'] = "Username is required.";
    }

    // Validate Email
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Validate Password (optional, only update if provided)
    if (!empty($password)) {
        if (strlen($password) < 6) {
            $errors['password'] = "Password must be at least 6 characters.";
        } elseif ($password !== $confirmPassword) {
            $errors['confirmPassword'] = "Passwords do not match.";
        } else {
            // Hash the new password if valid
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        }
    }

    // If there are no errors, proceed with the update
    if (empty($errors)) {
        // If a new password is provided, update it; otherwise, don't update the password
        if (!empty($password)) {
            $sql = "UPDATE students SET username=?, email=?, password=? WHERE id=?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sssi", $username, $email, $hashedPassword, $id);
        } else {
            // Update only username and email if password is not changed
            $sql = "UPDATE students SET username=?, email=? WHERE id=?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssi", $username, $email, $id);
        }

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record updated successfully!";
            // Redirect to the list of students (or success page)
            header("Location: view.php");
        } else {
            echo "Error updating record: " . $connection->error;
        }

        // Close the statement and connection
        $stmt->close();
    } else {
        // Display errors if any
        foreach ($errors as $field => $error) {
            echo "<p style='color:red;'>{$error}</p>";
        }
    }
}

// Close the connection
$connection->close();
?>
