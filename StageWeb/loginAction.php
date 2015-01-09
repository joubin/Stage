<?php
require_once('../vendor/autoload.php');
session_start();

include 'head.php';
include 'nav.php';

use Parse\ParseClient;
use Parse\ParseUser;

use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Parse\ParseSessionStorage;

ParseClient::initialize('Gc6spo6rrxcDJr5Trp23777SrPRmaCr9PEHDDvNl', 'plN46XaPPSsrMNO8gHImAEekGmnw8jgzuCMjY8jr', 'h1mZh8wnLjR5Tnjb4dNQMf46cBvDzOWBur0KwUMP');




$name = $_POST["email"];
$password = $_POST["password"];

	
try {
  $user = ParseUser::logIn($name, $password);
} catch (ParseException $error) {
	header("Location: login.php?badpassword");

}
if ($user->get("isBand")) {
	header("Location: band-home.php");
}else{
echo $user->get("firstlast");
}

include 'foot.php';
