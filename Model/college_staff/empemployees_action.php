<?php

//user_action.php

include('../../includes/database_connection.php');
$timeEnter = time();

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO employees (id_employe, card_number, EmployeeName, grade, job_id, class, job_title, nationality, staff, user_type, user_status, timeEnter) 
		VALUES (:id_employe, :card_number, :EmployeeName, :grade, :job_id, :class, :job_title, :nationality, :staff, :user_type, :user_status, :timeEnter)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_employe'	=>	$_POST["computer_number"],
                                ':card_number'		=>	$_POST["card_number"],
				':EmployeeName'         =>	$_POST["EmployeeName"],
				':grade'		=>	$_POST["grade"],
                                ':job_id'		=>	$_POST["job_id"],
                                ':class'		=>	$_POST["class"],
                                ':job_title'		=>	$_POST["job_title"],
                                ':nationality'		=>	$_POST["nationality"],
                                ':staff'		=>	$_POST["staff"],
				':user_type'		=>	'member',
				':user_status'		=>	'active',
                                ':timeEnter'		=>	$timeEnter
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'تم إضافة الموظف بنجاح';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM employees WHERE id_employe = :id_employe
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_employe'	=>	$_POST["id_employe"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['id_employe'] = $row['id_employe'];
                        $output['computer_number'] = $row['id_employe']; //رقم الحاسب
			$output['card_number'] = $row['card_number'];
                        $output['EmployeeName'] = $row['EmployeeName'];
                        $output['staff'] = $row['staff'];
                        $output['grade'] = $row['grade'];
                        $output['job_id'] = $row['job_id'];
                        $output['class'] = $row['class'];
                        $output['job_title'] = $row['job_title'];
                        $output['nationality'] = $row['nationality'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		
                    $query = "
                    UPDATE employees SET 
                            id_employe = '".str_pad($_POST["computer_number"], 7, '0', STR_PAD_LEFT)."',
                            card_number = '".$_POST["card_number"]."', 
                            EmployeeName = '".$_POST["EmployeeName"]."',
                            staff = '".$_POST["staff"]."',
                            grade = '".$_POST["grade"]."',
                            job_id = '".$_POST["job_id"]."',
                            class = '".$_POST["class"]."',
                            job_title = '".$_POST["job_title"]."',
                            nationality = '".$_POST["nationality"]."'
                    WHERE id_employe = '".$_POST["id_employe"]."'
                    ";

		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'تم تحديث بيانات الموظف';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'Active';
		if($_POST['status'] == 'Active')
		{
			$status = 'Inactive';
		}
		$query = "
		UPDATE user_details 
		SET user_status = :user_status 
		WHERE user_id = :user_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_status'	=>	$status,
				':user_id'		=>	$_POST["user_id"]
			)
		);	
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'User Status change to ' . $status;
		}
	}
}

?>