<?php
//index.php
include('header.php');

	if(isset($_GET["add"]))
	{

	}
	elseif(isset($_GET["update"]) && isset($_GET["id"]))
	{
		$id = $_GET["id"];
	}else {
		$id = 0;
	}


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


 /*
$query = "
SELECT * FROM job_description_card 
WHERE employees_id = '".$_SESSION["id_employe"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$id_idjob_description_card = '';
$grade = '';
$job_id = '';
$job_title = '';
$OrganizationalLinkage = '';
$Duties_tasks = '';
$Powers = '';
$Qualification = '';
$Practical_experience = '';
$Training = '';
$Other = '';
$employees_id = '';


foreach($result as $row)
{
	$id_idjob_description_card = $row['id_idjob_description_card'];
	$grade = $row['grade'];
	$job_id = $row['job_id'];
	$job_title = $row['job_title'];
	$OrganizationalLinkage = $row['OrganizationalLinkage'];
	$Duties_tasks = $row['Duties_tasks'];
	$Powers = $row['Powers'];
	$Qualification = $row['Qualification'];
	$Practical_experience = $row['Practical_experience'];
	$Training = $row['Training'];
	$Other = $row['Other'];
	$employees_id = $row['employees_id'];

	//$ = $row[''];
}
*/


?>
	<br />

		<div class="panel panel-default">
			<div class="panel-heading">بطاقة الوصف الوظيفي</div>
			<div class="panel-body">
				<form method="post" id="edit_profile_form">
					<span id="message"></span>
					
					
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<label>المرتبــــة</label>
		<input type="text" name="grade" id="grade" class="form-control" value="" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>رقمهــــا</label>
		<input type="text" name="job_id" id="job_id" class="form-control" value="" />
		</div>
	</div>
		<div class="col-md-6">
		<div class="form-group">
		<label>مسمى الوظيفة</label>
		<input type="text" name="job_title" id="job_title" class="form-control" value=""/>
		</div>
	</div>
	<div class="col-md-6">
<!--		<div class="form-group">
		<label>الموظف</label>
		<input type="text" name="employees_id" id="employees_id" class="form-control" value="" />
		</div>-->
		
			<div class="form-group">
			<label>الموظف:</label>
			<div class="input-group">
			<span class="input-group-addon">
			<input type="text" name="c_facts_j" id="c_facts_j" style="width: 60px;text-align: center;" value="0" disabled="disabled" />
			</span>
			<select name="employees_id" id="employees_id" class="form-control" >
			<option value="">اختر موظـــف</option>
			<?php echo fill_unit_select_box($connect); ?>
			</select>
			</div>
			</div>
	</div>
</div>
					
					
<div class="form-group">
<label>الإرتباط التنظيمي</label>
<select class="form-control" name="OrganizationalLinkage" id="OrganizationalLinkage" >
	<option selected="selected" value="-1">الرجاء الأختيار...</option>
	<option value="01">مجلس أبها</option>
	<option value="02">العميد</option>
	<option value="9055-1">وكيل الكلية لخدمات التدريب</option>
	<option value="9055-2">وكيل الكلية لشؤون المتدربين</option>
		<option value="9055-5">الشؤون الادارية والمالية</option>
	<option value="9055-8">الشئون الادارية</option>
	<option value="9055-7">الشئون المالية</option>
	
<!--	<option value="9055-30">الاتصالات الإدارية والأرشيف</option>
	<option value="9055-32">الأمن والحراسات</option>
	<option value="9055-26">التدرب الإلكتروني ومصادر التدرب</option>
	<option value="9055-44">التدريب التعاوني</option>
	<option value="9055-31">التدريب المشترك</option>
	<option value="9055-21">التطوير والجودة</option>
	<option value="9055-9">التوجيه والارشاد</option>
	<option value="9055-42">الحركة</option>
	<option value="9055-25">السلامة والصحة المهنية</option>
	<option value="9055-34">الصندوق</option>
	<option value="9055-29">الصيانة والخدمات</option>
	<option value="9055-11">العلاقات العامة</option>
	<option value="9055-19">العيادة الطبية</option>
	<option value="9055-3">القبول والتسجيل</option>
	<option value="9055-6">المتابعه</option>
	<option value="9055-35">المحاسبة</option>
	<option value="9055-22">المسئولية الاجتماعية</option>
	<option value="9055-37">المستودع</option>
	<option value="9055-36">المشتريات</option>
	<option value="9055-18">النشاط</option>
	<option value="9055-20">تقنية المعلومات</option>
	<option value="9055-24">خدمة المجتمع والتدريب المستمر</option>
	<option value="9055-33">شئون الموظفين</option>
	<option value="9055-47">صندوق المتدربين</option>
	<option value="9055-48">قسم التقنية الإداريـــة</option>
	<option value="9055-14">قسم التقنية الادارية</option>
	<option value="9055-28">قسم الدراسات العامة</option>
	<option value="9055-12">قسم تقنية الحاسب</option>
	<option value="9055-38">مراقبة المخزون</option>
	<option value="9055-17">مكتب التنسيق الوظيفي و التوجيه المهني</option>
	<option value="9055-46">مكتب العميد</option>-->


</select>
</div>
					
					
					<div class="form-group">
						<label>الواجبات والمهام</label>
						<textarea class="form-control" rows="8" id="Duties_tasks" name="Duties_tasks" placeholder="Post Content"></textarea>
					</div>
					
					<div class="form-group">
						<label>الصلاحيــــات</label>
						<input type="text" name="Powers" id="Powers" class="form-control" value="" />
					</div>
					
					<div class="form-group">
						<label>المؤهل العلمي</label>
						<input type="text" name="Qualification" id="Qualification" class="form-control" value="" />
					</div>
					
					<div class="form-group">
						<label>الخبرة العملية</label>
						<input type="text" name="Practical_experience" id="Practical_experience" class="form-control" required value="" />
					</div>
					
					<div class="form-group">
						<label>التدريب</label>
						<input type="text" name="Training" id="Training" class="form-control" required value="" />
					</div>
					
					<div class="form-group">
						<label>معارف وقدرات مهارات أخرى</label>
						<input type="text" name="Other" id="Other" class="form-control" value="" />
					</div>

					
					
					
					<div class="form-group">
						<input type="button" name="btn_action" id="btn_actionn" value="Add" class="btn btn-info" />
					</div>
					<input type="hidden" name="form_action" id="form_action" value="Add" />
					<input type="hidden" name="id_idjob_description_card" id="id_idjob_description_card" value="<?php echo $id; ?>" />
				</form>
			</div>
		</div>
<?php
include("footer.php");
?>

<script>
$(document).ready(function(){
	
	
	var id_idjob_description_card = <?php echo $id; ?>;
	
	if (id_idjob_description_card > 0){
		
		var form_action = 'fetch_single';
		$.ajax({
			url:'Model/job_description_card/job_description_card.php',
			method:"POST",
			data:{id_idjob_description_card:id_idjob_description_card, form_action:form_action},
			dataType:"json",
			success:function(data)
			{
				//$('#brandModal').modal('show');
				$('#id_idjob_description_card').val(data.id_idjob_description_card);
				$('#grade').val(data.grade);
				$('#job_id').val(data.job_id);
				$('#job_title').val(data.job_title);
				$('#OrganizationalLinkage').val(data.OrganizationalLinkage);
				$('#Duties_tasks').val(data.Duties_tasks);
				$('#Powers').val(data.Powers);
				$('#Qualification').val(data.Qualification);
				$('#Practical_experience').val(data.Practical_experience);
				$('#Training').val(data.Training);
				$('#Other').val(data.Other);
				$('#employees_id').val(data.employees_id);
				$('.panel-heading').html("<span class='text-primary'>تحرير بطاقة الوصف الوظيفي");
				$('#form_action').val('Edit');
				$('#btn_action').val('Edit');
			}
		})
		
		
	} else {
		alert('no')
	}
	
	
	$(document).on('click','#btn_actionn', function(event){
		
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $('#edit_profile_form').serialize();
		
		$.ajax({
			url:"Model/job_description_card/job_description_card.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				alert(data);
				window.location.replace("job_description_card.php");
				//$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
			}
		})
	});
	
	

});
	
	
	
</script>