<?php

//brand_fetch.php

include('../../includes/database_connection.php');

$query = '';

$output = array();
$query .= "
SELECT * FROM st_department_table 
INNER JOIN st_statistical_system ON st_statistical_system.id_statistical = st_department_table.id_statistical
";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE st_department_table.nameDepartment LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR st_statistical_system.Department LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR st_department_table.department_status LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY st_department_table.id_Department DESC ';
}

if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	$status = '';
	if($row['department_status'] == 'active')
	{
		$status = '<span class="label label-success">نشــط</span>';
	}
	else
	{
		$status = '<span class="label label-danger">معطل</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['id_Department'];
	$sub_array[] = $row['Department'];
	$sub_array[] = $row['nameDepartment'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["id_Department"].'" class="btn btn-warning btn-xs update">تحــريــر</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id_Department"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["department_status"].'">حــذف</button>';
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare('SELECT * FROM st_department_table');
	$statement->execute();
	return $statement->rowCount();
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=>	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records($connect),
	"data"				=>	$data
);

echo json_encode($output);

?>