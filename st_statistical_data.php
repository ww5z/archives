<?php
//index.php

include('header.php');

include('Model/st_statistical_data/function.php');

?>
	<br />
	<div class="row">
	<?php
	if($_SESSION['type'] != 'member')
	{
	?>
		


		
		
<form class="form-inline">

	<div class="form-group">
		<a href="st_statistical_system.php" class="btn btn-primary">الأقســـام</a>
	</div>
	<div class="form-group">
		<a href="st_department.php" class="btn btn-primary">اسمـــاء البيــنات</a>
	</div>
	<div class="form-group">
		<a href="st_department_addpercent.php" class="btn btn-primary">تسجيل النسب الإحصائية</a>
	</div>
	<div class="form-group">
		<a href="st_department_section.php" class="btn btn-primary">عرض كامل القسم</a>
	</div>
	<div class="form-group">
		<a href="st_department_chart.php" class="btn btn-primary">عرض الرسم البياني (تجريبي)</a>
	</div>

</form>
<br />
<hr />
<br />
		
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>مجموع الموظفين</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_user($connect); ?></h1>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>مجموع الأقسام</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_category($connect); ?></h1>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>مجموع الأسماء الإحصائية</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_brand($connect); ?></h1>
			</div>
		</div>
	</div>
		
		
		
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Total Item in Stock</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_product($connect); ?></h1>
			</div>
		</div>
	</div>
	<?php
	}
	?>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Non</strong></div>
				<div class="panel-body" align="center">
					<h1>$<?php echo count_total_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Non</strong></div>
				<div class="panel-body" align="center">
					<h1>$<?php echo count_total_cash_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Non</strong></div>
				<div class="panel-body" align="center">
					<h1>$<?php echo count_total_credit_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<hr />
		<?php
		if($_SESSION['type'] == 'masterrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr')
		{
		?>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Non</strong></div>
				<div class="panel-body" align="center">
					<?php echo get_user_wise_total_order($connect); ?>
				</div>
			</div>
		</div>
		<?php
		}
		?>
	</div>

<?php
include("footer.php");
?>