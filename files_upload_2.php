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
                            
                            <div class="form-group">
                                <label  for="outgoing_no" class="col-sm-2 control-label">رقم الصــادر</label>
                                <div class="input-group">
                                    <input type="text" name="outgoing_no" id="product_quantity" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" /> 
                                    <span class="input-group-addon">
                                        <select name="date_outgoing_no" id="date_outgoing_no" required>
                                            <option value="1435" >1435</option>
                                        <option value="1436" >1436</option>
                                        <option value="1437" >1437</option>
                                        <option value="1438" >1438</option>
                                        <option value="1439" selected="selected">1439</option>
                                        <option value="1438" >1440</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

				
							<div class="row form-group">
								<label for="file_type" class="col-sm-2 control-label">نوع الملف</label>
								<div class="col-sm-10">
									<select class="form-control" name="file_type" id="file_type" required>
                                        	<option value="" selected="selected">    </option>
											<option value="1" >التعيين والترقيات</option>
											<option value="2" >التكليف والإنتدابات</option>
											<option value="3" >التدريب والإبتعاث</option>
											<option value="4" >الإجازات</option>
											<option value="5" >الحسميات والجزائأت</option>
											<option value="6" >عـــــام</option>
                                        </select>
								</div>
							</div>
				
                            
                            <div class="form-group">
                                <label for="employees_id_employe" class="col-sm-2 control-label">الموظف:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="text" name="c_facts_j" id="c_facts_j" style="width: 60px;text-align: center;" value="0" />
                                    </span>
<!--                                    <input type="text" class="form-control" id="post_title" name="employees_id_employe" placeholder="رقم الحاسب" >-->
                                           
<?php

############################ أختيار المعني بالمعاملة

// ///////////$connect = new PDO("mysql:host=localhost;dbname=testing4", "root", "1bn5n52");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT id_employe, EmployeeName FROM employees ORDER BY EmployeeName ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["id_employe"].'">'.$row["EmployeeName"].'</option>';
 }
 return $output;
}


?>               

<select name="employees_id_employe" id="employees_id_employe" class="form-control item_unit"><option value="">Select Unit</option><?php echo fill_unit_select_box($connect); ?></select>

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
							  <input type="file" onchange="readURL(this);" name="post_image" id="post_image" required >
						</div>
				    </div>
					<div class="row form-group text-center">
						<div class="col-sm-10 cmd_btn">
							<button id="btn-save-post" type="submit" class="btn btn-primary">حفــــظ</button>
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