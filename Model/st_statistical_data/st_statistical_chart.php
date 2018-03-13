<?php 
//index.php

if ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
     $number = $_POST['id'];
     
     if($number == '0'){
         exit();
     }
}

$connect = mysqli_connect("localhost", "root", "1bn5n52", "nc_archives");
$query = "SELECT * FROM st_statistical_data WHERE id_Department = '$number'";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ year:'".$row["year"]."', theRatio:".$row["theRatio"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);



?>



<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>

   <div id="chart"></div>


<script>
//Bar, Line , Area || for Big Add: stacked:true

	
	var data_chart = [<?php echo $chart_data; ?>];
			chart(data_chart);
	//alert(data_chart);
function chart(data_chart) {
Morris.Bar({
 element : 'chart',
 data:data_chart,
 xkey:'year',
 ykeys:['theRatio'],
 labels:['النسبة'],
 hideHover:'auto',
 
});
	}
</script>