<?php

//category_fetch.php

include('../../includes/database_connection.php');

$query = '';

$output = array();

$query .= "SELECT * FROM st_statistical_system ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE Department LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR category_status LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id_statistical DESC ';
}

if($_POST['length'] != -1)
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
	if($row['category_status'] == 'active')
	{
		$status = '<span class="label label-success">نشــط</span>';
	}
	else
	{
		$status = '<span class="label label-danger">معطل</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['id_statistical'];
	$sub_array[] = $row['Department'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["id_statistical"].'" class="btn btn-warning btn-xs update">تحــريــر</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id_statistical"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["category_status"].'">حــذف</button>';
	$data[] = $sub_array;
}

$output = array(
	"draw"			=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"				=>	$data
);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM st_statistical_system");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>