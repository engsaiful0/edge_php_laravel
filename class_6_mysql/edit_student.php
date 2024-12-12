<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validation.js" defer></script>
    <style>
        .form-container {
            /* background-color: brown;min-height: 200px; */
        }

        #username {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <?php
    include 'db_connection.php';

    // Get the student ID from the URL
    $id = $_GET['id'];

    // SQL query to retrieve the student data
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    // Check if the student exists
    if ($student) {
    ?>
        <div class="form-container">
            <h2>Edit Student</h2>
            <form action="edit_student_save.php" method="post" id="editRegistrationForm">
                <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $student['username']; ?>" placeholder="Enter your username">
                    <small class="error-message" id="usernameError"></small>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" placeholder="Enter your email">
                    <small class="error-message" id="emailError"></small>
                </div>

                <div class="form-group">
                    <label for="password">Password (leave blank to keep current password):</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                    <small class="error-message" id="passwordError"></small>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password">
                    <small class="error-message" id="confirmPasswordError"></small>
                </div>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    <?php
    } else {
        echo "Student not found.";
    }

    // Close the database connection
    $connection->close();
    ?>
</body>

</html>