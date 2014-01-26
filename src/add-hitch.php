<?php
	require_once 'lib/firebaseLib.php';
	
	//$place = "HOU";
	//$datetime = "01-20-3201";
	$place = $_GET["place"];
	$date = $_GET["date"];
	$time = $_GET["time"];

	//$user = $_COOKIE["user"];
	$user = "amn2";

	/* get name from netid*/
	$name = "name".$user;

	// --- set up your own database here
	$url = 'https://ymn.firebaseio.com/';
	$token = null;

	$path = "/hackrice/" . $date . "/" . $place;
	//echo($path . "\n");

	$fb = new fireBase($url, $token);

	$hitch = array(
	  $user => array(
		"name" => $name,
		"time" => $time
	  )
	);

	$response = $fb->set($path, $hitch);

	//echo($response);

	header( 'Location: results.php?date=' . $date . '&place=' . $place ) ;

?>
