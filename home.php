

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveSphere</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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

        .hero {
            background: url('./resourses/hero-image.png') center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 100px 0;
            font-family: Dodger;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .featured-products {
            padding: 50px 20px;
            text-align: center;
            background-color: #f5f5f5;
        }

        .product-card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .product-card img {
            max-width: 500px;
            height: auto;
            margin-bottom: 10px;
        }

        footer {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 10px 0;
            bottom: 0;
            width: 100%;
        }

        .button-27 {
        appearance: none;
        background-color: #000000;
        border: 2px solid #1A1A1A;
        border-radius: 15px;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        align-items: end;
        font-family: Dodger-B;
        font-size: 16px;
        font-weight: 600;
        line-height: normal;
        margin: 0;
        min-height: 20px;
        min-width: 0;
        outline: none;
        padding: 16px 24px;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 150px;
        will-change: transform;
        }

        .button-27:disabled {
        pointer-events: none;
        }

        .button-27:hover {
        box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
        transform: translateY(-2px);
        }

        .button-27:active {
        box-shadow: none;
        transform: translateY(0);
        }

        .dropbtn {
        background-color: #000;
        color: white;
        padding: 16px;
        font-size: 16px;
        font-family: Dodger;
        border: none;
        }

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        font-family: Dodger;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #000;}

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
        <div class="dropdown">
                    <button class="dropbtn btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @user
                    </button>
                    <div class="dropdown-content" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="./view_cart.php">My Cart</a>
                        <a class="dropdown-item" href="./index.php">Logout</a>
                    </div>
                </div>
    </header>

    <section class="hero">
        <h2>Upgrade Your Ride with Premium Car Accessories</h2>
        <p>Explore our wide range of high-quality accessories including skins, window tints, tires, and air fresheners.</p>
        <a href="./products.php" class="button">Shop Now</a>
    </section>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <!-- Featured product cards can be added here -->
        <div class="product-card">
            <img src="./resourses/skin-home.png" alt="Product 1" >
            <h3>Custom Car Skins</h3>
            <p>Transform your vehicle with our premium custom car skins.</p>
        </div>

        <div class="product-card">
            <img src="./resourses/tint-home.png" alt="Product 2" >
            <h3>High-Quality Window Tints</h3>
            <p>Enhance privacy and style with our top-notch window tint films.</p>
        </div>

        <div class="product-card">
            <img src="./resourses/tires-home.png" alt="Product 3" >
            <h3>High-Quality Tires</h3>
            <p>Explore our selection of top-notch tires for a smooth and safe ride.</p>
        </div>
        <!-- Add more featured product cards as needed -->
    </section>

    <footer>
        <p>&copy; 2023 DriveSphere. All rights reserved.</p>
    </footer>
</body>
</html>


