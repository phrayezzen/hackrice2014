<?php
	
	$path = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	if(!isset($_GET["ticket"])){
		header( 'Location: https://netid.rice.edu/cas/login?service=' . $path ) ;
		die();
	} else {
		$ticket = $_GET["ticket"];
		$url = 'https://netid.rice.edu/cas/serviceValidate?ticket=' . $ticket . '&service=' . $path;
		//$xml = simplexml_load_file($url);
	
		$netid = trim(file_get_contents($url));
		$invalid = (strpos($netid, " ") === false);
		if( $invalid ) {
			header( 'Location: ./login.html' ) ;
			die();
		} else {
			setcookie('user', ((string)$netid) );
			header( 'Location: ./hitch.html' ) ;
			die();
		}
	}

?>
