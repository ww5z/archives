<?php
require_once ('functions.php');

 session_start();
 function check_login() {
	if ( !isset($_COOKIE['user']['loggedin']) && !isset($_COOKIE['user']['id']) ) {
		redirect('register/login.php');
	}
}
 
?>