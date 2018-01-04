<?php
//index.php

include('header.php');

//SELECT * FROM `system_validity`,`system_validity_has_employees`  WHERE `enquiry` = 1
//SELECT * FROM `system_validity`,`system_validity_has_employees`  WHERE `enquiry` = 1


function fill_unit_select_box($connect)
{ 
	$id_employe = $_SESSION["id_employe"];
 $output = '';
 $query = "
SELECT * FROM `employees`, `system_validity`, `system_validity_groups`  WHERE employees.id_employe = '$id_employe' AND employees.id_employe = system_validity_groups.employees_id AND system_validity_groups.system_validity_id = system_validity.id_idsystem_validity
";
$statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<a href="'.$row["validitycol"].'"class="btn btn-lg btn-block '.$row["style_class"].'" role="button">'.$row["ButtonName"].'</a>';
 }
 return $output;
}


?>
	<br />


<?php echo fill_unit_select_box($connect); ?>


<!--<hr />
<a href="job_description.php" class="btn btn-success btn-lg btn-block" role="button">الوصف الوظيفي</a>
<a href="#" class="btn btn-success btn-lg btn-block" role="button">التشكيل الإداري</a>
-->



<?php
include("footer.php");
?>