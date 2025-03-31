<?php
require_once("lib/nusoap.php");

// Enable error reporting for debugging but suppress deprecated warnings
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', 1);

// Get the searched product name
$product = "";
if (isset($_GET["txt_product"])) {
    $product = $_GET["txt_product"];
}

// Create a soap client
$url = "http://localhost:8888/skinCareWebsite/server.php?wsdl";
$client = new nusoap_client($url, false);

// Check for client errors
$err = $client->getError();
if ($err) {
    echo "<div class='alert alert-danger'><h4>Constructor error</h4><pre>" . $err . "</pre></div>";
    exit();
}

// Prepare the parameters
$params = array('input' => $product);

// Call the SOAP method
$result = $client->call('getProduct', array('searchParam' => $params));

// Debug information (hidden in HTML comments)
echo "<!-- Request: \n" . htmlspecialchars($client->request, ENT_QUOTES) . "\n-->";
echo "<!-- Response: \n" . htmlspecialchars($client->response, ENT_QUOTES) . "\n-->";
echo "<!-- Debug: \n" . htmlspecialchars($client->debug_str, ENT_QUOTES) . "\n-->";

// Error handling
if ($client->fault) {
    echo "<div class='alert alert-danger'><h4>Fault</h4><pre>";
    print_r($result);
    echo "</pre></div>";
} else {
    $err = $client->getError();
    if ($err) {
        echo "<div class='alert alert-danger'><h4>Error</h4><pre>" . $err . "</pre></div>";
    }
}

// If this file is loaded directly (not included in product_search.php)
if (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], 'product_search.php') === false) {
    // Output the HTML header
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Search Results - Skin Care Website</title>
        
        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- ============ CSS ============ -->
        <link rel="stylesheet" href="assets/css/styles2.css" />
        <link rel="stylesheet" href="assets/css/colors/color-1.css" />
        <link rel="stylesheet" href="assets/css/stylesMobile.css" />
        <link rel="stylesheet" href="assets/css/newArrivals.css" />
        
        <style>
            .search-results {
                padding: 20px 0;
            }
            .search-results h3 {
                margin-bottom: 30px;
                font-size: 24px;
                color: var(--title-color);
                text-align: center;
            }
            .product-card {
                margin-bottom: 30px;
            }
            .product-item {
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                height: 100%;
                display: flex;
                flex-direction: column;
                background-color: #fff;
            }
            .product-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            }
            .product-img {
                position: relative;
                overflow: hidden;
                padding-top: 100%; /* 1:1 Aspect Ratio */
            }
            .product-img img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }
            .product-img img:hover {
                transform: scale(1.05);
            }
            .product-label {
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 10;
            }
            .product-label span {
                display: inline-block;
                padding: 5px 10px;
                margin-bottom: 5px;
                border-radius: 4px;
                font-size: 12px;
                font-weight: 600;
                color: white;
            }
            .product-label .new {
                background-color: #4CAF50;
            }
            .product-label .best {
                background-color: #FF9800;
            }
            .product-info {
                padding: 20px;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }
            .product-title {
                font-size: 18px;
                margin-top: 0;
                margin-bottom: 10px;
                font-weight: 600;
            }
            .product-title a {
                color: var(--title-color);
                text-decoration: none;
            }
            .product-title a:hover {
                color: var(--first-color);
            }
            .product-category {
                font-size: 14px;
                color: #666;
                margin-bottom: 10px;
            }
            .product-price {
                margin-bottom: 15px;
                font-weight: 600;
            }
            .original-price {
                text-decoration: line-through;
                color: #999;
                margin-right: 10px;
            }
            .discount-price {
                color: #E53935;
            }
            .price {
                color: var(--first-color);
            }
            .product-description {
                font-size: 14px;
                color: #666;
                margin-bottom: 15px;
                flex-grow: 1;
            }
            .product-actions {
                display: flex;
                justify-content: space-between;
                margin-top: auto;
            }
            .product-actions .btn {
                flex: 1;
                margin: 0 5px;
                font-size: 14px;
                padding: 8px 12px;
            }
            .product-actions .btn:first-child {
                margin-left: 0;
            }
            .product-actions .btn:last-child {
                margin-right: 0;
            }
            .btn-primary {
                background-color: var(--first-color);
                border-color: var(--first-color);
            }
            .btn-primary:hover {
                background-color: var(--first-color-alt);
                border-color: var(--first-color-alt);
            }
            .btn-success {
                background-color: #4CAF50;
                border-color: #4CAF50;
            }
            .btn-success:hover {
                background-color: #388E3C;
                border-color: #388E3C;
            }
            .no-results {
                text-align: center;
                padding: 40px 0;
            }
            .no-results p {
                font-size: 18px;
                color: #666;
                margin-bottom: 20px;
            }
            .back-to-search {
                display: block;
                margin: 30px auto;
                text-align: center;
            }
            .search-query {
                font-weight: bold;
                color: var(--first-color);
            }
            .search-summary {
                text-align: center;
                margin-bottom: 30px;
                color: #666;
            }
        </style>
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
                    <a class="nav__link dropdown-item" href="mencare.php">Men\'s Care</a>
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
                  <i class="bx bx-user" onmouseover="this.className=\'bx bxs-user\'" onmouseout="this.className=\'bx bx-user\'"></i>
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
          </nav>
        </header>

        <!--=============== MAIN ===============-->
        <main class="main">
            <section class="section container">';
}

// Display search summary
if (!empty($product)) {
    echo '<div class="search-summary">';
    echo '<p>Showing results for: <span class="search-query">' . htmlspecialchars($product) . '</span></p>';
    echo '</div>';
}

// Reading returned Product from the response and creating XML
$XMLDocument = new SimpleXMLElement('<?xml version="1.0" ?><products></products>');

if (is_array($result) && !empty($result)) {
    foreach ($result as $record) {
        $product = $XMLDocument->addChild('Product');
        $product->addChild('Id', isset($record['id']) ? $record['id'] : '');
        $product->addChild('Name', isset($record['name']) ? $record['name'] : '');
        $product->addChild('Category', isset($record['category']) ? $record['category'] : '');
        $product->addChild('Price', isset($record['price']) ? $record['price'] : '');
        $product->addChild('DiscountPrice', isset($record['discount_price']) ? $record['discount_price'] : '');
        $product->addChild('Description', isset($record['description']) ? $record['description'] : '');
        $product->addChild('Image', isset($record['image']) ? $record['image'] : '');
        $product->addChild('IsNew', isset($record['is_new']) && $record['is_new'] ? 'true' : 'false');
        $product->addChild('IsBest', isset($record['is_best']) && $record['is_best'] ? 'true' : 'false');
    }

    // Apply XSLT to display the SOAP Response
    $XSLDocument = new DOMDocument();
    $XSLDocument->load("data/xslt/products_search.xsl");
    $XSLProcessor = new XSLTProcessor();
    $XSLProcessor->importStylesheet($XSLDocument);
    echo $XSLProcessor->transformToXML($XMLDocument);
} else {
    echo '<div class="no-results">';
    echo '<p>No products found matching your search criteria.</p>';
    echo '<div><i class="bx bx-search" style="font-size: 48px; color: #ddd;"></i></div>';
    if (is_array($result)) {
        echo '<p>Try a different search term or browse our categories.</p>';
    } else {
        echo '<p>An error occurred while processing your request. Please try again.</p>';
    }
    echo '</div>';
}

// Display back to search button
echo '<div class="back-to-search">';
echo '<a href="product_search.php" class="btn btn-primary"><i class="bx bx-arrow-back"></i> Back to Search</a>';
echo '</div>';

// If this file is loaded directly (not included in product_search.php)
if (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], 'product_search.php') === false) {
    // Output the HTML footer
    echo '</section>
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

        <!-- ============ NAVBAR Script ============ -->
        <script src="assets/js/navbarToggle.js"></script>
    </body>
    </html>';
}
?>
