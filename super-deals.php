<?php
session_start();
include 'includes/header.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Super Deals</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/super-deals/super-deals.css">
    <link rel="stylesheet" href="css/super-deals/cart.css">
  </head>

  <body>
    <div class="container">

      <div class="items-container" id="items-container">
        <!---Render by js--->
      </div>

    </div>

    <div class="footer"> <!-- Footer -->
      <div class="inner-top">
        <h2 class="subscribe-title">Subscribe to our email newsletter and get 20% off</h2>
        <p class="subscribe-description">Join our community and be the first to discover new handmade collections, exclusive offers, and special drops.</p>
        
        <form class="subscribe-entire-bar">
          <input type="email" placeholder="Enter your email" class="email-enter-section" required>
          <button type="submit" class="subscribe-button">Subscribe</button>
        </form>
      </div>

      <div class="inner-bottom">
        <div class="top">
          <div class="one"> <!---1st row div--->
            <a href="#"> <!---Footer Zanora logo with href--->
              <img src="images/Zanora-logo-footer.png" alt="Logo" class="logo">
            </a>
            <div class="socials"> <!---Footer socials icons with inside a tags with href--->
              <a href="#">
                <img src="icons/facebook.png" alt="Facebook" class="socials-logos">
              </a>
              <a href="#">
                <img src="icons/twitter.png" alt="Facebook" class="socials-logos">
              </a>
              <a href="#">
                <img src="icons/instagram.png" alt="Facebook" class="socials-logos">
              </a>
              <a href="#">
                <img src="icons/tiktok.png" alt="Facebook" class="socials-logos">
              </a>
            </div>
          </div>
          <div class="two"> <!---2nd row div--->
            <h3>Pages</h3>
            <div>
              <a href="index.html">Home</a>
              <a href="shop.html">Shop</a>
              <a href="#">My Profile</a> 
            </div>

          </div>
          <div class="three"> <!---3rd row div--->
            <h3>Customer Service</h3>
            <div>
              <a href="about-us.html">Abouth us</a>
              <a href="contact-us.html">Contact us</a>
            </div>
          </div>
          <div class="four"> <!---4th row div--->
            <h3>Pay with</h3>
            <div class="payment-methods-icons">
              <a href="#" class="visa">
                <img src="icons/visa.png" class="methods">
              </a>
              <a href="#" class="paypal">
                <img src="icons/paypal.png" class="methods">
              </a>
              <a href="#" class="payoneer">
                <img src="icons/payoneer.png" class="methods">
              </a>
              <a href="#" class="master">
                <img src="icons/master.png" class="methods">
              </a>
              <a href="#" class="bitcoin">
                <img src="icons/bitcoin.png" class="methods">
              </a>
            </div>
          </div>
        </div>

        <div class="bottom">
          <span>© 2026 Zanora. All Rights  Reserved</span>
          <div class="right-coner">
            <a href="#">Terms & Conditions</a>
            <a href="#">Cookies</a>
            <a href="#">Privacy Policy</a>
          </div>
        </div>
      </div>
    </div> <!-- Footer end -->

    <script src="js/header.js"></script>
    <script type="module" src="js/super-deals/carts-render.js"></script>
  </body>
</html>