<?php

use voku\helper\HtmlDomParser;
require_once 'composer/vendor/autoload.php';

function getHtmlFromUrl($url) {

    global $userAgent;

    $options = [
        "http" => [
            "header" => "User-Agent: " . $userAgent . "\r\n"
        ]
    ];
    
    $context = stream_context_create($options);
    
    // Use file_get_contents with the context
    $content = file_get_contents($url, false, $context);
    
    if ($content === FALSE) {
        // Handle the error
        die("Error fetching the content.");
    } else {
        // Output the content
        return $content;
    }
}

// ---------------------------------------------------------

function encryptStringAES($data, $key, $iv) {
    $method = 'AES-256-CBC'; // AES-256-CBC is equivalent to AES with a 256-bit key in CBC mode with PKCS5 padding

    // Ensure the key and IV are of the correct length
    if (strlen($key) !== 32) {
        $key = substr(hash('sha256', $key, true), 0, 32); // 32 bytes for AES-256
    }
    if (strlen($iv) !== 16) {
        $iv = substr(hash('sha256', $iv, true), 0, 16); // 16 bytes for AES-CBC
    }

    // Encrypt the data
    $encryptedBytes = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);

    // Encode the result to Base64
    return base64_encode($encryptedBytes);
}

// ------------------------------------------------------------

function decryptStringAES($encryptedData, $key, $iv) {
    $method = 'AES-256-CBC'; // AES-256-CBC is equivalent to AES with a 256-bit key in CBC mode with PKCS5 padding

    // Ensure the key and IV are of the correct length
    if (strlen($key) !== 32) {
        $key = substr(hash('sha256', $key, true), 0, 32); // 32 bytes for AES-256
    }
    if (strlen($iv) !== 16) {
        $iv = substr(hash('sha256', $iv, true), 0, 16); // 16 bytes for AES-CBC
    }

    // Decode the encrypted data from Base64
    $decodedBytes = base64_decode($encryptedData);

    // Decrypt the data
    $decryptedBytes = openssl_decrypt($decodedBytes, $method, $key, OPENSSL_RAW_DATA, $iv);

    return $decryptedBytes;
}


// ------------------------------------------------------------


function generateEncryptAjaxParameters($html, $id) {

    global $iv, $firstKey;

    $encryptedToken = "";

    // Encrypt the ID
    $encryptedId = encryptStringAES($id, $firstKey, $iv);

    // Load the HTML document
    $document = HtmlDomParser::str_get_html($html);

    // Select the script tag
    $scriptTags = $document->findMulti("script");

    foreach ($scriptTags as $scriptTag) {
        
        if ($scriptTag->hasAttribute("data-name")) {
            
            if (strtolower($scriptTag->getAttribute("data-name")) == "episode") {
                
                // Get the encrypted token
                $encryptedToken = $scriptTag->getAttribute('data-value');
            }
        }
    }

    if (empty($encryptedToken)) {
        
        die("Error parsing script tag");
    }

    // Decrypt the token
    $token = decryptStringAES($encryptedToken, $firstKey, $iv);

    // Return the generated parameters
    return 'id=' . $encryptedId . '&alias=' . $id . '&' . $token;
}

// ------------------------------------------------------------

function decryptEncryptAjaxResponse($obj) {

    global $secondKey, $iv;

    // Decrypt the string
    $decrypted = decryptStringAES($obj, $secondKey, $iv);

    // Parse the decrypted string as JSON and return it as an associative array
    return $decrypted;
}

// -----------------------------------------------------------

function fetchUrl($requestURL) {

    global $userAgent;

    // Set headers
    $opts = [
        'http' => [
            'method' => 'GET',
            'header' => "User-Agent: $userAgent\r\n" .
                        "X-Requested-With: XMLHttpRequest\r\n"
        ]
    ];

    // Create a stream context
    $context = stream_context_create($opts);

    // Fetch the URL using file_get_contents
    $response = file_get_contents($requestURL, false, $context);

    // Check for errors
    if ($response === false) {
        echo "Failed to fetch data.";
        return null;
    }

    // Parse the JSON response
    $responseData = json_decode($response, true);

    return $responseData;
}

// --------------------------------------------------------

function sendErrorResponse($message){

    header('Content-Type: application/json');

    $response = array("error" => $message);

    echo json_encode($response);
    
    die();
}

// --------------------------------------------------------

function extractAnime($url) {

    $html = getHtmlFromUrl($url);

    $dom = HtmlDomParser::str_get_html($html);

    $items = $dom->findOne('.items')->findMulti("li");

    $anime = array();

    foreach ($items as $item) {

        $anime_id = "";
        $anime_name = "";
        $thumbnail = "";
        $release_date = "";
        
        $anime_id = trim($item->findOne("a")->getAttribute("href"));

        $anime_id = str_replace("/category/", "", $anime_id);

        $anime_name = $item->findOne("a")->getAttribute("title");

        $thumbnail = $item->findOne("img")->getAttribute("src");

        $release_date = trim(str_replace("released:", "", strtolower($item->findOne(".released")->text())));

        $anime_info_array = array(
            "animeId" => $anime_id,
            "animeTitle" => $anime_name,
            "animeImg" => $thumbnail,
            "releasedDate" => $release_date,
        );

        $anime[] = $anime_info_array;
    }

    return $anime;
}