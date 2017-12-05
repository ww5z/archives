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


?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="./js/script_followup.js"></script>




 
    
    
</div>
			
				<div class="adminform">
                                    
<table class="table table-hover rtl_table">
<thead>
	<th width="50px">#</th>
	<th align='center'>رقم القرار</th>
    <th align='center'>تاريخ القرار</th>
	<th align='center'>الموضــــوع</th>
    <th align='center'>الحالة</th>
    <th align='center'>تاريخ الإنشاء</th>
        <th style='width: 250px;'>ملاحظــــات</th>
</thead>

<?php

$q = "SELECT * FROM decisions WHERE id_employees = '$number'
            order by id_decisions ASC"; //users WHERE activated='1' order by id_pursuance

$r = @mysqli_query ($dbc, $q); // Run the query.

      




//while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {


$id_decisions   =   $row['id_decisions'];
$action         =   $row['file_condition'];
///////////////////////////////////////////////////////////////////
     //$rd = date("Y-m-d", $row['dateEnter']); 
    echo "
        <tr class='warning'>
	   <td class='btn btn-default' id='sjhfr4'><a target='_blank' href='./inser_file.php?id=".$row['id_decisions']."'>".$id_decisions."</a></td>
           <td id='sjhfr4'>".$row['ResolutionNO']."</td>
	   <td id='sjhfr'>".$row['date_ResolutionNO']."</td>
           <td id='sjhfr2'>".$row['subject']."</td>
           <td id='sjhfr2'>";
               
                    if ($action == '1' ) {
                        echo "<span class='clatest_1'>انتظار إجراء</span>";
                    }elseif ($action == '2') {
                        echo "<span class='clatest_2'>تم الحل</span>";
                    }elseif ($action == '3') {
                        echo "<span class='clatest_3'>متابعة</span>";
                    } elseif ($action == '4') {
                        echo "<span class='clatest_4'>إرسال</span>";  
                    } elseif ($action == '5') {
                        echo "<span class='clatest_5'>معلق</span>";  
                    } elseif ($action == '6') {
                        echo "<span class='clatest_6'>سقّط</span>";  
                    }  else {
                        echo "ـــــــ";
                    }

            echo " </td>
           <td id='sjhfr3'>".$row['dateEnter']."</td>
           <td style='width: 250px; text-align:center;'><p> ---- ---- ---- </p></td>
        </tr>";

    $qf = "SELECT * FROM followup WHERE decisions_ID = '$id_decisions'
            order by Id_followup DESC "; //users WHERE activated='1' order by id_pursuance

$rf = @mysqli_query ($dbc, $qf); // Run the query.
        while ($rowf = mysqli_fetch_array($rf, MYSQLI_ASSOC)) {
            $Id_followup = $rowf['Id_followup'];
            $action_2   = $rowf['file_condition_p'];
            $department = $rowf['department'];
            
            echo " <tr class='active'>
               <td><a href='catalog/catalog.php?Id_f=$Id_followup' target='_blank' class='' role='button' >
                   <span id='prent_2' class='glyphicon glyphicon-print'>
                   </span>
                   </a></td>
               <td id='sjhfr2' colspan='3' style='text-align:left' >";
                        if ($department == '1') {
                            echo "العمري";
                        }elseif ($department == '2') {
                            echo "حوذان";
                        }elseif ($department == '3') {
                            echo "القثامي";
                        }else {echo "0";}

                    echo "  </td>
               <td id='sjhfr2'>";
               
                    if ($action_2 == '1' ) {
                        echo "<span class='clatest_1'>انتظار إجراء</span>";
                    }elseif ($action_2 == '2') {
                        echo "<span class='clatest_2'>تم الحل</span>";
                    }elseif ($action_2 == '3') {
                        echo "<span class='clatest_3'>متابعة</span>";
                    } elseif ($action_2 == '4') {
                        echo "<span class='clatest_4'>إرسال</span>";  
                    } elseif ($action_2 == '5') {
                        echo "<span class='clatest_5'>معلق</span>";  
                    } elseif ($action_2 == '6') {
                        echo "<span class='clatest_6'>سقّط</span>";  
                    }  else {
                        echo "ـــــــ";
                    }

            echo " </td>
               <td id='sjhfr3'>".$rowf['dateEvent']."</td>
               <td style='width: 250px;'><p>".$rowf['nots']."</p></td>
            </tr>";
        }

        mysqli_free_result ($rf);

    }
    
    if(mysqli_affected_rows($dbc) == 0){
        echo "<tr><td colspan='10' style='text-align:center; font-size:20px;color:#999999'> لا يوجد سجلات</td></tr>";
    }

echo "</table>";

mysqli_free_result ($r);
mysqli_close($dbc);

?>
</div></div>
 
    <br /><b />


