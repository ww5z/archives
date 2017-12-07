<?php

function UpFile() {
	// default dir
	$output_dir = "../../../upload/1439/";
	// default image
	$ret = array('post_image' => 'no_img.jpg');
	
	$error = $_FILES["post_image"]["error"];
	// if $_FILES contains just a single file
	if(!is_array($_FILES["post_image"]["name"])) 
	{
		$post_image = $_FILES["post_image"]["name"];
		// upload if file dosn't exist
		if (!file_exists($output_dir.$post_image))		
			move_uploaded_file($_FILES["post_image"]["tmp_name"],$output_dir.$post_image);
			
		$ret = array('post_image' => $post_image);
		
	}
    if($ret['post_image'])
		return $post_image;
    else
		return null; 
}
 ?>