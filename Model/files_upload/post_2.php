<?php
//var_dump($_POST, $_FILES);
// if $_post and $files arrays contains data
include('../../includes/database_connection.php');
// دوال تحويل الوقت للهجري
   include('phar://../../includes/ArPHP.phar/Arabic.php');
    $time = time();
    $obj = new I18N_Arabic('Date');
        $timeEnter = $time;
        $dateEnter = $obj->date('l/ dS-m-Y H:i', $time); //date('Y-m-d', $time)

if ( isset($_POST) && isset($_FILES) )
{
	// require upload function
	include_once('upload_2.php');

	if (isset($_POST['outgoing_no']) 
		&& isset($_POST['date_outgoing_no']) 
		&& isset($_POST['post_content']) 
	) {
		// IF field item_image contains file.. so execute upload function
		if (isset($_FILES["post_image"]))
			$item_image = UpFile();
		else
			$item_image = null;

		//Save post
		//$db = new PDO('mysql:host=localhost;dbname=nc_archives;charset=utf8', 'root', '1122');
			
		$sql = 'INSERT INTO  archive_files SET 
			outgoing_no         = "'.$_POST['outgoing_no'].'", 
			date_outgoing_no    = "'.$_POST['date_outgoing_no'].'", 
			subject             = "'.$_POST['post_content'].'", 
                        ResolutionLink             = "'.$item_image.'",
                        dateEnter             = "'.$dateEnter.'", 
			timeEnter      = "'.$timeEnter.'"
		';			
		echo $connect->exec($sql); // if result = 1 : post saved

	} else {
		echo 'Some fields are required !';	
	}
// if nothing isset
}
else
{
	echo '<h1>Not Found !</h1>';	
}

?>

