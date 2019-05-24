<?php
//setting API key

define("API_KEY", '97w2kvv4i9sgxkhvlyds1qo3');

function get_listings($page=1){

    $url = "https://openapi.etsy.com/v2/listings/active?keywords=unicorn,unicorns&includes=Images:1:0&api_key=" . API_KEY;

    $url .= "&page=$page";
    $url .= "&limit=5";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response_body=curl_exec($curl);
    curl_close($curl);

    $responseObject = json_decode($response_body);
    return $responseObject;
}                   

function process_listings($responseObject){

    foreach ($responseObject->results as $listing) {
        echo "Title: " . $listing->title . PHP_EOL . 
            "Price " . $listing->price . PHP_EOL . 
            "Currency code " . $listing->currency_code . PHP_EOL . 
            'URL ' . $listing->url . PHP_EOL.
            '<br>';

    }

    print PHP_EOL . "Pagination " . $responseObject->pagination->next_page . PHP_EOL;
    $next_page = $responseObject->pagination->next_page;
    if ($next_page) {
        $nextPageResponse = get_listings($next_page);
        process_listings($nextPageResponse);
    }
}

$firstPage = get_listings(); // page 1 is default
process_listings($firstPage);