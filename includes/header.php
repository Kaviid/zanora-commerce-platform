<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>

  <link rel="stylesheet" href="css/header.css">

</head>
<body>
  <div class="container">
    <header class="header">

      <div class="header-top">

        <a class="logo-div" href="index.php">
          <img class="zanora-logo" src="images/Zanora-logo.png">
        </a>

        <div class="middle-section">
          <input class="search-bar" type="text" placeholder="Search for anything">
        </div>

        <div class="user-actions">

          <div  class="currency">USD</div>

          <a class="sign-in-button" href="login.php">
            <img class="login-img" src="icons/login.png">
            <p class="sign-in-text">
              Sign In
            </p>
          </a>

          <a class="cart-button" href="cart.html">
            <img class="shopping-cart-img" src="icons/shopping-cart.png">
            <p class="cart-text">
              Cart
            </p>
          </a>

        </div>
      </div>

      <div class="header-bottom">
        <div class="category-dropdown">
          <button class="all-categories-btn">All Categories</button>

          <ul class="category-popup">
            <a class="category-a" href="shop.html?category=all"><li>All</li></a>
            <a class="category-a" href="shop.html?category=jewelry"><li>Jewelry</li></a>
            <a class="category-a" href="shop.html?category=bags"><li>Bags</li></a>
            <a class="category-a" href="shop.html?category=clothing"><li>Clothing</li></a>
            <a class="category-a" href="shop.html?category=accessories"><li>Accessories</li></a>
          </ul>
        </div>

        <nav class="navigations">
          <a class="home-a" href="index.php">
            Home
          </a>

          <a class="super-deals-a" href="super-deals.html">
            Super Deals
          </a>

          <a class="shop-a" href="shop.html?category=all">
            Shop
          </a>

          <a class="about-us-a" href="about-us.html">
            About Us
          </a>

          <a class="contact-us-a" href="contact-us.html">
            Contact Us
          </a>
        </nav>
      </div>
    </header>
  </div>
</body>
</html>