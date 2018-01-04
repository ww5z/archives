<?php
//index.php
include('header.php');


$query = "
SELECT * FROM PersonalData 
WHERE id_PersonalData = '".$_SESSION["id_employe"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$place_birth = '';
$email = '';
$Nationality = '';
$card_number = '';
$date_card = '';
$Issuing_card = '';
$Passport_number = '';
$date_passport = '';
$expiry_passport = '';
$Issuing_passport = '';

foreach($result as $row)
{
	$place_birth = $row['place_birth'];
	$Date_Birth = $row['Date_Birth'];
	$Nationality = $row['Nationality'];
	$card_number = $row['card_number'];
	$date_card = $row['date_card'];
	$Issuing_card = $row['Issuing_card'];
	$Passport_number = $row['Passport_number'];
	$date_passport = $row['date_passport'];
	$expiry_passport = $row['expiry_passport'];
	$Issuing_passport = $row['Issuing_passport'];
	//$ = $row[''];
}



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
		<input type="text" name="place_birth" id="place_birth" class="form-control" value="<?php echo $place_birth; ?>" required />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>رقمهــــا</label>
		<input type="text" name="place_birth" id="place_birth" class="form-control" value="<?php echo $place_birth; ?>" required />
		</div>
	</div>
		<div class="col-md-6">
		<div class="form-group">
		<label>مسمى الوظيفة</label>
		<input type="text" name="place_birth" id="place_birth" class="form-control" value="<?php echo $place_birth; ?>" required />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>الرمز التصنيفي</label>
		<input type="text" name="place_birth" id="place_birth" class="form-control" value="<?php echo $place_birth; ?>" required />
		</div>
	</div>
</div>
					
					
<div class="form-group">
<label>الإرتباط التنظيمي</label>
<select class="form-control">
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
						<textarea class="form-control" rows="8" id="post_content" name="post_content" placeholder="Post Content"></textarea>
					</div>
					
					<div class="form-group">
						<label>الصلاحيــــات</label>
						<input type="text" name="Date_Birth" id="Date_Birth" class="form-control" required value="<?php echo $Date_Birth; ?>" />
					</div>
					
					<div class="form-group">
						<label>المؤهل العلمي</label>
						<input type="text" name="Date_Birth" id="Date_Birth" class="form-control" required value="<?php echo $Date_Birth; ?>" />
					</div>
					
					<div class="form-group">
						<label>الخبرة العملية</label>
						<input type="text" name="Date_Birth" id="Date_Birth" class="form-control" required value="<?php echo $Date_Birth; ?>" />
					</div>
					
					<div class="form-group">
						<label>التدريب</label>
						<input type="text" name="Date_Birth" id="Date_Birth" class="form-control" required value="<?php echo $Date_Birth; ?>" />
					</div>
					
					<div class="form-group">
						<label>معارف وقدرات مهارات أخرى</label>
						<input type="text" name="Date_Birth" id="Date_Birth" class="form-control" required value="<?php echo $Date_Birth; ?>" />
					</div>

					
					
					
					<div class="form-group">
						<input type="button" name="edit_prfile" id="edit_prfile" value="Edit" class="btn btn-info" />
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
			url:"Model/sit/edit_PersonalData.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#edit_prfile').attr('disabled', false);
				$('#user_new_password').val('');
				$('#user_re_enter_password').val('');
				$('#message').html(data);
			}
		})
	});
});
</script>