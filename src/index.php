<?php
	/**
	 * Redirect user to login if needed.
	 */
	if($_COOKIE['user'] != null) {
		header( 'Location: hitch.html' ) ;
	} else {
		header( 'Location: login.html' ) ;
	}
	die();
?>
