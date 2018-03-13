<?php
//insert.php;

//////////////////////////////
include('../../includes/database_connection.php');
include('function.php');

if(isset($_POST['btn_action']))
{
$employees_id_Add =	$_SESSION['id_employe'];
	
	if($_POST['btn_action'] == 'load_brand')
	{
		echo fill_brand_list($connect, $_POST['category_id']);
	}
	
	

	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO st_statistical_data (year, training_chapter, theRatio, id_Department, employees_id_Add, timeEnter) 
		VALUES (:year, :training_chapter, :theRatio, :id_Department, :employees_id_Add,  :timeEnter)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':year'			=>	$_POST['year'],
				':training_chapter'				=>	$_POST['training_chapter'],
				':theRatio'	=>	$_POST['theRatio'],
				':id_Department'		=>	$_POST['id_Department'],
				':employees_id_Add'		=>	$employees_id_Add,
				':timeEnter'			=>	date("Y-m-d")
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'تم إضافة النسبة بنجاح';
		}
	}
	

	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM st_statistical_data WHERE id_statistical = :id_statistical
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_statistical'	=>	$_POST["id_statistical"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['id_statistical'] = $row['id_statistical'];
			$output['year'] = $row['year'];
			$output['training_chapter'] = $row['training_chapter'];
			$output['theRatio'] = $row['theRatio'];
		}
		echo json_encode($output);
	}
	
	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE st_statistical_data 
		set year = :year, 
		training_chapter = :training_chapter,
		theRatio = :theRatio
		WHERE id_statistical = :id_statistical
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':year'			=>	$_POST['year'],
				':training_chapter'				=>	$_POST['training_chapter'],
				':theRatio'			=>	$_POST['theRatio'],
				':id_statistical'			=>	$_POST['id_statistical']
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'تم تحديث البيانات بنجاح!';
		}
	}
	
	
	if($_POST['btn_action'] == 'delete')
	{
		$id_statistical = $_POST['id_statistical'];
		$query = "
		delete from st_statistical_data WHERE id_statistical='$id_statistical' LIMIT 1
		";

		
		if ($connect->query($query) == TRUE) {
    	echo "تم حذف النسبة بنجاح!";
		} else {
				echo "Error deleting record: " . $connect->error;
			}

		//$connect->close();
	}	
	
	
}

?>