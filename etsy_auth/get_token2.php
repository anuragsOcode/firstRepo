<?php

$base_uri = 'https://openapi.etsy.com';

$api_key = 'qp0vzwkdkbbu57opv64psgyu';


$secret = 'wfli5nvcej';



$oauth = new OAuth($api_key, $secret);


$req_token = $oauth->getRequestToken($base_uri . '/v2/oauth/request_token?scope=', 'oob', "GET");



$login_url = $req_token['login_url'];


print "Please log in and allow access: $login_url \n\n";


$verifier = readline("Please enter verifier: ");

$verifier = trim($verifier);


$oauth->setToken($req_token['oauth_token'], $req_token['oauth_token_secret']);


$acc_token = $oauth->getAccessToken("https://openapi.etsy.com/v2/oauth/access_token", null, $verifier, "GET");


$oauth_token = $acc_token['oauth_token'];

$oauth_token_secret = $acc_token['oauth_token_secret'];



$oauth->setToken($oauth_token, $oauth_token_secret);



print "Token: $oauth_token \n\n";

print "Secret: $oauth_token_secret \n\n";