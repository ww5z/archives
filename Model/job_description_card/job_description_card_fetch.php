<?php

//brand_fetch.php

include('../../includes/database_connection.php');

$query = '';

	if($_SESSION['type'] == 'member')
	{
		$sq1 = "AND employees.id_employe = ".$_SESSION['id_employe']." ";
	} else {
		$sq1 = "";
	}

$output = array();
$query .= "
SELECT * FROM job_description_card 
INNER JOIN employees ON employees.id_employe = job_description_card.employees_id ".$sq1."
";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE job_description_card.grade LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR employees.EmployeeName LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR job_description_card.job_id LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY job_description_card.employees_id  DESC ';
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
	
	$sub_array = array();
	$sub_array[] = $row['id_idjob_description_card'];
	$sub_array[] = $row['EmployeeName'];
	$sub_array[] = $row['grade'];
	$sub_array[] = $row['job_title'];
	$sub_array[] = '<a href="job_description-view.php?update=1&id='.$row["id_idjob_description_card"].'"><button class="btn btn-info btn-xs view">استعــراض</button></a>';
	$sub_array[] = '<a href="job_description.php?update=1&id='.$row["id_idjob_description_card"].'"><button class="btn btn-warning btn-xs update">تحـــديث</button></a>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id_idjob_description_card"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["job_status"].'">Delete</button>';
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare('SELECT * FROM job_description_card');
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