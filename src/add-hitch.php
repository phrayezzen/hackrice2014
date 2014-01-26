<?php

	require_once 'lib/firebaseLib.php';

	// --- set up your own database here
	$url = 'https://ymn.firebaseio.com/';
	$token = null;

	$path = "/hackrice/10%2F25%2F2013";

	$fb = new fireBase($url, $token);

	$hitch = array(
	  'name' => 'buh',
	);

	$response = $fb->set($path, $hitch);

	echo($response);

?>
