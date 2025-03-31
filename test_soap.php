<?php
// Enable error reporting for debugging
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', 1);

// Test if the NuSOAP library is loaded correctly
if (!file_exists('lib/nusoap.php')) {
    die("NuSOAP library not found. Please check the path.");
}

echo "<h1>SOAP Service Test</h1>";
echo "<p>Testing SOAP functionality...</p>";

// Include the NuSOAP library
require_once('lib/nusoap.php');

// Create a SOAP client
$url = "http://localhost:8888/skinCareWebsite/server.php?wsdl";
echo "<p>Connecting to SOAP service at: $url</p>";

$client = new nusoap_client($url, false);
// Debug mode is enabled in the client

// Check for errors
$err = $client->getError();
if ($err) {
    echo "<h2>Constructor error</h2><pre>" . $err . "</pre>";
    exit();
}

// Test with a simple search term
$params = array('input' => 'cream');
echo "<p>Searching for products containing: 'cream'</p>";

// Call the SOAP method
$result = $client->call('getProduct', array('searchParam' => $params));

// Debug information
echo "<h2>SOAP Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";

echo "<h2>SOAP Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";

// Check for a fault
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
    // Check for errors
    $err = $client->getError();
    if ($err) {
        echo "<h2>Error</h2><pre>" . $err . "</pre>";
    } else {
        // Display the result
        echo "<h2>Result</h2>";
        echo "<pre>";
        print_r($result);
        echo "</pre>";
        
        // Show number of products found
        if (is_array($result)) {
            echo "<p>Found " . count($result) . " product(s) matching 'cream'</p>";
        } else {
            echo "<p>No products found or unexpected result type: " . gettype($result) . "</p>";
        }
    }
}
?>
