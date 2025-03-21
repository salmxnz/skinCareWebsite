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
              <a href="index.php" class="nav__link active-link">Home</a>
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
<!--=============== HERO HEADER ===============-->
<div class="hero-header" style="background-image: url('assets/img/HeroHeader.png'); height: 400px; background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center; color: white; text-align: center; position: relative;">
  <!-- Overlay -->
  <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.25); z-index: 1;"></div>

  <div class="container" style="position: relative; z-index: 2;">
    <h1 style="font-size: 5rem; font-weight: bold; color: #fff; text-transform: lowercase;">aura+</h1>
    <p style="font-size: 1.5rem; margin-bottom: 0px; color: #fff; font-weight: 500;">Explore our range of high-quality skincare, hair care, and beauty products.</p>
  </div>
</div>




    <!--=============== CART ===============-->
    <div class="cart" id="cart">
      <i class="bx bx-x cart__close"></i>
      <h2 class="cart__title-center">My Cart</h2>
      
      <!-- Empty cart message -->
      <div class="cart__empty">
          <p class="cart__empty-message">Your cart is currently empty.</p>
          <a href="shop.php" class="cart__browse-link">Browse Products</a>
      </div>
      
      <!-- Existing cart content (hidden when empty) -->
      <div class="cart__container" style="display: none;">
          <!-- Cart items go here -->
      </div>
      
      <div class="cart__prices" style="display: all;">
          <span class="cart__prices-item">0 items</span>
          <span class="cart__prices-total">$0.00</span>
      </div>
  

      <a href="cart.php" class="cart__button">Go to Cart</a>
    </div>
  </div>


    <!--=============== LOGIN ===============-->
    <div class="login" id="login"></div>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== HOME ===============-->
      <section class="home container">
        <div class="swiper home-swiper">
          <div class="swiper-wrapper">
            <!-- HOME SWIPER -->
            <section class="swiper-slide">
              <div class="home__content grid">
                <div class="home__group">

                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
      

      <!--=============== DISCOUNT ===============-->
      <section class="discount section"></section>

      <!--=============== NEW ARRIVALS ===============-->

      <section class="new section">
        <h2 class="section__title">New Arrivals</h2>
      
        <!-- Swiper Container -->
        <div class="swiper new-arrivals-swiper container">
          <div class="swiper-wrapper">
            <!-- Product 1 -->
            <div class="swiper-slide">
              <div class="new__content">
                <div class="new__tag">New</div>
                <img src="https://cdn.sanity.io/images/4nopozul/tresemme-staging-us/ca48881ec8742e134d7a755b59ee4d8961801a94-600x600.jpg?w=768&h=660&fit=fill&auto=format&q=80&bg=fff" alt="Tresemme Keratin Smooth Shampoo" class="new__img">
                <h3 class="new__title">Tresemme Keratin Smooth Shampoo</h3>
                <span class="new__subtitle">Hair Care</span>
                <div class="new__prices">
                  <span class="new__price">$7.99</span>
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
                <img src="https://www.themancompany.com/cdn/shop/files/bathe-me-up-combo_765x.jpg?v=1710747693" alt="Bath me up combo" class="new__img">
                <h3 class="new__title">Bath Me Up Combo</h3>
                <span class="new__subtitle">Men's Care</span>
                <div class="new__prices">
                  <span class="new__price">$24.99</span>
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
                <img src="https://dependcosmetic.com/wp-content/uploads/2019/09/3345-Cuticle-Cream-F%C3%B6rpackning-768x768.jpg" alt="Cuticle Cream" class="new__img">
                <h3 class="new__title">Cuticle Cream</h3>
                <span class="new__subtitle">Nail Care</span>
                <div class="new__prices">
                  <span class="new__price">$8.99</span>
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
                <img src="https://www.sephora.com/productimages/sku/s2404846-main-zoom.jpg?pb=clean-planet-aware&imwidth=500" alt="Brightening serum" class="new__img" />
                <h3 class="new__title">Brightening Serum</h3>
                <span class="new__subtitle">Skin Care</span>
                <div class="new__prices">
                  <span class="new__price">$50.00</span>
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
                <img src="https://www.sephora.com/productimages/sku/s2671857-main-zoom.jpg?pb=allure-2023-bestofbeauty-badge&imwidth=500" alt="Rejuvenating Serum" class="new__img" />
                <h3 class="new__title">Rejuvenating Serum</h3>
                <span class="new__subtitle">Skin Care</span>
                <div class="new__prices">
                  <span class="new__price">$40.00</span>
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
      
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Swiper for New Arrivals Section
          var newArrivalsSwiper = new Swiper(".new-arrivals-swiper", {
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
        });
      </script>

<!--=============== BRANDS ===============-->
<section class="brands section">
  <h2 class="section__title">Our Featured Brands</h2>

  <!-- Bootstrap Carousel -->
  <div id="brandCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#brandCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#brandCarousel" data-slide-to="1"></li>
      <li data-target="#brandCarousel" data-slide-to="2"></li>
      <li data-target="#brandCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Carousel Inner -->
    <div class="carousel-inner">
      <!-- Brand 1 -->
      <div class="item active">
        <img src="https://www.laroche-posay.us/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-lrp-us-Library/default/dw7f8b2858/images/homepage/Hero/DRM-la-roche-posay-toleriane-face-moisturizer-hp-desktop-v2.jpg?sw=2000&h=694&sm=cut&q=70&bg=fff"  class="brand-img" />
        <div class="carousel-caption">
          <h3>La Roche-Posay</h3>
          <p>We partner with dermatologists to stay at the forefront of skincare science, pioneering cutting-edge topics like skin’s microbiome. With over 750+ studies and 25 years of extensive research, we are committed to developing safe and effective products that are dermatologist developed and tested.</p>
        </div>
      </div>

      <!-- Brand 2 -->
      <div class="item">
        <img src="https://www.kerastase-usa.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-kerastase-us-Library/default/dw644d7acb/images/kerastase-brand.jpg?sw=1480&sh=518&sm=cut&q=80" alt="Kérastase" class="brand-img"" alt="Kérastase" class="brand-img" />
        <div class="carousel-caption">
          <h3>Kérastase</h3>
          <p>Kérastase is the world’s leading luxury professional haircare brand. Born in Paris in 1964, the brand has built its reputation on delivering exceptional performance on scalp and hair through exquisite products and personalized, in-salon treatments, all powered by scientific expertise and professional knowledge. </p>
        </div>
      </div>

      <!-- Brand 3 -->
      <div class="item">
        <img src="https://cdn.builder.io/api/v1/image/assets%2F60ac0e0e125543a1b832917b7f3068b9%2Fd4a22777f8014ed488899888bb103f41?format=webp&width=2000"  alt="Olaplex" class="brand-img" />
        <div class="carousel-caption2">
          <h3>Olaplex</h3>
          <p>Repair, rebuild, and redefine your clients' curls in one salon visit with new Olaplex Bond Shaper™ Curl Rebuilding Treatment</p>
        </div>
      </div>

      <!-- Brand 4 -->
      <div class="item">
        <img src="https://theordinary.com/on/demandware.static/-/Library-Sites-DeciemSharedLibrary/default/dwf4366845/theordinary/homepage/slotE/ord-bodycare-campaign-slotE-desktop.jpg" alt="MXC Originals" class="brand-img" />
        <div class="carousel-caption3">
          <h3>The Ordinary</h3>
          <p>The Ordinary is an evolving collection of treatments offering familiar, effective clinical technologies positioned to raise pricing and communication integrity in skincare. The brand was created to celebrate integrity in its most humble and true form. Its offering is pioneering, not in the familiar technologies it uses, but in its honesty and integrity. The Ordinary is born to disallow commodity to be disguised as ingenuity. The Ordinary is "Clinical formulations with integrity".</p>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#brandCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#brandCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>

<!--=============== BEST SELLERS ===============-->
<section class="new section">
  <h2 class="section__title">Best Sellers</h2>
  
  
<!-- Swiper Container -->
       <div class="swiper best-sellers-swiper container">
        <div class="swiper-wrapper">
          <!-- Product 1 -->
          <div class="swiper-slide">
            <div class="new__content">
              <div class="new__tag">Best</div>
              <img src="https://www.sephora.com/productimages/sku/s2210607-main-zoom.jpg?imwidth=500" alt="Anti-Aging" class="new__img" />
              <h3 class="new__title">Anti-Aging Cream</h3>
              <span class="new__subtitle">Skin Care</span>
              <div class="new__prices">
                <span class="new__price">$19.99</span>
                <span class="new__discount">$30.00</span>
              </div>
              <a href="details.php" class="new__button">
                <i class="bx bx-cart-alt new__icon"></i>
              </a>
            </div>
          </div>
    
          <!-- Product 2 -->
          <div class="swiper-slide">
            <div class="new__content">
              <div class="new__tag">Best</div>
              <img src="https://www.sephora.com/productimages/sku/s2785293-main-zoom.jpg?imwidth=500" alt="Clarifying mask" class="new__img" />
              <h3 class="new__title">Clarifying Mask</h3>
              <span class="new__subtitle">Skin Care</span>
              <div class="new__prices">
                <span class="new__price">$25.99</span>
                <span class="new__discount">$35.99</span>
              </div>
              <a href="details.php" class="new__button">
                <i class="bx bx-cart-alt new__icon"></i>
              </a>
            </div>
          </div>
    
          <!-- Product 3 -->
          <div class="swiper-slide">
            <div class="new__content">
              <div class="new__tag">Best</div>
              <img src="https://www.themancompany.com/cdn/shop/products/body-care-duo-front_765x.png?v=1605566922" alt="Body Care" class="new__img" />
              <h3 class="new__title">Body Care Duo</h3>
              <span class="new__subtitle">Men's Care</span>
              <div class="new__prices">
                <span class="new__price">$7.99</span>
                <span class="new__discount">$15.99</span>
              </div>
              <a href="details.php" class="new__button">
                <i class="bx bx-cart-alt new__icon"></i>
              </a>
            </div>
          </div>
    
          <!-- Product 4 -->
          <div class="swiper-slide">
            <div class="new__content">
              <div class="new__tag">Best</div>
              <img src="https://www.themancompany.com/cdn/shop/files/1_93dbca69-bdfe-4c96-8886-c25db14eea0d_765x.jpg?v=1698300482" alt="Charcoal face wash" class="new__img" />
              <h3 class="new__title">Charcoal Fash Wash</h3>
              <span class="new__subtitle">Men's Care</span>
              <div class="new__prices">
                <span class="new__price">$6.99</span>
                <span class="new__discount">$14.99</span>
              </div>
              <a href="details.php" class="new__button">
                <i class="bx bx-cart-alt new__icon"></i>
              </a>
            </div>
          </div>
    
          <!-- Product 5 -->
          <div class="swiper-slide">
            <div class="new__content">
              <div class="new__tag">Best</div>
              <img src="https://www.sephora.com/productimages/sku/s2421360-main-zoom.jpg?imwidth=500" alt="Luxury Facial Oil" class="new__img" />
              <h3 class="new__title">Luxury Facial Oil</h3>
              <span class="new__subtitle">Skin Care</span>
              <div class="new__prices">
                <span class="new__price">$22.00</span>
                <span class="new__discount">$48.00</span>
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
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Swiper for New Arrivals Section
        var newArrivalsSwiper = new Swiper(".new-arrivals-swiper", {
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
        
        // Swiper for Best Sellers Section (if needed)
        var bestSellersSwiper = new Swiper(".best-sellers-swiper", {
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
      });
    </script>
    


       <!--=============== STEPS ===============-->
       <section class="steps section container">
        <div class="steps__bg">
          <h2 class="section__title">How to order products <br> from aura+</h2>
          <div class="steps__container grid">
           <!-- STEP CARD 1 -->
           <div class="steps__card">
            <div class="steps__card-number">01</div>
             <h3 class="steps__card-title">Choose Products</h3>
             <p class="steps__card-description">
                We have several varieties products you can choose from.
             </p>
           </div>
           <!--STEP CARD 2 -->
           <div class="steps__card">
             <div class="steps__card-number">02</div>
             <h3 class="steps__card-title">Place an order</h3>
              <p class="steps__card-description">
              Once your order is set, we move to the next step which is the shipping.
              </p>
          </div>
          <!--STEP CARD 3 -->
          <div class="steps__card">
             <div class="steps__card-number">03</div>
             <h3 class="steps__card-title">Get order deliverd</h3>
             <p class="steps__card-description">
               Our delivery process is easy, you will receive the order directly to your home.
             </p>
          </div>

       </section>

       <!--=============== NEWSLETTER ===============-->
       <section class="newsletter section">
        <div class="newsletter__container container">
          <h2 class="section__title">Our Newsletter</h2>
          <p class="newsletter__description">
            Promotion of new products and sales. Directly to your inbox !
          </p>
          <form action="" class="newsletter__form">
            <input type="text" placeholder="Enter your email" class="newsletter__input">
            <button class="btn btn-primary-outlined">Subscribe</button>
          </form>
         </div>

       </section>
   </main>


<!--=============== FOOTER ===============-->
<footer class="footer section">
  <div class="footer__container container">
    <div class="footer__about full-width">
      <h3 class="footer__title">About Us</h3>
      <p class="footer__description">
        At aura+, we believe in the power of natural beauty. Our mission is to provide high-quality skincare and personal care products that enhance your natural glow.
      </p>
      <p class="footer__description">
        Join us on our journey to better skin, hair, and self-care.
      </p>
    </div>
  </div>
  
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

    <!--=============== JS ===============-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/cart.js"></script>
  </body>
</html>
