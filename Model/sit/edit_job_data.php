<?php

//edit_profile.php

include('../../includes/database_connection.php');

if(isset($_POST['Staff']))
{
	
		$query = "
		UPDATE job_data SET 
			Staff = '".$_POST["Staff"]."', 
			Ranked = '".$_POST["Ranked"]."',  
			Job_number = '".$_POST["Job_number"]."', 
			JobTitle = '".$_POST["JobTitle"]."', 
			Level_Class = '".$_POST["Level_Class"]."', 
			Employer = '".$_POST["Employer"]."', 
			AppointmentDecision = '".$_POST["AppointmentDecision"]."', 
			Date_appointment = '".$_POST["Date_appointment"]."', 
			EntryState = '".$_POST["EntryState"]."', 
			Enrollment_institution = '".$_POST["Enrollment_institution"]."', 
			First_direct_date = '".$_POST["First_direct_date"]."', 
			Date_commencement_college = '".$_POST["Date_commencement_college"]."', 
			status_update_copy1 = 'Active'
			WHERE id_job_data = '".$_SESSION["id_employe"]."'
		";
	
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$count = $statement->rowCount();
	if($count == 1)
	{
		echo '<div class="alert alert-success">تم تحديث البيانات</div>';
	}else {
		echo '<div class="alert alert-danger">لم يتم أي تحديث</div>';
	}
}

?>