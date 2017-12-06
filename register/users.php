<div class="adminform">
                                    
<table class="table table-hover rtl_table">
<thead>
	<th>#</th>
        <th></th>
	<th>رقم الحاسب</th>
    <th>الاســـم</th>
    <th>التفعيل</th>
    <th>العضوية</th>
    <th>IP Adrees</th>
</thead>

<?php

if(isset($date_ResolutionNO)) {
	$date_Re = $date_ResolutionNO;
} else {
	$date_Re = '1438';
}

$date_Re_1 = array();
$date_Re_1[] = 'تنشيط';
$date_Re_1[] = 'حظر';



$q = "SELECT * FROM users "; //WHERE member = 'admin' order by id_pursuance // order by id_decisions ASC

$r = @mysqli_query ($dbc, $q); // Run the query.


    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {


$user_id = $row['user_id'];
    
    
    $name      = $row['name'];
    $employee_number      = $row['employee_number'];
    $active     = $row['active'];
    $member      = $row['member'];
    $ip_adres   = $row['ip_adres'];
///////////////////////////////////////////////////////////////////
     //$rd = date("Y-m-d", $row['dateEnter']); 
    echo "
        <tr class='warning'>
	   <td>".$user_id."</td>
            <td>
               <a href='./warrant.php?id=".$user_id."' class='btn btn-warning btn-xs'>الصلاحيات</a>
               <a href='#' class='btn btn-success btn-xs'>تعديل</a>
               <a href='#' class='btn btn-danger btn-xs'>حذف</a>
            </td>
           <td><input data-id1='".$user_id."' type='text' style='width: 70px' value='".$employee_number."' class='ResolutionNO' /></td>
               <td><input data-id2='".$user_id."' type='text' style='width: 70px' value='".$name."' class='ResolutionNO' /></td>
	   <td> <select name='date_ResolutionNO' class='' id='date_ResolutionNO' title='تاريخ قرار المعاملة'>
";
                    foreach($date_Re_1 as $model) {
                    echo '<option';
                    if ($member == $model) {
                    echo ' selected';
                    }
                    
                    echo '>'.$model.'</option>';
                    };

echo "</select> 
    </td>
           <td><input data-id3='".$user_id."' type='text' style='width: 70px' value='".$member."' class='ResolutionNO' /></td>
               <td><input data-id4='".$user_id."' type='text' style='width: 70px' value='".$ip_adres."' class='ResolutionNO' /></td>

        </tr>";

  

    }
    
    if(mysqli_affected_rows($dbc) == 0){
        echo "<tr><td colspan='10' style='text-align:center; font-size:20px;color:#999999'> لا يوجد سجلات</td></tr>";
    }

mysqli_free_result ($r);
mysqli_close($dbc);

?>

    <tr class="success">  
                <td></td>  
                <td id="ResolutionNO" contenteditable></td>
                <td id="date_ResolutionNO" contenteditable></td>
                <td id="subject" contenteditable></td>
                <td id="" contenteditable></td>
                <td id="" contenteditable></td>
                <td id="" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>
    
    
</table>


</div></div>