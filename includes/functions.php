<?php
require_once ('mysqli_connect.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// #########      الدالة date_default_timezone_set لتعين توقيت بلد معين   ########### //
$zone = "Asia/Riyadh";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($zone); 
//////////////////////////////////

// إعادة توجيه ///
 function redirect($page = '') {
 	$location = $page;  //DOMAIN.APP_PATH.
 	header('Location: '.$location);
 	exit;
}



?>