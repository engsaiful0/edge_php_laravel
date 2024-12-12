<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validation.js" defer></script>
    <style>
        .form-container
        {
            /* background-color: brown;min-height: 200px; */
        }
        #username
        {
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="../jquery_form_validation/css/screen.css">
	<script src="../jquery_form_validation/lib/jquery.js"></script>
	<script src="../jquery_form_validation/dist/jquery.validate.js"></script>
	<script>
	

	$().ready(function() {
		// validate signup form on keyup and submit
		$("#studentRegistraionForm").validate({
			rules: {
				// firstname: "required",
				// lastname: "required",
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirmPassword: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				// topic: {
				// 	required: "#newsletter:checked",
				// 	minlength: 2
				// },
				// agree: "required"
			},
			messages: {
				// firstname: "Please enter your firstname",
				// lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirmPassword: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				// agree: "Please accept our policy",
				// topic: "Please select at least 2 topics"
			}
		});
	});
	</script>
</head>
<body>
    <div class="form-container">
        <h2>Register Here</h2>
        <form id="studentRegistraionForm">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
                <small class="error-message" id="usernameError"></small>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <small class="error-message" id="emailError"></small>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <small class="error-message" id="passwordError"></small>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password">
                <small class="error-message" id="confirmPasswordError"></small>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
    <!-- <div class="form-container">

    </div> -->
</body>
</html>
