<?php
// Include your database connection file
include("db_connection.php"); // Adjust the path as needed

// Initialize variables to store user input
$username = $email = $password = $confirm_password = "";
$usernameErr = $emailErr = $passwordErr = $confirm_passwordErr = $registerErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    // Validate confirm password
    if (empty($_POST["confirm_password"])) {
        $confirm_passwordErr = "Please confirm password";
    } else {
        $confirm_password = test_input($_POST["confirm_password"]);
        if ($password !== $confirm_password) {
            $confirm_passwordErr = "Passwords do not match";
        }
    }

    // If no validation errors, attempt to register
    if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($confirm_passwordErr)) {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        $stmt->execute();

        // Check if the registration was successful
        if ($stmt->affected_rows > 0) {
            // Redirect to login page or wherever you want
            header("Location: index.php");
            exit();
        } else {
            $registerErr = "Registration failed. Please try again.";
        }

        $stmt->close();
    }
}

// Function to sanitize and validate user input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Register</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    header {
        background-color: #000;
        color: white;
        padding: 10px 0;
        text-align: center;
    }

    .logo h1 {
        margin: 0;
    }

    .register-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
    }

    input {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button {
        background-color: #333;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #555;
    }

    .links {
        text-align: center;
        margin-top: 15px;
    }

    .login-link {
        margin: 10px 0;
    }

    .login-link a {
        color: #333;
        text-decoration: none;
        font-weight: bold;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    footer {
        background-color: #000;
        color: white;
        text-align: center;
        padding: 10px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>
<header>
        <a href="./index.php"><img src="./resourses/logo-preview.png" alt="drivesphere-logo" class="logo"></a>
        <h1>DriveSphere</h1>
    </header>

    <section class="register-container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>">
            <span class="error"><?php echo $usernameErr; ?></span>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr; ?></span>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span class="error"><?php echo $passwordErr; ?></span>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <span class="error"><?php echo $confirm_passwordErr; ?></span>

            <button type="submit">Register</button>
            <span class="error"><?php echo $registerErr; ?></span>
        </form>
        <div class="links">
            <p class="login-link">Already have an account? <a href="./index.php">Login here</a></p>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 DriveSphere. All rights reserved.</p>
    </footer>
</body>

</html>
