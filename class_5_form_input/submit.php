<?php
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

    // If there are no errors, proceed with form processing (e.g., saving to a database)
    if (empty($errors)) {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simulate saving data (e.g., save to a database here)
        echo "Form submitted successfully!";

        // You could redirect to a success page or send a confirmation message here
        // header("Location: success.php");
        exit();
    } else {
        // Display errors if any
        foreach ($errors as $field => $error) {
            echo "<p style='color:red;'>{$error}</p>";
        }
    }
}

