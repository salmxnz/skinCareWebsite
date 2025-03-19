<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skin Care Website</title>

    <!--=============== BOXICONS ===============-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />

    <!--=============== SWIPER CSS ===============-->
   <!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- ============ CSS ============ -->

    <link rel="stylesheet" href="assets/css/styles2.css" />
    <link rel="stylesheet" href="assets/css/colors/color-1.css" />
    <link rel="stylesheet" href="assets/css/stylesMobile.css" />
    <link rel="stylesheet" href="assets/css/newArrivals.css" />
    <link rel="stylesheet" href="assets/css/login.css">


    <!-- ============ NAVBAR Script ============ -->
    <script src="assets/js/navbarToggle.js"></script>
  </head>
  <body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="index.php" class="nav_logo">
          <i class="bx bxs-shopping-bag nav_logo-icon"></i> aura+
        </a>

        <div class="nav__menu">
          <ul class="nav_list">
            <li class="nav_item">
              <a href="index.php" class="nav__link ">Home</a>
            </li>

            <li class="nav-item dropdown nav_item">
       
              <a class="nav__link dropdown-toggle" href="shop.php" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                Products
              </a>
              <div class="nav__link dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="nav__link dropdown-item" href="skincare.php">Skin Care</a>
                <a class="nav__link dropdown-item" href="haircare.php">Hair Care</a>
                <a class="nav__link dropdown-item" href="nailcare.php">Nail Care</a>
                <a class="nav__link dropdown-item" href="mencare.php">Men's Care</a>
              </div>
            </li>
            

            <li class="nav_item">
              <a href="contact.php" class="nav__link">Contact</a>
            </li>

            <li class="nav_item">
              <a href="faq.php" class="nav__link">FAQ</a>
            </li>

          </ul>
        </div>

      <div class="nav__btns">
          <div class="login_toggle" id="login-toggle">
            <a href="login.php" class="nav__link">
              <i
              class="bx bx-user"
              onmouseover="this.className='bx bxs-user'"
              onmouseout="this.className='bx bx-user'"
            ></i>
           </a>
          </div>


          <div class="nav_shop" id="cart-shop">
            <i class="bx bxs-shopping-bag"></i>
          </div>


                <!-- Hamburger Menu for Mobile -->
      <div class="nav_toggle" id="nav-toggle">
        <i class="bx bx-grid-alt"></i>
      </div>
          </div>
        </div>
      </nav>
    </header>
    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="login__page section container">
            <h2 class="login__title">Login to Your Account</h2>
            <form class="login__form">
                <div class="login__form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="login__form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login__button">Login</button>
            </form>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer section">
  
        <div class="footer__container container">
          <div class="footer__links">
            <h3 class="footer__title">Quick Links</h3>
            <ul class="footer__list">
              <li><a href="index.php" class="footer__link">Home</a></li>
              <li><a href="shop.php" class="footer__link">Shop</a></li>
              <li><a href="contact.php" class="footer__link">Contact</a></li>
              <li><a href="faq.php" class="footer__link">FAQ</a></li>
            </ul>
          </div>
      
          <div class="footer__customer-service">
            <h3 class="footer__title">Customer Service</h3>
            <ul class="footer__list">
              <li><a href="return-policy.php" class="footer__link">Return Policy</a></li>
              <li><a href="shipping-info.php" class="footer__link">Shipping Information</a></li>
              <li><a href="privacy-policy.php" class="footer__link">Privacy Policy</a></li>
              <li><a href="terms.php" class="footer__link">Terms of Service</a></li>
            </ul>
          </div>
      
          <div class="footer__social-media">
            <h3 class="footer__title">Follow Us</h3>
            <div class="footer__social-icons">
              <a href="https://www.facebook.com" target="_blank" class="footer__social-link">
                <i class="bx bxl-facebook"></i>
              </a>
              <a href="https://www.instagram.com" target="_blank" class="footer__social-link">
                <i class="bx bxl-instagram"></i>
              </a>
              <a href="https://www.twitter.com" target="_blank" class="footer__social-link">
                <i class="bx bxl-twitter"></i>
              </a>
              <a href="https://www.linkedin.com" target="_blank" class="footer__social-link">
                <i class="bx bxl-linkedin"></i>
              </a>
            </div>
          </div>
          
        </div>
      
        <div class="footer__bottom">
          <p>&copy; 2024 aura+. All rights reserved.</p>
        </div>
      </footer>
      
</body>
</html>