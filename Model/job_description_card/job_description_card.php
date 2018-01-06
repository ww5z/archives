<?php

//brand_action.php

include('../../includes/database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO job_description_card (grade, brand_name) 
		VALUES (:grade, :job_id)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':grade'	=>	$_POST["grade"],
				':job_id'	=>	$_POST["job_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'تم إضافة بطاقة الوصف الوظيفي';
		}
	}

	if($_POST['btn_action'] == 'fetch_single')
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
		}
		echo json_encode($output);
	}
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE brand set 
		category_id = :category_id, 
		brand_name = :brand_name 
		WHERE brand_id = :brand_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_id'	=>	$_POST["category_id"],
				':brand_name'	=>	$_POST["brand_name"],
				':brand_id'		=>	$_POST["brand_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Brand Name Edited';
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
		UPDATE brand 
		SET brand_status = :brand_status 
		WHERE brand_id = :brand_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':brand_status'	=>	$status,
				':brand_id'		=>	$_POST["brand_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Brand status change to ' . $status;
		}
	}
}

?>