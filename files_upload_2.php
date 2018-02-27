<?php
$page_title = 'إضافة ملــف'; 
require_once ('header.php');


############################ أختيار المعني بالمعاملة


function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT id_employe, EmployeeName FROM employees ORDER BY EmployeeName ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["id_employe"].'">'.$row["EmployeeName"].'('.$row["id_employe"].')</option>';
 }
 return $output;
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
	<br />

		<div class="panel panel-default">
			<div class="panel-heading">رفـــع الملفـــات</div>
			<div class="panel-body">	
		  	<form method="post" action="" id="form-add-post" enctype="multipart/form-data">
				<span id="message"></span>

				<div class="form-group">
					<label>رقم الصــادر</label>
					<div class="input-group">
						<input type="text" name="outgoing_no" id="product_quantity" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" /> 
						<span class="input-group-addon">
							<select name="date_outgoing_no" id="date_outgoing_no" required>
								<option value="1435" >1435</option>
								<option value="1436" >1436</option>
								<option value="1437" >1437</option>
								<option value="1438" >1438</option>
								<option value="1439" selected="selected">1439</option>
								<option value="1438" >1440</option>
							</select>
						</span>
					</div>
				</div>
				
				<div class="form-group">
				<label>نوع الملف</label>
					<select class="form-control" name="file_type" id="file_type" required>
						<option value="" selected="selected">    </option>
						<option value="1" >التعيين والترقيات</option>
						<option value="2" >التكليف والإنتدابات</option>
						<option value="3" >التدريب والإبتعاث</option>
						<option value="4" >الإجازات</option>
						<option value="5" >الحسميات والجزائأت</option>
						<option value="6" >عـــــام</option>
					</select>
				</div>
				
				<div class="form-group">
				<label>نوع الملف</label>
					<select class="form-control" name="degree_confidentiality" id="degree_confidentiality" required>
						<option value="" selected="selected">    </option>
						<option value="1" >عامـــه</option>
						<option value="2" selected="selected">عـــادية</option>
						<option value="3" >ســـرية</option>
					</select>
				</div>
				
                            
				<div class="form-group">
					<label>الموظف:</label>
					<div class="input-group">
					<span class="input-group-addon">
					<input type="text" name="c_facts_j" id="c_facts_j" style="width: 60px;text-align: center;" value="0" disabled="disabled" />
					</span>
						<select name="employees_id_employe[]" id="employees_id_employe" class="form-control selectpicker" data-live-search="true" multiple >
							<option value="">اختر موظـــف</option><?php echo fill_unit_select_box($connect); ?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label>وصف الملف</label>
					<textarea class="form-control" rows="8" id="post_content" name="post_content" placeholder="Post Content"></textarea>
				</div>
				
				<div class="form-group">
					<label>آرفـــق الملف</label>
					<div>
					<img id="post_image_preview" src="images/thumbs/no_thumb.jpg" alt="post Image" />				
					<input type="file" onchange="readURL(this);" name="post_image" id="post_image" required >
					</div>
				</div>
				
					<div class="form-group text-center">
							<button id="btn-save-post" type="submit" class="btn btn-primary btn-lg btn-block">حفــــظ</button>
					</div>
				
				<input type="hidden" name="essayist_employees" value="<?php echo $_SESSION["id_employe"]; ?>" />
				
		    </form>
		</div>
		</div>
		</div>
	</div>
	

	<div class="container-fluid footer text-center">
		<div class="container">
			<p>&copy; Copyright Something 2016</p>
		</div>
	</div>

	<div id="loading"></div>
	<div id="overlay"></div>


        <script src="js/files_upload_2.js"></script>



</body>
</html>

<script>
$(document).ready(function(){
	
	// تفعيل واختيار حقل الموظف
	var typeSelect = "<?php echo $_SESSION['type']; ?>";
	var employeesSelect = "<?php echo $_SESSION['id_employe']; ?>";
	
	//alert(typeSelect)
	if(typeSelect == 'master'){
		$("#c_facts_j").prop('disabled', false);
		$("#employees_id_employe").prop('disabled', false);
	} else {
		$("#employees_id_employe").prop('multiple', false);
		$( '#c_facts_j' ).val(employeesSelect);
		$( '#employees_id_employe' ).val(employeesSelect);
		//$("#employees_id_employe").prop('disabled', 'disabled');
		//$( '#employees_id_employe' ).prop("selectedIndex", employeesSelect);
		//disabled selected value
			$('#employees_id_employe').change(function() {
			if ($(this).prop("selectedIndex") != -1) {
					alert('صلاحيتك لا تسمح بتغيير الموظف');
					$( '#employees_id_employe' ).val(employeesSelect);
				}
			});
	}
	

	
	
	
});
</script>