<?php
include 'head.php';
include 'nav.php';

require_once('../vendor/autoload.php');
use Parse\ParseClient;
 
ParseClient::initialize('Gc6spo6rrxcDJr5Trp23777SrPRmaCr9PEHDDvNl', 'plN46XaPPSsrMNO8gHImAEekGmnw8jgzuCMjY8jr', 'JZ6bHj9nQMXXxa43M0FdlbZSTkTdmYZe5d2XWtsd');
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;

$name = $_POST["user"];
$password = $_POST["password"];
$email = $_POST["email"];
$isBand = $_POST["isBand"] == "true" ? true : false;


$user = new ParseUser();
$user->set("firstlast", $name);
$user->set("username", $email);
$user->set("password", $password);
$user->set("email", $email);
$user->set("isBand", $isBand);

 echo '<div class="container-fluid toTheBottom">';

try {
  $user->signUp();
  echo '<div class="alert alert-success" role="alert">User created. Verify your email and <a href="login.php">login</a></div>';
  	if ($isBand) {
		$bandObject = ParseObject::create("BAND");
		$bandObject->set("Owner", $user);
		$bandObject->set("BandName", $name);
		$bandObject->save(); 
	}



} catch (ParseException $ex) {
  // Show the error message somewhere and let the user try again.
	echo '<div class="danger alert-danger" role="alert">"';
  echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
  echo '</div>';
}
echo '</div>';

include 'foot.php';
