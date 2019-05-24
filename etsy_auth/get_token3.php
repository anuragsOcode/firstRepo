<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$api_key = 'qp0vzwkdkbbu57opv64psgyu';
$secret = 'wfli5nvcej';

define("OAUTH_CONSUMER_KEY", $api_key);
define("OAUTH_CONSUMER_SECRET", $secret);

$oauth = new OAuth(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET);
$req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token", 'oob');

$login_url = sprintf(
  "%s?oauth_consumer_key=%s&oauth_token=%s",
  $req_token['login_url'],
  $req_token['oauth_consumer_key'],
  $req_token['oauth_token']
);

print $login_url;

$handle = fopen("php://stdin","r");
$line = fgets($handle);
$request_token = $req_token['oauth_token'];
$request_token_secret = $req_token['oauth_token_secret'];
$verifier = trim($line);

print "you said {$verifier}\n\n";

$oauth->setToken($request_token, $request_token_secret);
try {
  $access_token = $oauth->getAccessToken("http://openapi.etsy.com/v2/sandbox/oauth/access_token", null, $verifier);
} catch (OAuthException $e) {
  print_r($e->getMessage());
}
$oauth_token = $access_token['oauth_token'];
$oauth_token_secret = $access_token['oauth_token_secret'];
$oauth->setToken($oauth_token, $oauth_token_secret);
try {
  $data = $oauth->fetch("http://openapi.etsy.com/v2/sandbox/private/users/__SELF__");
  $json = $oauth->getLastResponse();
  print_r(json_decode($json, true));
} catch (OAuthException $e) {
  error_log($e->getMessage());
  error_log(print_r($oauth->getLastResponse(), true));
  error_log(print_r($oauth->getLastResponseInfo(), true));
  exit;
}
?>
