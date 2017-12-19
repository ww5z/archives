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
     

$query = "SELECT * FROM employees WHERE id_employe = '$NoComputer' LIMIT 1 ";
            if ($result = mysqli_query($dbc, $query)) {
                $out = array();
                while ($row = $result->fetch_assoc()) {
                $out = $row;
            }
            echo json_encode($out);

            }
    
    
} 


// ######## جلب البيانات برقم البطاقة
if ( (isset($_POST['card_number'])) && (is_numeric($_POST['card_number'])) ) {
     $number = $_POST['card_number'];
     

$query = "SELECT * FROM employees WHERE card_number = '$number' LIMIT 1 ";
            if ($result = mysqli_query($dbc, $query)) {
                $out = array();
                while ($row = $result->fetch_assoc()) {
                $out = $row;
            }
            echo json_encode($out);

            }
    
    
} 



if ( (isset($_POST['subject'])) && (is_numeric($_POST['subject'])) ) {
     $subject = $_POST['subject'];
     

$query = "SELECT * FROM employees WHERE card_number LIKE '$subject' LIMIT 1 ";
            if ($result = mysqli_query($dbc, $query)) {
                $out = array();
                while ($row = $result->fetch_assoc()) {
                $out = $row;
            }
            echo json_encode($out);

            }
    
    
}



if ( (isset($_POST['id_employees'])) && (is_numeric($_POST['id_employees'])) ) {
     $id_employees = $_POST['id_employees'];

    /** ### لإستخراج البيانات إلى الجكويري ## */
    $query = "SELECT * FROM employees WHERE id=$id_employees  LIMIT 1";
    if ($result = mysqli_query($dbc, $query)) {
       $out = array();
       while ($row = $result->fetch_assoc()) {
       $out = $row;
    }
    echo json_encode($out);

    }
                    
     
} 



?>

