<?php
//index.php
include('header.php');



//$user_id = $_SESSION["user_id"];

$query = "
SELECT * FROM job_data 
WHERE id_job_data = '".$_SESSION["id_employe"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$Staff = '';
$Ranked = '';
$Job_number = '';
$JobTitle = '';
$Level_Class = '';
$Employer = '';
$AppointmentDecision = '';
$Date_appointment = '';
$EntryState = '';
$Enrollment_institution = '';
$First_direct_date = '';
$Date_commencement_college = '';
//$user_id = '';
foreach($result as $row)
{
	$id_job_data = $row['id_job_data'];
	$Staff = $row['Staff'];
	$Ranked = $row['Ranked'];
	$Job_number = $row['Job_number'];
	$JobTitle = $row['JobTitle'];
	$Level_Class = $row['Level_Class'];
	$Employer = $row['Employer'];
	$AppointmentDecision = $row['AppointmentDecision'];
	$Date_appointment = $row['Date_appointment'];
	$EntryState = $row['EntryState'];
	$Enrollment_institution = $row['Enrollment_institution'];
	$First_direct_date = $row['First_direct_date'];
	$Date_commencement_college = $row['Date_commencement_college'];
	
}



?>
	<br />

		<div class="panel panel-default">
			<div class="panel-heading">تحرير بيانات الوظيفة</div>
			<div class="panel-body">
				<form method="post" id="edit_profile_form">
					<span id="message"></span>
					<div class="form-group">
						<label>الكــادر</label>
						<input type="text" name="Staff" id="Staff" class="form-control" value="<?php echo $Staff; ?>" required />
					</div>
					<div class="form-group">
						<label>المرتبة</label>
						<input type="text" name="Ranked" id="Ranked" class="form-control" value="<?php echo $Ranked; ?>" />
					</div>
					<div class="form-group">
						<label>رقم الوظيفة</label>
						<input type="text" name="Job_number" id="Job_number" class="form-control" value="<?php echo $Job_number; ?>" />
					</div>
					<div class="form-group">
						<label>مسمى الوظيفة</label>
						<input type="text" name="JobTitle" id="JobTitle" class="form-control" value="<?php echo $JobTitle; ?>" />
					</div>
					<div class="form-group">
						<label>المستوى / الدرجة</label>
						<input type="text" name="Level_Class" id="Level_Class" class="form-control" value="<?php echo $Level_Class; ?>" />
					</div>
					<div class="form-group">
						<label>جهة العمل</label>
						<input type="text" name="Employer" id="Employer" class="form-control" value="<?php echo $Employer; ?>" />
					</div>
					<div class="form-group">
						<label>رقم قرار التعيين</label>
						<input type="text" name="AppointmentDecision" id="AppointmentDecision" class="form-control" value="<?php echo $AppointmentDecision; ?>" />
					</div>
					<div class="form-group">
						<label>تاريخ قرار التعيين</label>
						<input type="text" name="Date_appointment" id="Date_appointment" class="form-control" value="<?php echo $Date_appointment; ?>" />
					</div>
					<div class="form-group">
						<label>تاريخ الإلتحاق الدولة</label>
						<input type="text" name="EntryState" id="EntryState" class="form-control" value="<?php echo $EntryState; ?>" />
					</div>
					<div class="form-group">
						<label>تاريخ الإلتحاق بالمؤسسة</label>
						<input type="text" name="Enrollment_institution" id="Enrollment_institution" class="form-control" value="<?php echo $Enrollment_institution; ?>" />
					</div>
					<div class="form-group">
						<label>تاريخ المباشرة الأولى</label>
						<input type="text" name="First_direct_date" id="First_direct_date" class="form-control" value="<?php echo $First_direct_date; ?>" />
					</div>
					<div class="form-group">
						<label>تاريخ المباشرة بالكلية</label>
						<input type="text" name="Date_commencement_college" id="Date_commencement_college" class="form-control" value="<?php echo $Date_commencement_college; ?>" />
					</div>
					
					
					
					<div class="form-group">
						<input type="submit" name="edit_prfile" id="edit_prfile" value="Edit" class="btn btn-info" />
					</div>
				</form>
			</div>
		</div>
<?php
include("footer.php");
?>


<script>
$(document).ready(function(){
	$('#edit_profile_form').on('submit', function(event){
		event.preventDefault();
		
		$('#edit_prfile').attr('disabled', 'disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"Model/sit/edit_job_data.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#edit_prfile').attr('disabled', false);
				//$('#user_new_password').val('');
				//$('#user_re_enter_password').val('');
				$('#message').html(data);
			}
		})
	});
});
</script>