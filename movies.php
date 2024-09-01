<?php

use voku\helper\HtmlDomParser;
require_once 'composer/vendor/autoload.php';

require_once 'config.php';
require_once 'functions.php';

if (!isset($_REQUEST['page'])) {
    sendErrorResponse("No page number.");
}

$page = $_REQUEST['page'];

if(!ctype_digit($page)) {
    sendErrorResponse("Invalid page number.");
}

$gogo_request_url = $gogourl . "/anime-movies.html?aph=&page=" . $page;

$anime = extractAnime($gogo_request_url);

header('Content-Type: application/json');
echo json_encode($anime);