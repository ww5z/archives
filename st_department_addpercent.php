<?php
//index.php
include('header.php');

include('Model/st_statistical_data/function.php');
//$connect = new PDO("mysql:host=localhost;dbname=testing4", "root", "1bn5n52");


?>


<script type="text/javascript" src="js/st_department_addpercent.js"></script>



<span id='alert_action'></span>

<form class="form-inline">
    
    <div class="form-group">
		<label>القسم</label>
		<select name="addpercent_id" id="addpercent_id" class="form-control" required>
		<option value="">اختــر القسـم</option>
		<?php echo fill_category_list($connect);?>
		</select>
		</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div class="form-group">
		<label>الأســــم</label>
		<select name="addpercent_data" id="addpercent_data" class="form-control" required>
		<option value="0">اختـــر الأسم</option>
		</select>
	</div>

	
</form>


<br /> 
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6"  align='left'>
	<button style="width: 150px; height: 30px" type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>
</div>

    <br /> 
    <br /> 


    
    
    <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">تعديل البيانات</h4>
      </div>


		
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="form_id_employees">حفــظ التعديـلات</button>
      </div>
    </div>
  </div>
</div>
          
          
          
          

  
          
          <div id="procedure"></div>

          
          
          
        </div>
      </div>
    </div>









	
	  <div id="productModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i>إضافة النسبة</h4>
                        </div>
                        <div class="modal-body">
							
							
<div class="form-inline">
<div class="form-group">
<label>التاريخ</label>
<select name="year" id="year" class="form-control" required>
<option value="">Year</option>
<?php
for ($i = 1434; $i <= 1442; $i++) {
echo "<option value='$i'>$i</option>";
}
?>

</select>
</div>
<div class="form-group">
<select name="training_chapter" id="training_chapter" class="form-control" >
	<option value="0">الفصل التدريبي</option>
	<option value="1">الفصل الأول</option>
	<option value="2">الفصل الثاني</option>
</select>
</div>

</div>
							
<!--                            
<div class="form-group">
<label>Enter Product Name</label>
<input type="text" name="product_name" id="product_name" class="form-control" required />
</div>-->
                           
		  

		 
                            <div class="form-group">
                                <label>اكتب النسبة (%)</label>
                                <input type="text" name="theRatio" id="theRatio" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_statistical" id="id_statistical" />
							<input type="hidden" name="id_Department" id="id_Department" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
<script>
$(document).ready(function(){




    $('#category_id').change(function(){
        var category_id = $('#category_id').val();
        var btn_action = 'load_brand';
        $.ajax({
            url:"Model/st_statistical_data/st_department_addpercent_action.php",
            method:"POST",
            data:{category_id:category_id, btn_action:btn_action},
            success:function(data)
            {
                $('#brand_id').html(data);
            }
        });
    });





   



});
</script>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  


