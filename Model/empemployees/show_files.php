<?php

/**
 * @AbuOmar
 * @copyright 2017
 */
require_once ('../../includes/functions.php');


if ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
     $number = $_POST['id'];
     
     if($number == '0'){
         exit();
     }
}


$q = "SELECT * FROM employees, archive_files, employees_has_archive_files"
        . " WHERE employees_has_archive_files.employees_id_employe = '$number' 
            AND employees.id_employe = employees_has_archive_files.employees_id_employe
            AND employees_has_archive_files.archive_files_id_files = archive_files.id_files
            "; //users WHERE activated='1' order by id_pursuance //order by id_decisions ASC

$r = @mysqli_query ($dbc, $q); // Run the query.

      

?>

<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>

<?php


//while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $id_files           =   $row['id_files'];
        $outgoing_no        =   $row['outgoing_no'];
        $date_outgoing_no   =   $row['date_outgoing_no'];
        $subject            =   $row['subject'];
        $file_link          =   $row['file_link'];
        echo "<tr>
                  <td>$id_files</td>
                  <td>$outgoing_no</td>
                  <td>$date_outgoing_no</td>
                  <td>$subject</td>
                  <td>$file_link</td>
                </tr>";
        
    }
    
    
     if (mysqli_affected_rows($dbc) == 0) {
                echo "<tr><td colspan='5' style='text-align:center; font-size:20px;color:#999999'>لا يـــوجد ملفات تابعة للموظف</td></tr>";
            }
    
?>


<!--                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>-->
                
                  
              </tbody>
            </table>
          </div>