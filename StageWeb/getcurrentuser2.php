<?php
require_once('../vendor/autoload.php');

error_reporting(E_ALL);

session_start();
register_shutdown_function( "fatal_handler" );




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
print_r( $currentUser->get("firstlast") );

