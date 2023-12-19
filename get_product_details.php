<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Product Details - Car Accessories Store</title>
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

        .product-details-container {
            max-width: 800px;
            margin: 20px auto;
            display: flex;
        }

        .product-details-card {
            flex: 1;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        .product-details-card img.product-image {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .details {
            flex: 1;
            padding: 20px;
        }

        .details h2 {
            margin-top: 0;
            color: #333;
        }

        .details p {
            color: #666;
        }

        .footer {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
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
            <a href="view_cart.php" class="cart-button"><img src="./resourses/cart.png" alt="cart-logo"></a>
        </nav>
    </header>

    <section class="product-details-container">
    <?php
        session_start();
        // Include your database connection file
        include("db_connection.php");

        // Check if a product ID is provided in the URL
        if (isset($_GET['product_id'])) {
            $productID = $_GET['product_id'];
            

            // Fetch product details from the database
            $sql = "SELECT * FROM Products WHERE ProductID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $productID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Display product details in an alternative way
                echo '<div class="product-details-container">';
                echo '<div class="product-details-card">';
                echo '<img src="' . $row['ImageURL'] . '" alt="' . $row['ProductName'] . '" class="product-image">';
                echo '</div>';
                echo '<div class="details">';
                echo '<h2>' . $row['ProductName'] . '</h2>';
                echo '<p>' . $row['Description'] . '</p>';
                echo '<p><strong>Price:</strong> ₹' . $row['Price'] . '</p>';
                echo '<p><strong>Ratings:</strong> ' . $row['Rating'] . '</p>';

                echo '<form action="add_to_cart.php" method="post">';
                echo '<input type="hidden" name="product_id" value="' . $productID . '">';
                echo '<input type="submit" name = "add_to_cart" value="Add to Cart" class="button">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            } else {
                // Product not found
                echo '<p>Product not found.</p>';
            }

            $stmt->close();
        } else {
            // No product ID provided
            echo '<p>No product ID provided.</p>';
        }

        // Close the database connection
        $conn->close();
    ?>

    </section>

    <footer>
        <p>&copy; 2023 DriveSphere. All rights reserved.</p>
    </footer>
</body>

</html>
