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


$q = "SELECT * FROM st_statistical_data WHERE id_Department = '$number'
            "; //users WHERE activated='1' order by id_pursuance //order by id_decisions ASC

$r = @mysqli_query ($dbc, $q); // Run the query.

      

?>

<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                        	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">قائمة النسب الإحصائية</h3>
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
                  <th>النسبــــة</th>
                  <th>الموظف</th>
					<th>تاريخ التعديل</th>
					<th>تحديث</th>
                  <th>حــذف</th>
                </tr>
              </thead>
              <tbody>

<?php


//while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $year  =   $row['year'];
		$month  =   $row['month'];
		$day  =   $row['day'];
        $theRatio        =   $row['theRatio'];
		$employees_id_Add        =   $row['employees_id_Add'];
		$timeEnter        =   $row['timeEnter'];
        $id_Department            =   $row['id_Department']; /// الأيدي الخاص بالأسم
        $id_statistical     =  $row["id_statistical"];
        echo "<tr>
                  <td>$year/$month/$day</td>
                  <td>$theRatio</td>
                  <td>$employees_id_Add</td>
				  <td>$timeEnter</td>
                  <td><button type='button' name='update' id='$id_statistical' class='btn btn-warning btn-xs update'>تحــريــر</button></td>
				  <td><button type='button' name='delete' id='$id_statistical' class='btn btn-danger btn-xs delete' data-status='$id_statistical'>Delete</button></td>
                </tr>";
        
    }
    
    
     if (mysqli_affected_rows($dbc) == 0) {
                echo "<tr><td colspan='5' style='text-align:center; font-size:20px;color:#999999'>لا يـــوجد بيانات إحصائية</td></tr>";
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