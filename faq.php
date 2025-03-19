<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles2.css" />
    <link rel="stylesheet" href="assets/css/colors/color-1.css" />
    <link rel="stylesheet" href="assets/css/stylesMobile.css" />

    <title>FAQ | SkinCare</title>

    <style>
        /* General Body Styling */
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f7f7f7;
        }

        /* FAQ Section Styling */
        .faq-section {
            padding: 80px 20px;
            background-color: #fff;
        }
        .faq-title {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 50px;
            color: #333;
            letter-spacing: 1px;
        }
        .faq-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .faq-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            padding: 25px;
            transition: all 0.3s ease-in-out;
            position: relative;
        }
        .faq-item:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .faq-item h3 {
            font-size: 1.8rem;
            cursor: pointer;
            transition: color 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .faq-item h3:hover {
            color: var(--mint-color);
        }

        /* Dropdown Arrow */
        .dropdown-btn {
            font-size: 1.5rem;
            color: var(--mint-color);
            transition: transform 0.3s ease;
        }
        .faq-item.active .dropdown-btn {
            transform: rotate(180deg);
        }

        .faq-item p {
            display: none;
            font-size: 1.5rem; 
            color: #555;
            margin-top: 10px;
            line-height: 1.8;
            text-align: left;
            margin-bottom: 0;
        }
        .faq-item.active p {
            display: block;
        }

        /* Smooth transitions for FAQ items */
        .faq-item p {
            transition: opacity 0.4s ease-in-out, max-height 0.4s ease;
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
              <a href="faq.php" class="nav__link active-link" >FAQ</a>
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
  
    <!--=============== FAQ SECTION ===============-->
    <section class="faq-section">
        <h2 class="faq-title">Frequently Asked Questions</h2>

        <div class="faq-container">
            <div class="faq-item">
                <h3>
                    What is your return policy?
                    <i class="bx bx-chevron-down dropdown-btn"></i>
                </h3>
                <p>We offer a 30-day return policy on all unopened products. If you're not satisfied with your purchase, please contact us for a return authorization.</p>
            </div>

            <div class="faq-item">
                <h3>
                    Do you ship internationally?
                    <i class="bx bx-chevron-down dropdown-btn"></i>
                </h3>
                <p>Yes, we ship to most countries worldwide. Shipping fees and delivery times vary depending on your location.</p>
            </div>

            <div class="faq-item">
                <h3>
                    How can I track my order?
                    <i class="bx bx-chevron-down dropdown-btn"></i>
                </h3>
                <p>Once your order is shipped, you will receive a tracking number via email. You can use this number to track your package on our website.</p>
            </div>

            <div class="faq-item">
                <h3>
                    Can I change my shipping address after placing an order?
                    <i class="bx bx-chevron-down dropdown-btn"></i>
                </h3>
                <p>Yes, but only if your order has not been shipped yet. Please contact our customer service as soon as possible to request a change.</p>
            </div>
        </div>
    </section>

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
    

    <!--=============== JS ===============-->
    <script>
        $(document).ready(function () {
            $('.faq-item h3').click(function () {
                $(this).parent().toggleClass('active');
            });
        });
    </script>
</body>
</html>