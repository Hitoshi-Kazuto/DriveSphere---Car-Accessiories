<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_cart.css">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            height: 75px;
            background-color: #000;
            color: white;
            padding: 10px 0;
            display: flex;
            text-align: justify;
            align-items: center;
            justify-content:left;
        }

        .logo{
            height: 120px;
            width: 120px;
            margin-left: 25px;
        }

        h1{
            margin: 10px;
            margin-right: 15%;
            font-family: Dodger;
        }

        nav{
            display: flex;
            text-align: justify;
            align-items: center;
            justify-content:right;
        }

        nav ul {
            list-style: none;
            justify-content: right;
            align-items: end;
            font-family: Dodger-S;
            font-size: 16px;
            font-weight: 600;
            margin: 30px;
        }

        nav ul li {
            display: inline;
            margin: 0 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        .cart-button img{
            width: 35px;
            position: relative;
            left: 100%;
        }

        .logo h1 {
            margin: 0;
        }

        nav {
            margin-right: 20px;
        }

        .cart-container {
            max-width: 800px;
            margin: 20px auto;
        }

        .cart-item {
            display: flex;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .cart-item img {
            width: 100px;
            height: auto;
        }

        .cart-item-details {
            padding: 20px;
        }

        .cart-item-image{
            width: 200px;
        }
        .order {
            background-color: #000; /* Black background color */
            color: #fff; /* White text color */
            padding: 10px 20px; /* Adjust padding as needed */
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Add a smooth transition effect */
        }

        .order:hover {
            background-color: #333; /* Darker black on hover */
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            width: 100%;
        }
        @font-face {
            font-family: Dodger-B;
            src: url(./Fonts/Dodgv2c.ttf);
        }
        @font-face {
            font-family: Dodger-S;
            src: url(./Fonts/Dodgv2s.ttf);
        }
        @font-face {
            font-family: Dodger;
            src: url(./Fonts/Dodgv2c.ttf);
        }
    </style>
</head>

<body>
<header>
        <a href="./home.php"><img src="./resourses/logo-preview.png" alt="drivesphere-logo" class="logo"></a>
        <h1>DriveSphere</h1>
        <nav>
            <ul>
                <li><a href="./products.php">Products</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="cart-container">
        <?php
        include("./db_connection.php");
        session_start();
        // Check if the cart is not empty
        if (!empty($_SESSION['cart'])) {
            // Loop through cart items and display details
            foreach ($_SESSION['cart'] as $productID => $quantity) {
                $sql = "SELECT * FROM Products WHERE ProductID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $productID);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<div class="cart-item">';
                    echo '    <img src="' . $row['ImageURL'] . '" alt="' . $row['ProductName'] . '" class="cart-item-image">';
                    echo '    <div class="cart-item-details">';
                    echo '        <p>' . $row['ProductName'] . '</p>';
                    echo '        <p>Price: $' . $row['Price'] . '</p>';
                    echo '        <form action="view_cart.php" method="post">';
                    echo '            <input type="hidden" name="product_id" value="' . $productID . '">';
                    echo '            <label for="quantity">Quantity:</label>';
                    echo '            <input type="number" name="quantity" value="' . $quantity . '" min="1">';
                    echo '            <input type="submit" name="update_quantity" value="Update" class=" order update-button">';
                    echo '        </form>';
                    echo '    </div>';
                    echo '</div>';
                }
                    
            }
            echo '<form method="post" action="' . $_SERVER["PHP_SELF"] . '">';
            echo '<input type="submit" class = "order" name="order_now" value="Order Now">';
        } else {
            // Cart is empty
            echo '<p>Your shopping cart is empty.</p>';
        }
        ?>
    </section>

    <footer>
        <p>&copy; 2023 DriveSphere. All rights reserved.</p>
    </footer>
</body>

</html>

<?php
// Include your database connection file if needed
include("db_connection.php");

// Start the session
// Function to update the quantity of a product in the cart
function updateQuantity($productID, $quantity) {
    // Check if the product ID is valid
    global $conn;

    $sql = "SELECT * FROM Products WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Update the quantity in the cart
        if (isset($_SESSION['cart'][$productID])) {
            $_SESSION['cart'][$productID] = $quantity;
        }
    }

    $stmt->close();
}

// Check if the plus or minus button is clicked
if (isset($_POST['update_quantity']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productID = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Ensure the quantity is a positive integer
    if ($quantity > 0 && is_numeric($quantity) && floor($quantity) == $quantity) {
        updateQuantity($productID, $quantity);
    }
}

// Close the database connection
$conn->close();
?>

<?php

// Include your database connection file
include("db_connection.php");


// Check if the form is submitted (Order Now button clicked)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_now'])) {
    // Process the order and add products to the orders table

    // Calculate the total amount (you need to modify this based on your product prices)
    $totalAmount = 0;
    foreach ($_SESSION['cart'] as $productID => $quantity) {
        $sqlProduct = "SELECT Price FROM Products WHERE ProductID = ?";
        $stmtProduct = $conn->prepare($sqlProduct);
        $stmtProduct->bind_param("i", $productID);
        $stmtProduct->execute();
        $resultProduct = $stmtProduct->get_result();

        if ($resultProduct->num_rows > 0) {
            $rowProduct = $resultProduct->fetch_assoc();
            $totalAmount += $rowProduct['Price'] * $quantity;
        }

        $stmtProduct->close();
    }

    // Insert order into the orders table
    $userID = $_SESSION['UserID'];
    $orderDate = date("Y-m-d H:i:s"); // Current date and time
    $status = "Pending"; // You may update the status based on your workflow

    $sqlInsertOrder = "INSERT INTO orders (UserID, OrderDate, TotalAmount, Status) VALUES (?, ?, ?, ?)";
    $stmtInsertOrder = $conn->prepare($sqlInsertOrder);
    $stmtInsertOrder->bind_param("isds", $userID, $orderDate, $totalAmount, $status);
    $stmtInsertOrder->execute();

    // Reset the cart
    $_SESSION['cart'] = array();

    // Display a JavaScript alert
    echo '<script>alert("Order will be delivered to you in 6-7 working days. Payment to be done at the time of delivery.");</script>';
}

// Close the database connection
$conn->close();
?>

