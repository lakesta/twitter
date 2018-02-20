<?php
/* New REST Client based on PHP cURL */
require "RESTClient.php";
$client = new RESTClient();

/* Setup a default Twitter acct to pull from if none are given */
$user = "blakegriffin";
if ($_GET["user"] != "")
	$user = $_GET["user"];

/* Setup some defaults */
$format = "xml";
$url = "https://api.twitter.com/1/statuses/user_timeline";
$url .= "." . $format;
$params = array("screen_name" => $user, "count" => 50, "include_entities" => "false", "exclude_replies" => "true");  

/* Grab the tweets for the given user */
$result = $client->get($url, $params);
$xml = simplexml_load_string($result);
$count = 1;

/* Shove all the tweets into a javascript array */
foreach ($xml->status as $status) {
	$user = $status->user;
	$text = $status->text;
	if ($count == 1) {
		$user_img = $user->profile_image_url;
		$user_name = $user->screen_name;
		echo "var image='".$user_img."';\n";
		echo "var username='".$user_name."';\n";
		echo "var tweets = new Array();\n";
	}
	echo "tweets[".$count."] = '".htmlentities($text, ENT_QUOTES)."';\n";
	$count++;
}
?>

