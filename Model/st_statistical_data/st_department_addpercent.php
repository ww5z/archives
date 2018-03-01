<?php
require_once ('../../includes/mysqli_connect.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// ######## جلب البيانات برقم الحاسب
if ( (isset($_POST['no_computer'])) && (is_numeric($_POST['no_computer'])) ) {
     $number = $_POST['no_computer'];
     $NoComputer = str_pad($number, 7, '0', STR_PAD_LEFT);
     

$query = "SELECT * FROM st_statistical_data WHERE id_Department = '$NoComputer' LIMIT 1 ";
            if ($result = mysqli_query($dbc, $query)) {
                $out = array();
                while ($row = $result->fetch_assoc()) {
                $out = $row;
            }
            echo json_encode($out);

            }
    
    
} 







?>

