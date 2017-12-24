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
			<div class="panel-heading">تحرير البيانات الشخصية</div>
			<div class="panel-body">
				<form method="post" id="edit_profile_form">
					<span id="message"></span>
					<div class="form-group">
						<label>مكان الميلاد</label>
						<input type="text" name="place_birth" id="place_birth" class="form-control" value="<?php echo $place_birth; ?>" required />
					</div>
					<div class="form-group">
						<label>تاريخ الميلاد</label>
						<input type="text" name="Date_Birth" id="Date_Birth" class="form-control" required value="<?php echo $Date_Birth; ?>" />
					</div>
					<div class="form-group">
						<label>الجنسيـــة</label>
						<input type="text" name="Nationality" id="Nationality" class="form-control"  value="<?php echo $Nationality; ?>" />
					</div>
					
					<hr />
					
					<div class="form-group">
						<label>السجل المدني</label>
						<input type="text" name="card_number" id="card_number" class="form-control" value="<?php echo $card_number; ?>" required />
					</div>
					<div class="form-group">
						<label>تاريخ البطاقة</label>
						<input type="text" name="date_card" id="date_card" class="form-control"  value="<?php echo $date_card; ?>" />
					</div>
					<div class="form-group">
						<label>جهة إصدار البطاقة</label>
						<input type="text" name="Issuing_card" id="Issuing_card" class="form-control" value="<?php echo $Issuing_card; ?>" />
					</div>
					
					<hr />
					
					<div class="form-group">
						<label>رقم جواز السفر</label>
						<input type="text" name="Passport_number" id="Passport_number" class="form-control" value="<?php echo $Passport_number; ?>" />
					</div>
					<div class="form-group">
						<label>تاريخ إصدار الجواز</label>
						<input type="text" name="date_passport" id="date_passport" class="form-control" value="<?php echo $date_passport; ?>" />
					</div>
					<div class="form-group">
						<label>تاريخ انتهاء الجواز</label>
						<input type="text" name="expiry_passport" id="expiry_passport" class="form-control" value="<?php echo $expiry_passport; ?>" />
					</div>
					<div class="form-group">
						<label>جهة اصدار الجواز</label>
						<input type="text" name="Issuing_passport" id="Issuing_passport" class="form-control" value="<?php echo $Issuing_passport; ?>" />
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