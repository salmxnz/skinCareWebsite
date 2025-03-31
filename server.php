<?php
// Pull in the NuSOAP code
require_once("lib/nusoap.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Suppress deprecated warnings
error_reporting(E_ALL & ~E_DEPRECATED);

// Create the server instance
$server = new soap_server();

// Initialize WSDL support
$NAMESPACE = 'http://skincare.website/services';
$server->configureWSDL('Product', $NAMESPACE);
@$server->wsdl->schemaTargetNamespace = $NAMESPACE;

// Register complex data types
// Product complex type
$server->wsdl->addComplexType(
    'Product',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array('name' => 'id', 'type' => 'xsd:int'),
        'name' => array('name' => 'name', 'type' => 'xsd:string'),
        'category' => array('name' => 'category', 'type' => 'xsd:string'),
        'price' => array('name' => 'price', 'type' => 'xsd:decimal'),
        'discount_price' => array('name' => 'discount_price', 'type' => 'xsd:decimal'),
        'description' => array('name' => 'description', 'type' => 'xsd:string'),
        'image' => array('name' => 'image', 'type' => 'xsd:string'),
        'is_new' => array('name' => 'is_new', 'type' => 'xsd:boolean'),
        'is_best' => array('name' => 'is_best', 'type' => 'xsd:boolean')
    )
);

// Product Array complex type
$server->wsdl->addComplexType(
    'ProductArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array(
            'ref' => 'SOAP-ENC:arrayType',
            'wsdl:arrayType' => 'tns:Product[]'
        )
    ),
    'tns:Product'
);

// Input complex type
$server->wsdl->addComplexType(
    'SearchInput',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'input' => array('name' => 'input', 'type' => 'xsd:string')
    )
);

// Register the method to expose
$server->register(
    'getProduct', // method name
    array('searchParam' => 'tns:SearchInput'), // input parameters
    array('return' => 'tns:ProductArray'), // output parameters
    $NAMESPACE, // namespace
    $NAMESPACE . '#getProduct', // soapaction
    'rpc', // style
    'encoded', // use
    'Search for products by name' // documentation
);

// Define the method as a PHP function
function getProduct($searchParam) {
    // Debug input
    error_log("Search parameter received: " . print_r($searchParam, true));
    
    // Get the search term
    $searchTerm = isset($searchParam['input']) ? $searchParam['input'] : '';
    error_log("Search term: " . $searchTerm);
    
    // Connect to database
    require_once("includes/db_connection.php");
    
    // Initialize products array
                                // Handle description - may contain special characters
    $productsArray = [];
    
    // Prepare SQL query with search term
    if (!empty($searchTerm)) {
        // Search for products that match the search term
        $sql = "SELECT * FROM products WHERE name LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchPattern = "%" . $searchTerm . "%";
        $stmt->bind_param("s", $searchPattern);
    } else {
        // Return all products if no search term
        $sql = "SELECT * FROM products";
        $stmt = $conn->prepare($sql);
    }
    
    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if we have results
    if ($result->num_rows > 0) {
        // Fetch all products that match the criteria
        while ($row = $result->fetch_assoc()) {
            $product = [
                'id' => (int)$row['id'],
                'name' => $row['name'],
                'category' => $row['category'],
                'price' => (float)$row['price'],
                'discount_price' => ($row['discount_price'] !== null) ? (float)$row['discount_price'] : null,
                'description' => $row['description'],
                'image' => $row['image'],
                'is_new' => (bool)$row['is_new'],
                'is_best' => (bool)$row['is_best']
            ];
            $productsArray[] = $product;
        }
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
    
    error_log("Returning " . count($productsArray) . " products from database");
    return $productsArray;
}

// Use the request to invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$postdata = file_get_contents("php://input");
error_log("Raw POST data: " . $postdata);
$server->service($postdata);
?>
