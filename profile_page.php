<?php
// Start the session
session_start();

// Include your database connection file
include("db_connection.php");

// Retrieve user details from the database
$userID = 0;
$sql = "SELECT * FROM Users WHERE UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userDetails = $result->fetch_assoc();
} else {
    // Redirect to a default page or handle accordingly if user details are not found
    header("Location: default_page.php");
    exit();
}

// Close the database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (your head section) ... -->
</head>

<body>
    <!-- ... (your header section) ... -->

    <section class="profile-container">
        <h2>User Profile</h2>
        <form action="update_profile.php" method="post">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $userDetails['FirstName']; ?>" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?php echo $userDetails['Address']; ?></textarea>

            <!-- Add more fields as needed -->

            <input type="submit" value="Update Profile">
        </form>
    </section>

    <!-- ... (your footer section) ... -->
</body>

</html>
