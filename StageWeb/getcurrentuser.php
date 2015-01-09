<?php
require_once('../vendor/autoload.php');
error_reporting(E_ALL);

session_start();
// register_shutdown_function( "fatal_handler" );


function fatal_handler() {
	$error = error_get_last();
	print_r($error);
	session_unset(); 
	session_destroy();
	header("Location: login.php?timeout");

}

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


// print_r( $currentUser->get("firstlast") );
// echo '<a href="getcurrentuser2.php"> this will break</a>';
function init(){
	ParseClient::initialize('Gc6spo6rrxcDJr5Trp23777SrPRmaCr9PEHDDvNl', 'plN46XaPPSsrMNO8gHImAEekGmnw8jgzuCMjY8jr', 'h1mZh8wnLjR5Tnjb4dNQMf46cBvDzOWBur0KwUMP');
}
function getUser(){
	try {
		init();
		$currentUser = ParseUser::getCurrentUser(); 
		if ($currentUser) {
			return $currentUser;	
		}else{
			header("Location: login.php?timeout");
		}
	} catch (Exception $e) {
		header("Location: login.php?timeout");
	}


}

function getUserName(){
	$currentUser = getUser();
	echo $currentUser->get("firstlast");
}

function getBio(){
	$currentUser = getUser();
	$query = new ParseQuery("BAND");
	$query->equalTo("Owner", $currentUser);
	$results = $query->find();
	$band = array_shift($results);
	print_r($band->get("Bio"));
}

function updateBio(){
	$currentUser = getUser();
	$query = new ParseQuery("BAND");
	$query->equalTo("Owner", $currentUser);
	$results = $query->find();
	$band = array_shift($results);
	$band->set("Bio", $_POST["value"]);
	$band->save();
}

function getImage(){
	$currentUser = getUser();
	$query = new ParseQuery("BAND");
	$query->equalTo("Owner", $currentUser);
	$results = $query->find();
	$band = array_shift($results);
	$contentOfFile = $band->get("ImageBlob")->getURL();
	echo $contentOfFile;
}


function getEvents(){
	$currentUser = getUser();
	$query = new ParseQuery("Event");
	$results = $query->find();
	foreach ($results as $key) {
		echo '<div class="informatiemelding success alert-success" style="display">';
		echo "<p>".$key->get("EventName")." ".$key->get("Start")->format('Y-m-d H:i:s')."</p>";
		echo '</div>';
		$bands = $key->get('Bands');
		foreach ($bands as $band) {
			$bandQuery = new ParseQuery("BAND");
			$bandQuery->equalTo("objectId", $band);
			$thisBand = $bandQuery->find()[0];
			try {
				echo '<div id="mycarousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="item active">
						<img style="max-width:100%;" src="'.$thisBand->get("ImageBlob")->getURL().'" alt="" class="img-responsive">
						<div class="carousel-caption">
							'.$thisBand->get("BandName").'
						</div>
					</div>
				</div>
			</div>
			';

		} catch (Exception $e) {

		}

	}
	echo '<div class="spacer"></div>';
}

}

function getAllBands(){
	$currentUser = getUser();
	$query = new ParseQuery("BAND");
	$results = $query->find();
	return $results;
}


function createEvent(){
	$currentUser = getUser();
	$newEvent = new ParseObject("Event");
	$newEvent->setArray("Bands", $_POST['e9']);
	$newEvent->set("Latitude", floatval($_POST['lat']));
	$newEvent->set("Longitude", floatval($_POST['lon']));
	$newEvent->set("Range", 1);
	// 01/31/2015 4:21 AM
	$date = new DateTime($_POST['eventdate']);
	$newEvent->set("Start", $date);
	$newEvent->set("EventName", $_POST['eventname']);
	$newEvent->save();
	// header("Location: band-home.php");

}

function unsetCookies(){
	if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
}

function resetPassword(){
	init();
	$email = $_POST['email'];
	ParseUser::requestPasswordReset($email);

}

// function clearSessions(){
// 	getUser();
// 	$sessions = ParseSessionStorage::getKeys();
// 	print_r($sessions);
// 	echo "asd";
// }

if (isset($_POST["updatedBio"])) {
	updateBio();
	echo "asd";
}

if (isset($_POST) && isset($_POST['addevent']) &&$_POST['addevent'] === 'yes') {
	createEvent();
}

if (isset($_FILES['myfile'])) {
	$currentUser = getUser();
	$query = new ParseQuery("BAND");
	$query->equalTo("Owner", $currentUser);
	$results = $query->find();
	$band = array_shift($results);
	$localFilePath = $_FILES['myfile']['tmp_name'];
	$resource = new Imagick($localFilePath);
	$geo = $resource->getImageGeometry();
	$ratio = $geo['width']/$geo['height'];
	if ($ratio != 2.5) {
		$band->set("ratio", (string) $ratio);
		$band->save();
		echo "Your image did not follow our guidlines. Make sure the image is 5:2 ratio and atleaset 1000 px wide";
		return;

	}
	$file = ParseFile::createFromFile($localFilePath, "myfile.txt");
	$ratio = $resource->getImageTotalInkDensity();
	$band->set("ratio", (string) $ratio);
	$band->save();


	$band->set("ImageBlob", $file);
	$band->save();
	unlink($localFilePath);
	echo "good upload";

}

if (isset($_GET['logout'])) {
	$user = getUser();
	$user->logout();
	header("Location: login.php?logout");
}



if (isset($_GET['showinfo'])) {
	$user = getUser();
	print_r($user);
	if ($user == null) {
		echo "no user";
	}
}


if (isset($_POST["reset"])) {
	resetPassword();
	
}

// if (isset($_GET['clearSessions'])) {
// 	clearSessions();

// }


