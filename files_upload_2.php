<?php
$page_title = 'إضافة ملــف'; 
require_once ('header.php');
?>



	<div class="container-fluid admin-gcontainer">
		<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">إضافة ملف</h3>
		</div>
		<div class="panel-body">	
		  	<form class="form-rtl has-validation-callback" method="post" action="" id="form-add-post" enctype="multipart/form-data">
                            
                        <div class="row form-group">
                                <label for="outgoing_no" class="col-sm-2 control-label">رقم الصادر</label>
                                <div class="col-sm-10">
                                          <input type="text" class="form-control" id="outgoing_no" name="outgoing_no" placeholder="رقم الصادر" >
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <label for="date_outgoing_no" class="col-sm-2 control-label">تاريخه</label>
                                <div class="col-sm-10">
                                          <input type="text" class="form-control" id="post_name" name="date_outgoing_no" placeholder="تاريخ الصادر" >
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="employees_id_employe" class="col-sm-2 control-label">الموظف:</label>
                                <div class="col-sm-10">
<!--                                    <input type="text" class="form-control" id="post_title" name="employees_id_employe" placeholder="رقم الحاسب" >-->
                                            <select id="employees_id_employe" name="employees_id_employe">
            <option value="0" selected="selected">   </option>
<?php

############################ أختيار المعني بالمعاملة
require_once ('includes/mysqli_connect.php');

if(isset($id_p)) {
	$current_city = $city;
}elseif (isset($_POST['city'])){
    $current_city = $_POST['city'];
} else {
	$current_city = "";
}



$q = "SELECT id_employe, EmployeeName, computer_number FROM employees "; 
$r = @mysqli_query ($dbc, $q); // Run the query.
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
  
;


	echo '<option value="'.$row['id_employe'].'"';  //  جرب هذه الأضافة
	if ($current_city == $row['id_employe']) {
		echo ' selected';
	}
	
	echo '>'.$row['EmployeeName'].'</option>';



    }
mysqli_free_result ($r);
?>               


            </select>
                            </div>
				    </div>	
					<div class="row form-group">
						<label for="post_content" class="col-sm-2 control-label">Post Content : </label>
						<div class="col-sm-10">
							  <textarea class="form-control" rows="8" id="post_content" name="post_content" placeholder="Post Content"></textarea>
						</div>
				    </div>
					<div class="row form-group">
						<label for="post_image" class="col-sm-2 control-label">Post Image : </label>
						<div class="col-sm-10">
							  <img id="post_image_preview" src="img/thumbs/no_thumb.jpg" alt="post Image" />				
							  <input type="file" onchange="readURL(this);" name="post_image" id="post_image">
						</div>
				    </div>
					<div class="row form-group text-center">
						<div class="col-sm-10 cmd_btn">
							<button id="btn-save-post" type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
		    </form>
		</div>
		</div>
		</div>
	</div>
	

	<div class="container-fluid footer text-center">
		<div class="container">
			<p>&copy; Copyright Something 2016</p>
		</div>
	</div>

	<div id="loading"></div>
	<div id="overlay"></div>


        <script src="js/files_upload_2.js"></script>



</body>
</html>