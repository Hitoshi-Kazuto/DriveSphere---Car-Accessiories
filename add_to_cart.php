<?php
session_start();
// Function to add a product to the cart
function addToCart($productID) {
    // Check if the product ID is valid
    // Include your database connection file if needed
    include("./db_connection.php");

    $sql = "SELECT * FROM Products WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Add the product to the cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Increment quantity or set to 1 if not in the cart
        if (isset($_SESSION['cart'][$productID])) {
            $_SESSION['cart'][$productID]++;
        } else {
            $_SESSION['cart'][$productID] = 1;
        }
        $conn->close();
        // Redirect back to the previous page or the product details page
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
        
    } else {
        // Product not found
        echo '<p>Product not found.</p>';
    }

    $stmt->close();
    // Close the database connection if needed
    //$conn->close();
}

// Check if the add to cart button is clicked
if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $productID = $_POST['product_id'];
    addToCart($productID);
} else {
    // If the form is not submitted properly, handle it accordingly
    echo '<p>Error in form submission.</p>';
}
?>
