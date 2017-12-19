<?php

//user_fetch.php

include('../../includes/database_connection.php');

$query = '';

$output = array();

$query .= "
SELECT * FROM employees 
WHERE user_type = 'member' AND 
";

if(isset($_POST["search"]["value"]))
{
	$query .= '(id_employe LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR card_number LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR EmployeeName LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR job_title LIKE "%'.$_POST["search"]["value"].'%") ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY EmployeeName ASC ';
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
	if($row["user_status"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['id_employe'];
        //$sub_array[] = $row['computer_number'];
	$sub_array[] = $row['EmployeeName'];
	$sub_array[] = $row['job_title'];
	$sub_array[] = $row['job_id']; 
	$sub_array[] = $row['staff'];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id_employe"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id_employe"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["id_employe"].'">Delete</button>';
	$data[] = $sub_array;
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);
echo json_encode($output);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM employees WHERE user_type='member'");
	$statement->execute();
	return $statement->rowCount();
}

?>