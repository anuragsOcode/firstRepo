<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define("OAUTH_CONSUMER_KEY", '97w2kvv4i9sgxkhvlyds1qo3');
define("OAUTH_CONSUMER_SECRET", 'uld7l11z5r');

$oauth = new OAuth(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET);
$req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_r", 'oob', "GET");
print $req_token['login_url']."\n";
/***********************************************************************/
?>