<?php
require 'vendor/autoload.php';
$raw_url = $_GET['url'];
$client = new GuzzleHttp\Client();
$request = $client->get($raw_url,  ['allow_redirects' => false]);

$html = $request->getBody(true);

$d1 = get_string_between($html, "const sources =", "var hls_config");
$d2 = get_string_between($d1, "hls", "video_height");

$m_url = substr($d2, 4, -8);

header("Location: $m_url");
die();

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
 }