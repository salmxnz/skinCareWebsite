<!DOCTYPE html>
<?php
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
$xsl->load('data/xslt/products.xslt');
$xslt->importStylesheet($xsl);
$transformedHtml = $xslt->transformToXML($xml);
?>
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
    <link rel="stylesheet" href="assets/css/shop.css" />


    <!-- ============ NAVBAR Script ============ -->
    <script src="assets/js/navbarToggle.js"></script>
  </head>
  <body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="index.php" class="nav_logo">
          <i class="bx bxs-shopping-bag nav_logo-icon"></i>aura+
        </a>

        <div class="nav__menu">
          <ul class="nav_list">
            <li class="nav_item">
              <a href="index.php" class="nav__link ">Home</a>
            </li>

            <li class="nav-item dropdown nav_item">
       
              <a class="nav__link dropdown-toggle active-link" href="shop.php" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
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
    <div class="cart" id="cart">
        
    </div>

    <!--=============== LOGIN ===============-->
    <div class="login" id="login">
        
    </div>

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== SHOP ===============-->
        <section class="shop section container">
          <h2 class="section__title">Our Products</h2>
          <div class="shop__layout">
              <!-- Filter Sidebar -->
              <aside class="shop__filter">
                  <h3 class="shop__filter-title">Filter By</h3>
                  <form class="shop__filter-form" onsubmit="filterProducts(); return false;">
                      <div class="shop__filter-group">
                          <label for="category">Category</label>
                          <select id="category" name="category" onchange="filterProducts()">
                              <option value="all">All</option>
                              <option value="skincare">Skin Care</option>
                              <option value="haircare">Hair Care</option>
                              <option value="nailcare">Nail Care</option>
                              <option value="menscare">Men's Care</option>
                          </select>
                      </div>

                      <div class="shop__sort">
                        <label for="sort">Sort By:</label>
                        <select id="sort" name="sort" onchange="sortProducts()">
                            <option value="default">Default</option>
                            <option value="price-asc">Price: Low to High</option>
                            <option value="price-desc">Price: High to Low</option>
                        </select>
                    </div>
                    <button type="submit" class="shop__filter-button">Apply Filters</button>
                  </form>
              </aside>

              <!-- Products -->
      
      <!-- XML Transformed Products Section -->
      <section class="shop section container">
        <!-- <h2 class="section__title">XML Products Demo</h2> -->
        <!-- <p class="section__description">This section demonstrates products loaded from XML and transformed with XSLT</p> -->
        
        <?php echo $transformedHtml; ?>
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

    <!--=============== SCROLL UP ===============-->

    <!--=============== STYLE SWITCHER ===============-->
    
    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== JS ===============-->
    <script src="assets/js/main.js"></script>

    <script>
      function filterProducts() {
          const category = document.getElementById('category').value;
          const products = document.querySelectorAll('.shop__card');

          products.forEach(product => {
              if (category === 'all' || product.getAttribute('data-category') === category) {
                  product.style.display = 'block';
              } else {
                  product.style.display = 'none';
              }
          });
      }
  </script>

<script>
  function sortProducts() {
      const sortValue = document.getElementById('sort').value;
      const productsContainer = document.querySelector('.shop__container');
      const products = Array.from(productsContainer.querySelectorAll('.shop__card'));

      products.sort((a, b) => {
          const priceA = parseFloat(a.getAttribute('data-price'));
          const priceB = parseFloat(b.getAttribute('data-price'));

          if (sortValue === 'price-asc') {
              return priceA - priceB;
          } else if (sortValue === 'price-desc') {
              return priceB - priceA;
          } else {
              return 0;
          }
      });

      products.forEach(product => productsContainer.appendChild(product));
  }
</script>
</body>
</html>