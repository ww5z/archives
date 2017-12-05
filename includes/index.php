<?php  session_start(); 

		
		// Send emails and do whatever else. redirect ('view_cart.php?id='.$oid.'');
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-555555, '/');
}

?>
   
<meta http-equiv="refresh" content="0; url=../sales.php" />