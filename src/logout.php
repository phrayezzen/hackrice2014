<?php
	/**
	 * Logout then redirect to login 
	 */
	setcookie('user', "", 1);
	header( 'Location: login.html' ) ;
	die();
?>
