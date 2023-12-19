<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Products - Car Accessories Store</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
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

        .products-container {
            max-width: 1200px;
            margin: 10px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product-card {
            width: 25%;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            height: auto;
        }

        .product-details {
            padding: 10px;
        }

        .product-details h3 {
            margin: 0;
        }

        .product-details p {
            margin-top: 10px;
        }

        .footer {
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
        <a href="./home.php"><img src="./resourses/logo-preview.png" alt="drivesphere-logo" class="logo"></a>
        <h1>DriveSphere</h1>
        <nav>
            <ul>
                <li><a href="./about.php">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
            <a href="view_cart.php" class="cart-button"><img src="./resourses/cart.png" alt="cart-logo"></a>
        </nav>
    </header>

    <section class="products-container">
    <?php
        // Include your database connection file
        include("db_connection.php");

        // Fetch products from the database
        $sql = "SELECT * FROM Products";
        $result = $conn->query($sql);

        // Display products
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-card">';
            echo '<img src="' . $row['ImageURL'] . '" alt="' . $row['ProductName'] . '">';
            echo '<div class="product-details">';
            echo '<h3>' . $row['ProductName'] . '</h3>';
            echo '<p>' . $row['Description'] . '</p>';
            echo '<a href="./get_product_details.php?product_id= '.$row['ProductID'].'" class="button">View Details</a>';
            echo '</div>';
            echo '</div>';
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
