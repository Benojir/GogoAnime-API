<?php

use voku\helper\HtmlDomParser;
require_once 'composer/vendor/autoload.php';

require_once 'config.php';
require_once 'functions.php';

if (!isset($_REQUEST['page']) || !isset($_REQUEST['genre'])) {
    sendErrorResponse("No page number or query.");
}

$page = $_REQUEST['page'];
$genre = trim($_REQUEST['genre']);

if(!ctype_digit($page)) {
    sendErrorResponse("Invalid page number.");
}

if ($genre == "") {
    sendErrorResponse("Invalid genre.");
}

$gogo_request_url = $gogourl . "/genre/" . $genre . "?page=" . $page;

$anime = extractAnime($gogo_request_url);

header('Content-Type: application/json');
echo json_encode($anime);