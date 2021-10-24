<?php
require 'steamtape.php';
$mUrl = $_GET['url'];
$url = getUrl($mUrl);

$data = get_headers($url, true);
$size = isset($data['Content-Length'])?(int) $data['Content-Length']:0;
header("Content-Length: $size");
header('Content-type: video/mp4');
header('Accept-Ranges: bytes');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Expose-Headers: Content-Length,Content-Range");
header("Access-Control-Allow-Headers: Range");

$headers = [];
$headers[] = 'Connection: keep-alive';
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Pragma: no-cache';
$range = isset($_SERVER['HTTP_RANGE']) ? $_SERVER['HTTP_RANGE'] : '';
if (!empty($range)) $headers[] = 'Range: ' . $range;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
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