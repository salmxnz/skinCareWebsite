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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

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

    <!-- ============ NAVBAR Script ============ -->
    <script src="assets/js/navbarToggle.js"></script>
  </head>
  <body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="index.php" class="nav_logo">
          <i class="bx bxs-shopping-bag nav_logo-icon"></i> SkinCare
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

      <main>
          <section class="cartpage">
              <h2 class="cartpage__title-center">My Cart</h2>
              <div class="cartpage__container">
                  <article class="cartpage__card">
                      <div class="cartpage__box">
                          <img src="https://socialitebeauty.ca/cdn/shop/files/rdn-niacinamide-10pct-zinc-1pct-120ml.png?v=1695414968" alt="Niacinamide" class="cartpage__img">
                      </div>
                      <div class="cartpage__details">
                          <h3 class="cartpage__title">Niacinamide</h3>
                          <span class="cartpage__price">$5.99</span>
                          <div class="cartpage__amount">
                              <div class="cartpage__amount-content">
                                  <span class="cartpage__amount-box">
                                      <i class="bx bx-minus"></i>
                                  </span>
                                  <span class="cartpage__amount-number">1</span>
                                  <span class="cartpage__amount-box">
                                      <i class="bx bx-plus"></i>
                                  </span>
                              </div>
                              <i class="bx bx-trash-alt cartpage__amount-trash"></i>
                          </div>
                      </div>
                  </article>
                  <article class="cartpage__card">
                      <div class="cartpage__box">
                          <img src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwa8c028f4/Images/products/The%20Ordinary/rdn-retinol-1pct-in-squalane-30ml.png?sw=900&sh=900&sm=fit" alt="Retinol" class="cartpage__img">
                      </div>
                      <div class="cartpage__details">
                          <h3 class="cartpage__title">Retinol</h3>
                          <span class="cartpage__price">$8.99</span>
                          <div class="cartpage__amount">
                              <div class="cartpage__amount-content">
                                  <span class="cartpage__amount-box">
                                      <i class="bx bx-minus"></i>
                                  </span>
                                  <span class="cartpage__amount-number">1</span>
                                  <span class="cartpage__amount-box">
                                      <i class="bx bx-plus"></i>
                                  </span>
                              </div>
                              <i class="bx bx-trash-alt cartpage__amount-trash"></i>
                          </div>
                      </div>
                  </article>
              </div>
            </div>
            <div class="cartpage__summary">
                <h3 class="cartpage__summary-title">Summary</h3>
                <div class="cartpage__summary-item">
                    <span>Subtotal:</span>
                    <span class="cartpage__summary-subtotal">$14.98</span>
                </div>
                <div class="cartpage__summary-item">
                    <span>Shipping:</span>
                    <span class="cartpage__summary-shipping">$5.00</span>
                </div>
                <div class="cartpage__summary-item">
                    <span>Estimated Total:</span>
                    <span class="cartpage__summary-total">$19.98</span>
                </div>
                <div class="cartpage__discount">
                  <label for="discount-code">Discount Code:</label>
                  <input type="text" id="discount-code" name="discount-code" placeholder="Enter discount code">
                  <button class="cartpage__apply-button" onclick="applyDiscount()">Apply</button>
                </div>

                <a href="checkout.php" class="cartpage__checkout-button">Proceed to Checkout</a>
            </div>
        </section>
    </main>

  

<!--=============== YOU MAY ALSO LIKE ===============-->

<section class="new section">
  <h2 class="section__title">You may also like</h2>

  <!-- Swiper Container -->
  <div class="swiper new-swiper container">
    <div class="swiper-wrapper">
      <!-- Product 1 -->
      <div class="swiper-slide">
        <div class="new__content">
          <div class="new__tag">New</div>
          <img src="https://www.laroche-posay.sg/-/media/project/loreal/brand-sites/lrp/apac/sg/products/effaclar/effaclar-ai/la-roche-posay-face-care-effaclar-ai-targeted-imperfection-corrector-15ml-3433422406704-front.png?cx=0.49&amp;ch=600&amp;cy=0.66&amp;cw=600&hash=C60123AB5D3DC69CBE3B0A2D39223B4F" alt="Effaclar Corrector" class="new__img" />
          <h3 class="new__title">Effaclar AI Corrector</h3>
          <span class="new__subtitle">Face Care</span>
          <div class="new__prices">
            <span class="new__price">$15.99</span>
            <span class="new__discount">$20.99</span>
          </div>
          <a href="details.php" class="new__button">
            <i class="bx bx-cart-alt new__icon"></i>
          </a>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="swiper-slide">
        <div class="new__content">
          <div class="new__tag">New</div>
          <img src="https://socialitebeauty.ca/cdn/shop/files/rdn-niacinamide-10pct-zinc-1pct-120ml.png?v=1695414968" alt="Niacinamide Serum" class="new__img" />
          <h3 class="new__title">Niacinamide 10% + Zinc 1%</h3>
          <span class="new__subtitle">Skin Care</span>
          <div class="new__prices">
            <span class="new__price">$5.99</span>
            <span class="new__discount">$8.99</span>
          </div>
          <a href="details.php" class="new__button">
            <i class="bx bx-cart-alt new__icon"></i>
          </a>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="swiper-slide">
        <div class="new__content">
          <div class="new__tag">New</div>
          <img src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwa8c028f4/Images/products/The%20Ordinary/rdn-retinol-1pct-in-squalane-30ml.png?sw=900&sh=900&sm=fit" alt="Retinol 1%" class="new__img" />
          <h3 class="new__title">Retinol 1% in Squalane</h3>
          <span class="new__subtitle">Skin Care</span>
          <div class="new__prices">
            <span class="new__price">$8.99</span>
            <span class="new__discount">$10.99</span>
          </div>
          <a href="details.php" class="new__button">
            <i class="bx bx-cart-alt new__icon"></i>
          </a>
        </div>
      </div>

      <!-- Product 4 -->
      <div class="swiper-slide">
        <div class="new__content">
          <div class="new__tag">New</div>
          <img src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dw711cec9a/Images/products/The%20Ordinary/rdn-azelaic-acid-suspension-10pct-30ml.png?sw=1200&sh=1200&sm=fit" alt="Innisfree Green Tea" class="new__img" />
          <h3 class="new__title">Azelaic Acid Suspension 10%</h3>
          <span class="new__subtitle">Face Care</span>
          <div class="new__prices">
            <span class="new__price">$18.99</span>
            <span class="new__discount">$22.99</span>
          </div>
          <a href="details.php" class="new__button">
            <i class="bx bx-cart-alt new__icon"></i>
          </a>
        </div>
      </div>

      <!-- Product 5 -->
      <div class="swiper-slide">
        <div class="new__content">
          <div class="new__tag">New</div>
          <img src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dw8b57fa2b/Images/products/The%20Ordinary/ord-glyc-acid-7pct-100ml-Aug-UPC.png?sw=1200&sh=1200&sm=fit" alt="Glycolic Acid 7%" class="new__img" />
          <h3 class="new__title">Glycolic Acid 7% Toning Solution</h3>
          <span class="new__subtitle">Skin Care</span>
          <div class="new__prices">
            <span class="new__price">$8.99</span>
            <span class="new__discount">$12.99</span>
          </div>
          <a href="details.php" class="new__button">
            <i class="bx bx-cart-alt new__icon"></i>
          </a>
        </div>
      </div>

    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>

<script src="assets/js/swiper-bundle.min.js"></script>
<script>

var swiper = new Swiper(".new-swiper", {
slidesPerView: 1,       // Adjust number of visible slides
spaceBetween: 10,       // Space between slides
loop: true,             // Enable continuous loop
navigation: {
nextEl: ".swiper-button-next",   // Right arrow
prevEl: ".swiper-button-prev",   // Left arrow
},
breakpoints: {
640: {
  slidesPerView: 2,    // Two slides on medium screens
},
1024: {
  slidesPerView: 3,    // Three slides on large screens
},
},
});
</script>

    <!--=============== LOGIN ===============-->
    <div class="login" id="login">
        
    </div>

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== CART ===============-->
        <section class="cart__page section container">
            
        </section>
    </main>

    <!--=============== FOOTER ===============-->
   <footer class="footer section">
  <div class="footer__container container">

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


    <!--=============== SCROLL UP ===============-->

    <!--=============== STYLE SWITCHER ===============-->
    
    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== JS ===============-->
    <script src="assets/js/main.js"></script>



    
</body>
</html>
