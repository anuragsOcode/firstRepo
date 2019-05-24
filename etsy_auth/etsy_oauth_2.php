<?php
$key = "97w2kvv4i9sgxkhvlyds1qo3";
$secret = "uld7l11z5r";

$request_token = "ed8fad265fa8f128faae5e11d24ff2";
$request_token_secret = "97w2kvv4i9sgxkhvlyds1qo3";
$verifier = "0128cdba";

define("OAUTH_CONSUMER_KEY", '97w2kvv4i9sgxkhvlyds1qo3');
define("OAUTH_CONSUMER_SECRET", 'uld7l11z5r');

$oauth = new OAuth(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET);

print "you said {$verifier}\n\n";
print "now let's see what we can get back from Etsy...\n\n";

$oauth->setToken($request_token, $request_token_secret);

echo "I am here";
echo $access_token=$oauth->getAccessToken("https://openapi.etsy.com/v2/oauth/access_token", null, $verifier, "GET");

print_r($access_token);
?>