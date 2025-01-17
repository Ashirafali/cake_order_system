<?php
session_start();
include 'backend/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Vivicious Cakes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">vivicious</span>CAKE</h1>
            </div>
            <nav>
                <ul>
                    <li class="current"><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="cart.php">CART</a></li>
                    <li><a href="./frontend/login.php">LOGIN</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="showcase">
        <div class="container">
           <!--here must be be heading(<h1>welcome to vivicious cake) -->
            <p>Every single cake and biscuit we sell is hand-made and baked in small batches in our Cambridgeshire bakery. We do not use any mixes – everything is made from scratch using only natural ingredients.</p>
        </div>
    </section>

    <section id="products" class="product-section">
        <div class="container">
            <!--here must be be heading(<h3>our product) -->
            <div class="product-grid">
            <div class="box">
                <img src="image/cake1.jpg" alt="Cupcake" class="product-image">
                <h3>Cupcake</h3>
                <p>Delicious hand-made cupcake.</p>
                <p class="price">40000</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="box">
                <img src="image/cake1.jpg" alt="Cupcake" class="product-image">
                <h3>Cupcake</h3>
                <p>Delicious hand-made cupcake.</p>
                <p class="price">40000</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="box">
                <img src="image/cake1.jpg" alt="Cupcake" class="product-image">
                <h3>Cupcake</h3>
                <p>Delicious hand-made cupcake.</p>
                <p class="price">40000</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="box">
                <img src="image/cake1.jpg" alt="Cupcake" class="product-image">
                <h3>Cupcake</h3>
                <p>Delicious hand-made cupcake.</p>
                <p class="price">40000</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="box">
                <img src="image/cake1.jpg" alt="Cupcake" class="product-image">
                <h3>Cupcake</h3>
                <p>Delicious hand-made cupcake.</p>
                <p class="price">40000</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="box">
                <img src="image/cake1.jpg" alt="Cupcake" class="product-image">
                <h3>Cupcake</h3>
                <p>Delicious hand-made cupcake.</p>
                <p class="price">40000</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="box">
                <img src="image/cake1.jpg" alt="Cupcake" class="product-image">
                <h3>Cupcake</h3>
                <p>Delicious hand-made cupcake.</p>
                <p class="price">40000</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="box">
                <img src="image/cake1.jpg" alt="Cupcake" class="product-image">
                <h3>Cupcake</h3>
                <p>Delicious hand-made cupcake.</p>
                <p class="price">40000</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="box">
                <img src="image/cake1.jpg" alt="Cupcake" class="product-image">
                <h3>Cupcake</h3>
                <p>Delicious hand-made cupcake.</p>
                <p class="price">40000</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
    </section>

    <section id="cart-section" class="cart-section">
        <div class="container">
            <div class="cart-box">
                <h2>Your Cart</h2>
                <div id="cart-items"></div>
                <button id="checkout" class="add-to-cart">Checkout</button>
            </div>
            <div class="cart-box">
                <h2>Subscribe to Our Newsletter</h2>
                <input type="email" placeholder="Enter your email" />
                <button>Subscribe</button>
            </div>
            <div class="cart-box">
                <h2>What Customers Say</h2>
                <p>"The best cupcakes I've ever had!" - Jane D.</p>
                <p>"Absolutely delicious and beautifully crafted!" - John S.</p>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="container">
            <div class="contact-info">
                <img src="image/shopcase.jpg" alt="logo" class="contact-image">
                <div class="contact-details">
                    <h1 class="page-title">Vivicious's Bakery Contact Details</h1>
                    <p class="dark">Opening: MONDAY-SUNDAY</p>
                    <h3>Contact Us via</h3>
                    <p>Phone: 225</p>
                    <p>Phone: 225</p>
                    <p>Email: <a href="mailto:vivicious@gmail.com">vivicious@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
    

    <footer>
        <p>viviciousbaker, Copyright &copy; 2024</p>
    </footer>

    <script>
        const buttons = document.querySelectorAll('.add-to-cart');
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                alert('Item added to cart!');
            });
        });
    </script> 
</body>
</html>


