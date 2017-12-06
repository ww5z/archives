<?php  
require_once ('../../includes/mysqli_connect.php');

// دوال تحويل الوقت للهجري
   include('phar://../../includes/ArPHP.phar/Arabic.php');
   $time = time();
   $obj = new I18N_Arabic('Date');
  
$id_user = $_COOKIE['user']['id'];
   
   // التحقق من صلاحية رفع الملف
$q_user = "SELECT user_id, email FROM user WHERE user_id='$id_user' AND email='Y' LIMIT 1 ";
 $r_user = @mysqli_query($dbc, $q_user);
 if (mysqli_num_rows($r_user) == 0) {
     die('<br /><div class="bg-danger">ليس لديك صلاحية رفع الملفات</div>');
 }
   
 //upload.php  
 //echo 'done';  
 $output = '';  
 if(isset($_FILES['file']['name'][0])) {  
     
     
	
//require_once('functions.php');
  $filetypes   =  array('application/pdf','image/jpeg','image/pjpeg','image/gif','image/png');
foreach ($_FILES['file']['type'] as $keyy => $namee){

    
     if(!in_array($namee,$filetypes)) {
         $errors[] = "يجب أن يكون الملف من نوع صورة أو بي دي أف";
    }
}

if (empty($errors)){

$filename       =   $_FILES["file"]['name'];
$timee       =   time(0000,9999);
$folder         =   "../../../upload/1439";

    
	foreach ($filename as $key => $name){
	        $nameimg   = $name; // $timee. $key . strchr($name, '.');
		if($_FILES['file']['error'][$key] == 0 && move_uploaded_file($_FILES['file']['tmp_name'][$key], "$folder/{$nameimg}")){
			$uploaded[] = $nameimg;
		}
    }
    if(!empty($_POST['ajax'])){
        die(json_encode($uploaded));
    }
}

//////////////////////////////////////////////

       if(!empty($uploaded)){
//$user = ip;
//ResolutionUrl = '';
$atv = 1;
        $timeEnter = $time;
        $dateEnter = $obj->date('l/ dS-m-Y H:i', $time); //date('Y-m-d', $time)
        $date_yer   = '1439';

foreach ($uploaded as $nameimg){

    $name_ct = strstr($nameimg, '.', true);
    //  التحقق من عدم التكرار:
    $q = "SELECT outgoing_no, date_outgoing_no FROM archive_files WHERE outgoing_no='$nameimg' AND date_outgoing_no='$date_yer' ";
    $r = @mysqli_query($dbc, $q);
    if (mysqli_num_rows($r) == 0){

        $q = "INSERT INTO archive_files (outgoing_no, date_outgoing_no, file_condition, ResolutionUrl, dateEnter, timeEnter) 
        VALUES ('$name_ct', '$date_yer', '1', '$nameimg', '$dateEnter', '$timeEnter' )";
                $r = @mysqli_query($dbc, $q);
    }



}
   
            
        }


/////////// $$$$$$$$$$$$$$$$$$ //////////////
        
                    if (mysqli_affected_rows($dbc) == 1) {
        echo "<div class='bg-success'><h3>تم رفع الملفات بنجاح </h3>";
    foreach ($uploaded as $kNimg => $Nimg){
        $kNimg++;
        echo '<div><a target="_blank" href="../upload/'.$date_yer.'/', $Nimg, '">file- ', $kNimg, '</a></div>';
    }
    echo '</div>';
    }
    
            if ( !empty($errors) && is_array($errors) ) {
            	echo '<br /><div class="bg-danger">';
            	foreach ($errors as $msg) {
            		echo " - $msg<br />\n";
            	}
            	echo '</div>';
            }

//      //echo 'OK';  
//      foreach($_FILES['file']['name'] as $keys => $values)  
//      {  
//           if(move_uploaded_file($_FILES['file']['tmp_name'][$keys], '../upload/' . $values))  
//           {  
//                $output .= '<div class=col-md-3"><img src="upload/'.$values.'" class="img-responsive" /></div>';  
//           }  
//      }  
 }  
 echo $output;  
 ?>  