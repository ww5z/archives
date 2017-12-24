<?php
//index.php
$count = 0;
$error = '';
if(isset($_POST['submit']))
{
	$name = '';
	$phone = '';
	$email = '';
	$address = '';
	if(empty($_POST['name']))
	{
		$error .= '<p class="text-danger">Name is Required</p>';
	}
	else
	{
		if(!preg_match("/^[a-zA-Z ]*$/",$_POST["name"]))
		{
			$error .= '<p class="text-danger">Only Alphabet allowed in Name</p>';
		}	
		else
		{
			$name = $_POST['name'];
		}
	}
	
	if(empty($_POST["email"]))
	{
		$error .= '<p class="text-danger">Email Address is Required</p>';
	}
	else
	{
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
		{
			$error .= '<p class="text-danger">Invalid email format</p>';
		}
		else
		{
			$email = $_POST["email"];
		}
	}
	
	if(empty($_POST["phone"]))
	{
		$error .= '<p class="text-danger">Phone Number is Required</p>';
	}
	else
	{
		if(!preg_match("/^[0-9]*$/",$_POST["phone"]))
		{
			$error .= '<p class="text-danger">Only Numbers allowed in Phone</p>';
		}
		else
		{
			$phone = $_POST["phone"];
		}
	}
	
	if(empty($_POST["address"]))
	{
		$error .= '<p class="text-danger">Address is Required</p>';
	}
	else
	{
		$address = $_POST["address"];
	}
	
	if($error == '')
	{
		$count = $count + 1;
		$error = '<label class="text-success">Form Data Submitted</label>';
	}

	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>How to Restore Form Data using Jquery with PHP</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="savy.js"></script>
	</head>
	<body>
		<br />
		<h2 align="center"><a href="#">How to Restore Form Data using Jquery with PHP</a></h2>
		<br />
		<div class="container">
			<div class="row">
				<div class="col-lg-6" style="margin:0 auto; float:none;">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">User Form</h3>
						</div>
						<div class="panel-body">
							<form method="post">
								<span class="text-danger"><?php echo $error; ?></span>
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" id="name" class="form-control" />
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" id="email" class="form-control" />
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="text" name="phone" id="phone" class="form-control" />
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea name="address" id="address" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label>Gender</label>
									<select name="gender" id="gender" class="form-control">
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
								</div>
								<div class="form-group">
									<label>Programming Languages</label><br />
									<div class="checkbox-inline">
										<label><input type="checkbox" name="languages[]" id="php_language" value="PHP">PHP</label>
									</div>
									<div class="checkbox-inline">
										<label><input type="checkbox" name="languages[]" id="java_language" value="Java">Java</label>
									</div>
									<div class="checkbox-inline">
										<label><input type="checkbox" name="languages[]" id="net_language" value=".Net">.Net</label>
									</div>
								</div>
								<div class="form-group" align="center">
									<input type="submit" name="submit" class="btn btn-info" value="Submit" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
		
	<?php
	if($count == 0)
	{
	?>
	$('#name').savy('load');
	$('#email').savy('load');
	$('#phone').savy('load');
	$('#address').savy('load');
	$('#gender').savy('load');
	$('#php_language').savy('load');
	$('#java_language').savy('load');
	$('#net_language').savy('load');
	<?php
	}
	else
	{
	?>
	$('#name').savy('destroy');
	$('#email').savy('destroy');
	$('#phone').savy('destroy');
	$('#address').savy('destroy');
	$('#gender').savy('destroy');
	$('.languages').savy('destroy');
	$('#php_language').savy('destroy');
	$('#java_language').savy('destroy');
	$('#net_language').savy('destroy');
	<?php
	}
	?>
	
});
</script>