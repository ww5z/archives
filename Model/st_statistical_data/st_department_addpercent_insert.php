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
		INSERT INTO st_statistical_data (year, month, day, theRatio, id_Department, employees_id_Add, timeEnter) 
		VALUES (:year, :month, :day, :theRatio, :id_Department, :employees_id_Add,  :timeEnter)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':year'			=>	$_POST['year'],
				':month'				=>	$_POST['month'],
				':day'			=>	$_POST['day'],
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
	
	
	
	
}

?>