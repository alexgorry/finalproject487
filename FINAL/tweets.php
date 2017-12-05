<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "937757795138588672-kfBjEg38YahGRceMqM1la9Yd6FNU2LL",
    'oauth_access_token_secret' => "pCRPBgAOR3BLI8fVogBwbdPe8burbMO9sR9IhIkfs3AJM",
    'consumer_key' => "s3uxEved6vk0nZOfrpkzVj6mr",
    'consumer_secret' => "LObZrx45jhuKugC544uMOr4nRBHBYAJU8HNPdgdndcfSBeF3ix"
);
/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
// $url = 'https://api.twitter.com/1.1/blocks/create.json';
// $requestMethod = 'GET';
//
// /** POST fields required by the URL above. See relevant docs as above **/
// $postfields = array(
//     'screen_name' => 'usernameToBlock',
//     'skip_status' => '1'
// );
/** Perform a POST request and echo the response **/
// $twitter = new TwitterAPIExchange($settings);
// echo $twitter->buildOauth($url, $requestMethod)
//              ->setPostfields($postfields)
//              ->performRequest();
/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=steven_king';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$tweetData = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc=TRUE);
foreach($tweetData['statuses'] as $index => $items){
  $userArray = $items['user'];
  echo '<div class=<a href="http://twitter.com/' . $userArray['screen_name'] . '"><img src="' . $userArray['profile_image_url'] . '"></a>';
  echo $userArray['screen_name'] . "<br />";
  echo $items['text']. "<br />";
}
?>