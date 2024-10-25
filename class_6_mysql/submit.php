<?php

include 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
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

    // Validate Password
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }

    // Validate Confirm Password
    if ($password !== $confirmPassword) {
        $errors['confirmPassword'] = "Passwords do not match.";
    }

    // If there are no errors, proceed with form processing
    if (empty($errors)) {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare an SQL statement to insert data
        $statment = $connection->prepare("INSERT INTO students (username, email, password) VALUES (?, ?, ?)");
        $statment->bind_param("sss",  $username, $email, $hashedPassword);

        /*
        The "sss" represents the data types of the variables that are being bound to the SQL query. Each letter in "sss" corresponds to the data type of a parameter:
        "s": String
        "i": Integer
        "d": Double (float)
        "b": Blob (binary data)
        Since username, email, and hashedPassword are all strings, we use "sss". If one of the parameters were an integer, for example, you would use "sii" if you had one string and two integers. The bind_param() function securely binds these values to the prepared SQL statement, helping to prevent SQL injection attacks.
        */

        // Execute the query
        if ($statment->execute()) {
            echo "Form submitted successfully and data saved!";
        } else {
            echo "Error: " . $statment->error;
        }

        // Close the statement and connection
        $statment->close();
        $connection->close();

        // Redirect to a success page or stop further execution
        exit();
    } else {
        // Display errors if any
        foreach ($errors as $field => $error) {
            echo "<p style='color:red;'>{$error}</p>";
        }
    }
}
