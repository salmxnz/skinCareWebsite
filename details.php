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
    <link rel="stylesheet" href="assets/css/details.css" />


    <!-- ============ NAVBAR Script ============ -->
    <script src="assets/js/navbarToggle.js"></script>

    <title>Niacinamide 10% + Zinc 1% | Product Page</title>
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
              <!-- <div class="nav__link dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="nav__link dropdown-item" href="skincare.php">Skin Care</a>
                <a class="nav__link dropdown-item" href="haircare.php">Hair Care</a>
                <a class="nav__link dropdown-item" href="nailcare.php">Nail Care</a>
                <a class="nav__link dropdown-item" href="mencare.php">Men's Care</a>
              </div>
            </li> -->
            

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
    <!--=============== CART ===============-->
    <div class="cart" id="cart">
        
    </div>

    <!--=============== LOGIN ===============-->
    <div class="login" id="login">
        
    </div>

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== DETAILS ===============-->

        <div class="product__container">
          <div class="product__images">
              <img id="mainImage" class="product__main-image" src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwce8a7cdf/Images/products/The%20Ordinary/rdn-niacinamide-10pct-zinc-1pct-30ml.png?sw=1200&sh=1200&sm=fit" alt="Niacinamide 10% + Zinc 1% Main Image">
              <div class="product__thumbnails">
                  <div class="product__thumbnail">
                      <img src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwce8a7cdf/Images/products/The%20Ordinary/rdn-niacinamide-10pct-zinc-1pct-30ml.png?sw=1200&sh=1200&sm=fit" alt="Main Image Thumbnail">
                  </div>
                  <div class="product__thumbnail">
                      <img src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwbf9b60a4/Images/products/The%20Ordinary/infographics/ord-niacainamide-zinc-blemish-serum-benefits-graphic.jpg?sw=1200&sh=1200&sm=fit" alt="Benefits Thumbnail">
                  </div>
                  <div class="product__thumbnail">
                      <img src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwead98b9f/Images/products/The%20Ordinary/infographics/ord-niacinamide-zinc-blemish-ingredients-graphic.jpg?sw=1200&sh=1200&sm=fit" alt="Ingredients Thumbnail">
                  </div>
                  <div class="product__thumbnail">
                      <img src="https://theordinary.com/dw/image/v2/BFKJ_PRD/on/demandware.static/-/Sites-deciem-master/default/dwcf135ad6/Images/products/The%20Ordinary/Before-After/ord-niacinamide-zinc-blemish-serum-before-after-pores.jpg?sw=1200&sh=1200&sm=fit" alt="Before and After Thumbnail">
                  </div>
              </div>
          </div>
          <div class="product__details">
              <h2 class="product__title">Niacinamide 10% + Zinc 1% </h2>
              <div class="product__description">
                This high-strength vitamin and mineral formula visibly reduces blemishes and improves skin texture.
                </div>
                
              <span class="product__price">$9.99</span>
             
              <div class="product__options">
                  <div class="product__size">
                      <button class="active">30ml</button>
                      <button>60ml</button>
                  </div>
                  <div class="product__quantity">
                      <label for="quantity">Quantity:</label>
                      <input type="number" id="quantity" value="1" min="1">
                  </div>
              </div>
              <div class="product__targets">
                  <strong>Targets:</strong> Textural Irregularities, Dryness, Dullness, Visible Shine, Signs of Congestion
              </div>
              <div class="product__ingredients">
                  <strong>Key Ingredients:</strong> Niacinamide, Zinc PCA
              </div>
              <div class="product__skin">
                  <strong>Suitable for:</strong> All Skin Types
              </div>
              <div class="product__cart">
                  <button>Add to Cart</button>
              </div>
              <div class="featured__review"></div>
                <h4>Featured Review: Alex J.
                  <div class="review__rating">
                    <span>&#9733;&#9733;&#9733;&#9733;&#9734;</span> 4/5
                </div>
                </h4>
               
                <p>
                    I've been using this for a few weeks now, and I've already noticed an improvement in my skin texture. It's lightweight and absorbs quickly. Great addition to my skincare routine!
                </p>
            </div>
            <div class="about__section">
              <h3>About </h3>
              <p>
                  Our Niacinamide 10% + Zinc 1% formula is a water-based serum that boosts skin brightness, improves skin smoothness, and reinforces the skin barrier over time. It contains a high 10% concentration of Niacinamide (vitamin B3) and Zinc PCA.
              </p>
              <p>
                  <strong>Note:</strong> Niacinamide and Zinc PCA is not a treatment for acne. For persistent acne-related conditions, we recommend speaking to your healthcare provider regarding treatment options. This formulation can be used alongside acne treatments if desired for added visible skin benefits.
              </p>
              <h3>Clinical Results</h3>
              <ul>
                  <li>Hydrating lightweight serum that improves the look of skin radiance and luminosity.</li>
                  <li>Hydrates skin by reinforcing the skin barrier in as little as 7 days.</li>
                  <li>Achieve smoother skin after 8 weeks.*</li>
              </ul>
              <p><em>*In a clinical study of 35 subjects applying product 2x/day for 8 weeks.</em></p>
          </div>
        </div>
          </div>
         
  
<!--=============== REVIEWS ===============-->
      <div class="reviews__section">
        <h3>Customer Reviews</h3>

        <div class="review">
            <div class="review__header">
                <span class="review__name">Alex J.</span>
                <div class="review__rating">
                    <span>&#9733;&#9733;&#9733;&#9733;&#9734;</span> 4/5
                </div>
                <span class="review__date">September 15, 2024</span>
            </div>
            <p>
                I've been using this for a few weeks now, and I've already noticed an improvement in my skin texture. It's lightweight and absorbs quickly. Great addition to my skincare routine!
            </p>
        </div>

        <div class="review">
            <div class="review__header">
                <span class="review__name">Jessica K.</span>
                <div class="review__rating">
                    <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span> 5/5
                </div>
                <span class="review__date">October 2, 2024</span>
            </div>
            <p>
                This product is amazing! It helped reduce the appearance of my pores and gave my skin a natural glow. Highly recommend for anyone dealing with dullness and uneven texture.
            </p>
        </div>

        <div class="review">
            <div class="review__header">
                <span class="review__name">Michael L.</span>
                <div class="review__rating">
                    <span>&#9733;&#9733;&#9733;&#9734;&#9734;</span> 3/5
                </div>
                <span class="review__date">October 5, 2024</span>
            </div>
            <p>
                It’s good, but I didn’t see drastic changes. It’s hydrating and doesn’t irritate my skin, but I might try a stronger formula next time.
            </p>
        </div>
    </div>

        <!--=============== RELATED PRODUCTS ===============-->
        <section class="related__products section">
            
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
    
    <!--=============== LIGHTBOX ===============-->

    <!--=============== SCROLL UP ===============-->

    <!--=============== STYLE SWITCHER ===============-->
    
    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== JS ===============-->
    <script src="assets/js/main.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
      const mainImage = document.getElementById('mainImage');
      const thumbnails = document.querySelectorAll('.product__thumbnail img');
      const sizeButtons = document.querySelectorAll('.product__size button');
      const quantityInput = document.getElementById('quantity');

      thumbnails.forEach(thumbnail => {
          thumbnail.addEventListener('click', () => {
              mainImage.src = thumbnail.src;
          });
      });

      sizeButtons.forEach(button => {
          button.addEventListener('click', () => {
              sizeButtons.forEach(btn => btn.classList.remove('active'));
              button.classList.add('active');
          });
      });

      document.querySelector('.product__cart button').addEventListener('click', () => {
          const selectedSize = document.querySelector('.product__size button.active')?.textContent || '30ml';
          const quantity = quantityInput.value;
          alert(`Added ${quantity} of ${selectedSize} to cart.`);
      });
  });
</script>
</body>
</html>