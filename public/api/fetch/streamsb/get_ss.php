<?php
require 'vendor/autoload.php';
$raw_url = $_GET['url'];
$client = new GuzzleHttp\Client();
$request = $client->get($raw_url,  ['allow_redirects' => false]);

$html = $request->getBody(true);

$parsed = get_string_between($html, '[{file:', '}]');
$m_url = substr($parsed, 1, -1);
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