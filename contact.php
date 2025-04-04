<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />

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
    <link rel="stylesheet" href="assets/css/contact.css" />

    <!-- ============ NAVBAR Script ============ -->
    <script src="assets/js/navbarToggle.js"></script>
    <title>Responsive e-commerce website - Crypticalcoder</title>
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
              <a href="index.php" class="nav__link">Home</a>
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
              <a href="contact.php" class="nav__link active-link">Contact</a>
            </li>

            <li class="nav_item">
              <a href="faq.php" class="nav__link">FAQ</a>
            </li>

          </ul>
        </div>

        <div class="nav__btns">
          <div class="login_toggle" id="login-toggle">
            <i
              class="bx bx-user"
              onmouseover="this.className='bx bxs-user'"
              onmouseout="this.className='bx bx-user'"
            ></i>
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

    <!--=============== CART ===============-->
    <div class="cart" id="cart">
      <i class="bx bx-x cart__close"></i>
      <h2 class="cart__title-center">My Cart</h2>
      <div class="cart__container">
        <article class="cart__card">
          <div class="cart__box">
            <img src="https://socialitebeauty.ca/cdn/shop/files/rdn-niacinamide-10pct-zinc-1pct-120ml.png?v=1695414968" alt ="" class="cart__img">
          </div>
  
          <div class="cart__details">
            <h3 class="cart__title">Niacinamide</h3>
            <span class="cart__price">$5.99</span>
  
            <div class="cart__amount">
              <div class="cart__amount-content">
                <span class="cart__amount-box">
                  <i class="bx bx-minus"></i>
                </span>
                <span class="cart__amount-number">1</span>
                <span class="cart__amount-box">
                  <i class="bx bx-plus"></i>
                </span>
              </div>
            <i class="bx bx-trash-alt cart__amount-trash"></i>

            </div>
          </div>
  
        </article>
        <article class="cart__card">
          <div class="cart__box">
            <img src="https://tdawi.com/media/webp_image/catalog/product/cache/c02fd180406f0a5f799ad7095a14ddcd/r/d/rdn-aha-30pct-bha-2pct-peeling-solution-30ml.webp" alt ="" class="cart__img">
          </div>
  
          <div class="cart__details">
            <h3 class="cart__title">Peeling Solution</h3>
            <span class="cart__price">$7.99</span>
  
            <div class="cart__amount">
              <div class="cart__amount-content">
                <span class="cart__amount-box">
                  <i class="bx bx-minus"></i>
                </span>
                <span class="cart__amount-number">1</span>
                <span class="cart__amount-box">
                  <i class="bx bx-plus"></i>
                </span>
              </div>
            <i class="bx bx-trash-alt cart__amount-trash"></i>

            </div>
          </div>
  
        </article>
        <article class="cart__card">
          <div class="cart__box">
            <img src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwa8c028f4/Images/products/The%20Ordinary/rdn-retinol-1pct-in-squalane-30ml.png?sw=900&sh=900&sm=fit" alt ="" class="cart__img">
          </div>
  
          <div class="cart__details">
            <h3 class="cart__title">Retinol</h3>
            <span class="cart__price">$8.99</span>
  
            <div class="cart__amount">
              <div class="cart__amount-content">
                <span class="cart__amount-box">
                  <i class="bx bx-minus"></i>
                </span>
                <span class="cart__amount-number">1</span>
                <span class="cart__amount-box">
                  <i class="bx bx-plus"></i>
                </span>
              </div>
              <i class="bx bx-trash-alt cart__amount-trash"></i>
            </div>
          </div>
  
        </article>
      </div>

      <div class="cart__prices">
        <span class="cart__prices-item">2 items</span>
        <span class="cart__prices-total">$22.97</span>
      </div>

    </div>

    <!--=============== LOGIN ===============-->
    <div class="login" id="login">
        
    </div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us - GlowSkin</title>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/styles2.css">
    </head>
    <body>
        <!-- Pinterest-Style Contact Section -->
        <div class="hero-background"></div>
    
        <section class="grid-container">
            <!-- Contact Info Card -->
            <div class="grid-item contact-card">
                <h2>Contact Information</h2>
                <p>Email: <a href="mailto:info@aura+.com">info@aura+.com</a></p>
                <p>Phone: <a href="tel:+5123 4567">+5123 4567</a></p>
                <p>Address: 7, Shand Street, Beau Bassin</p>
            </div>
    
            <!-- Contact Form Card -->
            <div class="grid-item contact-form-card">
                <h2>Send Us a Message</h2>
                <form action="#" method="post">
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </section>
    
        <!-- Map Card (always at the bottom) -->
        <div class="map-container">
            <div class="map-card">
                <h2>Find Us</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.095857066885!2d57.46917052276736!3d-20.22832294236499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b9157841554316f%3A0x21eb0d1fe8499f15!2s7%20Shand%20St%2C%20Stafford%20QLD%204053%2C%20Australia!5e0!3m2!1sen!2smu!4v1728761943100!5m2!1sen!2smu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </iframe>
            </div>
        </div>
    </body>
    </html>
    
    <!--=============== FOOTER ===============-->
    <footer class="footer section">
        
    </footer>

    <!--=============== SCROLL UP ===============-->

    <!--=============== STYLE SWITCHER ===============-->
    
    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== JS ===============-->
    <script src="assets/js/main.js"></script>
</body>
</html>