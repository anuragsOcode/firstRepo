<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define("OAUTH_CONSUMER_KEY", '97w2kvv4i9sgxkhvlyds1qo3');
define("OAUTH_CONSUMER_SECRET", 'uld7l11z5r');

$url = "http://openapi.etsy.com/v2/shops/GabrielandLorens/listings/active?method=GET&api_key=97w2kvv4i9sgxkhvlyds1qo3";
$session = curl_init();
curl_setopt($session, CURLOPT_URL, $url);
curl_setopt($session, CURLOPT_HTTPGET, 1); 
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($session);

echo "<pre>";
print_r($response);
echo "</pre>";

$abcd = json_decode('{"count":2,"results":[{"listing_id":685209601,"state":"active","user_id":44993034,"category_id":68892160,"title":"0.96ct Diamond 14k Rose Gold Crossover Ring Size 7","description":"Start with a brief overview that describes your item&#39;s finest features.\n\nList details like dimensions and key features in easy-to-read bullet points.\n\nTell buyers a bit about your process or the story behind this item.","creation_tsz":1550829577,"ending_tsz":1561193977,"original_creation_tsz":1550829577,"last_modified_tsz":1550829578,"price":"1231.00","currency_code":"USD","quantity":1,"sku":[],"tags":[],"category_path":["Weddings","Bouquet"],"category_path_ids":[68887494,68892160],"materials":[],"shop_section_id":null,"featured_rank":null,"state_tsz":1550829577,"url":"https:\/\/www.etsy.com\/listing\/685209601\/096ct-diamond-14k-rose-gold-crossover?utm_source=glkapiintegration&utm_medium=api&utm_campaign=api","views":0,"num_favorers":0,"shipping_template_id":null,"processing_min":1,"processing_max":2,"who_made":"i_did","is_supply":"false","when_made":"2010_2019","item_weight":"16","item_weight_unit":"oz","item_length":"12","item_width":"12","item_height":"12","item_dimensions_unit":"in","is_private":false,"recipient":null,"occasion":null,"style":null,"non_taxable":false,"is_customizable":true,"is_digital":false,"file_data":"","should_auto_renew":true,"language":"en-US","has_variations":false,"taxonomy_id":1659,"taxonomy_path":["Weddings","Accessories","Bouquets & Corsages","Bouquets"],"used_manufacturer":false,"MainImage":{"listing_image_id":1789003088,"hex_code":null,"red":null,"green":null,"blue":null,"hue":null,"saturation":null,"brightness":null,"is_black_and_white":null,"creation_tsz":null,"listing_id":685209601,"rank":null,"url_75x75":"https:\/\/i.etsystatic.com\/9224013\/d\/il\/ae4b56\/1789003088\/il_75x75.1789003088_7ovt.jpg?version=0","url_170x135":"https:\/\/i.etsystatic.com\/9224013\/d\/il\/ae4b56\/1789003088\/il_170x135.1789003088_7ovt.jpg?version=0","url_570xN":"https:\/\/i.etsystatic.com\/9224013\/r\/il\/ae4b56\/1789003088\/il_570xN.1789003088_7ovt.jpg","url_fullxfull":"https:\/\/i.etsystatic.com\/9224013\/r\/il\/ae4b56\/1789003088\/il_fullxfull.1789003088_7ovt.jpg","full_height":null,"full_width":null}}],"params":{"limit":"1","offset":0,"page":null,"shop_id":"GabrielandLorens","keywords":null,"sort_on":"created","sort_order":"down","min_price":null,"max_price":null,"color":null,"color_accuracy":0,"tags":null,"category":null,"translate_keywords":"false","include_private":0},"type":"Listing","pagination":{"effective_limit":1,"effective_offset":0,"next_offset":1,"effective_page":1,"next_page":2}}');

echo "<pre>";
print_r($abcd);
echo "</pre>";

?>