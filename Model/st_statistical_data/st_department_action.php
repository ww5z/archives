<?php

//brand_action.php

include('../../includes/database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO st_department_table (id_statistical, nameDepartment) 
		VALUES (:id_statistical, :nameDepartment)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_statistical'	=>	$_POST["category_id"],
				':nameDepartment'	=>	$_POST["brand_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'The Name Added';
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM st_department_table WHERE id_Department = :id_Department
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_Department'	=>	$_POST["brand_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['id_statistical'] = $row['id_statistical'];
			$output['nameDepartment'] = $row['nameDepartment'];
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE st_department_table set 
		id_statistical = :id_statistical, 
		nameDepartment = :nameDepartment 
		WHERE id_Department = :id_Department
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_statistical'	=>	$_POST["category_id"],
				':nameDepartment'	=>	$_POST["brand_name"],
				':id_Department'		=>	$_POST["brand_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'The Name Edited';
		}
	}

	if($_POST['btn_action'] == 'delete')
	{
		$status = 'active';
		if($_POST['status'] == 'active')
		{
			$status = 'inactive';
		}
		$query = "
		UPDATE st_department_table 
		SET department_status = :department_status 
		WHERE id_Department = :id_Department
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':department_status'	=>	$status,
				':id_Department'		=>	$_POST["brand_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'The status change to ' . $status;
		}
	}
}

?>