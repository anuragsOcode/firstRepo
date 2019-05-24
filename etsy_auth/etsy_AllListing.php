<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define("OAUTH_CONSUMER_KEY", '97w2kvv4i9sgxkhvlyds1qo3');
define("OAUTH_CONSUMER_SECRET", 'uld7l11z5r');

$url = "http://openapi.etsy.com/v2/shops/GabrielandLorens/listings/active?method=GET&api_key=97w2kvv4i9sgxkhvlyds1qo3";

function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

  $responce =  file_get_contents_curl('https://openapi.etsy.com/v2/shops/GabrielandLorens/listings/active?method=GET&api_key=97w2kvv4i9sgxkhvlyds1qo3&limit=100&offset=0&includes=MainImage');

  $allData = json_decode($responce);

  echo "<pre>";
  print_r($allData);
  echo "</pre>";

  echo $allData->count;
?>