<?php
    defined('_DEFVAR') or exit('Restricted Access');
    include 'simple_html_dom.php';
	require_once "support/web_browser.php";
	require_once "support/tag_filter.php";


function mUrl($raw_url) {      
    $web = new WebBrowser();
	$result = $web->Process($raw_url);
	$raw_html = $result["body"];

    $html = new simple_html_dom();   
    $html->load($raw_html);         
    foreach ($html->find('div[class=download-content]') as $element) {
        $links = $element->find('a');
        foreach ($links as $link) {
            $dUrl = 'https://dood.la'.$link->href;
            return $dUrl;
                    
        }
    }
}

function dUrl($mUrl) {
    $web = new WebBrowser();
	$result = $web->Process($mUrl);
    $raw_html = $result["body"];

    $html = new simple_html_dom();   
    $html->load($raw_html); 
    $btn = $html->find('.btn', 0);
    if ($btn) {
        $href = $btn->onclick;
        $href = str_replace("window.open('", "",$href);
        $href = str_replace("', '_self')", "",$href);
    
        return $href;
    }
}
?>