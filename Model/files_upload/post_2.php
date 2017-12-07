<?php
//var_dump($_POST, $_FILES);
// if $_post and $files arrays contains data
include('../../includes/database_connection.php');

if ( isset($_POST) && isset($_FILES) )
{
	// require upload function
	include_once('upload_2.php');

	if (isset($_POST['post_name']) 
		&& isset($_POST['post_title']) 
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
			outgoing_no         = "'.$_POST['post_name'].'", 
			date_outgoing_no    = "'.$_POST['post_title'].'", 
			subject             = "'.$_POST['post_content'].'", 
			ResolutionLink      = "'.$item_image.'"
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

