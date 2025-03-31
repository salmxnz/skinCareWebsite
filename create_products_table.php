<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
require_once 'includes/db_connection.php';

// Check if products table exists
$checkTable = $conn->query("SHOW TABLES LIKE 'products'");
if ($checkTable->num_rows > 0) {
    echo "<p>Products table already exists.</p>";
} else {
    // Create products table
    $sql = "CREATE TABLE products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        category VARCHAR(100) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        discount_price DECIMAL(10,2) NULL,
        description TEXT,
        image VARCHAR(255),
        is_new TINYINT(1) DEFAULT 0,
        is_best TINYINT(1) DEFAULT 0
    )";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Products table created successfully.</p>";
        
        // Insert sample data
        $sampleProducts = [
            [
                'name' => 'Hydrating Face Cream',
                'category' => 'Skin Care',
                'price' => 29.99,
                'discount_price' => 24.99,
                'description' => 'A deeply hydrating face cream that nourishes and revitalizes dry skin.',
                'image' => 'assets/img/products/face-cream.jpg',
                'is_new' => 1,
                'is_best' => 0
            ],
            [
                'name' => 'Vitamin C Serum',
                'category' => 'Skin Care',
                'price' => 34.99,
                'discount_price' => NULL,
                'description' => 'Brightening serum with 15% Vitamin C to reduce dark spots and improve skin tone.',
                'image' => 'assets/img/products/vitamin-c-serum.jpg',
                'is_new' => 0,
                'is_best' => 1
            ],
            [
                'name' => 'Exfoliating Scrub',
                'category' => 'Skin Care',
                'price' => 19.99,
                'discount_price' => 17.99,
                'description' => 'Gentle exfoliating scrub that removes dead skin cells and unclogs pores.',
                'image' => 'assets/img/products/exfoliating-scrub.jpg',
                'is_new' => 0,
                'is_best' => 0
            ],
            [
                'name' => 'Nourishing Hair Mask',
                'category' => 'Hair Care',
                'price' => 24.99,
                'discount_price' => NULL,
                'description' => 'Deep conditioning hair mask that repairs damaged hair and adds shine.',
                'image' => 'assets/img/products/hair-mask.jpg',
                'is_new' => 1,
                'is_best' => 0
            ],
            [
                'name' => 'Strengthening Nail Oil',
                'category' => 'Nail Care',
                'price' => 15.99,
                'discount_price' => NULL,
                'description' => 'Nourishing oil blend that strengthens nails and conditions cuticles.',
                'image' => 'assets/img/products/nail-oil.jpg',
                'is_new' => 0,
                'is_best' => 1
            ]
        ];
        
        // Prepare insert statement
        $stmt = $conn->prepare("INSERT INTO products (name, category, price, discount_price, description, image, is_new, is_best) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Insert each product
        foreach ($sampleProducts as $product) {
            $stmt->bind_param(
                "ssddssii",
                $product['name'],
                $product['category'],
                $product['price'],
                $product['discount_price'],
                $product['description'],
                $product['image'],
                $product['is_new'],
                $product['is_best']
            );
            
            if ($stmt->execute()) {
                echo "<p>Added product: {$product['name']}</p>";
            } else {
                echo "<p>Error adding product: {$product['name']} - {$stmt->error}</p>";
            }
        }
        
        $stmt->close();
        echo "<p>Sample products added successfully.</p>";
    } else {
        echo "<p>Error creating products table: " . $conn->error . "</p>";
    }
}

$conn->close();
echo "<p>Done. <a href='product_search.php'>Go to Product Search</a></p>";
?>
