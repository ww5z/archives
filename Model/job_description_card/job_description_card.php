<?php

//brand_action.php

include('../../includes/database_connection.php');
//echo    $_POST['employees_add'];
if(isset($_POST['form_action']))
{
	if($_POST['form_action'] == 'Add')
	{
		$query = "
		INSERT INTO job_description_card (grade, job_id, job_title, OrganizationalLinkage, Duties_tasks, Powers, Qualification, Practical_experience, Training, employees_add, Other, Specialization, job_status, employees_id) 
		
		VALUES (:grade, :job_id, :job_title, :OrganizationalLinkage, :Duties_tasks, :Powers, :Qualification, :Practical_experience, :Training, :employees_add, :Other, :Specialization, :job_status, :employees_id)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':grade'	=>	$_POST["grade"],
				':job_id'	=>	$_POST["job_id"],
				':job_title'	=>	$_POST["job_title"],
				':OrganizationalLinkage'	=>	$_POST["OrganizationalLinkage"],
				':Duties_tasks'	=>	$_POST["Duties_tasks"],
				':Powers'	=>	$_POST["Powers"],
				':Qualification'	=>	$_POST["Qualification"],
				':Practical_experience'	=>	$_POST["Practical_experience"],
				':Training'	=>	$_POST["Training"],
				':employees_add'	=>	$_POST["employees_add"],
				':Other'	=>	$_POST["Other"],
				':Specialization'	=>	$_POST["Specialization"],
				':job_status'	=>	"Active",
				':employees_id'	=>	$_POST["employees_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'تم إضافة بطاقة الوصف الوظيفي';
		}
	}

	if($_POST['form_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM job_description_card WHERE id_idjob_description_card = :id_idjob_description_card
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_idjob_description_card'	=>	$_POST["id_idjob_description_card"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['id_idjob_description_card'] = $row['id_idjob_description_card'];
			$output['grade'] = $row['grade'];
			$output['job_id'] = $row['job_id'];
			$output['job_title'] = $row['job_title'];
			$output['OrganizationalLinkage'] = $row['OrganizationalLinkage'];
			$output['Duties_tasks'] = $row['Duties_tasks'];
			$output['Powers'] = $row['Powers'];
			$output['Qualification'] = $row['Qualification'];
			$output['Practical_experience'] = $row['Practical_experience'];
			$output['Training'] = $row['Training'];
			$output['Other'] = $row['Other'];
			$output['employees_add'] = $row['employees_add'];
			$output['Specialization'] = $row['Specialization'];
			$output['employees_id'] = $row['employees_id'];
			
		}
		echo json_encode($output);
	}
	if($_POST['form_action'] == 'Edit')
	{
		//echo    $_POST['form_action'];
		$query = "
		UPDATE job_description_card set 
		grade = :grade, 
		job_id = :job_id, 
		job_title = :job_title, 
		OrganizationalLinkage = :OrganizationalLinkage, 
		Duties_tasks = :Duties_tasks, 
		Powers = :Powers, 
		Qualification = :Qualification, 
		Practical_experience = :Practical_experience, 
		Training = :Training, 
		Other = :Other,
		employees_add = :employees_add,
		Specialization = :Specialization,
		employees_id = :employees_id 
		WHERE id_idjob_description_card = :id_idjob_description_card
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':grade'	=>	$_POST["grade"],
				':job_id'	=>	$_POST["job_id"],
				':job_title'	=>	$_POST["job_title"],
				':OrganizationalLinkage'	=>	$_POST["OrganizationalLinkage"],
				':Duties_tasks'	=>	$_POST["Duties_tasks"],
				':Powers'	=>	$_POST["Powers"],
				':Qualification'	=>	$_POST["Qualification"],
				':Practical_experience'	=>	$_POST["Practical_experience"],
				':Training'	=>	$_POST["Training"],
				':Other'	=>	$_POST["Other"],
				':employees_add'	=>	$_POST["employees_add"],
				':Specialization'	=>	$_POST["Specialization"],
				':employees_id'	=>	$_POST["employees_id"],
				':id_idjob_description_card'	=>	$_POST["id_idjob_description_card"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'تم تعديل البيانات';
		}
	}

	if($_POST['form_action'] == 'delete')
	{
		$id_idjob = $_POST['id_idjob_description_card'];
		$query = "
		delete from job_description_card WHERE id_idjob_description_card='$id_idjob' LIMIT 1
		";

		
		if ($connect->query($query) == TRUE) {
    	echo "تم حذف بطاقة الوصف الوظيفي!";
		} else {
				echo "Error deleting record: " . $connect->error;
			}

		//$connect->close();
		
	}
}

?>