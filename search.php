<?php

use voku\helper\HtmlDomParser;
require_once 'composer/vendor/autoload.php';

require_once 'config.php';
require_once 'functions.php';

if (!isset($_REQUEST['page']) || !isset($_REQUEST['q'])) {
    sendErrorResponse("No page number or query.");
}

$page = $_REQUEST['page'];
$q = trim($_REQUEST['q']);

if(!ctype_digit($page)) {
    sendErrorResponse("Invalid page number.");
}

if ($q == "") {
    sendErrorResponse("Invalid query.");
}

$gogo_request_url = $gogourl . "/search.html?page=" . $page . "&keyword=" . $q;

$anime = extractAnime($gogo_request_url);

header('Content-Type: application/json');
echo json_encode($anime);