<?php
// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root'; // default MAMP password
$db_name = 'skincare_db';
$db_port = 8889; // default MAMP port

// Create connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Initialize variables for form
$name = $category = $price = $discountPrice = $description = $image = '';
$isNew = $isBest = false;
$descriptionItems = [''];
$detailImages = [''];
$message = '';
$error = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'] ?? '';
    $category = $_POST['category'] ?? '';
    $price = $_POST['price'] ?? '';
    $discountPrice = $_POST['discountPrice'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_POST['image'] ?? '';
    $isNew = isset($_POST['isNew']) ? true : false;
    $isBest = isset($_POST['isBest']) ? true : false;
    $descriptionItems = $_POST['descriptionItems'] ?? [''];
    $detailImages = $_POST['detailImages'] ?? [''];
    
    // Validate required fields
    if (empty($name) || empty($category) || empty($price) || empty($image)) {
        $error = "Please fill in all required fields";
    } else {
        // Create XML string from form data
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<skin:products xmlns:skin="http://www.skincare.com/products" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.skincare.com/products products.xsd">';
        
        // Get next ID for validation
        $result = $conn->query("SELECT MAX(id) as max_id FROM products");
        $row = $result->fetch_assoc();
        $next_id = ($row['max_id'] ?? 0) + 1;
        
        $xml .= '<skin:product id="' . $next_id . '">'; // Using integer ID
        $xml .= '<skin:name>' . htmlspecialchars($name) . '</skin:name>';
        $xml .= '<skin:category>' . htmlspecialchars($category) . '</skin:category>';
        $xml .= '<skin:price>' . htmlspecialchars($price) . '</skin:price>';
        
        if (!empty($discountPrice)) {
            $xml .= '<skin:discountPrice>' . htmlspecialchars($discountPrice) . '</skin:discountPrice>';
        }
        
        if (!empty($description)) {
            $xml .= '<skin:description>' . htmlspecialchars($description) . '</skin:description>';
        }
        
        // Add description items if any
        if (!empty($descriptionItems[0])) {
            $xml .= '<skin:descriptionfullall>';
            foreach ($descriptionItems as $item) {
                if (!empty($item)) {
                    $xml .= '<skin:description_item>' . htmlspecialchars($item) . '</skin:description_item>';
                }
            }
            $xml .= '</skin:descriptionfullall>';
        }
        
        $xml .= '<skin:image>' . htmlspecialchars($image) . '</skin:image>';
        
        // Add detail images if any
        if (!empty($detailImages[0])) {
            $xml .= '<skin:detail_images>';
            foreach ($detailImages as $img) {
                if (!empty($img)) {
                    $xml .= '<skin:detail_image>' . htmlspecialchars($img) . '</skin:detail_image>';
                }
            }
            $xml .= '</skin:detail_images>';
        }
        
        if ($isNew) {
            $xml .= '<skin:isNew>true</skin:isNew>';
        }
        
        if ($isBest) {
            $xml .= '<skin:isBest>true</skin:isBest>';
        }
        
        $xml .= '</skin:product>';
        $xml .= '</skin:products>';
        
        // Validate XML against XSD
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        
        $isValid = true;
        libxml_use_internal_errors(true);
        
        if (!$dom->schemaValidate(__DIR__ . '/data/products.xsd')) {
            $isValid = false;
            $error = "XML validation failed:<br>";
            foreach (libxml_get_errors() as $xmlError) {
                $error .= "Line " . $xmlError->line . ": " . $xmlError->message . "<br>";
            }
            libxml_clear_errors();
        }
        
        if ($isValid) {
            try {
                // Start transaction
                $conn->begin_transaction();
                
                // Get next ID
                $result = $conn->query("SELECT MAX(id) as max_id FROM products");
                $row = $result->fetch_assoc();
                $next_id = ($row['max_id'] ?? 0) + 1;
                
                // Insert into products table
                $stmt = $conn->prepare("INSERT INTO products (id, name, category, price, discount_price, description, image, is_new, is_best) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                // Fix for bind_param reference issue
                $isNewInt = $isNew ? 1 : 0;
                $isBestInt = $isBest ? 1 : 0;
                $discountPriceValue = $discountPrice ?: null;
                
                $stmt->bind_param("issdsssii", $next_id, $name, $category, $price, $discountPriceValue, $description, $image, $isNewInt, $isBestInt);
                $stmt->execute();
                
                // Insert description items
                if (!empty($descriptionItems[0])) {
                    $stmt = $conn->prepare("INSERT INTO product_description_items (product_id, description_text, display_order) VALUES (?, ?, ?)");
                    $order = 1;
                    foreach ($descriptionItems as $item) {
                        if (!empty($item)) {
                            $stmt->bind_param("isi", $next_id, $item, $order);
                            $stmt->execute();
                            $order++;
                        }
                    }
                }
                
                // Insert detail images
                if (!empty($detailImages[0])) {
                    $stmt = $conn->prepare("INSERT INTO product_detail_images (product_id, image_url, display_order) VALUES (?, ?, ?)");
                    $order = 1;
                    foreach ($detailImages as $img) {
                        if (!empty($img)) {
                            $stmt->bind_param("isi", $next_id, $img, $order);
                            $stmt->execute();
                            $order++;
                        }
                    }
                }
                
                // Commit transaction
                $conn->commit();
                
                // Now update the XML file
                updateXMLFile($next_id, $name, $category, $price, $discountPrice, $description, $descriptionItems, $image, $detailImages, $isNew, $isBest);
                
                $message = "Product added successfully!";
                
                // Reset form
                $name = $category = $price = $discountPrice = $description = $image = '';
                $isNew = $isBest = false;
                $descriptionItems = [''];
                $detailImages = [''];
                
            } catch (Exception $e) {
                // Rollback transaction on error
                $conn->rollback();
                $error = "Error: " . $e->getMessage();
            }
        }
    }
}

// Function to update XML file
function updateXMLFile($id, $name, $category, $price, $discountPrice, $description, $descriptionItems, $image, $detailImages, $isNew, $isBest) {
    $xmlFile = 'data/products.xml';
    
    // Load XML file
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->load($xmlFile);
    
    // Get root element
    $root = $dom->documentElement;
    
    // Create new product element
    $product = $dom->createElementNS('http://www.skincare.com/products', 'skin:product');
    $product->setAttribute('id', $id);
    
    // Add child elements
    $elements = [
        'name' => $name,
        'category' => $category,
        'price' => $price,
    ];
    
    if (!empty($discountPrice)) {
        $elements['discountPrice'] = $discountPrice;
    }
    
    if (!empty($description)) {
        $elements['description'] = $description;
    }
    
    // Add basic elements
    foreach ($elements as $elementName => $value) {
        $element = $dom->createElementNS('http://www.skincare.com/products', 'skin:' . $elementName, htmlspecialchars($value));
        $product->appendChild($element);
    }
    
    // Add description items if any
    if (!empty($descriptionItems[0])) {
        $descFullAll = $dom->createElementNS('http://www.skincare.com/products', 'skin:descriptionfullall');
        
        foreach ($descriptionItems as $item) {
            if (!empty($item)) {
                $descItem = $dom->createElementNS('http://www.skincare.com/products', 'skin:description_item', htmlspecialchars($item));
                $descFullAll->appendChild($descItem);
            }
        }
        
        $product->appendChild($descFullAll);
    }
    
    // Add image
    $imageElement = $dom->createElementNS('http://www.skincare.com/products', 'skin:image', htmlspecialchars($image));
    $product->appendChild($imageElement);
    
    // Add detail images if any
    if (!empty($detailImages[0])) {
        $detailImagesElement = $dom->createElementNS('http://www.skincare.com/products', 'skin:detail_images');
        
        foreach ($detailImages as $img) {
            if (!empty($img)) {
                $detailImage = $dom->createElementNS('http://www.skincare.com/products', 'skin:detail_image', htmlspecialchars($img));
                $detailImagesElement->appendChild($detailImage);
            }
        }
        
        $product->appendChild($detailImagesElement);
    }
    
    // Add isNew or isBest
    if ($isNew) {
        $isNewElement = $dom->createElementNS('http://www.skincare.com/products', 'skin:isNew', 'true');
        $product->appendChild($isNewElement);
    } else {
        $isNewElement = $dom->createElementNS('http://www.skincare.com/products', 'skin:isNew', 'false');
        $product->appendChild($isNewElement);
    }
    
    if ($isBest) {
        $isBestElement = $dom->createElementNS('http://www.skincare.com/products', 'skin:isBest', 'true');
        $product->appendChild($isBestElement);
    }
    
    // Append new product to root
    $root->appendChild($product);
    
    // Save XML file
    $dom->save($xmlFile);
}

// Function to add more input fields dynamically
function generateDynamicFields($name, $values, $placeholder) {
    $html = '';
    foreach ($values as $index => $value) {
        $html .= '<div class="input-group mb-3">';
        $html .= '<input type="text" class="form-control" name="' . $name . '[]" value="' . htmlspecialchars($value) . '" placeholder="' . $placeholder . '">';
        if ($index === 0) {
            $html .= '<div class="input-group-append"><button type="button" class="btn btn-primary add-more" data-target="' . $name . '">+</button></div>';
        } else {
            $html .= '<div class="input-group-append"><button type="button" class="btn btn-danger remove-field">-</button></div>';
        }
        $html .= '</div>';
    }
    return $html;
}
?>

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

    <!-- ============ CSS WITH CACHING ============ -->
    <link rel="stylesheet" href="assets/css/styles2.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="assets/css/colors/color-1.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="assets/css/stylesMobile.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="assets/css/details.css?v=<?php echo time(); ?>" />

    <!-- ============ NAVBAR Script ============ -->
    <script src="assets/js/navbarToggle.js"></script>

    <title>Add New Product | Skincare Website</title>
    <style>
        .container {
            margin-top: 120px;
            margin-bottom: 50px;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            margin-bottom: 30px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .checkbox-group {
            display: flex;
            gap: 20px;
        }
        .alert {
            margin-top: 20px;
        }
        .dynamic-fields-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!--=============== HEADER ===============-->
    <!-- <header class="header" id="header">
      <nav class="nav container">
        <a href="index.php" class="nav_logo">
          <i class="bx bxs-shopping-bag nav_logo-icon"></i> aura+
        </a>

        <div class="nav__menu">
          <ul class="nav_list">
            <li class="nav_item">
              <a href="index.php" class="nav_link">Home</a>
            </li>
            <li class="nav_item">
              <a href="shop.php" class="nav_link active-link">Shop</a>
            </li>
            <li class="nav_item">
              <a href="about.php" class="nav_link">About</a>
            </li>
            <li class="nav_item">
              <a href="contact.php" class="nav_link">Contact</a>
            </li>
          </ul>
        </div>

        <div class="nav_btns">
          <div class="login_toggle" id="login-button">
            <i class="bx bx-user"></i>
          </div>
          <div class="nav_shop" id="cart-shop">
            <i class="bx bx-shopping-bag"></i>
          </div>
          <div class="nav_toggle" id="nav-toggle">
            <i class="bx bx-grid-alt"></i>
          </div>
        </div>
      </nav>
    </header> -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="form-container">
                    <h2 class="form-title">Add New Product</h2>
                    
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-success"><?php echo $message; ?></div>
                    <?php endif; ?>
                    
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <form method="post" action="" id="product-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option value="" <?php echo empty($category) ? 'selected' : ''; ?>>Select Category</option>
                                        <option value="Skin Care" <?php echo $category === 'Skin Care' ? 'selected' : ''; ?>>Skin Care</option>
                                        <option value="Hair Care" <?php echo $category === 'Hair Care' ? 'selected' : ''; ?>>Hair Care</option>
                                        <option value="Nail Care" <?php echo $category === 'Nail Care' ? 'selected' : ''; ?>>Nail Care</option>
                                        <option value="Mens Care" <?php echo $category === 'Mens Care' ? 'selected' : ''; ?>>Men's Care</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price ($) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discountPrice">Discount Price ($) (optional)</label>
                                    <input type="number" step="0.01" class="form-control" id="discountPrice" name="discountPrice" value="<?php echo htmlspecialchars($discountPrice); ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Short Description</label>
                            <textarea class="form-control" id="description" name="description" rows="2"><?php echo htmlspecialchars($description); ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Main Image URL <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($image); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Product Tags</label>
                            <div class="checkbox-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="isNew" <?php echo $isNew ? 'checked' : ''; ?>> New Product
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="isBest" <?php echo $isBest ? 'checked' : ''; ?>> Best Seller
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Full Description Items</label>
                            <div id="descriptionItemsContainer" class="dynamic-fields-container">
                                <?php echo generateDynamicFields('descriptionItems', $descriptionItems, 'Enter a description paragraph'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Detail Images URLs</label>
                            <div id="detailImagesContainer" class="dynamic-fields-container">
                                <?php echo generateDynamicFields('detailImages', $detailImages, 'Enter image URL'); ?>
                            </div>
                        </div>
                        
                        <!-- Hidden input for XML data -->
                        <input type="hidden" id="xml-data" name="xml_data" value="">
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Add Product</button>
                            <a href="shop.php" class="btn btn-default btn-lg">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!--=============== FOOTER ===============-->
    <!-- <footer class="footer section">
      <div class="footer__container container">
        <div class="footer__links">
          <h3 class="footer__title">Quick Links</h3>
          <ul>
            <li><a href="index.php" class="footer__link">Home</a></li>
            <li><a href="shop.php" class="footer__link">Shop</a></li>
            <li><a href="about.php" class="footer__link">About</a></li>
            <li><a href="contact.php" class="footer__link">Contact</a></li>
          </ul>
        </div>

        <div class="footer__links">
          <h3 class="footer__title">Categories</h3>
          <ul>
            <li><a href="#" class="footer__link">Skin Care</a></li>
            <li><a href="#" class="footer__link">Hair Care</a></li>
            <li><a href="#" class="footer__link">Body Care</a></li>
            <li><a href="#" class="footer__link">Makeup</a></li>
          </ul>
        </div>

        <div class="footer__links">
          <h3 class="footer__title">Support</h3>
          <ul>
            <li><a href="#" class="footer__link">FAQs</a></li>
            <li><a href="#" class="footer__link">Support Center</a></li>
            <li><a href="#" class="footer__link">Shipping & Returns</a></li>
            <li><a href="#" class="footer__link">Privacy Policy</a></li>
          </ul>
        </div>

        <div class="footer__links">
          <h3 class="footer__title">Get in touch</h3>
          <ul>
            <li><span class="footer__information">123 Skincare Street</span></li>
            <li><span class="footer__information">Beauty City, BC 12345</span></li>
            <li><span class="footer__information">contact@skincare.com</span></li>
            <li><span class="footer__information">+1 234 567 8900</span></li>
          </ul>
        </div>
      </div>

      <p class="footer__copy"> 2025 Aura+. All rights reserved</p>
    </footer> -->
    
    <script>
        $(document).ready(function() {
            // Add more fields
            $(document).on('click', '.add-more', function() {
                const target = $(this).data('target');
                const container = $(`#${target}Container`);
                const newGroup = `
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="${target}[]" placeholder="${target === 'descriptionItems' ? 'Enter a description paragraph' : 'Enter image URL'}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger remove-field">-</button>
                        </div>
                    </div>
                `;
                container.append(newGroup);
            });
            
            // Remove field
            $(document).on('click', '.remove-field', function() {
                $(this).closest('.input-group').remove();
            });
            
            // XML handling functions
            var xml_products = "<skin:products xmlns:skin='http://www.skincare.com/products'></skin:products>";
            var xmlDoc_products = loadXMLString(xml_products);
            
            // Function to load XML string into XML document
            function loadXMLString(txt) {
                var xmlDoc;
                try {
                    parser = new DOMParser();
                    xmlDoc = parser.parseFromString(txt, "text/xml");
                    return xmlDoc;
                }
                catch(e) {
                    alert(e.message);
                }
                return null;
            }
            
            // Function to insert product into XML document
            function insertProduct(productID, productImage, productName, productCategory, productDesc, productPrice) {
                // Get reference to root
                var products_node = xmlDoc_products.documentElement;
                
                // Create the new empty node
                var product_node = xmlDoc_products.createElement("skin:product");
                
                // Set the product_id attribute
                product_node.setAttribute("id", productID);
                
                // Create element nodes
                var name_node = xmlDoc_products.createElement("skin:name");
                var category_node = xmlDoc_products.createElement("skin:category");
                var price_node = xmlDoc_products.createElement("skin:price");
                var desc_node = xmlDoc_products.createElement("skin:description");
                var image_node = xmlDoc_products.createElement("skin:image");
                
                // Append child nodes to product node
                product_node.appendChild(name_node);
                product_node.appendChild(category_node);
                product_node.appendChild(price_node);
                product_node.appendChild(desc_node);
                product_node.appendChild(image_node);
                
                // Append product node to products node
                products_node.appendChild(product_node);
                
                // Insert element values
                name_node.appendChild(xmlDoc_products.createTextNode(productName));
                category_node.appendChild(xmlDoc_products.createTextNode(productCategory));
                price_node.appendChild(xmlDoc_products.createTextNode(productPrice));
                desc_node.appendChild(xmlDoc_products.createTextNode(productDesc));
                image_node.appendChild(xmlDoc_products.createTextNode(productImage));
                
                return true;
            }
            
            // Function to get product details from form and insert into XML
            function getProductDetails() {
                var productID = new Date().getTime(); // Generate unique ID
                var productName = $('#name').val();
                var productCategory = $('#category').val();
                var productPrice = $('#price').val();
                var productDesc = $('#description').val();
                var productImage = $('#image').val();
                
                if(productName && productCategory && productPrice && productImage) {
                    insertProduct(productID, productImage, productName, productCategory, productDesc, productPrice);
                    
                    // Convert XML document to string for submission
                    var serializer = new XMLSerializer();
                    var xmlString = serializer.serializeToString(xmlDoc_products);
                    
                    // Add XML string to hidden input for form submission
                    $('#xml-data').val(xmlString);
                    
                    return true;
                } else {
                    alert("Please fill in all required fields");
                    return false;
                }
            }
            
            // Attach form submission handler
            $('#product-form').submit(function(e) {
                if(!getProductDetails()) {
                    e.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    </script>
</body>
</html>
