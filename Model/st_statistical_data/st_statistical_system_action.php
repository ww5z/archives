<?php

//category_action.php

include('../../includes/database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO st_statistical_system (Department) 
		VALUES (:Department)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':Department'	=>	$_POST["category_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Department Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM st_statistical_system WHERE id_statistical = :id_statistical";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_statistical'	=>	$_POST["category_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['Department'] = $row['Department'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE st_statistical_system set Department = :Department  
		WHERE id_statistical = :id_statistical
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':Department'	=>	$_POST["category_name"],
				':id_statistical'		=>	$_POST["category_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Department Name Edited';
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
		UPDATE st_statistical_system 
		SET category_status = :category_status 
		WHERE id_statistical = :id_statistical
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_status'	=>	$status,
				':id_statistical'		=>	$_POST["category_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Department status change to ' . $status;
		}
	}
}

?>