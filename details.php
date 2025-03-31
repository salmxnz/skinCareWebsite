<!DOCTYPE html>
<?php
// Get product ID from URL parameter
$product_id = isset($_GET['id']) ? $_GET['id'] : '51'; // Default to product ID 51 if none specified

// Load XML
$xml = new DOMDocument();
$xml->load('data/products.xml');

// Validate against XSD (optional)
$isValid = $xml->schemaValidate('data/products.xsd');
if (!$isValid) {
    error_log("XML validation failed");
}

// Transform with XSLT
$xslt = new XSLTProcessor();
$xsl = new DOMDocument();
$xsl->load('data/xslt/product_details.xslt');
$xslt->importStylesheet($xsl);

// Set the product ID parameter for XSLT
$xslt->setParameter('', 'product_id', $product_id);

// Transform XML to HTML
$productHtml = $xslt->transformToXML($xml);

// Get product name for page title
$xpath = new DOMXPath($xml);
$xpath->registerNamespace('skin', 'http://www.skincare.com/products');
$productName = $xpath->evaluate("string(//skin:product[@id='$product_id']/skin:name)");
$pageTitle = $productName ? $productName . ' | Product Page' : 'Product Details';
?>
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

    <!-- ============ CSS WITH CACHING ============ -->

    <link rel="stylesheet" href="assets/css/styles2.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="assets/css/colors/color-1.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="assets/css/stylesMobile.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="assets/css/details.css?v=<?php echo time(); ?>" />

    <!-- ============ NAVBAR Script ============ -->
    <script src="assets/js/navbarToggle.js"></script>

    <title><?php echo htmlspecialchars($pageTitle); ?></title>
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
        <?php echo $productHtml; ?>
         
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
                It's good, but I didn't see drastic changes. It's hydrating and doesn't irritate my skin, but I might try a stronger formula next time.
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
      
      // Function to change main image
      window.changeMainImage = function(src) {
        mainImage.src = src;
      };
      
      // Quantity functions
      window.incrementQuantity = function() {
        const quantityInput = document.getElementById('quantity');
        let value = parseInt(quantityInput.value);
        if (value < 10) {
          quantityInput.value = value + 1;
        }
      };
      
      window.decrementQuantity = function() {
        const quantityInput = document.getElementById('quantity');
        let value = parseInt(quantityInput.value);
        if (value > 1) {
          quantityInput.value = value - 1;
        }
      };
      
      // Size selection
      sizeButtons.forEach(button => {
        button.addEventListener('click', () => {
          sizeButtons.forEach(btn => btn.classList.remove('active'));
          button.classList.add('active');
        });
      });
      
      // Initialize thumbnails
      thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', () => {
          mainImage.src = thumbnail.src;
        });
      });
    });
</script>
</body>
</html>