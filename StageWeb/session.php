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

ParseClient::initialize('Gc6spo6rrxcDJr5Trp23777SrPRmaCr9PEHDDvNl', 'plN46XaPPSsrMNO8gHImAEekGmnw8jgzuCMjY8jr', 'JZ6bHj9nQMXXxa43M0FdlbZSTkTdmYZe5d2XWtsd');

print_r($_SESSION);

?>