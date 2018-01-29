<?php

//category_fetch.php

include('includes/mysqli_connect.php');


//echo "hhhhh";
    //  التحقق من عدم التكرار:
        $q = "SELECT * FROM employees "; // LIMIT 1
        $r = @mysqli_query($dbc, $q);
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $id = $row['id_employe'];
		$staff = '$2y$10$mVX9/gZ3H.irS2deRuukhuXHHAU057eCxO0995nLCm8jw.9KcEh1S';

	        $q2 = "UPDATE employees SET user_password='$staff' ";
            $r2 = @mysqli_query($dbc, $q2);
        if (mysqli_affected_rows($dbc) == 1) {
                echo "don $id <br />";
            }
	

	
//        $q2 = "UPDATE job_data SET Staff='$staff' WHERE id_job_data=$id ";
//            $r2 = @mysqli_query($dbc, $q2);
//        if (mysqli_affected_rows($dbc) == 1) {
//                echo "don $id <br />";
//            }
	
	////////////////////////
	////////////////////////
//	        $q2 = "INSERT INTO job_data (Ranked) "
//                . "VALUES ('$grade' ) WHERE id_job_data = $id";
//            $r2 = @mysqli_query($dbc, $q2);
//        if (mysqli_affected_rows($dbc) == 1) {
//                echo "don $id <br />";
//            }
	
	

	}

?>