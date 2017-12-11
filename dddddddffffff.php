<?php

//category_fetch.php

include('includes/database_connection.php');

$query = '';

$output = array();

$query .= "SELECT * FROM employees ORDER BY computer_number DESC ";




$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();



$output = array(
	"draw"			=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"				=>	$data
);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM employees");
	echo$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);


?>