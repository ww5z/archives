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
			file_type    		= "'.$_POST['file_type'].'", 
			subject             = "'.$_POST['post_content'].'", 
			degree_confidentiality        = "'.$_POST['degree_confidentiality'].'", 
			essayist_employees        = "'.$_POST['essayist_employees'].'", 
			ResolutionLink      = "'.$item_image.'",
			dateEnter             = "'.$dateEnter.'", 
			timeEnter      = "'.$timeEnter.'"
		';			
		 $connect->exec($sql); // if result = 1 : post saved //$oid = mysqli_insert_id($dbc);
               //$connect->insert_id;
                $take_id = $connect->lastInsertId();
		
               if ($take_id != 0){
				   foreach ($_POST['employees_id_employe'] as $key => $name){
                   $sq2 = 'INSERT INTO  employees_has_archive_files SET 
			employees_id_employe         = "'.$name.'", 
			archive_files_id_files             = "'.$take_id.'"
		';
                    $connect->exec($sq2); 
				   }
				   echo "1";
               } else {
                   echo 'حدث خطاء';
                    }
		
		
		
	} else {
		echo 'بعض الحقول مطلوبة!';	
	}
// if nothing isset
}
else
{
	echo '<h1>Not Found !</h1>';	
}

?>

