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
<select name="month" id="month" class="form-control" required>
<option value="">Month</option>

<?php
for ($i = 1; $i <= 12; $i++) {
echo "<option value='$i'>$i</option>";
}
?>
</select>
</div>
<div class="form-group">
<select name="day" id="day" class="form-control" required>
<option value="">Day</option>
<?php
for ($i = 1; $i <= 30; $i++) {
echo "<option value='$i'>$i</option>";
}
?>
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
            url:"Model/st_statistical_data/st_department_addpercent_insert.php",
            method:"POST",
            data:{category_id:category_id, btn_action:btn_action},
            success:function(data)
            {
                $('#brand_id').html(data);
            }
        });
    });





    $(document).on('click', '.update', function(){
        var product_id = $(this).attr("id");
        var btn_action = 'fetch_single';
        $.ajax({
            url:"product_action.php",
            method:"POST",
            data:{product_id:product_id, btn_action:btn_action},
            dataType:"json",
            success:function(data){
                $('#productModal').modal('show');
                $('#category_id').val(data.category_id);
                $('#brand_id').html(data.brand_select_box);
                $('#brand_id').val(data.brand_id);
                $('#product_name').val(data.product_name);
                $('#product_description').val(data.product_description);
                $('#product_quantity').val(data.product_quantity);
                $('#product_unit').val(data.product_unit);
                $('#product_base_price').val(data.product_base_price);
                $('#product_tax').val(data.product_tax);
                $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Product");
                $('#product_id').val(product_id);
                $('#action').val("Edit");
                $('#btn_action').val("Edit");
            }
        })
    });



});
</script>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  


<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
  html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
  html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
</script>