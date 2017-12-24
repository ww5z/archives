<?php
//login.php

include('../includes/database_connection.php');

if(isset($_SESSION['type']))
{
	header("location:../index.php");
}

$message = '';

if(isset($_POST["login"]))
{
	$query = "
	SELECT * FROM employees 
		WHERE id_employe = :id_employe
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
				'id_employe'	=>	$_POST["id_employe"]
			)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['user_status'] == 'Active')
			{
				if(password_verify($_POST["user_password"], $row["user_password"]))
				{
				
					$_SESSION['type'] = $row['user_type'];
					$_SESSION['id_employe'] = $row['id_employe'];
					$_SESSION['EmployeeName'] = $row['EmployeeName'];
					header("location:../index.php");
				}
				else
				{
					$message = "<label>Wrong Password</label>";
				}
			}
			else
			{
				$message = "<label>Your account is disabled, Contact Master</label>";
			}
		}
	}
	else
	{
		$message = "<label>Wrong username </labe>";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>نظام الموظفين - تسجيل الدخول</title>		
		<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
		
                <script src="../js/jquery-3.2.1.min.js/"></script>
                <script src="../js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h2 align="center">نظام الموظفين</h2>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">تسجيل الدخول</div>
				<div class="panel-body">
					<form method="post">
						<?php echo $message; ?>
						<div class="form-group">
							<label>رقم الحاسب</label>
							<input type="text" name="id_employe" class="form-control" required />
						</div>
						<div class="form-group">
							<label>كلمة المرور</label>
							<input type="password" name="user_password" class="form-control" required />
						</div>
						<div class="form-group">
							<input type="submit" name="login" value="Login" class="btn btn-info" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>