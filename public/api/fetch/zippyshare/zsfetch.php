<?php
include './core.php';
$mUrl = $_GET['url'];
$Url = fetchUrl($mUrl);
header("Location: $Url");
die();
?>