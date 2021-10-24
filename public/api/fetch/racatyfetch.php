<?php
$mUrl = str_replace('.com', '.net', $_GET['url']);
$ch = curl_init();
$data = array(
    'op' => 'download2',
    'id' => basename($mUrl) ,
);
curl_setopt($ch, CURLOPT_URL, $mUrl);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$page = curl_exec($ch);
curl_close($ch);
$download = explode("<div id=\"DIV_1\" class=\"actions w-100 mt-4\">", $page);
preg_match("/<a style=\"visibility: hidden;\" id=\"uniqueExpirylink\" href=\"(.+?)\">/", $download[0], $download);
$url = $download[1];
header("Location: $url");
die();
?>