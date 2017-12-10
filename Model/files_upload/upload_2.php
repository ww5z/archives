<?php

function UpFile() {
	// default dir
	$output_dir = "../../../upload/";
        $timee       =   time(0000,9999);
        $new_name = md5($timee); // password_hash($timee, PASSWORD_DEFAULT);
	// default image
	$ret = array('post_image' => 'no_img.jpg');
	
	$error = $_FILES["post_image"]["error"];
	// if $_FILES contains just a single file
	if(!is_array($_FILES["post_image"]["name"])) 
	{
		$post_image = $_FILES["post_image"]["name"];
                $nameimg   = $new_name. strchr($post_image, '.');
		// upload if file dosn't exist
		if (!file_exists($output_dir.$post_image))		
			move_uploaded_file($_FILES["post_image"]["tmp_name"],$output_dir.$nameimg);
			
		$ret = array('post_image' => $nameimg);
		
	}
    if($ret['post_image'])
		return $nameimg;
    else
		return null; 
}
 ?>