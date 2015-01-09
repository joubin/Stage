<?php
require_once('../vendor/autoload.php');
session_start();



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


$currentUser = ParseUser::getCurrentUser(); 
print_r( "<p>" . $currentUser->get("firstlast") . " </p><p>is the user</p>" );
?>