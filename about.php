<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .cart-button,
        .nav-link {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 10px;
        }

        .about-container,
        .contacts-container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-gallery {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .product-gallery img {
            width: 200px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 0 10px;
        }

        footer {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 10px 0;
            bottom: 0;
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
    <title>About Us</title>
</head>

<body>
    <header>
        <a href="./home.php"><img src="./resourses/logo-preview.png" alt="drivesphere-logo" class="logo"></a>
        <h1>DriveSphere</h1>
        <nav>
            <ul>
                <li><a href="./products.php">Products</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="about-container">
        <h2>About Us</h2>
        <p>Welcome to Car Accessories Store, your ultimate destination for premium car accessories that elevate your driving experience. We take pride in offering a curated selection of high-quality products to enhance the aesthetics and functionality of your vehicle.</p>

        <p>What sets us apart:</p>
        <ul>
            <li>Wide Range: Explore our extensive collection of car skins, window tints, tires, and air fresheners.</li>
            <li>Quality Assurance: We source products from reputable manufacturers to ensure durability and performance.</li>
            <li>Customer Satisfaction: Your satisfaction is our priority. We strive to provide excellent service and top-notch products.</li>
        </ul>

        <h3>Our Products</h3>
        <p>Take a look at some of our featured products:</p>

        <div class="product-gallery">
            <img src="./resourses/skin-home.png" alt="Car Skin">
            <img src="./resourses/tint-home.png" alt="Window Tint">
            <img src="./resourses/tires-home.png" alt="Car Tire">
            <img src="./resourses/freshner-home.png" alt="Air Freshener">
        </div>
    </section>

    <footer>
        <p>&copy; 2023 DriveSphere. All rights reserved.</p>
    </footer>
</body>

</html>
