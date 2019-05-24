<?php
error_reporting(E_ALL);

ini_set('display_errors', 1);

$base_uri = 'https://openapi.etsy.com';

$api_key = '97w2kvv4i9sgxkhvlyds1qo3';

$secret = 'uld7l11z5r';

$oauth = new OAuth($api_key, $secret);

$req_token = $oauth->getRequestToken($base_uri . '/v2/oauth/request_token?scope=', 'oob', "GET");

$login_url = $req_token['login_url'];

print "Please log in and allow access: <a href='$login_url'>$login_url</a> ";

$verifier = readline("Please enter verifier:");

$verifier = trim('9db4d187');

$oauth->setToken($req_token['oauth_token'], $req_token['oauth_token_secret']);

$acc_token = $oauth->getAccessToken($base_uri . '/v2/oauth/access_token', null, $verifier, "GET");

$oauth_token = $acc_token['oauth_token'];

$oauth_token_secret = $acc_token['oauth_token_secret'];

$oauth->setToken($oauth_token, $oauth_token_secret);

print "Token: $oauth_token ";

print "Secret: $oauth_token_secret ";

/*
url = 'https://openapi.etsy.com/v2/listings'
payload = {'listing_id':'342434342', 'image': ("test1.jpg", open('C:\\Users\\abc\\test1.jpg'),'image/jpeg'),'type':'image/jpeg'}
result = etsy.put(url, params=payload)
print result
*/