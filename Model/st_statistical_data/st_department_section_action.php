<?php

/**
 * @AbuOmar
 * @copyright 2017
 */
require_once ('../../includes/mysqli_connect.php');


if ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
     $number = $_POST['id'];
     
     if($number == '0'){
         exit();
     }
}


$q = "SELECT * FROM st_statistical_data 
INNER JOIN st_department_table ON st_department_table.id_Department = st_statistical_data.id_Department AND st_department_table.id_statistical = '$number' ORDER BY st_department_table.id_Department  ASC"; //SELECT * FROM st_statistical_data WHERE id_Department = '$number'

$r = @mysqli_query ($dbc, $q); // Run the query.

      

?>

<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                        	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title"> النسب الإحصائية</h3>
                            </div>
                        </div>
                       
                        <div class="clear:both"></div>
                   	</div>
                   	<div class="panel-body">
                   		<div class="row"><div class="col-sm-12 table-responsive">
                   			<table id="user_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>القسم</th>
					<th>السنة</th>
					<th>الفصل التدريبي</th>
                  <th>النسبــــة</th>
                </tr>
              </thead>
              <tbody>

<?php


//while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$status = '';
	if($row['training_chapter'] == '1')
	{
		$status = '<span class="label label-primary btn-xs">الفصل الأول</span>';
	}
	else if($row['training_chapter'] == '2'){
		$status = '<span class="label label-success" btn-xs>الفصل الثني</span>';
	}
	else 
	{
		$status = '<span class="label label-info" btn-xs>سنــــوي</span>';
	}
        $nameDepartment  =   $row['nameDepartment'];
		$year  =   $row['year'];
        $theRatio        =   $row['theRatio'];
		$employees_id_Add        =   $row['employees_id_Add'];
		$timeEnter        =   $row['timeEnter'];
        $id_Department            =   $row['id_Department']; /// الأيدي الخاص بالأسم
        $id_statistical     =  $row["id_statistical"];
        echo "<tr>
                  <td>$nameDepartment</td>
				  <td>$year</td>
                  <td>$status</td>
				  <td>$theRatio</td>
                  
                </tr>";
        
    }
    
    
     if (mysqli_affected_rows($dbc) == 0) {
                echo "<tr><td colspan='5' style='text-align:center; font-size:20px;color:#999999'>لا يـــوجد بيانات إحصائية</td></tr>";
            }
    
?>
                
                  
              </tbody>
            </table>
                  		</div>
                   	</div>
               	</div>
           	</div>
        </div>