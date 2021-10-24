<?php
define('_DEFVAR', 1);
include 'get_ds.php';


$url = $_GET['url'];
$pUrl = dUrl(mUrl($url));

$headers = [];
header('Content-type: video/mp4');
header('Accept-Ranges: bytes');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Expose-Headers: Content-Length,Content-Range");
header("Access-Control-Allow-Headers: Range");
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Accept-Encoding: gzip, deflate, br';
$headers[] = 'Accept-Language: en-IN,en-US;q=0.9,en;q=0.8,bn;q=0.7,id;q=0.6,pt;q=0.5,hr;q=0.4';
$headers[] = 'Connection: keep-alive';
$headers[] = 'DNT: 1';
$headers[] = 'Host: xo247l.dood.video';
$headers[] = 'Referer: https://dood.la/';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: cross-site';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36';
$range = isset($_SERVER['HTTP_RANGE']) ? $_SERVER['HTTP_RANGE'] : '';
if (!empty($range)) $headers[] = 'Range: ' . $range;
// rand(900000, 1500000)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $pUrl);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_TIMEOUT, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
session_write_close();
curl_exec($ch);
curl_close($ch);


?>