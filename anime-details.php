<?php

use voku\helper\HtmlDomParser;
require_once 'composer/vendor/autoload.php';

require_once 'config.php';
require_once 'functions.php';

if (!isset($_REQUEST['id'])) {
    sendErrorResponse("No anime id is provided..");
}

$anime_id = trim($_REQUEST['id']);

if($anime_id == "") {
    sendErrorResponse("Invalid anime id.");
}

$gogo_request_url = $gogourl . "/category/" . $anime_id;

$html = getHtmlFromUrl($gogo_request_url);

$dom = HtmlDomParser::str_get_html($html);

$episodes = array();

$anime_info_body = $dom->findOne('.anime_info_body');

$thumbnail = $anime_info_body->findOne("img")->getAttribute("src");
$anime_name = $anime_info_body->findOne("h1")->text();
$plot = $anime_info_body->findOne(".description")->text();
$anime_type ="";
$genres = "";
$release_date = "";
$status = "";
$other_names = "";

$types = $anime_info_body->findMulti(".type");

foreach ($types as $type) {
    
    if (strpos(strtolower($type->text()), "type:") !== false) {
        $anime_type = trim(str_replace("Type:", "", $type->text()));
    }

    if (strpos(strtolower($type->text()), "genre:") !== false) {
        $genres = trim(str_replace("genre:", "", strtolower($type->text())));
    }

    if (strpos(strtolower($type->text()), "released:") !== false) {
        $release_date = trim(str_replace("released:", "", strtolower($type->text())));
    }

    if (strpos(strtolower($type->text()), "status:") !== false) {
        $status = trim(str_replace("status:", "", strtolower($type->text())));
    }

    if (strpos(strtolower($type->text()), "other name:") !== false) {
        $other_names = trim(str_replace("Other name:", "", $type->text()));
    }
}

$li_tags = $dom->findOne("#episode_page")->findMulti("li");

if (count($li_tags) > 0) {
    
    $last_li = $li_tags[count($li_tags) -1];

    $last_episode_num = $last_li->findOne("a")->getAttribute("ep_end");

    $movie_id = $dom->findOne("#movie_id")->getAttribute("value");

    $gogo_ajax_episodes_url = $gogo_ajax_url . "/load-list-episode?default_ep=0&ep_start=0&ep_end=" . $last_episode_num . "&alias=" . $anime_id . "&id=" . $movie_id;

    $episodes_page_html = getHtmlFromUrl($gogo_ajax_episodes_url);

    $ep_dom = HtmlDomParser::str_get_html($episodes_page_html);

    $a_tags = $ep_dom->findMulti("a");

    foreach ($a_tags as $a) {
        
        $episode_id = trim($a->getAttribute("href"));

        if ($episode_id[0] === '/') {
            $episode_id = substr($episode_id, 1);
        }

        $episode_number = trim(str_replace("\"", "", str_replace("ep", "", strtolower($a->findOne(".name")->text()))));

        $episodes[] = array(
            "episodeId" => $episode_id,
            "episodeNum" => $episode_number
        );
    }

    $anime_info = array(
        "animeTitle" => $anime_name,
        "animeImg" => $thumbnail,
        "type" => $anime_type,
        "releasedDate" => $release_date,
        "status" => ucwords($status),
        "genres" => $genres,
        "synopsis" => $plot,
        "otherNames" => $other_names,
        "totalEpisodes" => count($episodes),
        "episodesList" => array_reverse($episodes)
    );


    header('Content-Type: application/json');
    echo json_encode($anime_info);
}