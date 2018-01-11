<?php
//profile.php
include('header.php');




$query = "
SELECT * FROM employees 
WHERE id_employe = '".$_SESSION["id_employe"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$name = '';
$email = '';
$user_id = '';
foreach($result as $row)
{
	$name = $row['EmployeeName'];
	$email = $row['user_type'];
}



?>
		<div class="panel panel-default">
			<div class="panel-heading">Edit Profile</div>
			<div class="panel-body">
				<form method="post" id="edit_profile_form">
					<span id="message"></span>
					<div class="form-group">
						<label>الإســـم</label>
						<input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $name; ?>" readonly />
					</div>
					<div class="form-group">
						<label>نوع العضوية</label>
						<input type="email" name="user_email" id="user_email" class="form-control" required value="<?php echo $email; ?>" readonly />
					</div>
					<hr />
					<div class="form-group">
						<label>كلمة المرور الجديدة</label>
						<input type="password" name="user_new_password" id="user_new_password" class="form-control" />
					</div>
					<div class="form-group">
						<label>إعادة كلمة المرور الجديدة</label>
						<input type="password" name="user_re_enter_password" id="user_re_enter_password" class="form-control" />
						<span id="error_password"></span>	
					</div>
					<div class="form-group">
						<input type="submit" name="edit_prfile" id="edit_prfile" value="Edit" class="btn btn-info" />
					</div>
				</form>
			</div>
		</div>
<?php
include('footer.php');
?>
<script>
$(document).ready(function(){
	$('#edit_profile_form').on('submit', function(event){
		event.preventDefault();
		if($('#user_new_password').val() != '')
		{
			if($('#user_new_password').val() != $('#user_re_enter_password').val())
			{
				$('#error_password').html('<label class="text-danger">Password Not Match</label>');
				return false;
			}
			else
			{
				$('#error_password').html('');
			}
		}
		$('#edit_prfile').attr('disabled', 'disabled');
		var form_data = $(this).serialize();
		$('#user_re_enter_password').attr('required',false);
		$.ajax({
			url:"register/edit_profile.php",
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


			
