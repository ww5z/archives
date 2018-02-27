<?php
//header.php
include('includes/database_connection.php');
//include('function.php');

if(!isset($_SESSION["type"]))
{
	header("location:register/login.php");
}
?>
<!DOCTYPE html><!--<3
             _
    ___ __ _| |_   _ _ __  ___  ___
   / __/ _` | | | | | '_ \/ __|/ _ \
  | (_| (_| | | |_| | |_) \__ \ (_) |
   \___\__,_|_|\__, | .__/|___/\___/
               |___/|_|

--><html lang="ar" dir="rtl">
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>نظام الموظفين</title>
		<script src="js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="./css/dataTables.bootstrap.min.css" rel="stylesheet">
		<!--my design-->
    <link href="./css/styls.css" rel="stylesheet">
		
		<!--<link rel="stylesheet" href="css/bootstrap.min.css" />-->
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<link href="css/styls.css" rel="stylesheet" type="text/css">
	</head>
	<body>
<div class="container">
  <header>
    <a href="index.php"><img src="images/logo.png" width="402" height="91" alt="logo"></a>
  </header>
</div>
		<div class="container">

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
						<a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						الرئيســة</a>
					</div>
			<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
					<?php
					if($_SESSION['type'] != 'member')
					{
					?>
						<!--<li><a href="user.php">المستخدمين</a></li>-->
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span>النظام الإحصائي</a>
							<ul class="dropdown-menu">
								<li><a href="st_statistical_data.php">عرض الإحصائيات</a></li>
								<li><a href="st_statistical_system.php">الأقســــام</a></li>
								<li><a href="st_department.php">اسماء البيانات</a></li>
							</ul>
						</li>
						
						<!--<li><a href="product.php">Product</a></li>-->
					<?php
					}
					?>
						<li><a href="college_empemployees.php">الموظفين</a></li>
						<li><a href="job_description_card.php">بطاقات الوصف الوظيفي</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right flip">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> <?php echo $_SESSION["EmployeeName"]; ?></a>
							<ul class="dropdown-menu">
								<li><a href="profile.php">تعديل كلمة المرور</a></li>
								<li><a href="register/logout.php">تسجيل الخروج</a></li>
							</ul>
						</li>
					</ul>

				</div>
					</div>
			</nav>
			
<main>
			