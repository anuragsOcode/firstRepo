<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define("OAUTH_CONSUMER_KEY", '97w2kvv4i9sgxkhvlyds1qo3');
define("OAUTH_CONSUMER_SECRET", 'uld7l11z5r');

$key = '2e76c6c88be3d2fbc72944c470285a';

$storeurl = "http://openapi.etsy.com/v2/listings";

$products_params = array('description' => 'thisisdesc','materials' => 'yes','price'=>"5.99"
 ,'quantity'=>"2",'shipping_template_id'=>"52299",'shop_section_id'=>"1"
 ,'title'=>"thisistitle",'category_id'=>"i_did",'who_made'=>"5.99"
 ,'is_supply'=>"1",'when_made'=>"2010_2012");

$curl = curl_init();
  curl_setopt_array($curl,array(
  CURLOPT_URL => $storeurl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $products_params,
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: Bearer " . $key,
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if($err){
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>