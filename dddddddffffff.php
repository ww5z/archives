<?php

//category_fetch.php

include('includes/mysqli_connect.php');


//echo "hhhhh";
    //  التحقق من عدم التكرار:
        $q = "SELECT id_employe FROM employees "; // LIMIT 1
        $r = @mysqli_query($dbc, $q);
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $id = $row['id_employe'];

        $q2 = "INSERT INTO job_data (id_job_data) "
                . "VALUES ('$id' )";
            $r2 = @mysqli_query($dbc, $q2);
        if (mysqli_affected_rows($dbc) == 1) {
                echo "don $id <br />";
            }

	}

?>