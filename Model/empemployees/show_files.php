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

<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                        	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">قائمة الملفـــات</h3>
                            </div>
                        </div>
                       
                        <div class="clear:both"></div>
                   	</div>
                   	<div class="panel-body">
                   		<div class="row"><div class="col-sm-12 table-responsive">
                   			<table id="user_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>التاريخ</th>
                  <th>رقم الصادر</th>
                  <th>الموضوع</th>
                  <th>عرض</th>
                </tr>
              </thead>
              <tbody>

<?php


//while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $idate_outgoing_no  =   $row['date_outgoing_no'];
        $outgoing_no        =   $row['outgoing_no'];
        //$date_outgoing_no   =   $row['date_outgoing_no'];
        $subject            =   $row['subject'];
        $ResolutionLink     =  $row["ResolutionLink"];
        echo "<tr>
                  <td>$idate_outgoing_no</td>
                  <td>$outgoing_no</td>
                  <td>$subject</td>
                  <td><a class='btn btn-default' target='_blank' href='../upload/$ResolutionLink' role='button'>استعراض</a></td>
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
                   	</div>
               	</div>
           	</div>
        </div>