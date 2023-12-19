<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login - Car Accessories Store</title>
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

        .login-container {
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

        .register-link a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        button:hover {
            background-color: #555;
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: #333;
            text-decoration: none;
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

    <section class="login-container">
        <h2>Login</h2>
        <form action="./home.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p class="forgot-password"><a href="#">Forgot Password?</a></p>
        <p class="register-link">Don't have an account? <a href="./register.php">Register here</a></p>
    </section>

    <footer>
        <p>&copy; 2023 DriveSphere. All rights reserved.</p>
    </footer>
</body>

</html>

<?php
// Include your database connection file
include("db_connection.php");

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize login form data
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Your login validation logic (check username and password against the database)
    $sql = "SELECT UserID FROM Users WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, set the userID in the session
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['UserID'];

        // Redirect to the home page or another page after successful login
        header("Location: home.php");
        exit();
    } else {
        // Invalid login credentials, handle accordingly (e.g., display an error message)
        echo '<p>Invalid username or password.</p>';
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>