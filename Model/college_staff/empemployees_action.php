<?php

//user_action.php

include('../../includes/database_connection.php');
$timeEnter = time();

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO employees (computer_number, card_number, EmployeeName, grade, job_id, class, job_title, nationality, staff, user_type, user_status, timeEnter) 
		VALUES (:computer_number, :card_number, :EmployeeName, :grade, :job_id, :class, :job_title, :nationality, :staff, :user_type, :user_status, :timeEnter)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':computer_number'	=>	$_POST["computer_number"],
                                ':card_number'		=>	$_POST["card_number"],
				':EmployeeName'         =>	$_POST["card_number"],
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
			$output['computer_number'] = $row['computer_number'];
                        $output['EmployeeName'] = $row['EmployeeName'];
			$output['job_title'] = $row['job_title'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		if($_POST['user_password'] != '')
		{
			$query = "
			UPDATE user_details SET 
				username = '".$_POST["username"]."', 
                                user_name = '".$_POST["user_name"]."', 
				user_email = '".$_POST["user_email"]."',
				user_password = '".password_hash($_POST["user_password"], PASSWORD_DEFAULT)."' 
				WHERE user_id = '".$_POST["user_id"]."'
			";
		}
		else
		{
			$query = "
			UPDATE user_details SET 
				username = '".$_POST["username"]."', 
                                user_name = '".$_POST["user_name"]."', 
				user_email = '".$_POST["user_email"]."'
				WHERE user_id = '".$_POST["user_id"]."'
			";
		}
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'User Details Edited';
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