<?php

use voku\helper\HtmlDomParser;
require_once 'composer/vendor/autoload.php';

require_once 'config.php';
require_once 'functions.php';

if (!isset($_REQUEST['page']) || !isset($_REQUEST['type'])) {
    sendErrorResponse("No page number or type.");
}

$page = $_REQUEST['page'];
$type = $_REQUEST['type'];

if(!ctype_digit($page) || !ctype_digit($type)) {
    sendErrorResponse("Invalid page number or type.");
}

$gogo_request_url = $gogo_ajax_url . "/page-recent-release.html?type=" . $type . "&page=" . $page;

$html = getHtmlFromUrl($gogo_request_url);

$dom = HtmlDomParser::str_get_html($html);

$items = $dom->findOne('.items')->findMulti("li");

$anime = array();

foreach ($items as $item) {

    $episode_id = "";
    $anime_id = "";
    $anime_name = "";
    $thumbnail = "";
    $episode_number = "";
    $sub_or_dub = "sub";
    
    $episode_id = $item->findOne("a")->getAttribute("href");

    if ($episode_id[0] === '/') {
        $episode_id = substr($episode_id, 1);
    }

    $anime_name = $item->findOne("a")->getAttribute("title");

    $thumbnail = $item->findOne("img")->getAttribute("src");

    $episode_id_parts = explode("-episode-", $episode_id);

    $anime_id = $episode_id_parts[0];
    $episode_number = $episode_id_parts[1];

    if($type == "2") {
        $sub_or_dub = "dub";
    }

    $anime_info_array = array(
        "episodeId" => $episode_id,
        "animeId" => $anime_id,
        "animeTitle" => $anime_name,
        "animeImg" => $thumbnail,
        "episodeNum" => $episode_number,
        "subOrDub" => $sub_or_dub
    );

    $anime[] = $anime_info_array;
}

header('Content-Type: application/json');
echo json_encode($anime);