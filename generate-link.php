<?php

use voku\helper\HtmlDomParser;
require_once 'composer/vendor/autoload.php';

require_once 'config.php';
require_once 'functions.php';

if (!isset($_REQUEST['id'])) {
    sendErrorResponse("No id found.");
}

if (trim($_REQUEST['id']) == "") {
    sendErrorResponse("No id provided.");
}

$episodeID = trim($_REQUEST['id']);

$episodeLink = $gogourl . "/" . $episodeID;

$html = getHtmlFromUrl($episodeLink);


$dom = HtmlDomParser::str_get_html($html);

$embedLink = $dom->findOne('iframe'); 

$iframe = $embedLink->getAttribute("src");

// Parse the URL
$parsed_url = parse_url($iframe);

// Get the protocol
$embedLinkProtocol = $parsed_url['scheme'];

// Get the host
$embedLinkHost = $parsed_url['host'];

// Parse the query string into an array
parse_str($parsed_url['query'], $query_params);

// Get the 'id' value
$id_value = $query_params['id'];

$iframeHtml = getHtmlFromUrl($iframe);

$params = generateEncryptAjaxParameters($iframeHtml, $id_value);

$requestURL = $embedLinkProtocol . "://" . $embedLinkHost . "/encrypt-ajax.php" . "?" . $params;

$responseData = fetchUrl($requestURL)["data"];

header('Content-Type: application/json');
echo decryptEncryptAjaxResponse($responseData);